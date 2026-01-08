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
      <h1 class="font-mochi_pop_one text-[48px] text-[#E5E0D8]">FAQ</h1>
    </section>
    <section class="w-full py-[60px] px-[120px] bg-[#E5E0D8] rounded-t-3xl">
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq1-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq1')">
            1. Apa aja jenis jasa joki yang Senku Solutions tawarkan?
          </h3>
          <p id="faq1" class="hidden font-poppins text-[15px]">Kami bantu berbagai kebutuhan digital dan akademik — mulai dari joki tugas, proyek, desain, sampai pengerjaan website. Pokoknya, kami bantu kamu biar hasilnya beres dan tepat waktu.</p>
        </div>
      </div>
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq2-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq2')">
            2. Apakah jasa ini aman dan rahasia?
          </h3>
          <p id="faq2" class="hidden font-poppins text-[15px]">Tentu! Semua data dan file kamu dijaga kerahasiaannya. Kami nggak akan membagikan informasi apa pun ke pihak lain tanpa izin.</p>
        </div>
      </div>
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq3-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq3')">
            3. Berapa lama waktu pengerjaannya?
          </h3>
          <p id="faq3" class="hidden font-poppins text-[15px]">Tergantung tingkat kesulitan dan deadline yang kamu berikan. Tapi tenang aja — kami selalu berusaha kasih estimasi waktu yang realistis dan update progres secara rutin.</p>
        </div>
      </div>
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq4-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq4')">
            4. Bagaimana sistem pembayarannya?
          </h3>
          <p id="faq4" class="hidden font-poppins text-[15px]">Pembayaran bisa dilakukan via transfer bank atau e-wallet (kami akan kasih detailnya setelah deal). Kamu bisa pilih bayar DP dulu atau full sesuai kesepakatan.</p>
        </div>
      </div>
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq5-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq5')">
            5. Apakah bisa revisi kalau hasilnya belum sesuai?
          </h3>
          <p id="faq5" class="hidden font-poppins text-[15px]">Bisa dong! Kami sediakan revisi minor gratis selama masih dalam lingkup order awal. Kami pengin hasilnya benar-benar sesuai ekspektasi kamu.</p>
        </div>
      </div>
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq6-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq6')">
            6. Apakah bisa order dadakan / express?
          </h3>
          <p id="faq6" class="hidden font-poppins text-[15px]">Bisa, selama slot masih tersedia. Tapi karena pengerjaan express butuh tenaga ekstra, biasanya akan ada sedikit penyesuaian harga.</p>
        </div>
      </div>
      <div class="flex border-b border-gray-400 pb-2 mb-2">
        <div class="min-w-12 min-h-12">
          <img src="img/beaker.png" alt="beaker" id="faq7-icon" class="w-12 h-12">
        </div>
        <div>
          <h3 class="h-12 flex items-center text-2xl font-poppins font-semibold cursor-pointer" onclick="toggleFaq('faq7')">
            7. Gimana cara tahu update progres pesanan saya?
          </h3>
          <p id="faq7" class="hidden font-poppins text-[15px]">Tim kami akan kasih update rutin lewat chat (WhatsApp/Telegram) biar kamu tahu sejauh mana progres pengerjaannya..</p>
        </div>
      </div>
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
  <script>
  function toggleFaq(id) {
    const el = document.getElementById(id)
    const elicon = document.getElementById(id+"-icon")
    el.classList.toggle('hidden')
    elicon.classList.toggle('rotate-90')
  }
  </script>
</body>
</html>