<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body class="bg-[#5F6F52]">
  <nav class="w-full px-[120px] py-5 h-fit bg-[#E5E0D8] sticky top-0 z-50 border-b border-gray-700">
    <div class="flex justify-between">
        <div class="">
          <img src="img/7343c1fc35b5281de35c18d65f3824a08927c1b7.png" alt="logo" class="h-7">
        </div>
        <div class="flex gap-5 justify-between items-center">
          <a href="index.html" class="font-poppins font-light text-[1.1em]">Home</a>
          <a href="cara order.html" class="font-poppins font-light text-[1.1em]">Cara Order</a>
          <a href="testimoni.html" class="font-poppins font-light text-[1.1em]">Testimoni</a>
          <a href="faq.html" class="font-poppins font-light text-[1.1em]">FAQ</a>
          <a href="kontak.html" class="font-poppins font-light text-[1.1em]">Kontak</a>
        </div>
        <div class="relative">
          <button
            onclick="toggleLogin()"
            class="bg-[#5F6F52] hover:bg-[#37402f] cursor-pointer text-white px-4 py-2 rounded-lg font-poppins font-light text-[1.1em] flex items-center gap-2"
          >
            Login
            <svg
              class="w-4 h-4 transition-transform duration-300"
              id="loginIcon"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown -->
          <div
            id="loginDropdown"
            class="hidden absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border z-50"
          >
            <a href="login-siswa.html" class="block px-4 py-2 hover:bg-gray-100">
              Siswa
            </a>
            <a href="login-mahasiswa.html" class="block px-4 py-2 hover:bg-gray-100">
              Mahasiswa
            </a>
            <a href="login-umum.html" class="block px-4 py-2 hover:bg-gray-100">
              Umum
            </a>
          </div>
        </div>
    </div>
  </nav>
  <main>
    <section class="w-full bg-[#5F6F52] px-[120px] py-20 flex flex-row justify-center items-center">
      <h1 class="font-mochi_pop_one text-[48px] text-[#E5E0D8]">Cara Order</h1>
    </section>
    <section class="w-full py-[60px] px-[120px] bg-[#E5E0D8]">
      <div class="w-full flex justify-center">
        <h2 class="mb-8 font-poppins text-[40px] font-semibold">Follow <span class="text-[#FE8929]">Us</span></h2>
      </div>
      <div class="flex flex-row justify-center gap-10 w-full mt-4">
        <a href="" class="w-[100px] h-[100px] bg-white rounded-[30px] shadow shadow-gray-300 flex justify-center items-center">
          <img src="img/instagram.png" alt="" class="w-[54px] h-[54px]">
        </a>
        <a href="" class="w-[100px] h-[100px] bg-white rounded-[30px] shadow shadow-gray-300 flex justify-center items-center">
          <img src="img/tiktok.png" alt="" class="w-[57px] h-[57px]">
        </a>
        <a href="" class="w-[100px] h-[100px] bg-white rounded-[30px] shadow shadow-gray-300 flex justify-center items-center">
          <img src="img/x.png" alt="" class="w-[52px] h-[52px]">
        </a>
        <a href="" class="w-[100px] h-[100px] bg-white rounded-[30px] shadow shadow-gray-300 flex justify-center items-center">
          <img src="img/threads.png" alt="" class="w-[58px] h-[58px]">
        </a>
      </div>
    </section>
  </main>
  <script src="javascript/common.js"></script>
</body>
</html>