<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Env;
use Illuminate\Support\InteractsWithTime;
use Illuminate\Support\Stringable;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

use function Illuminate\Support\php_binary;
use function Termwind\terminal;

#[AsCommand(name: 'serve')]
class ServeCommand extends Command
{
    use InteractsWithTime;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server';

    /**
     * The number of PHP CLI server workers.
     *
     * @var int<2, max>|false
     */
    protected $phpServerWorkers = 1;

    /**
     * The current port offset.
     *
     * @var int
     */
    protected $portOffset = 0;

    /**
     * The host to bind the server to.
     *
     * @var string
     */
    protected $host;

    /**
     * The port to bind the server to.
     *
     * @var int
     */
    protected $port;

    /**
     * The output buffer.
     *
     * @var string
     */
    protected $outputBuffer = '';

    /**
     * Indicates if the server running message has been displayed.
     *
     * @var bool
     */
    protected $serverRunningHasBeenDisplayed = false;

    /**
     * The requests pool.
     *
     * @var array
     */
    protected $requestsPool = [];

    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName($this->name)
            ->setDescription($this->description)
            ->setHelp($this->getHelpText());
    }

    /**
     * Execute the console command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return int
     */
    protected function handle()
    {
        $this->host = $this->host();
        $this->port = $this->port();
        $this->portOffset = 0;

        if (! $this->isPortAvailable($this->host, $this->port)) {
            if (! $this->canTryAnotherPort()) {
                $this->components->error("Port {$this->port} is already in use.");
                return 1;
            }

            do {
                $this->portOffset++;
                $this->port = $this->port();
            } while (! $this->isPortAvailable($this->host, $this->port));
        }

        $this->displayStartingMessage();

        $this->startServer();

        return 0;
    }

    /**
     * Get the help text.
     *
     * @return string
     */
    protected function getHelpText()
    {
        return <<<'EOT'
The <info>%command.name%</info> command starts a development server for your Laravel application.

<info>php %command.full_name% [options]</info>

By default, the server will listen on <comment>127.0.0.1:8000</comment>. You can change the host and port by using the <info>--host</info> and <info>--port</info> options.

<info>php %command.full_name% --host=0.0.0.0 --port=8080</info>

You can also specify the number of tries to find an available port using the <info>--tries</info> option.

<info>php %command.full_name% --tries=10</info>

EOT;
    }

    /**
     * Display the starting message.
     *
     * @return void
     */
    protected function displayStartingMessage()
    {
        $this->components->info("Starting Laravel development server on [http://{$this->host}:{$this->port}]...");
        $this->comment('  <fg=yellow;options=bold>Press Ctrl+C to stop the server</>');
        $this->newLine();
    }

    /**
     * Start the PHP development server.
     *
     * @return void
     */
    protected function startServer()
    {
        $process = new Process([
            php_binary(),
            '-S',
            "{$this->host}:{$this->port}",
            '-t',
            public_path(),
        ], null, null, null, null);

        $process->setTty(Process::isTtySupported());
        $process->setTimeout(null);
        $process->start($this->handleProcessOutput());

        do {
            $this->flushOutputBuffer();
            sleep(1);
        } while ($process->isRunning());

        if (! $process->isSuccessful()) {
            $this->components->error('The development server failed to start.');
            $this->line($process->getErrorOutput());
        }
    }

    /**
     * Check if the given host and port are available.
     *
     * @param  string  $host
     * @param  int  $port
     * @return bool
     */
    protected function isPortAvailable($host, $port)
    {
        $connection = @fsockopen($host, $port);
        if (is_resource($connection)) {
            fclose($connection);
            return false;
        }
        return true;
    }

    /**
     * Get the host.
     *
     * @return string
     */
    protected function host()
    {
        $host = $this->input->getOption('host');
        if (is_null($host)) {
            [$host] = $this->getHostAndPort();
        }
        return $host ?: Env::get('SERVER_HOST', '127.0.0.1');
    }

    /**
     * Get the port.
     *
     * @return int
     */
    protected function port()
    {
        $port = $this->input->getOption('port');
        if (is_null($port)) {
            [, $port] = $this->getHostAndPort();
        }
        $port = $port ?: 8000;
        return (int) $port + $this->portOffset;
    }

    /**
     * Get the host and port from the host option string.
     *
     * @return array
     */
    protected function getHostAndPort()
    {
        if (preg_match('/(\[.*\]):?([0-9]+)?/', $this->input->getOption('host'), $matches) !== false) {
            return [
                $matches[1] ?? $this->input->getOption('host'),
                $matches[2] ?? null,
            ];
        }

        $hostParts = explode(':', $this->input->getOption('host'));
        return [
            $hostParts[0],
            $hostParts[1] ?? null,
        ];
    }

    /**
     * Check if the command has reached its maximum number of port tries.
     *
     * @return bool
     */
    protected function canTryAnotherPort()
    {
        return is_null($this->input->getOption('port')) &&
            ($this->input->getOption('tries') > $this->portOffset);
    }

    /**
     * Returns a "callable" to handle the process output.
     *
     * @return callable(string, string): void
     */
    protected function handleProcessOutput()
    {
        return function ($type, $buffer) {
            $this->outputBuffer .= $buffer;
            $this->flushOutputBuffer();
        };
    }

    /**
     * Flush the output buffer.
     *
     * @return void
     */
    protected function flushOutputBuffer()
    {
        $lines = (new Stringable($this->outputBuffer))->explode("\n");
        $this->outputBuffer = (string) $lines->pop();
        $lines
            ->map(fn ($line) => trim($line))
            ->filter()
            ->each(function ($line) {
                if ((new Stringable($line))->contains('Development Server (http')) {
                    if ($this->serverRunningHasBeenDisplayed === false) {
                        $this->serverRunningHasBeenDisplayed = true;
                        $this->components->info("Server running on [http://{$this->host()}:{$this->port()}].");
                        $this->comment('  <fg=yellow;options=bold>Press Ctrl+C to stop the server</>');
                        $this->newLine();
                    }
                    return;
                }

                if ((new Stringable($line))->contains(' Accepted')) {
                    $requestPort = static::getRequestPortFromLine($line);
                    $this->requestsPool[$requestPort] = [
                        $this->getDateFromLine($line),
                        $this->requestsPool[$requestPort][1] ?? false,
                        microtime(true),
                    ];
                } elseif ((new Stringable($line))->contains([' [200]: GET '])) {
                    $requestPort = static::getRequestPortFromLine($line);
                    $this->requestsPool[$requestPort][1] = trim(explode('[200]: GET', $line)[1]);
                } elseif ((new Stringable($line))->contains('URI:')) {
                    $requestPort = static::getRequestPortFromLine($line);
                    $this->requestsPool[$requestPort][1] = trim(explode('URI: ', $line)[1]);
                } elseif ((new Stringable($line))->contains(' Closing')) {
                    $requestPort = static::getRequestPortFromLine($line);
                    if (empty($this->requestsPool[$requestPort]) || count($this->requestsPool[$requestPort] ?? []) !== 3) {
                        $this->requestsPool[$requestPort] = [
                            $this->getDateFromLine($line),
                            false,
                            microtime(true),
                        ];
                    }

                    [$startDate, $file, $startMicrotime] = $this->requestsPool[$requestPort];
                    $formattedStartedAt = $startDate->format('Y-m-d H:i:s');
                    unset($this->requestsPool[$requestPort]);

                    [$date, $time] = explode(' ', $formattedStartedAt);
                    $this->output->write("  <fg=gray>$date</> $time");
                    $runTime = $this->runTimeForHumans($startMicrotime);
                    if ($file) {
                        $this->output->write($file = " $file");
                    }

                    $dots = max(terminal()->width() - mb_strlen($formattedStartedAt) - mb_strlen($file) - mb_strlen($runTime) - 9, 0);
                    $this->output->write(' '.str_repeat('<fg=gray>.</>', $dots));
                    $this->output->writeln(" <fg=gray>~ {$runTime}</>");
                } elseif ((new Stringable($line))->contains(['Closed without sending a request', 'Failed to poll event'])) {
                    // ...
                } elseif (! empty($line)) {
                    if ((new Stringable($line))->startsWith('[')) {
                        $line = (new Stringable($line))->after('] ');
                    }

                    $this->output->writeln("  <fg=gray>$line</>");
                }
            });
    }

    /**
     * Get the date from the given PHP server output.
     *
     * @param  string  $line
     * @return \Illuminate\Support\Carbon
     */
    protected function getDateFromLine($line)
    {
        $regex = ! windows_os() && is_int($this->phpServerWorkers)
            ? '/^\[\d+]\s\[([a-zA-Z0-9: ]+)\]/'
            : '/^\[([^\]]+)\]/';

        $line = str_replace('  ', ' ', $line);
        preg_match($regex, $line, $matches);
        return Carbon::createFromFormat('D M d H:i:s Y', $matches[1]);
    }

    /**
     * Get the request port from the given PHP server output.
     *
     * @param  string  $line
     * @return int
     */
    public static function getRequestPortFromLine($line)
    {
        preg_match('/(\[\w+\s\w+\s\d+\s[\d:]+\s\d{4}\]\s)?:(\d+)\s(?:(?:\w+$)|(?:\[.*))/', $line, $matches);
        if (! isset($matches[2])) {
            throw new \InvalidArgumentException("Failed to extract the request port. Ensure the log line contains a valid port: {$line}");
        }
        return (int) $matches[2];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on', Env::get('SERVER_HOST', '127.0.0.1')],
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on', Env::get('SERVER_PORT')],
            ['tries', null, InputOption::VALUE_OPTIONAL, 'The max number of ports to attempt to serve from', 10],
            ['no-reload', null, InputOption::VALUE_NONE, 'Do not reload the development server on .env file changes'],
        ];
    }
}
