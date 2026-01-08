<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body class="bg-[#E5E0D8]">
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
    <section class="w-full bg-[#E5E0D8] px-[120px] py-20 flex flex-col justify-center items-center">
      <h1 class="font-mochi_pop_one text-[48px] text-[#FE8929]">Kontak</h1>
      <p class="text-center font-poppins text-[16px]">Punya pertanyaan atau hanya ingin menyapa? <br> Jangan ragu, kami sangat senang mendengar kabar dari Anda.</p>
    </section>
    <section class="w-full py-[60px] px-[120px] bg-[#5F6F52] rounded-t-2xl">
      <form action="" class="px-10 flex flex-col">
        <div class="flex gap-16">
          <div class="flex-1">
            <label for="name" class="font-poppins text-[#E5E0D8]">Nama<span class="text-red-600">*</span></label>
            <input type="text" name="name" id="name" class="w-full h-[50px] rounded-lg mt-2 mb-4 px-4 focus:outline-none bg-[#E5E0D8]" required>
            <label for="telp" class="font-poppins text-[#E5E0D8]">Telepon<span class="text-red-600">*</span></label>
            <input type="text" name="telp" id="telp" class="w-full h-[50px] rounded-lg mt-2 mb-4 px-4 focus:outline-none bg-[#E5E0D8]" required>
          </div>
          <div class="flex-1">
            <label for="email" class="font-poppins text-[#E5E0D8]">Email<span class="text-red-600">*</span></label>
            <input type="text" name="email" id="email" class="w-full h-[50px] rounded-lg mt-2 mb-4 px-4 focus:outline-none bg-[#E5E0D8]" required>
            <label for="subject" class="font-poppins text-[#E5E0D8]">Subjek<span class="text-red-600">*</span></label>
            <input type="text" name="subject" id="subject" class="w-full h-[50px] rounded-lg mt-2 mb-4 px-4 focus:outline-none bg-[#E5E0D8]" required>
          </div>
        </div>
        <label for="message" class="font-poppins text-[#E5E0D8]">Pesan<span class="text-red-600">*</span></label>
        <textarea name="message" id="message" class="w-full h-[50px] rounded-lg mt-2 mb-4 px-2 focus:outline-none bg-[#E5E0D8]" required></textarea>
        <button type="submit" class="bg-[#E5E0D8] px-5 py-3 rounded-lg text-[#5F6F52] font-poppins self-center">Kirim</button>
      </form>
    </section>
    <section class="w-full py-[60px] px-[120px] bg-[#5F6F52] flex gap-[90px] justify-center">
      <div class="flex-1 max-w-[378px] flex justify-center items-center flex-col gap-1">
        <svg width="44" height="34" viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.33333 0C5.38841 0 3.52315 0.737498 2.14788 2.05025C0.772617 3.36301 0 5.14348 0 7V7.7035L22 19.012L44 7.707V7C44 5.14348 43.2274 3.36301 41.8521 2.05025C40.4768 0.737498 38.6116 0 36.6667 0H7.33333ZM44 11.6795L22.869 22.54C22.6019 22.6772 22.3033 22.7491 22 22.7491C21.6967 22.7491 21.3981 22.6772 21.131 22.54L0 11.6795V28C0 29.8565 0.772617 31.637 2.14788 32.9497C3.52315 34.2625 5.38841 35 7.33333 35H36.6667C38.6116 35 40.4768 34.2625 41.8521 32.9497C43.2274 31.637 44 29.8565 44 28V11.6795Z" fill="white"/></svg>
        <h4 class="text-[#E5E0D8] font-poppins">Email</h4>
        <p class="text-[#E5E0D8] font-poppins text-center">Hubungi kami melalui email untuk mendapatkan bantuan terkait produk atau layanan saat ini.</p>
      </div>
      <div class="flex-1 max-w-[378px] flex justify-center items-center flex-col gap-1">
        <svg width="44" height="34" viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.2895 19.8549C20.9866 22.0138 24.25 23.6806 27.8505 24.7382L32.7214 21.6798C32.8658 21.6013 33.037 21.5593 33.2123 21.5593C33.3877 21.5593 33.5589 21.6013 33.7033 21.6798L42.7474 26.2777C43.0908 26.4406 43.3814 26.6642 43.5964 26.931C43.8114 27.1977 43.9448 27.5003 43.9862 27.8147C44.0275 28.1291 43.9757 28.4468 43.8347 28.7427C43.6937 29.0386 43.4674 29.3046 43.1738 29.5197L38.936 32.8228C38.3291 33.296 37.5832 33.6433 36.7648 33.8336C35.9464 34.0239 35.0811 34.0515 34.2459 33.9137C25.9153 32.556 18.2367 29.3764 12.0878 24.7382C6.07541 20.0539 1.91485 14.0935 0.110837 7.58014C-0.0673763 6.93137 -0.0301808 6.25728 0.218818 5.62319C0.467818 4.9891 0.920176 4.41652 1.53206 3.96093L5.92492 0.616987C6.19676 0.396559 6.52827 0.227514 6.89464 0.122509C7.261 0.0175039 7.65273 -0.02074 8.04048 0.0106409C8.42823 0.0420218 8.80196 0.142214 9.13369 0.303716C9.46541 0.465218 9.74654 0.683844 9.95601 0.943225L15.9768 7.98793C16.0807 8.09856 16.1367 8.23258 16.1367 8.37024C16.1367 8.50791 16.0807 8.64193 15.9768 8.75256L12.0103 12.5145C13.3871 15.2987 15.532 17.8061 18.2895 19.8549Z" fill="white"/></svg>
        <h4 class="text-[#E5E0D8] font-poppins">Telepon</h4>
        <p class="text-[#E5E0D8] font-poppins text-center">Hubungi kami untuk berbicara dengan salah satu anggota tim kami.<br>+089699882356</p>
      </div>
    </section>
    <section class="w-full py-[60px] px-[120px] bg-[#5F6F52]">
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