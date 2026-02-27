<!doctype html>
<html class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
      @else
      <style>
        /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .201 90.436);--color-yellow-600:oklch(.712 .194 91.713);--color-yellow-700:oklch(.607 .188 92.242);--color-yellow-800:oklch(.512 .173 93.448);--color-yellow-900:oklch(.448 .146 94.325);--color-yellow-950:oklch(.318 .106 94.792);--color-lime-50:oklch(.977 .026 122.328);--color-lime-100:oklch(.947 .061 122.744);--color-lime-200:oklch(.905 .119 124.321);--color-lime-300:oklch(.843 .194 126.701);--color-lime-400:oklch(.765 .262 128.85);--color-lime-500:oklch(.685 .281 130.85);--color-lime-600:oklch(.61 .258 131.498);--color-lime-700:oklch(.53 .233 132.109);--color-lime-800:oklch(.45 .199 132.662);--color-lime-900:oklch(.393 .162 133.277);--color-lime-950:oklch(.274 .115 134.046);--color-green-50:oklch(.97 .036 146.764);--color-green-100:oklch(.941 .07 147.337);--color-green-200:oklch(.902 .123 148.711);--color-green-300:oklch(.841 .191 150.069);--color-green-400:oklch(.764 .262 151.328);--color-green-500:oklch(.681 .295 152.535);--color-green-600:oklch(.607 .283 153.452);--color-green-700:oklch(.527 .246 154.985);--color-green-800:oklch(.448 .202 156.743);--color-green-900:oklch(.389 .158 158.931);--color-green-950:oklch(.274 .111 161.628);--color-emerald-50:oklch(.97 .033 166.113);--color-emerald-100:oklch(.94 .067 165.612);--color-emerald-200:oklch(.902 .124 166.913);--color-emerald-300:oklch(.845 .175 166.913);--color-emerald-400:oklch(.773 .233 166.447);--color-emerald-500:oklch(.696 .276 163.225);--color-emerald-600:oklch(.624 .262 160.938);--color-emerald-700:oklch(.553 .226 158.558);--color-emerald-800:oklch(.473 .181 156.743);--color-emerald-900:oklch(.408 .141 156.486);--color-emerald-950:oklch(.271 .091 152.934);--color-teal-50:oklch(.977 .025 186.014);--color-teal-100:oklch(.948 .059 184.704);--color-teal-200:oklch(.91 .11 185.116);--color-teal-300:oklch(.857 .169 184.704);--color-teal-400:oklch(.79 .226 184.704);--color-teal-500:oklch(.712 .265 184.704);--color-teal-600:oklch(.624 .276 186.328);--color-teal-700:oklch(.549 .246 188.216);--color-teal-800:oklch(.482 .203 188.216);--color-teal-900:oklch(.415 .154 188.64);--color-teal-950:oklch(.285 .089 191.468);--color-cyan-50:oklch(.984 .015 199.689);--color-cyan-100:oklch(.954 .04 196.275);--color-cyan-200:oklch(.915 .077 196.873);--color-cyan-300:oklch(.866 .138 197.489);--color-cyan-400:oklch(.804 .204 199.08);--color-cyan-500:oklch(.732 .246 201.384);--color-cyan-600:oklch(.65 .265 205.041);--color-cyan-700:oklch(.555 .247 207.078);--color-cyan-800:oklch(.47 .211 209.702);--color-cyan-900:oklch(.408 .166 211.324);--color-cyan-950:oklch(.28 .112 211.908);--color-sky-50:oklch(.98 .022 231.693);--color-sky-100:oklch(.954 .046 230.902);--color-sky-200:oklch(.92 .085 230.006);--color-sky-300:oklch(.874 .138 230.318);--color-sky-400:oklch(.81 .189 231.034);--color-sky-500:oklch(.735 .207 233.055);--color-sky-600:oklch(.644 .2 235.245);--color-sky-700:oklch(.544 .171 236.62);--color-sky-800:oklch(.467 .135 235.06);--color-sky-900:oklch(.408 .105 236.062);--color-sky-950:oklch(.27 .067 241.966);--color-blue-50:oklch(.977 .022 254.604);--color-blue-100:oklch(.948 .051 251.813);--color-blue-200:oklch(.902 .097 251.628);--color-blue-300:oklch(.835 .159 252.14);--color-blue-400:oklch(.747 .216 254.624);--color-blue-500:oklch(.656 .243 259.815);--color-blue-600:oklch(.575 .245 262.881);--color-blue-700:oklch(.493 .223 265.638);--color-blue-800:oklch(.425 .195 265.522);--color-blue-900:oklch(.378 .164 265.234);--color-blue-950:oklch(.27 .103 267.935);--color-indigo-50:oklch(.968 .028 276.935);--color-indigo-100:oklch(.938 .064 274.039);--color-indigo-200:oklch(.894 .12 274.713);--color-indigo-300:oklch(.828 .188 276.104);--color-indigo-400:oklch(.738 .257 278.697);--color-indigo-500:oklch(.653 .288 281.289);--color-indigo-600:oklch(.575 .265 284.011);--color-indigo-700:oklch(.491 .228 286.475);--color-indigo-800:oklch(.42 .19 286.773);--color-indigo-900:oklch(.374 .157 286.903);--color-indigo-950:oklch(.274 .105 288.607);--color-violet-50:oklch(.968 .028 308.299);--color-violet-100:oklch(.943 .064 305.504);--color-violet-200:oklch(.902 .119 306.383);--color-violet-300:oklch(.837 .196 308.272);--color-violet-400:oklch(.746 .265 311.368);--color-violet-500:oklch(.653 .293 313.538);--color-violet-600:oklch(.568 .262 313.717);--color-violet-700:oklch(.493 .223 313.779);--color-violet-800:oklch(.421 .188 312.573);--color-violet-900:oklch(.373 .149 311.298);--color-violet-950:oklch(.27 .091 311.085);--color-purple-50:oklch(.969 .026 318.885);--color-purple-100:oklch(.942 .061 316.383);--color-purple-200:oklch(.902 .116 317.109);--color-purple-300:oklch(.835 .191 318.74);--color-purple-400:oklch(.742 .265 321.703);--color-purple-500:oklch(.654 .288 323.934);--color-purple-600:oklch(.579 .259 325.661);--color-purple-700:oklch(.504 .218 325.661);--color-purple-800:oklch(.432 .182 324.518);--color-purple-900:oklch(.384 .146 322.589);--color-purple-950:oklch(.272 .086 322.237);--color-fuchsia-50:oklch(.973 .024 332.632);--color-fuchsia-100:oklch(.947 .057 329.92);--color-fuchsia-200:oklch(.905 .118 330.116);--color-fuchsia-300:oklch(.84 .193 331.718);--color-fuchsia-400:oklch(.749 .266 334.14);--color-fuchsia-500:oklch(.663 .291 336.427);--color-fuchsia-600:oklch(.59 .258 337.774);--color-fuchsia-700:oklch(.514 .222 338.606);--color-fuchsia-800:oklch(.438 .188 338.611);--color-fuchsia-900:oklch(.387 .154 337.504);--color-fuchsia-950:oklch(.279 .092 338.607);--color-pink-50:oklch(.969 .021 354.308);--color-pink-100:oklch(.945 .045 8.064);--color-pink-200:oklch(.905 .091 10.118);--color-pink-300:oklch(.845 .164 11.638);--color-pink-400:oklch(.758 .244 13.69);--color-pink-500:oklch(.677 .295 16.096);--color-pink-600:oklch(.598 .289 17.392);--color-pink-700:oklch(.514 .238 17.717);--color-pink-800:oklch(.438 .196 17.81);--color-pink-900:oklch(.384 .163 17.807);--color-pink-950:oklch(.278 .115 11.428);--color-rose-50:oklch(.969 .02 12.422);--color-rose-100:oklch(.943 .046 12.422);--color-rose-200:oklch(.902 .092 12.422);--color-rose-300:oklch(.838 .162 12.422);--color-rose-400:oklch(.742 .246 12.422);--color-rose-500:oklch(.657 .322 12.422);--color-rose-600:oklch(.579 .322 12.422);--color-rose-700:oklch(.506 .265 11.422);--color-rose-800:oklch(.438 .213 10.422);--color-rose-900:oklch(.38 .172 8.422);--color-rose-950:oklch(.267 .112 12.422);}}
        </style>
  @endif
  <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-dark-backdrop">        
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex sm:hidden">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
    </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                <svg class="w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/></svg>
                <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.layanan.index') }}" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v14M9 5v14M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/></svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Layanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimoni.index') }}" class="flex items-center px-2 py-1.5 text-body rounded-base bg-neutral-secondary-soft text-heading">
                    <svg class="shrink-0 w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h7m0 0h7m-7 0v7m0-7V5"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Testimoni</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order.index') }}" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8"/></svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Order</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-heading mb-1">Kelola Testimoni</h1>
                    <p class="text-body">Tambah atau hapus gambar testimoni untuk halaman publik.</p>
                </div>
            </div>

            @if (session('success'))
                <div class="mt-4 rounded-base border border-success-subtle bg-success-soft px-4 py-3 text-sm text-fg-success-strong">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-4 rounded-base border border-danger-subtle bg-danger-soft px-4 py-3 text-sm text-fg-danger-strong">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="p-4">
            <div class="bg-neutral-primary-soft border border-default rounded-base shadow-xs p-6">
                <h2 class="text-xl font-semibold text-heading mb-4">Tambah Testimoni</h2>
                <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-heading">Upload Gambar</label>
                        <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-heading border border-default rounded-base cursor-pointer bg-neutral-secondary-medium focus:outline-none focus:ring-2 focus:ring-brand" required>
                        <p class="mt-2 text-xs text-body">Format: JPG, PNG, SVG, WEBP. Maksimal 2MB.</p>
                    </div>
                    <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Tambah Testimoni</button>
                </form>
            </div>
        </div>

        <div class="p-4">
            <h2 class="text-2xl font-semibold text-heading mb-4">Daftar Testimoni</h2>
            <div class="flex">
                <div class="flex-1 relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                    <table class="w-full text-sm text-left rtl:text-right text-body">
                        <thead class="bg-neutral-secondary-soft border-b border-default">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">Preview</th>
                                <th scope="col" class="px-6 py-3 font-medium">Path</th>
                                <th scope="col" class="px-6 py-3 font-medium">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $testimonial)
                                @php
                                    $path = $testimonial->image_path;
                                    if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
                                        $imageSource = $path;
                                    } elseif (\Illuminate\Support\Str::startsWith($path, 'storage/')) {
                                        $imageSource = asset($path);
                                    } elseif ($path && file_exists(public_path($path))) {
                                        $imageSource = asset($path);
                                    } elseif ($path) {
                                        $imageSource = asset('storage/' . ltrim($path, '/'));
                                    } else {
                                        $imageSource = asset('images/testimoni.png');
                                    }
                                @endphp
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <td class="px-6 py-4">
                                        <img src="{{ $imageSource }}" alt="Testimoni {{ $testimonial->id }}" class="w-24 h-24 object-cover rounded-base border border-default">
                                    </td>
                                    <td class="px-6 py-4 text-xs text-body break-all">
                                        {{ $testimonial->image_path }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('admin.testimoni.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-fg-danger hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-body">
                                        Belum ada testimoni. Tambahkan gambar pertama Anda di atas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>
