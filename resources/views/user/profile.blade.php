<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
      @else
      <style>
        /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .184 86.047);--color-yellow-600:oklch(.681 .162 75.834);--color-yellow-700:oklch(.554 .135 66.442);--color-yellow-800:oklch(.476 .114 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.286 .066 53.813);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.967 .067 122.328);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.897 .196 126.665);--color-lime-400:oklch(.841 .238 128.85);--color-lime-500:oklch(.768 .233 130.85);--color-lime-600:oklch(.648 .2 131.684);--color-lime-700:oklch(.532 .157 131.589);--color-lime-800:oklch(.453 .124 130.933);--color-lime-900:oklch(.405 .101 131.063);--color-lime-950:oklch(.274 .072 132.109);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.871 .15 154.449);--color-green-400:oklch(.792 .209 151.711);--color-green-500:oklch(.723 .219 149.579);--color-green-600:oklch(.627 .194 149.214);--color-green-700:oklch(.527 .154 150.069);--color-green-800:oklch(.448 .119 151.328);--color-green-900:oklch(.393 .095 152.535);--color-green-950:oklch(.266 .065 152.934);--color-emerald-50:oklch(.979 .021 166.113);--color-emerald-100:oklch(.95 .052 163.051);--color-emerald-200:oklch(.905 .093 164.15);--color-emerald-300:oklch(.845 .143 164.978);--color-emerald-400:oklch(.765 .177 163.223);--color-emerald-500:oklch(.696 .17 162.48);--color-emerald-600:oklch(.596 .145 163.225);--color-emerald-700:oklch(.508 .118 165.612);--color-emerald-800:oklch(.432 .095 166.913);--color-emerald-900:oklch(.378 .077 168.94);--color-emerald-950:oklch(.262 .051 172.552);--color-teal-50:oklch(.984 .014 180.72);--color-teal-100:oklch(.953 .051 180.801);--color-teal-200:oklch(.91 .096 180.426);--color-teal-300:oklch(.855 .138 181.071);--color-teal-400:oklch(.777 .152 181.912);--color-teal-500:oklch(.704 .14 182.503);--color-teal-600:oklch(.6 .118 184.704);--color-teal-700:oklch(.511 .096 186.391);--color-teal-800:oklch(.437 .078 188.216);--color-teal-900:oklch(.386 .063 188.416);--color-teal-950:oklch(.277 .046 192.524);--color-cyan-50:oklch(.984 .019 200.873);--color-cyan-100:oklch(.956 .045 203.388);--color-cyan-200:oklch(.917 .08 205.041);--color-cyan-300:oklch(.865 .127 207.078);--color-cyan-400:oklch(.789 .154 211.53);--color-cyan-500:oklch(.715 .143 215.221);--color-cyan-600:oklch(.609 .126 221.723);--color-cyan-700:oklch(.52 .105 223.128);--color-cyan-800:oklch(.45 .085 224.283);--color-cyan-900:oklch(.398 .07 227.392);--color-cyan-950:oklch(.302 .056 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.951 .026 236.824);--color-sky-200:oklch(.901 .058 230.902);--color-sky-300:oklch(.828 .111 230.318);--color-sky-400:oklch(.746 .16 232.661);--color-sky-500:oklch(.685 .169 237.323);--color-sky-600:oklch(.588 .158 241.966);--color-sky-700:oklch(.5 .134 242.749);--color-sky-800:oklch(.443 .11 240.79);--color-sky-900:oklch(.391 .09 240.876);--color-sky-950:oklch(.293 .066 243.157);--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.93 .034 272.788);--color-indigo-200:oklch(.87 .065 274.039);--color-indigo-300:oklch(.785 .115 274.713);--color-indigo-400:oklch(.673 .182 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.511 .262 276.966);--color-indigo-700:oklch(.457 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .144 278.697);--color-indigo-950:oklch(.257 .09 281.288);--color-violet-50:oklch(.969 .016 293.756);--color-violet-100:oklch(.943 .029 294.588);--color-violet-200:oklch(.894 .057 293.283);--color-violet-300:oklch(.811 .111 293.571);--color-violet-400:oklch(.702 .183 293.541);--color-violet-500:oklch(.606 .25 292.717);--color-violet-600:oklch(.541 .281 293.009);--color-violet-700:oklch(.491 .27 292.581);--color-violet-800:oklch(.432 .232 292.759);--color-violet-900:oklch(.38 .189 293.745);--color-violet-950:oklch(.283 .141 291.089);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.946 .033 307.174);--color-purple-200:oklch(.902 .063 306.703);--color-purple-300:oklch(.827 .119 306.383);--color-purple-400:oklch(.714 .203 305.504);--color-purple-500:oklch(.627 .265 303.9);--color-purple-600:oklch(.558 .288 302.321);--color-purple-700:oklch(.496 .265 301.924);--color-purple-800:oklch(.438 .218 303.724);--color-purple-900:oklch(.381 .176 304.987);--color-purple-950:oklch(.291 .149 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .037 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.833 .145 321.434);--color-fuchsia-400:oklch(.74 .238 322.16);--color-fuchsia-500:oklch(.667 .295 322.15);--color-fuchsia-600:oklch(.591 .293 322.896);--color-fuchsia-700:oklch(.518 .253 323.949);--color-fuchsia-800:oklch(.452 .211 324.591);--color-fuchsia-900:oklch(.401 .17 325.612);--color-fuchsia-950:oklch(.293 .136 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.899 .061 343.231);--color-pink-300:oklch(.823 .12 346.018);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .241 354.308);--color-pink-600:oklch(.592 .249 .584);--color-pink-700:oklch(.525 .223 3.958);--color-pink-800:oklch(.459 .187 3.815);--color-pink-900:oklch(.408 .153 2.432);--color-pink-950:oklch(.284 .109 3.907);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .03 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.81 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.439);--color-rose-600:oklch(.586 .253 17.585);--color-rose-700:oklch(.514 .222 16.935);--color-rose-800:oklch(.455 .188 13.697);--color-rose-900:oklch(.41 .159 10.272);--color-rose-950:oklch(.271 .105 12.094);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.968 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .022 252.894);--color-slate-400:oklch(.704 .04 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.446 .043 257.281);--color-slate-700:oklch(.372 .044 257.287);--color-slate-800:oklch(.279 .041 260.031);--color-slate-900:oklch(.208 .042 265.755);--color-slate-950:oklch(.129 .042 264.695);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 .001 286.375);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-zinc-950:oklch(.141 .005 285.823);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.87 0 0);--color-neutral-400:oklch(.708 0 0);--color-neutral-500:oklch(.556 0 0);--color-neutral-600:oklch(.439 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-50:oklch(.985 .001 106.423);--color-stone-100:oklch(.97 .001 106.424);--color-stone-200:oklch(.923 .003 48.717);--color-stone-300:oklch(.869 .005 56.366);--color-stone-400:oklch(.709 .01 56.259);--color-stone-500:oklch(.553 .013 58.071);--color-stone-600:oklch(.444 .011 73.639);--color-stone-700:oklch(.374 .01 67.558);--color-stone-800:oklch(.268 .007 34.298);--color-stone-900:oklch(.216 .006 56.043);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a,0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16/9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-font-feature-settings:var(--font-sans--font-feature-settings);--default-font-variation-settings:var(--font-sans--font-variation-settings);--default-mono-font-family:var(--font-mono);--default-mono-font-feature-settings:var(--font-mono--font-feature-settings);--default-mono-font-variation-settings:var(--font-mono--font-variation-settings)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing)*0)}.-mt-\[4\.9rem\]{margin-top:-4.9rem}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing)*1)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.-ml-8{margin-left:calc(var(--spacing)*-8)}.flex{display:flex}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/376\]{aspect-ratio:335/376}.h-1{height:calc(var(--spacing)*1)}.h-1\.5{height:calc(var(--spacing)*1.5)}.h-2{height:calc(var(--spacing)*2)}.h-2\.5{height:calc(var(--spacing)*2.5)}.h-3{height:calc(var(--spacing)*3)}.h-3\.5{height:calc(var(--spacing)*3.5)}.h-14{height:calc(var(--spacing)*14)}.h-14\.5{height:calc(var(--spacing)*14.5)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing)*1)}.w-1\.5{width:calc(var(--spacing)*1.5)}.w-2{width:calc(var(--spacing)*2)}.w-2\.5{width:calc(var(--spacing)*2.5)}.w-3{width:calc(var(--spacing)*3)}.w-3\.5{width:calc(var(--spacing)*3.5)}.w-\[448px\]{width:448px}.w-full{width:100%}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing)*0);translate:var(--tw-translate-x)var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x)var(--tw-rotate-y)var(--tw-rotate-z)var(--tw-skew-x)var(--tw-skew-y)}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-3{gap:calc(var(--spacing)*3)}.gap-4{gap:calc(var(--spacing)*4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*1)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*1)*calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-1\.5{padding-block:calc(var(--spacing)*1.5)}.py-2{padding-block:calc(var(--spacing)*2)}.pb-12{padding-bottom:calc(var(--spacing)*12)}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-white{color:var(--color-white)}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.opacity-100{opacity:1}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008),0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.\!filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)!important}.filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-300{transition-delay:.3s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing)*0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing)*0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media (hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}}@media (width>=64rem){.lg\:-mt-\[6\.6rem\]{margin-top:-6.6rem}.lg\:mb-0{margin-bottom:calc(var(--spacing)*0)}.lg\:mb-6{margin-bottom:calc(var(--spacing)*6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing)*0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing)*8)}.lg\:p-20{padding:calc(var(--spacing)*20)}}@media (prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media (hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}}}@starting-style{.starting\:translate-y-4{--tw-translate-y:calc(var(--spacing)*4);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:translate-y-6{--tw-translate-y:calc(var(--spacing)*6);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:opacity-0{opacity:0}}}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false;initial-value:rotateX(0)}@property --tw-rotate-y{syntax:"*";inherits:false;initial-value:rotateY(0)}@property --tw-rotate-z{syntax:"*";inherits:false;initial-value:rotateZ(0)}@property --tw-skew-x{syntax:"*";inherits:false;initial-value:skewX(0)}@property --tw-skew-y{syntax:"*";inherits:false;initial-value:skewY(0)}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}
        </style>
  @endif

  <style>
    .pattern-overlay {
      position: relative;
    }

    .pattern-overlay::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image: url('{{ asset('images/background%20pattern.png') }}');
      background-size: 520px;
      background-repeat: repeat;
      opacity: 0.15;
      pointer-events: none;
      z-index: 0;
    }

    .pattern-overlay > * {
      position: relative;
      z-index: 1;
    }
  </style>
</head>

<body class="bg-[#5F6F52]">
  <nav class="w-full px-7.5 md:px-30 py-5 h-fit bg-[#E5E0D8] sticky top-0 z-50 border-b border-gray-700">
    <div class="flex justify-between items-center">
        <a href="{{ route('user.dashboard') }}" class="block">
          <img src="{{ asset('images/7343c1fc35b5281de35c18d65f3824a08927c1b7.png') }}" alt="logo" class="h-10">
        </a>
        <div class="flex gap-5 items-center ml-auto">
          <a href="{{ route('user.cart') }}" class="font-poppins font-light text-[1.1em]">
            <svg width="28" height="28" viewBox="0 0 61 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 50.667C21.3 50.667 24 53.5167 24 57C24 60.4833 21.3 63.333 18 63.333C14.7 63.333 12.0303 60.4833 12.0303 57C12.0303 53.5167 14.7 50.667 18 50.667ZM48 50.667C51.3 50.667 54 53.5167 54 57C54 60.4833 51.3 63.333 48 63.333C44.7 63.333 42.0303 60.4833 42.0303 57C42.0303 53.5167 44.7 50.667 48 50.667ZM7.91992 0C9.05985 0 10.1401 0.696482 10.6201 1.80469L12.6299 6.33301H57.0303C59.31 6.33321 60.7494 8.92965 59.6396 11.0195L48.9004 31.5713C47.8804 33.5345 45.9002 34.8329 43.6504 34.833H21.2998L18 41.167H51C52.6499 41.167 53.9998 42.5915 54 44.333C54 46.0747 52.65 47.5 51 47.5H18C13.44 47.5 10.56 42.3381 12.75 38.0947L16.7998 30.3682L6 6.33301H3C1.3501 6.33301 0.000168158 4.90851 0 3.16699C0 1.42533 1.35 0 3 0H7.91992Z" fill="#000000"/>
            </svg>
          </a>
          <a href="{{ route('user.profile') }}#status-pesanan" class="font-poppins font-light text-[1.1em]">
            <svg width="28" height="28" viewBox="0 0 46 62" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M28.7595 55.417C28.7594 58.9002 26.0594 61.75 22.7595 61.75C19.4296 61.75 16.7597 58.9002 16.7595 55.417H28.7595ZM22.7595 0C25.2494 0.000138204 27.2595 2.12175 27.2595 4.75V6.90332C35.8394 9.05674 40.7595 17.1954 40.7595 26.917V42.75L44.6296 46.835C46.5193 48.8299 45.1994 52.2496 42.4998 52.25H2.98901C0.319191 52.2498 -1.00053 48.8299 0.889404 46.835L4.75952 42.75V26.917C4.75952 17.1637 9.64952 9.05665 18.2595 6.90332V4.75C18.2595 2.12167 20.2695 0 22.7595 0ZM22.7595 12.667C15.2895 12.667 10.7595 19.0637 10.7595 26.917V45.917H34.7595V26.917C34.7595 19.0637 30.2295 12.667 22.7595 12.667Z" fill="#000000"/>
            </svg>
          </a>
          <!-- <a href="index.html" class="font-poppins font-light text-[1.1em]">
            <img src="https://ui-avatars.com/api/?name=Ridho+Aji&background=5F6F52&color=fff" alt="" width="28" height="28" class="rounded-full">
          </a> -->
          <div class="relative">
            <button
              onclick="toggleLogin()"
              class="font-poppins font-light text-[1.1em] cursor-pointer"
            >
              <img src="https://ui-avatars.com/api/?name=Ridho+Aji&background=5F6F52&color=fff" alt="" width="28" height="28" class="rounded-full">
            </button>

            <!-- Dropdown -->
            <div
              id="loginDropdown"
              class="hidden absolute right-0 mt-2 w-44 bg-white rounded-lg z-50 overflow-hidden"
            >
              <a href="{{ route('user.profile') }}" class="block px-4 py-2 hover:bg-gray-100 text-[#5F6F52] font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#5F6F52" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user inline-block mr-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                Profile
              </a>
              <hr class="border-t border-gray-500">
              <a href="{{ route('user.profile') }}#status-pesanan" class="block px-4 py-2 hover:bg-gray-100 text-[#5F6F52] font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#5F6F52" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block mr-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                Status Order
              </a>
              <hr class="border-t border-gray-500">
              <button onclick="document.getElementById('logout-form').submit();" class="w-full text-left block px-4 py-2 hover:bg-gray-100 text-[#5F6F52] font-semibold">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1">
                  <g opacity="0.8" clip-path="url(#clip0_148_1153)">
                  <path d="M4.66732 4.00008H15.334V10.5334H16.6673V4.00008C16.6673 3.64646 16.5268 3.30732 16.2768 3.05727C16.0267 2.80722 15.6876 2.66675 15.334 2.66675H4.66732C4.3137 2.66675 3.97456 2.80722 3.72451 3.05727C3.47446 3.30732 3.33398 3.64646 3.33398 4.00008V20.0001C3.33398 20.3537 3.47446 20.6928 3.72451 20.9429C3.97456 21.1929 4.3137 21.3334 4.66732 21.3334H15.334C15.6876 21.3334 16.0267 21.1929 16.2768 20.9429C16.5268 20.6928 16.6673 20.3537 16.6673 20.0001H4.66732V4.00008Z" fill="#5F6F52"/>
                  <path d="M18.7739 11.5199C18.6464 11.4107 18.4823 11.3536 18.3145 11.3601C18.1468 11.3666 17.9876 11.4362 17.8689 11.5549C17.7501 11.6736 17.6806 11.8328 17.6741 12.0006C17.6676 12.1683 17.7247 12.3324 17.8339 12.4599L20.0872 14.6666H10.4206C10.2438 14.6666 10.0742 14.7368 9.94917 14.8619C9.82414 14.9869 9.75391 15.1564 9.75391 15.3333C9.75391 15.5101 9.82414 15.6796 9.94917 15.8047C10.0742 15.9297 10.2438 15.9999 10.4206 15.9999H20.0872L17.8339 18.3066C17.7641 18.3664 17.7074 18.4399 17.6674 18.5226C17.6274 18.6053 17.6049 18.6954 17.6014 18.7872C17.5978 18.879 17.6133 18.9706 17.6468 19.0561C17.6803 19.1417 17.7312 19.2194 17.7961 19.2844C17.8611 19.3493 17.9388 19.4002 18.0244 19.4337C18.1099 19.4672 18.2015 19.4827 18.2933 19.4791C18.3851 19.4756 18.4752 19.4531 18.5579 19.4131C18.6406 19.3731 18.7141 19.3164 18.7739 19.2466L22.6672 15.3799L18.7739 11.5199Z" fill="#5F6F52"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_148_1153">
                  <rect width="24" height="24" fill="5F6F52"/>
                  </clipPath>
                  </defs>
                </svg>
                Logout
              </button>
            </div>
          </div>
        </div>
    </div>
  </nav>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>

  <script src="javascript/common.js"></script>
  <main class="relative">
    <div class="absolute inset-0 opacity-20 pointer-events-none z-0 bg-size-[100%]" style="background-image: url('{{ asset('images/background%20pattern.png') }}')"></div>
    <section class="pattern-overlay w-full bg-[#5F6F52] px-4 md:px-30 py-12 md:py-20">
      <div class="max-w-7xl mx-auto flex flex-col gap-8 relative z-10">

        <!-- Title -->
        <h1 class="text-white text-3xl md:text-4xl font-bold font-mochi text-center">
          Biodata Diri
        </h1>

        <!-- CONTENT -->
        <div class="flex flex-col lg:flex-row gap-6">

          <!-- FOTO PROFILE -->
          <div class="bg-white p-4 rounded-xl flex flex-col gap-4 lg:w-[25%]">
            @if($user->foto_profil)
              <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="foto profile"
                  class="h-[200px] md:h-[250px] w-full object-cover rounded-lg bg-gray-200">
            @else
              <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=5F6F52&color=fff" alt="foto profile"
                  class="h-[200px] md:h-[250px] w-full object-cover rounded-lg bg-gray-200">
            @endif

            <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
              @csrf
              <div class="flex flex-wrap gap-2 items-center text-sm">
                <span class="bg-[#E5E0D8] px-3 py-1 font-poppins rounded">
                  Category
                </span>
                <span class="font-poppins text-gray-600">
                  .JPG .JPEG .PNG
                </span>
              </div>

              <p class="text-[#5F6F52] font-semibold text-sm">
                Besar file: maksimum 10.000.000 bytes (10 megabytes).
              </p>

              <input type="file" name="foto_profil" id="foto_profil" accept="image/jpeg,image/jpg,image/png" class="hidden" onchange="this.form.submit()">
              <label for="foto_profil"
                class="bg-[#E5E0D8] text-center text-[#5F6F52] font-bold py-2 rounded-lg cursor-pointer hover:bg-[#d5d0c8] transition">
                Pilih Foto
              </label>
              @error('foto_profil')
                <p class="text-red-500 text-xs">{{ $message }}</p>
              @enderror
            </form>
          </div>

          <!-- BIODATA -->
          <div class="flex flex-col gap-4 lg:flex-1 min-w-0">
            <h3 class="font-poppins font-bold text-lg md:text-xl text-white mb-2">
              Biodata Diri
            </h3>

            <!-- Biodata Table -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 space-y-3">
              <!-- Nama -->
              <div class="flex items-start border-b border-white/20 pb-3">
                <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">Nama</span>
                <span class="font-poppins text-white font-semibold flex-1">{{ $user->name }}</span>
              </div>

              <!-- NPM/NISN -->
              @if($user->user_type === 'mahasiswa' && $user->nim)
                <div class="flex items-start border-b border-white/20 pb-3">
                  <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">NPM</span>
                  <span class="font-poppins text-white font-semibold flex-1">{{ $user->nim }}</span>
                </div>
              @elseif($user->user_type === 'siswa' && $user->nisn)
                <div class="flex items-start border-b border-white/20 pb-3">
                  <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">NISN</span>
                  <span class="font-poppins text-white font-semibold flex-1">{{ $user->nisn }}</span>
                </div>
              @endif

              <!-- Tanggal Lahir -->
              <div class="flex items-start border-b border-white/20 pb-3">
                <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">Tanggal Lahir</span>
                <span class="font-poppins text-white font-semibold flex-1">
                  {{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d/m/Y') : 'Belum diisi' }}
                </span>
              </div>

              <!-- Jenis Kelamin -->
              @if($user->jenis_kelamin)
                <div class="flex items-start border-b border-white/20 pb-3">
                  <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">Jenis Kelamin</span>
                  <span class="font-poppins text-white font-semibold flex-1">
                    {{ $user->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                  </span>
                </div>
              @endif

              <!-- Alamat -->
              @if($user->alamat)
                <div class="flex items-start pb-3">
                  <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">Alamat</span>
                  <span class="font-poppins text-white font-semibold flex-1">{{ $user->alamat }}</span>
                </div>
              @endif
            </div>

            <h4 class="font-poppins font-bold text-lg text-white mt-4 mb-2">
              Kontak
            </h4>

            <!-- Kontak Table -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 space-y-3">
              <!-- Email -->
              <div class="flex items-start border-b border-white/20 pb-3">
                <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">Email</span>
                <span class="font-poppins text-white font-semibold flex-1">{{ $user->email }}</span>
              </div>

              <!-- Nomor HP -->
              <div class="flex items-start">
                <span class="font-poppins text-white/80 w-32 md:w-40 flex-shrink-0">Nomor HP</span>
                <span class="font-poppins text-white font-semibold flex-1">{{ $user->no_hp ?? 'Belum diisi' }}</span>
              </div>
            </div>
          </div>

          <!-- FORM -->
          <div class="flex flex-col gap-4 lg:w-[30%]">

            <!-- Ubah Nama -->
            <div class="bg-white p-4 rounded-xl flex flex-col gap-2">
              <h4 class="font-poppins font-bold">Ubah Nama</h4>
              <p class="font-poppins text-sm text-gray-600">
                Nama hanya dapat diubah satu kali lagi.
              </p>

              <form action="{{ route('profile.update-name') }}" method="POST" class="flex flex-col gap-2">
                @csrf
                <label class="font-poppins text-sm">Nama</label>
                <input type="text"
                      name="name"
                      value="{{ $user->name }}"
                      placeholder="Masukkan nama lengkap"
                      class="bg-[#D9D9D9] p-2 rounded-lg font-poppins"
                      required>
                @error('name')
                  <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror

                <button type="submit"
                  class="font-poppins bg-[#5F6F52] hover:bg-[#4a5640] text-white rounded-lg py-2 px-4 font-semibold mx-auto transition">
                  Simpan
                </button>
              </form>
            </div>

            <!-- Ubah Tanggal Lahir -->
            <div class="bg-white p-4 rounded-xl flex flex-col gap-2">
              <h4 class="font-poppins font-bold">Ubah Tanggal Lahir</h4>
              <p class="font-poppins text-sm text-gray-600">
                Tanggal lahir hanya dapat diatur satu kali.
              </p>

              <form action="{{ route('profile.update-birthdate') }}" method="POST" class="flex flex-col gap-2">
                @csrf
                <div class="flex gap-2 justify-center">
                  <input type="number" name="tanggal" min="1" max="31" 
                         value="{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d') : '' }}"
                         class="flex-1 bg-[#D9D9D9] p-2 rounded-lg font-poppins max-w-20" 
                         placeholder="Tanggal" required>
                  <input type="number" name="bulan" min="1" max="12" 
                         value="{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('m') : '' }}"
                         class="flex-1 bg-[#D9D9D9] p-2 rounded-lg font-poppins max-w-25" 
                         placeholder="Bulan" required>
                  <input type="number" name="tahun" min="1900" max="{{ date('Y') }}" 
                         value="{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y') : '' }}"
                         class="flex-1 bg-[#D9D9D9] p-2 rounded-lg font-poppins max-w-20" 
                         placeholder="Tahun" required>
                </div>
                @error('tanggal')
                  <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
                @error('bulan')
                  <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
                @error('tahun')
                  <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror

                <button type="submit"
                  class="font-poppins bg-[#5F6F52] hover:bg-[#4a5640] text-white rounded-lg py-2 px-2 font-semibold mx-auto transition">
                  Simpan
                </button>
              </form>
            </div>

          </div>

        </div>
      </div>
    </section>

    <section id="status-pesanan" class="pattern-overlay w-full px-7.5 md:px-30 py-20 bg-[#E5E0D8] flex flex-col gap-4 justify-center items-center scroll-mt-20 relative z-10">
      <h1 class="text-[#5D6B51] font-bold text-[40px]">Riwayat <span class="text-[#B56727]">Pesanan</span></h1>
      <p class="text-center max-w-3xl">SenkuSolutions berkomitmen untuk selalu memberikan hasil terbaik dengan jaminan pelayanan yang cepat, akurat, dan bersahabat. Tidak perlu khawatir, setiap layanan Senkusolutions 100% bergaransi!</p>
      
      <div class="w-full max-w-6xl mt-8">
        @if($pesanans->isEmpty())
          <div class="bg-white rounded-xl p-8 text-center">
            <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Pesanan</h3>
            <p class="text-gray-500 mb-4">Anda belum memiliki pesanan. Mulai pesan layanan sekarang!</p>
            <a href="{{ route('user.dashboard') }}" class="inline-block bg-[#5F6F52] text-white px-6 py-2 rounded-lg hover:bg-[#4a5640] transition">
              Lihat Layanan
            </a>
          </div>
        @else
          <div class="space-y-4">
            @foreach($pesanans as $pesanan)
              <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                  <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                      <h3 class="text-lg font-bold text-[#5F6F52]">{{ $pesanan->kode_pesanan }}</h3>
                      <span class="{{ $pesanan->status_badge }} text-white text-xs px-3 py-1 rounded-full">
                        {{ $pesanan->status_label }}
                      </span>
                    </div>
                    <p class="text-gray-700 font-semibold">{{ $pesanan->layanan->nama ?? 'Layanan' }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $pesanan->nama_pemesan }}</p>
                    <div class="flex gap-4 mt-2 text-sm text-gray-600">
                      <span>📅 Deadline: {{ $pesanan->deadline->format('d M Y') }}</span>
                      <span>💰 Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                    </div>
                  </div>
                  <div class="flex gap-2">
                    <a href="{{ route('user.pesanan.detail', $pesanan->id) }}" 
                       class="bg-[#5F6F52] text-white px-4 py-2 rounded-lg hover:bg-[#4a5640] transition text-sm">
                      Lihat Detail
                    </a>
                  </div>
                </div>
                
                {{-- Progress Bar --}}
                <div class="mt-4 pt-4 border-t border-gray-200">
                  <div class="flex items-center justify-between text-xs">
                    <div class="flex flex-col items-center {{ in_array($pesanan->status, ['pending', 'processing', 'completed', 'selesai']) ? 'text-[#B56727]' : 'text-gray-400' }}">
                      <div class="w-8 h-8 rounded-full {{ in_array($pesanan->status, ['pending', 'processing', 'completed', 'selesai']) ? 'bg-[#B56727]' : 'bg-gray-300' }} flex items-center justify-center text-white mb-1">1</div>
                      <span class="text-center">Menunggu<br>Pembayaran</span>
                    </div>
                    <div class="flex-1 h-1 {{ in_array($pesanan->status, ['processing', 'completed', 'selesai']) ? 'bg-[#B56727]' : 'bg-gray-300' }} mx-2"></div>
                    <div class="flex flex-col items-center {{ in_array($pesanan->status, ['processing', 'completed', 'selesai']) ? 'text-[#B56727]' : 'text-gray-400' }}">
                      <div class="w-8 h-8 rounded-full {{ in_array($pesanan->status, ['processing', 'completed', 'selesai']) ? 'bg-[#B56727]' : 'bg-gray-300' }} flex items-center justify-center text-white mb-1">2</div>
                      <span class="text-center">Diproses</span>
                    </div>
                    <div class="flex-1 h-1 {{ in_array($pesanan->status, ['completed', 'selesai']) ? 'bg-[#B56727]' : 'bg-gray-300' }} mx-2"></div>
                    <div class="flex flex-col items-center {{ in_array($pesanan->status, ['completed', 'selesai']) ? 'text-[#B56727]' : 'text-gray-400' }}">
                      <div class="w-8 h-8 rounded-full {{ in_array($pesanan->status, ['completed', 'selesai']) ? 'bg-[#B56727]' : 'bg-gray-300' }} flex items-center justify-center text-white mb-1">3</div>
                      <span class="text-center">Selesai</span>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    <section class="pattern-overlay w-full px-7.5 md:px-30 py-20 bg-[#5D6B51] relative overflow-hidden">
        <div class="flex flex-col gap-4 justify-center items-center relative z-10">
            <p class="text-center font-poppins text-[#E5E0D8] text-[20px]">Yuk konsultasikan dulu kebutuhanmu GRATIS,<br>mulai kejar wisudamu dari sekarang!</p>
            <a href="https://wa.me/6289699882356" target="_blank" rel="noopener" class="py-2 px-5 bg-[#E5E0D8] rounded-lg">CTA WA</a>
        </div>
    </section>

    @include('components.simple-footer')
  </main>

  <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>