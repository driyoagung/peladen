<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Peladen</title>
    <!-- Favicon -->
    <link rel="icon" href="img/logo_suarakarta.png" type="image/x-icon" />
    <!-- Roboto font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <!-- Tailwind -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     --}}
     <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  {{-- <link rel="stylesheet" href="{{asset('assets/css/tailwind.css')}}"/> --}}



    

    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

    <!-- TW element -->
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          fontFamily: {
            sans: ['Roboto', 'sans-serif'],
            body: ['Roboto', 'sans-serif'],
            mono: ['ui-monospace', 'monospace'],
          },
        },
        corePlugins: {
          preflight: false,
        },
      };
    </script>
    <!-- TW Elements CSS -->
    <link rel="stylesheet" href="css/tw-elements.min.css" />
    <!-- Custom styles -->
    <style></style>
  </head>
  <body class="bg-slate-100">
    <!-- header -->
    <header>
      <div class="container max-w-full flex flex-col md:flex-row justify-between items-center pt-10 p-4 sm:p-6 md:p-8">
        <div class="flex items-center mb-4 md:mb-0">
          <img src="{{ asset('assets/img/logo_suarakarta.png') }}" alt="Logo" class="h-20 mr-4" />
          <div>
            <h1 class="text-2xl font-bold text-fg">PELADEN</h1>
            <p class="text-fg bg-slate-00">Pengelolaan Layanan Administrasi Sistem Elektronik Pemda Surakarta</p>
          </div>
        </div>
        <button
          type="button"
          onclick="login()"
          class="inline-block rounded-full border-2 border-success px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-success transition duration-150 ease-in-out hover:border-success-600 hover:bg-success-50/50 hover:text-success-600 focus:border-success-600 focus:bg-success-50/50 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 motion-reduce:transition-none dark:hover:bg-green-950 dark:focus:bg-green-950"
          data-twe-ripple-init
        >
          Login
        </button>
      </div>
    </header>
    <!-- end header -->
    
    <!-- hero -->
    <div class="container mx-auto max-w-screen-lg p-4 sm:p-6 md:p-8 my-6 md:my-10">
      <div class="flex flex-col xl:flex-row items-center xl:items-start relative z-10 max-w-6xl xl:ml-12">
        <div class="flex-none bg-gray-200 rounded-xl hidden xl:block">
          <img src="{{ asset('assets/img/bro.png') }}" alt="Home Side Image" class="h-64 md:h-80 lg:h-96 xl:w-auto" />
        </div>
        <div class="flex flex-col justify-center xl:ml-8 px-4 sm:px-6 md:px-16 text-center xl:text-left">
          <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tighter text-fg mt-4 sm:mt-0 md:mt-10 lg:mt-28 xl:mt-5">
            Ajukan Layanan <br class="xl:hidden" />
            menggunakan
            <span class="ml-0 sm:ml-4 md:ml-6 inline-block -rotate-2 animate-gradient-pulse rounded-xl bg-gradient-to-r from-background via-background to-background px-4 py-1.5 sm:px-4 sm:py-3 md:px-6 md:py-3 text-lg sm:text-2xl md:text-3xl lg:text-4xl tracking-tight text-fg shadow-2xl shadow-fg/[0.25] ring-2 ring-green-500 dark:via-fg/10">
              Aplikasi PELADEN
            </span>
          </h1>
          <p class="mt-4 sm:mt-6 md:mt-10 text-slate-700 text-sm sm:text-base md:text-lg xl:text-xl leading-relaxed max-w-3xl pr-4">
            PELADEN (Pengelolaan Layanan Administrasi Sistem Elektronik) Pemda Surakarta merupakan aplikasi yang digunakan untuk memudahkan OPD (Organisasi Pemerintah Daerah) dalam mengajukan rekomendasi dan permohonan layanan TIK.
          </p>
          <div class="mt-4 inline-flex gap-2">
            <button
              id="myButton"
              type="button"
              data-twe-ripple-init
              data-twe-ripple-color="light"
              class="inline-block rounded-lg bg-success px-4 sm:px-6 py-2.5 text-xs sm:text-sm font-medium uppercase leading-normal text-white shadow-success-3 transition duration-150 ease-in-out hover:bg-success-accent-300 hover:shadow-success-2 focus:bg-success-accent-300 focus:shadow-success-2 focus:outline-none focus:ring-0 active:bg-success-600 active:shadow-success-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
            >
              Daftar Layanan
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- end hero -->

    <!-- cards -->
    <div id="layanan" class="my-12 mx-auto max-w-screen-lg pt-20 px-4 sm:px-6 md:px-8 lg:px-16">
      <div class="container mx-auto flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-16">
          @foreach ($kategoris as $kategori)              
          <a href="#domain" class="block no-underline myButton">
            <div class="relative font-semibold h-auto w-auto flex flex-col items-center text-gray-700 bg-white shadow-xl rounded-xl w-32 h-32 transition-transform duration-500 hover:scale-105 cursor-pointer">
              <div class="p-6 flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="35" height="35" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" style="color: rgb(0, 191, 166); font-weight: bold;" class="mb-4">
                  <path fill="currentColor" d="M22 12A10 10 0 0 0 12 2a10 10 0 0 0 0 20a10 10 0 0 0 10-10zm-2.07-1H17a12.91 12.91 0 0 0-2.33-6.54A8 8 0 0 1 19.93 11zM9.08 13H15a11.44 11.44 0 0 1-3 6.61A11 11 0 0 1 9.08 13zm0-2A11.4 11.4 0 0 1 12 4.4a11.19 11.19 0 0 1 3 6.6zm.36-6.57A13.18 13.18 0 0 0 7.07 11h-3a8 8 0 0 1 5.37-6.57zM4.07 13h3a12.86 12.86 0 0 0 2.35 6.56A8 8 0 0 1 4.07 13zm10.55 6.55A13.14 13.14 0 0 0 17 13h2.95a8 8 0 0 1-5.33 6.55z"></path>
                </svg>
                <h6 class="text-center">{{ $kategori->kategori_layanan }}</h6>
              </div>
            </div>
          </a>
          @endforeach

          
          
          <!-- Tambahkan div lainnya sesuai kebutuhan -->
        </div>
      </div>
    </div>
    
    <!-- end cards -->

    <!-- informasi -->
    <div class="flex items-center justify-center px-4 md:px-8 lg:px-12 py-4">
      <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 p-4 border-t border-gray-300">
        <img src="{{ asset('img/logo-bsre.png') }}" alt="Logo" class="h-24 md:h-32 lg:h-40" />
        <div class="text-center md:text-left">
          <p class="text-sm md:text-base text-gray-700">
            peladen.surakarta.go.id sudah mendukung tanda tangan elektronik dari Balai Sertifikasi Elektronik (BSrE)
            <br />
            Badan Siber dan Sandi Negara (BSSN)
          </p>
        </div>
      </div>
    </div>
    
    
    
    <!-- end informasi -->

    <!-- daftar layanan -->
    @foreach ($kategoris as $kategori)
        
    <div id="domain" class="bg-gradient-to-r from-green-100 to-green-500 flex flex-col md:flex-row items-center justify-center px-6 md:px-12 lg:px-24 py-14 delay-[300ms] duration-[600ms] taos:translate-y-[200px] taos:opacity-0" data-taos-offset="300">
      <div class="flex flex-col md:flex-row items-start space-y-6 md:space-y-0 md:space-x-8 p-4 md:p-8">
        <div class="flex-shrink-0">
          <img src="{{ asset('assets/img/home-side.png') }}"  alt="WWW" class="h-32 w-32 md:h-40 md:w-40" />
        </div>
        <div>
          <h2 class="text-xl md:text-2xl font-bold mb-4">{{ $kategori->kategori_layanan }}</h2>
          <p class="text-gray-700 mb-6 text-sm md:text-base">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ipsam nihil optio inventore ullam totam unde neque, quos, mollitia quasi iusto velit aspernatur ducimus placeat fuga explicabo repellat temporibus excepturi?
            Quam voluptas harum earum laboriosam ratione recusandae modi ipsa molestiae. Assumenda illum itaque ad suscipit quae error. Recusandae quibusdam placeat sint delectus nam quo itaque omnis illum voluptatibus dolor maiores
            mollitia aperiam, sit molestias quas saepe, eos a eligendi animi quod, temporibus rem sed inventore! Impedit praesentium voluptates dolorem fugiat cumque, corrupti iure quo repudiandae qui nulla non labore corporis ipsa
            repellendus sunt recusandae consectetur eveniet aut! Blanditiis aspernatur ex dolore, repellat facere id tempore numquam aperiam quis. Incidunt repellendus illo eligendi cupiditate, necessitatibus eos minima mollitia nulla et
            hic debitis. Doloribus, fugiat. Consequuntur, id est. Ipsam asperiores pariatur voluptate! Autem reprehenderit deleniti iste corrupti blanditiis delectus quidem iusto numquam aspernatur placeat quia nihil excepturi eaque, velit
            sunt laborum architecto ipsam dolores itaque maiores vel nulla explicabo. Fugit, tenetur architecto. Nisi porro et eligendi nam ex iusto? Minus beatae voluptates ratione, blanditiis cupiditate culpa inventore perferendis
            eligendi repellendus commodi expedita, at velit enim magnam? Tempore cumque veritatis quibusdam dolore, magni deserunt quod, blanditiis praesentium delectus quis sunt vero ipsam fugit.
          </p>
          <button
            onclick="login()"
            type="button"
            data-twe-ripple-init
            data-twe-ripple-color="light"
            class="inline-block rounded-lg bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-success-3 transition duration-150 ease-in-out hover:bg-success-accent-300 hover:shadow-success-2 focus:bg-success-accent-300 focus:shadow-success-2 focus:outline-none focus:ring-0 active:bg-success-600 active:shadow-success-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
          >
            Ajukan Sekarang
          </button>
        </div>
      </div>
    </div>
    @endforeach

    
    <!-- end daftar -->

    <!-- daftar footer -->
    <footer class="bg-gray-100 py-10 px-10 md:px-12">
      <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
              <h2 class="font-bold text-lg mb-4">Tentang</h2>
              <ul>
                  <li>Peladen</li>
              </ul>
          </div>
          <div>
              <h2 class="font-bold text-lg mb-4">Layanan</h2>
              <ul>
                  <li>Rekomendasi</li>
                  <li>Subdomain</li>
                  <li>Hosting</li>
                  <li>Tanda Tangan Elektronik</li>
              </ul>
          </div>
          <div>
              <h2 class="font-bold text-lg mb-4">Kontak Kami</h2>
              <ul>
                  <li class="flex items-center mb-2">
                      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0a4 4 0 100-8 4 4 0 100 8zm8 0a4 4 0 100-8 4 4 0 100 8z"></path>
                      </svg>
                      <a href="mailto:hola@liftmedia.com">hola@liftmedia.com</a>
                  </li>
                  <li class="flex items-center mb-2">
                      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8a4 4 0 014-4h10a4 4 0 014 4v8a4 4 0 01-4 4H7a4 4 0 01-4-4V8z"></path>
                      </svg>
                      <span>123 456 789</span>
                  </li>
                  <li class="flex items-center">
                      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path>
                      </svg>
                      <span>Lunes a Viernes 09:00 a 20:00 horas</span>
                  </li>
              </ul>
          </div>
          <div>
              <h2 class="font-bold text-lg mb-4">Sosial Media</h2>
              <!-- Add social media icons/links here -->
          </div>
      </div>
  </footer>
  </body>
  <script>
    function login() {
      window.location.href = '/login';
  }
  
    document.addEventListener('DOMContentLoaded', function() {
      const buttonsById = [document.getElementById('myButton')];
      const buttonsByClass = document.querySelectorAll('.myButtonClass, .myButton');
    
      const allButtons = [...buttonsById, ...buttonsByClass].filter(Boolean); // Menggabungkan dan menghilangkan elemen yang null
    
      function handleButtonClick(event) {
        event.preventDefault(); // Mencegah perilaku default dari tombol
    
        const targetId = event.currentTarget.getAttribute('href') ? event.currentTarget.getAttribute('href').substring(1) : 'layanan'; // Mendapatkan ID target dari atribut href
        const target = document.getElementById(targetId); // Menggunakan getElementById untuk mendapatkan elemen target
        if (target) {
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
          const startPosition = window.pageYOffset;
          const distance = targetPosition - startPosition;
          const duration = 500; // Durasi animasi dalam milidetik (800ms)
          let start = null;
    
          window.requestAnimationFrame(function step(timestamp) {
            if (!start) start = timestamp;
            const progress = timestamp - start;
            const yOffset = Math.min(progress / duration * distance, distance);
            window.scrollTo(0, startPosition + yOffset);
            if (progress < duration) {
              window.requestAnimationFrame(step);
            }
          });
        }
      }
    
      allButtons.forEach(function(button) {
        button.addEventListener('click', handleButtonClick);
      });
    });
    
    
  </script>
  
  
  <!-- TW Elements JS -->
  <script type="text/javascript" src="js/tw-elements.umd.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</html>
