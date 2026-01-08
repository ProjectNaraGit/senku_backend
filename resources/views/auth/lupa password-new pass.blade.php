<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body class="bg-[url('img/login%20Vector.png')] bg-cover overflow-hidden">
  <main class="h-screen w-screen flex justify-center">
    <div class="bg-[#5F6F52] max-w-[647px] py-10 px-[60px] my-10 rounded-3xl shadow-md shadow-gray-500">
      <form action="" class="flex flex-col items-center justify-between h-full">
        <div class="bg-[#E5E0D8] w-10 h-10 flex justify-center items-center rounded-[50%] hidden">
        <svg width="19" height="10" viewBox="0 0 19 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 10C6.15196 9.99846 7.26816 9.59975 8.16039 8.8711C9.05263 8.14245 9.66632 7.12842 9.898 6H12V8H14V6H16V9H18V6H19V4H9.898C9.66632 2.87158 9.05263 1.85755 8.16039 1.1289C7.26816 0.400248 6.15196 0.00153976 5 0C2.243 0 0 2.243 0 5C0 7.757 2.243 10 5 10ZM5 2C6.654 2 8 3.346 8 5C8 6.654 6.654 8 5 8C3.346 8 2 6.654 2 5C2 3.346 3.346 2 5 2Z" fill="#ffffff"/></svg>
        </div>
        <h1 class="text-[#E5E0D8] font-mochi_pop_one font-bold text-3xl">Atur Kata Sandi Baru</h1>
        <p class="text-[#E5E0D8] text-center">Kata sandi baru Anda harus berbeda dari kata sandi yang pernah digunakan sebelumnya!</p>
        <div class="relative w-full">
          <label for="password" class="text-[#E5E0D8]">Password Baru</label>
          <input
            type="password"
            name="new-password"
            id="new-password"
            placeholder="Enter your password"
            class="border border-[#E5E0D8] rounded-[20px] py-2 px-4 pr-12 w-full my-4
                  text-[#FEFEFE] text-[25px] placeholder:text-[#E5E0D8] bg-transparent"
          />
          <!-- Toggle button -->
          <button
            type="button"
            onclick="togglePassword('new-password', this)"
            class="absolute right-4 top-[58px] text-[#E5E0D8]"
          >
            <!-- icon eye -->
            <svg id="eye-open-new-password" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                      -1.274 4.057-5.064 7-9.542 7
                      -4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <!-- icon eye-off -->
            <svg id="eye-closed-new-password" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19
                      c-4.478 0-8.268-2.943-9.543-7
                      a9.97 9.97 0 012.442-4.362M9.88 9.88
                      a3 3 0 104.24 4.24M6.1 6.1l11.8 11.8" />
            </svg>
          </button>
        </div>
        <div class="relative w-full">
          <label for="password" class="text-[#E5E0D8]">Konfirmasi Password</label>
          <input
            type="password"
            name="confirm-password"
            id="confirm-password"
            placeholder="Enter your password"
            class="border border-[#E5E0D8] rounded-[20px] py-2 px-4 pr-12 w-full my-4
                  text-[#FEFEFE] text-[25px] placeholder:text-[#E5E0D8] bg-transparent"
          />
          <!-- Toggle button -->
          <button
            type="button"
            onclick="togglePassword('confirm-password', this)"
            class="absolute right-4 top-[58px] text-[#E5E0D8]"
          >
            <!-- icon eye -->
            <svg id="eye-open-confirm-password" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                      -1.274 4.057-5.064 7-9.542 7
                      -4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <!-- icon eye-off -->
            <svg id="eye-closed-confirm-password" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19
                      c-4.478 0-8.268-2.943-9.543-7
                      a9.97 9.97 0 012.442-4.362M9.88 9.88
                      a3 3 0 104.24 4.24M6.1 6.1l11.8 11.8" />
            </svg>
          </button>
        </div>
        <div class="flex flex-col w-full items-center">
          <!-- <button type="submit" class="bg-[#E5E0D8] text-[#5F6F52] rounded-[40px] py-2.5 px-6 my-4 font-poppins font-semibold w-full">Reset Password</button> -->
          <a href="lupa password-check email.html" class="block bg-[#E5E0D8] text-[#5F6F52] rounded-[40px] py-2.5 px-6 my-2 font-poppins font-semibold w-full text-center">Reset Password</a>
          <a href="lupa password-check email.html" class="block bg-[#E5E0D8] text-[#5F6F52] rounded-[40px] py-2.5 px-6 my-2 font-poppins font-semibold w-full text-center">Konfirmasi</a>
          <a href="" class="text-[#E5E0D8]">←Kembali Untuk Login</a>
        </div>
      </form>
    </div>
  </main>
  <script src="javascript/common.js"></script>
  <script>
    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const eyeOpen = document.getElementById("eye-open-"+inputId);
      const eyeClosed = document.getElementById("eye-closed-"+inputId);

      if (input.type === "password") {
        input.type = "text";
        eyeOpen.classList.remove("hidden");
        eyeClosed.classList.add("hidden");
      } else {
        input.type = "password";
        eyeOpen.classList.add("hidden");
        eyeClosed.classList.remove("hidden");
      }
    }
  </script>
</body>
</html>