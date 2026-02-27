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
        /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.787 .184 86.047);--color-yellow-600:oklch(.676 .163 75.834);--color-yellow-700:oklch(.558 .135 66.442);--color-yellow-800:oklch(.482 .113 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.285 .066 54.358);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.968 .067 122.873);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.898 .195 126.182);--color-lime-400:oklch(.841 .238 127.285);--color-lime-500:oklch(.768 .233 128.624);--color-lime-600:oklch(.648 .202 130.744);--color-lime-700:oklch(.527 .157 131.684);--color-lime-800:oklch(.447 .125 130.85);--color-lime-900:oklch(.393 .101 131.063);--color-lime-950:oklch(.257 .071 132.682);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.87 .143 154.449);--color-green-400:oklch(.792 .195 151.711);--color-green-500:oklch(.715 .203 149.579);--color-green-600:oklch(.599 .177 149.214);--color-green-700:oklch(.494 .141 150.069);--color-green-800:oklch(.415 .111 151.075);--color-green-900:oklch(.358 .088 152.532);--color-green-950:oklch(.238 .06 152.495);--color-emerald-50:oklch(.979 .025 166.114);--color-emerald-100:oklch(.952 .054 163.041);--color-emerald-200:oklch(.905 .101 162.539);--color-emerald-300:oklch(.845 .149 163.226);--color-emerald-400:oklch(.761 .177 163.228);--color-emerald-500:oklch(.679 .17 162.48);--color-emerald-600:oklch(.564 .145 163.224);--color-emerald-700:oklch(.477 .119 165.145);--color-emerald-800:oklch(.401 .095 165.586);--color-emerald-900:oklch(.346 .075 166.524);--color-emerald-950:oklch(.232 .052 168.14);--color-teal-50:oklch(.984 .019 180.72);--color-teal-100:oklch(.962 .045 180.801);--color-teal-200:oklch(.92 .088 179.714);--color-teal-300:oklch(.866 .134 181.071);--color-teal-400:oklch(.788 .154 182.503);--color-teal-500:oklch(.702 .143 186.391);--color-teal-600:oklch(.585 .121 189.141);--color-teal-700:oklch(.491 .1 191.639);--color-teal-800:oklch(.417 .08 192.529);--color-teal-900:oklch(.364 .064 194.66);--color-teal-950:oklch(.253 .046 198.986);--color-cyan-50:oklch(.984 .023 200.873);--color-cyan-100:oklch(.958 .049 203.388);--color-cyan-200:oklch(.917 .092 205.04);--color-cyan-300:oklch(.859 .148 207.078);--color-cyan-400:oklch(.777 .17 211.53);--color-cyan-500:oklch(.691 .149 215.852);--color-cyan-600:oklch(.582 .13 221.723);--color-cyan-700:oklch(.491 .107 224.283);--color-cyan-800:oklch(.424 .088 225.363);--color-cyan-900:oklch(.371 .072 226.243);--color-cyan-950:oklch(.268 .053 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.953 .027 236.848);--color-sky-200:oklch(.906 .059 230.318);--color-sky-300:oklch(.844 .11 230.961);--color-sky-400:oklch(.764 .153 233.388);--color-sky-500:oklch(.691 .148 237.323);--color-sky-600:oklch(.590 .14 241.966);--color-sky-700:oklch(.500 .124 243.157);--color-sky-800:oklch(.444 .105 241.701);--color-sky-900:oklch(.390 .084 240.922);--color-sky-950:oklch(.283 .059 242.747);--color-blue-50:oklch(.970 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.878 .059 254.128);--color-blue-300:oklch(.801 .105 251.813);--color-blue-400:oklch(.705 .165 254.624);--color-blue-500:oklch(.623 .214 258.994);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.429 .196 264.376);--color-blue-900:oklch(.384 .139 265.522);--color-blue-950:oklch(.287 .09 268.264);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.929 .034 272.788);--color-indigo-200:oklch(.872 .063 274.039);--color-indigo-300:oklch(.787 .115 274.713);--color-indigo-400:oklch(.673 .181 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.512 .262 276.966);--color-indigo-700:oklch(.456 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .148 278.696);--color-indigo-950:oklch(.258 .093 281.128);--color-violet-50:oklch(.970 .019 293.756);--color-violet-100:oklch(.945 .04 294.588);--color-violet-200:oklch(.902 .074 293.145);--color-violet-300:oklch(.827 .137 292.517);--color-violet-400:oklch(.715 .215 293.035);--color-violet-500:oklch(.621 .27 292.717);--color-violet-600:oklch(.552 .29 293.009);--color-violet-700:oklch(.494 .27 292.581);--color-violet-800:oklch(.443 .234 292.759);--color-violet-900:oklch(.392 .189 294.906);--color-violet-950:oklch(.288 .14 291.076);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.952 .033 307.174);--color-purple-200:oklch(.915 .063 306.703);--color-purple-300:oklch(.851 .12 305.504);--color-purple-400:oklch(.741 .202 303.9);--color-purple-500:oklch(.643 .249 302.32);--color-purple-600:oklch(.570 .265 301.924);--color-purple-700:oklch(.508 .243 301.924);--color-purple-800:oklch(.452 .211 302.014);--color-purple-900:oklch(.397 .17 303.9);--color-purple-950:oklch(.301 .14 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .038 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.838 .145 321.434);--color-fuchsia-400:oklch(.754 .238 322.16);--color-fuchsia-500:oklch(.670 .283 322.15);--color-fuchsia-600:oklch(.591 .29 322.896);--color-fuchsia-700:oklch(.518 .265 323.949);--color-fuchsia-800:oklch(.459 .233 324.591);--color-fuchsia-900:oklch(.406 .19 325.612);--color-fuchsia-950:oklch(.285 .139 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.898 .061 343.231);--color-pink-300:oklch(.823 .120 346.026);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .219 354.308);--color-pink-600:oklch(.592 .234 0.603);--color-pink-700:oklch(.525 .222 3.958);--color-pink-800:oklch(.463 .191 3.309);--color-pink-900:oklch(.418 .157 2.832);--color-pink-950:oklch(.285 .113 3.547);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .030 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.811 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.42);--color-rose-600:oklch(.584 .259 18.046);--color-rose-700:oklch(.514 .237 17.688);--color-rose-800:oklch(.458 .203 16.765);--color-rose-900:oklch(.415 .172 14.669);--color-rose-950:oklch(.266 .113 12.094);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.970 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.871 0 0);--color-neutral-400:oklch(.706 0 0);--color-neutral-500:oklch(.557 0 0);--color-neutral-600:oklch(.475 0 0);--color-neutral-700:oklch(.404 0 0);--color-neutral-800:oklch(.302 0 0);--color-neutral-900:oklch(.238 0 0);--color-neutral-950:oklch(.160 0 0);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 0 0);--color-zinc-200:oklch(.922 .003 286.375);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.709 .015 285.938);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.471 .014 285.829);--color-zinc-700:oklch(.400 .013 285.805);--color-zinc-800:oklch(.302 .011 285.885);--color-zinc-900:oklch(.240 .009 286.067);--color-zinc-950:oklch(.155 .004 285.823);--color-gray-50:oklch(.985 0 0);--color-gray-100:oklch(.968 .001 247.858);--color-gray-200:oklch(.924 .003 264.542);--color-gray-300:oklch(.871 .006 258.338);--color-gray-400:oklch(.706 .013 256.802);--color-gray-500:oklch(.554 .016 252.894);--color-gray-600:oklch(.468 .014 257.417);--color-gray-700:oklch(.398 .012 254.24);--color-gray-800:oklch(.298 .009 260.043);--color-gray-900:oklch(.240 .006 285.885);--color-gray-950:oklch(.155 .004 285.823);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.970 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .020 252.894);--color-slate-400:oklch(.705 .040 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.460 .042 257.281);--color-slate-700:oklch(.383 .035 257.309);--color-slate-800:oklch(.279 .027 257.385);--color-slate-900:oklch(.217 .021 260.043);--color-slate-950:oklch(.143 .015 264.695);--font-size-xs:.75rem;--font-size-xs--line-height:1rem;--font-size-sm:.875rem;--font-size-sm--line-height:1.25rem;--font-size-base:1rem;--font-size-base--line-height:1.5rem;--font-size-lg:1.125rem;--font-size-lg--line-height:1.75rem;--font-size-xl:1.25rem;--font-size-xl--line-height:1.75rem;--font-size-2xl:1.5rem;--font-size-2xl--line-height:2rem;--font-size-3xl:1.875rem;--font-size-3xl--line-height:2.25rem;--font-size-4xl:2.25rem;--font-size-4xl--line-height:2.5rem;--font-size-5xl:3rem;--font-size-5xl--line-height:1;--font-size-6xl:3.75rem;--font-size-6xl--line-height:1;--font-size-7xl:4.5rem;--font-size-7xl--line-height:1;--font-size-8xl:6rem;--font-size-8xl--line-height:1;--font-size-9xl:8rem;--font-size-9xl--line-height:1;--letter-spacing-tighter:-.05em;--letter-spacing-tight:-.025em;--letter-spacing-normal:0em;--letter-spacing-wide:.025em;--letter-spacing-wider:.05em;--letter-spacing-widest:.1em;--line-height-none:1;--line-height-tight:1.25;--line-height-snug:1.375;--line-height-normal:1.5;--line-height-relaxed:1.625;--line-height-loose:2;--line-height-3:.75rem;--line-height-4:1rem;--line-height-5:1.25rem;--line-height-6:1.5rem;--line-height-7:1.75rem;--line-height-8:2rem;--line-height-9:2.25rem;--line-height-10:2.5rem;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--radius-none:0px;--radius-sm:.125rem;--radius-base:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--shadow-xs:0 1px 2px 0 rgb(0 0 0 / .05);--shadow-sm:0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--shadow-base:0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1);--shadow-md:0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);--shadow-lg:0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1);--shadow-xl:0 25px 50px -12px rgb(0 0 0 / .25);--shadow-2xl:0 25px 50px -12px rgb(0 0 0 / .25);--inset-shadow-xs:inset 0 1px 1px 0 rgb(0 0 0 / .05);--inset-shadow-sm:inset 0 2px 4px 0 rgb(0 0 0 / .05);--drop-shadow-sm:0 1px 1px rgb(0 0 0 / .05);--drop-shadow-base:0 1px 2px rgb(0 0 0 / .1), 0 1px 1px rgb(0 0 0 / .06);--drop-shadow-md:0 4px 3px rgb(0 0 0 / .07), 0 2px 2px rgb(0 0 0 / .06);--drop-shadow-lg:0 10px 8px rgb(0 0 0 / .04), 0 4px 3px rgb(0 0 0 / .1);--drop-shadow-xl:0 20px 13px rgb(0 0 0 / .03), 0 8px 5px rgb(0 0 0 / .08);--drop-shadow-2xl:0 25px 25px rgb(0 0 0 / .15);--spacing-0:0px;--spacing-px:1px;--spacing-0\.5:.125rem;--spacing-1:.25rem;--spacing-1\.5:.375rem;--spacing-2:.5rem;--spacing-2\.5:.625rem;--spacing-3:.75rem;--spacing-3\.5:.875rem;--spacing-4:1rem;--spacing-4\.5:1.125rem;--spacing-5:1.25rem;--spacing-6:1.5rem;--spacing-7:1.75rem;--spacing-8:2rem;--spacing-9:2.25rem;--spacing-10:2.5rem;--spacing-11:2.75rem;--spacing-12:3rem;--spacing-14:3.5rem;--spacing-16:4rem;--spacing-20:5rem;--spacing-24:6rem;--spacing-28:7rem;--spacing-32:8rem;--spacing-36:9rem;--spacing-40:10rem;--spacing-44:11rem;--spacing-48:12rem;--spacing-52:13rem;--spacing-56:14rem;--spacing-60:15rem;--spacing-64:16rem;--spacing-72:18rem;--spacing-80:20rem;--spacing-96:24rem;--width-3xs:16rem;--width-2xs:18rem;--width-xs:20rem;--width-sm:24rem;--width-md:28rem;--width-lg:32rem;--width-xl:36rem;--width-2xl:42rem;--width-3xl:48rem;--width-4xl:56rem;--width-5xl:64rem;--width-6xl:72rem;--width-7xl:80rem;--width-prose:65ch}}@layer theme{.dark{--color-neutral-50:oklch(.160 0 0);--color-neutral-100:oklch(.238 0 0);--color-neutral-200:oklch(.302 0 0);--color-neutral-300:oklch(.404 0 0);--color-neutral-400:oklch(.475 0 0);--color-neutral-500:oklch(.557 0 0);--color-neutral-600:oklch(.706 0 0);--color-neutral-700:oklch(.871 0 0);--color-neutral-800:oklch(.922 0 0);--color-neutral-900:oklch(.970 0 0);--color-neutral-950:oklch(.985 0 0);--color-zinc-50:oklch(.155 .004 285.823);--color-zinc-100:oklch(.240 .009 286.067);--color-zinc-200:oklch(.302 .011 285.885);--color-zinc-300:oklch(.400 .013 285.805);--color-zinc-400:oklch(.471 .014 285.829);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.709 .015 285.938);--color-zinc-700:oklch(.871 .006 286.286);--color-zinc-800:oklch(.922 .003 286.375);--color-zinc-900:oklch(.967 0 0);--color-zinc-950:oklch(.985 0 0);--color-gray-50:oklch(.155 .004 285.823);--color-gray-100:oklch(.240 .006 285.885);--color-gray-200:oklch(.298 .009 260.043);--color-gray-300:oklch(.398 .012 254.24);--color-gray-400:oklch(.468 .014 257.417);--color-gray-500:oklch(.554 .016 252.894);--color-gray-600:oklch(.706 .013 256.802);--color-gray-700:oklch(.871 .006 258.338);--color-gray-800:oklch(.924 .003 264.542);--color-gray-900:oklch(.968 .001 247.858);--color-gray-950:oklch(.985 0 0);--color-slate-50:oklch(.143 .015 264.695);--color-slate-100:oklch(.217 .021 260.043);--color-slate-200:oklch(.279 .027 257.385);--color-slate-300:oklch(.383 .035 257.309);--color-slate-400:oklch(.460 .042 257.281);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.705 .040 256.788);--color-slate-700:oklch(.869 .020 252.894);--color-slate-800:oklch(.929 .013 255.508);--color-slate-900:oklch(.970 .007 247.896);--color-slate-950:oklch(.984 .003 247.858)}}@layer theme{:root{--color-bg-primary:var(--color-neutral-50);--color-bg-primary-soft:var(--color-neutral-100);--color-bg-secondary:var(--color-neutral-200);--color-bg-secondary-soft:var(--color-neutral-100);--color-bg-secondary-medium:var(--color-neutral-300);--color-bg-tertiary:var(--color-neutral-300);--color-bg-dark-backdrop:var(--color-neutral-950);--color-border-default:var(--color-neutral-300);--color-border-default-medium:var(--color-neutral-400);--color-border-default-strong:var(--color-neutral-500);--color-fg-heading:var(--color-neutral-950);--color-fg-body:var(--color-neutral-600);--color-fg-body-secondary:var(--color-neutral-500);--color-fg-brand:var(--color-blue-600);--color-fg-brand-strong:var(--color-blue-700);--color-bg-brand:var(--color-blue-600);--color-bg-brand-strong:var(--color-blue-700);--color-bg-brand-soft:var(--color-blue-50);--color-border-brand-subtle:var(--color-blue-200);--color-border-brand-medium:var(--color-blue-600);--color-border-brand:var(--color-blue-700);--color-fg-success:var(--color-green-700);--color-fg-success-strong:var(--color-green-800);--color-bg-success:var(--color-green-700);--color-bg-success-strong:var(--color-green-800);--color-bg-success-soft:var(--color-green-50);--color-border-success-subtle:var(--color-green-200);--color-border-success-medium:var(--color-green-700);--color-border-success:var(--color-green-800);--color-fg-warning:var(--color-amber-700);--color-fg-warning-strong:var(--color-amber-800);--color-bg-warning:var(--color-amber-700);--color-bg-warning-strong:var(--color-amber-800);--color-bg-warning-soft:var(--color-amber-50);--color-border-warning-subtle:var(--color-amber-200);--color-border-warning-medium:var(--color-amber-700);--color-border-warning:var(--color-amber-800);--color-fg-danger:var(--color-red-700);--color-fg-danger-strong:var(--color-red-800);--color-bg-danger:var(--color-red-700);--color-bg-danger-strong:var(--color-red-800);--color-bg-danger-soft:var(--color-red-50);--color-border-danger-subtle:var(--color-red-200);--color-border-danger-medium:var(--color-red-700);--color-border-danger:var(--color-red-800)}}@layer theme{.dark{--color-bg-primary:var(--color-neutral-950);--color-bg-primary-soft:var(--color-neutral-900);--color-bg-secondary:var(--color-neutral-800);--color-bg-secondary-soft:var(--color-neutral-900);--color-bg-secondary-medium:var(--color-neutral-700);--color-bg-tertiary:var(--color-neutral-700);--color-bg-dark-backdrop:var(--color-neutral-950);--color-border-default:var(--color-neutral-700);--color-border-default-medium:var(--color-neutral-600);--color-border-default-strong:var(--color-neutral-500);--color-fg-heading:var(--color-neutral-50);--color-fg-body:var(--color-neutral-400);--color-fg-body-secondary:var(--color-neutral-500);--color-fg-brand:var(--color-blue-400);--color-fg-brand-strong:var(--color-blue-300);--color-bg-brand:var(--color-blue-600);--color-bg-brand-strong:var(--color-blue-700);--color-bg-brand-soft:var(--color-blue-950);--color-border-brand-subtle:var(--color-blue-800);--color-border-brand-medium:var(--color-blue-600);--color-border-brand:var(--color-blue-700);--color-fg-success:var(--color-green-300);--color-fg-success-strong:var(--color-green-200);--color-bg-success:var(--color-green-700);--color-bg-success-strong:var(--color-green-800);--color-bg-success-soft:var(--color-green-950);--color-border-success-subtle:var(--color-green-800);--color-border-success-medium:var(--color-green-700);--color-border-success:var(--color-green-800);--color-fg-warning:var(--color-amber-300);--color-fg-warning-strong:var(--color-amber-200);--color-bg-warning:var(--color-amber-700);--color-bg-warning-strong:var(--color-amber-800);--color-bg-warning-soft:var(--color-amber-950);--color-border-warning-subtle:var(--color-amber-800);--color-border-warning-medium:var(--color-amber-700);--color-border-warning:var(--color-amber-800);--color-fg-danger:var(--color-red-300);--color-fg-danger-strong:var(--color-red-200);--color-bg-danger:var(--color-red-700);--color-bg-danger-strong:var(--color-red-800);--color-bg-danger-soft:var(--color-red-950);--color-border-danger-subtle:var(--color-red-800);--color-border-danger-medium:var(--color-red-700);--color-border-danger:var(--color-red-800)}}@layer base{*,::after,::before{box-sizing:border-box;border:0 solid}::after,::before{--tw-content:""}:host,html{-webkit-text-size-adjust:100%;tab-size:4;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent;font-family:var(--font-sans);line-height:1.5}body{line-height:inherit;margin:0}hr{color:inherit;border-top-width:1px;height:0}abbr:where([title]){text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-feature-settings:normal;font-variation-settings:normal;font-family:var(--font-mono);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{border-color:inherit;border-collapse:collapse;text-indent:0}button,input,optgroup,select,textarea{font-feature-settings:inherit;font-variation-settings:inherit;font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;background-color:initial;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;appearance:button}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,fieldset,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset,legend{padding:0}menu,ol,ul{margin:0;padding:0;list-style:none}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{vertical-align:middle;display:block}img,video{height:auto;max-width:100%}[hidden]{display:none}}@layer components{.container{width:100%}@media (width >=640px){.container{max-width:640px}}@media (width >=768px){.container{max-width:768px}}@media (width >=1024px){.container{max-width:1024px}}@media (width >=1280px){.container{max-width:1280px}}@media (width >=1536px){.container{max-width:1536px}}}
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
                <a href="{{ route('admin.testimoni.index') }}" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h7m0 0h7m-7 0v7m0-7V5"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Testimoni</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order.index') }}" class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8"/></svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Order</span>
                @if($pendingOrdersCount > 0)
                <span class="inline-flex items-center justify-center w-4.5 h-4.5 ms-2 text-xs font-medium text-fg-brand-strong bg-brand-soft border border-brand-subtle rounded-full">{{ $pendingOrdersCount }}</span>
                @endif
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
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-heading">Detail Pesanan</h1>
                <a href="{{ route('admin.order.index') }}" class="text-white bg-neutral-secondary-medium hover:bg-neutral-tertiary border border-default font-medium rounded-base text-sm px-4 py-2.5">
                    Kembali
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">    
                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <p class="text-white mb-2">Kode Pesanan</p>
                    <h5 class="{{ strlen($pesanan->kode_pesanan) > 15 ? 'text-sm' : 'text-xl' }} font-semibold text-white break-all">{{ $pesanan->kode_pesanan }}</h5>
                </div>
                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <p class="text-white mb-2">Pemesan</p>
                    <h5 class="text-xl font-semibold text-white">{{ $pesanan->nama_pemesan }}</h5>
                </div>
                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <p class="text-white mb-2">Deadline</p>
                    <h5 class="text-xl font-semibold text-white">{{ $pesanan->deadline->format('d F Y') }}</h5>
                </div>
                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <p class="text-white mb-2">Total Harga</p>
                    <h5 class="text-xl font-semibold text-white">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</h5>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <h3 class="text-lg font-semibold text-white mb-4">Informasi Pesanan</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-gray-400 text-sm">Layanan</p>
                            <p class="text-white font-medium">{{ $pesanan->layanan->nama_layanan ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Email Pemesan</p>
                            <p class="text-white">{{ $pesanan->email_pemesan }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Telepon</p>
                            <p class="text-white">{{ $pesanan->telepon }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Status</p>
                            <div class="mt-1">
                                @if($pesanan->status == 'pending')
                                    <span class="bg-warning-soft text-fg-warning text-xs font-medium px-2 py-1 rounded">Pending</span>
                                @elseif($pesanan->status == 'processing')
                                    <span class="bg-brand-soft text-fg-brand text-xs font-medium px-2 py-1 rounded">Processing</span>
                                @elseif($pesanan->status == 'completed')
                                    <span class="bg-success-soft text-fg-success-strong text-xs font-medium px-2 py-1 rounded">Completed</span>
                                @elseif($pesanan->status == 'cancelled')
                                    <span class="bg-danger-soft text-fg-danger-strong text-xs font-medium px-2 py-1 rounded">Cancelled</span>
                                @elseif($pesanan->status == 'selesai')
                                    <span class="bg-success-soft text-fg-success-strong text-xs font-medium px-2 py-1 rounded">Selesai</span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Tanggal Pesanan</p>
                            <p class="text-white">{{ $pesanan->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <h3 class="text-lg font-semibold text-white mb-4">Deskripsi Tugas</h3>
                    <p class="text-white whitespace-pre-line">{{ $pesanan->deskripsi_tugas }}</p>
                    
                    @if($pesanan->file_pendukung)
                    <div class="mt-4">
                        <p class="text-gray-400 text-sm mb-2">File Pendukung</p>
                        <a href="{{ asset('storage/' . $pesanan->file_pendukung) }}" target="_blank" class="text-blue-400 hover:underline">
                            Lihat File
                        </a>
                    </div>
                    @endif

                    @if($pesanan->catatan_admin)
                    <div class="mt-4">
                        <p class="text-gray-400 text-sm mb-2">Catatan Admin</p>
                        <p class="text-white">{{ $pesanan->catatan_admin }}</p>
                    </div>
                    @endif

                    @if($pesanan->payment_method)
                    <div class="mt-4">
                        <p class="text-gray-400 text-sm mb-2">Metode Pembayaran</p>
                        <p class="text-white">{{ ucfirst($pesanan->payment_method) }}</p>
                    </div>
                    @endif
                </div>
            </div>

            @if($pesanan->payment_proof)
            <div class="mt-6">
                <div class="bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
                    <h3 class="text-lg font-semibold text-white mb-4">Bukti Pembayaran</h3>
                    <img src="{{ asset('storage/' . $pesanan->payment_proof) }}" alt="Bukti Pembayaran" class="max-w-full h-auto rounded-base border border-default">
                </div>
            </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('admin.order.edit', $pesanan->id) }}" class="text-white bg-brand hover:bg-brand-strong border border-transparent font-medium rounded-base text-sm px-4 py-2.5">
                    Update Status
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>
