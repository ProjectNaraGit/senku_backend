<?php
require __DIR__.'/vendor/autoload.php';

use Illuminate\Support\Facades\DB;

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== DATABASE TABLES ===\n\n";

$tables = DB::select('SHOW TABLES');
echo "Total tables: " . count($tables) . "\n\n";

foreach($tables as $table) {
    $tableName = array_values((array)$table)[0];
    echo "✓ $tableName\n";
    
    // Show column count
    $columns = DB::select("SHOW COLUMNS FROM `$tableName`");
    echo "  └─ " . count($columns) . " columns\n";
}

echo "\n=== CHECKING DATA IN LAYANANS ===\n";
$layanans = DB::table('layanans')->count();
echo "Total records in layanans: $layanans\n";

if ($layanans > 0) {
    echo "\nSample data:\n";
    $samples = DB::table('layanans')->limit(5)->get();
    foreach($samples as $layanan) {
        echo "- {$layanan->nama_layanan} (Rp " . number_format($layanan->harga_layanan, 0, ',', '.') . ")\n";
    }
}
