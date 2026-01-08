<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body class="bg-[#E5E0D8] overflow-hidden">
  <main class="bg-[url('img/login%20Vector.png')] bg-cover h-screen w-screen grid grid-cols-[25%_50%_25%]">
    <div class=""></div>
    <div class="flex my-10">
        <div class="bg-[#5F6F52] flex-1 rounded-[20px] shadow shadow-gray-700 p-2 flex">
            <form action="" class="flex-1 w-full px-10 py-10 flex flex-col items-center justify-around">
                <h1 class="font-mochi font-bold text-3xl text-[#FEFFFE]">Welcome Back</h1>
                <div class="flex flex-col w-full">
                    <input type="email" placeholder="E-mail" class="border border-[#E5E0D8] rounded-[40px] py-2 px-4 w-full my-2 text-[#FEFEFE] text-[25px] placeholder:text-[#AAAAAA]">
                    <input type="min" placeholder="NIM" class="border border-[#E5E0D8] rounded-[40px] py-2 px-4 w-full my-2 text-[#FEFEFE] text-[25px] placeholder:text-[#AAAAAA]">
                    <input type="password" placeholder="Password" class="border border-[#E5E0D8] rounded-[40px] py-2 px-4 w-full my-2 text-[#FEFEFE] text-[25px] placeholder:text-[#AAAAAA]">
                    <a href="lupa password.html" class="font-mochi font-bold text-[#E5E0D8] self-end">Lupa Password</a>
                </div>
                <button type="submit" class="flex text-xl items-center gap-2 font-poppins font-bold text-[#E5E0D8] bg-[#4269E2] w-fit px-7 py-2 rounded-[100px]">Next<span><svg width="10" height="19" viewBox="0 0 10 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.29394 18.1211C0.992139 18.1217 0.699659 18.0166 0.467273 17.824C0.336481 17.7156 0.228366 17.5824 0.14912 17.4321C0.0698735 17.2818 0.0210533 17.1174 0.00545526 16.9482C-0.0101427 16.7791 0.00778821 16.6085 0.0582207 16.4462C0.108653 16.284 0.190595 16.1333 0.299356 16.0028L6.08602 9.07943L0.506024 2.14318C0.39873 2.01106 0.318606 1.85904 0.270257 1.69585C0.221907 1.53266 0.206286 1.36152 0.224291 1.19228C0.242296 1.02303 0.293571 0.859016 0.37517 0.709652C0.45677 0.560288 0.567085 0.428523 0.699773 0.321932C0.833417 0.204343 0.989923 0.115647 1.15947 0.0614114C1.32902 0.00717555 1.50795 -0.0114292 1.68502 0.00676375C1.8621 0.0249567 2.03351 0.0795552 2.18849 0.167133C2.34346 0.25471 2.47866 0.373375 2.58561 0.515682L8.82436 8.26568C9.01434 8.4968 9.11819 8.78671 9.11819 9.08589C9.11819 9.38507 9.01434 9.67498 8.82436 9.9061L2.36602 17.6561C2.23645 17.8124 2.07185 17.936 1.88557 18.0168C1.6993 18.0976 1.49661 18.1333 1.29394 18.1211Z" fill="white"/></svg></span></button>
            </form>
        </div>
    </div>
    <div class="my-10">
      <a href="daftar-mahasiswa.html">
        <img src="{{ asset('images/login.png') }}" alt="" class="w-[70%] ml-auto mr-auto select-none" draggable="false" oncontextmenu="return false;">
      </a>
    </div>
  </main>
  <script src="javascript/common.js"></script>
</body>
</html>