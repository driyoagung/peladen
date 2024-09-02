<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Guide Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* Tambahkan smooth scrolling */
      html {
        scroll-behavior: smooth;
      }
    </style>
  </head>
  <body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Sticky Navbar -->
    <header class="bg-white shadow-md sticky top-0 z-10">
      <div class="container mx-auto flex justify-between items-center p-4">
        {{-- <div class=""> --}}
            <img src="{{ asset('assets/img/logo_suarakarta.png') }}" alt="" class="h-12 w-15 ml-9">
        {{-- </div> --}}
        <nav class="space-x-4">
          <a href="#home" class="text-gray-700 hover:text-blue-600">Home</a>
          <a href="#manual-peladen" class="text-gray-700 hover:text-blue-600">Manual Peladen</a>
          <a href="#faq" class="text-gray-700 hover:text-blue-600">FAQ</a>
          <a href="#helpdesk" class="text-gray-700 hover:text-blue-600">Helpdesk</a>
        </nav>
        <input type="text" placeholder="Search..." class="search-input rounded-lg border p-2" />
      </div>
    </header>

    <!-- Main Content -->
    <div class="flex">
      <!-- Sidebar -->
      <aside class="w-64 bg-blue-800 text-white p-6 sticky top-0 h-screen">
        <ul class="space-y-4">
          <li>
            <a href="#home" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-home mr-2"></i> Home
            </a>
          </li>
          <li>
            <a href="#manual-peladen" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-docs mr-2"></i> Manual Peladen
            </a>
          </li>
          <li>
            <a href="#video-tutorial" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-help mr-2"></i> Video Tutorial
            </a>
          </li>
          <li>
            <a href="#link-terkait" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-link mr-2"></i> Link Terkait
            </a>
          </li>
          <li>
            <a href="#alur-permohonan" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-flow mr-2"></i> Alur Permohonan
            </a>
          </li>
          <li>
            <a href="#faq" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-info mr-2"></i> FAQ
            </a>
          </li>
          <li>
            <a href="#helpdesk" class="flex items-center hover:bg-blue-700 p-2 rounded-lg">
              <i class="icon-support mr-2"></i> Helpdesk
            </a>
          </li>
        </ul>
      </aside>

      <!-- Content Area -->
      <main class="flex-1 p-8">
        <!-- Section: Home -->
        <section id="home" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">Home</h2>
          <p class="text-gray-600">
            Selamat datang di halaman panduan pengguna untuk layanan Peladen. Gunakan navigasi di
            sisi kiri atau di bagian atas untuk menemukan informasi yang Anda butuhkan.
          </p>
        </section>

        <!-- Section: Manual Peladen -->
        <section id="manual-peladen" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">Manual Peladen</h2>
          <p class="text-gray-600 mb-4">
            Peladen (Pengelolaan Layanan Administrasi Sistem Elektronik) merupakan aplikasi yang
            digunakan untuk memudahkan OPD dalam mengajukan rekomendasi dan permohonan layanan TIK.
          </p>
          <ul class="list-disc ml-5 text-gray-700">
            <li>Permohonan Rekomendasi</li>
            <li>Permohonan Subdomain/Hosting</li>
            <li>Permohonan TTE</li>
            <li>Permohonan VPN</li>
            <li>Permohonan Cloud Storage</li>
            <li>Permohonan Email</li>
          </ul>
        </section>

        <!-- Section: Video Tutorial -->
        <section id="video-tutorial" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">Video Tutorial</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300 transition duration-200">
              <a href="#" class="text-blue-600 hover:underline"
                >Video tutorial pendataan aplikasi lama</a
              >
            </div>
            <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300 transition duration-200">
              <a href="#" class="text-blue-600 hover:underline"
                >Video tutorial pendataan aplikasi baru</a
              >
            </div>
            <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300 transition duration-200">
              <a href="#" class="text-blue-600 hover:underline">Video tutorial pengajuan TTE</a>
            </div>
          </div>
        </section>

        <!-- Section: Link Terkait -->
        <section id="link-terkait" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">Link Terkait</h2>
          <ul class="list-disc ml-5 text-gray-700">
            <li><a href="#" class="text-blue-600 hover:underline">Pendataan Aplikasi</a></li>
            <li><a href="#" class="text-blue-600 hover:underline">Surat Edaran Sekda</a></li>
          </ul>
        </section>

        <!-- Section: Alur Permohonan -->
        <section id="alur-permohonan" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">Alur Permohonan</h2>
          <p class="text-gray-600 mb-4">
            Berikut adalah alur untuk mengajukan permohonan rekomendasi dan permohonan layanan
            lainnya:
          </p>
          <p>1. Login sebagai OPD dengan menggunakan username dan password yang sudah dibuatkan oleh admin</p>
          <img
            src="{{ asset('assets/img/login.png') }}"
            alt="Diagram Alur Permohonan"
            class="w-full rounded-lg shadow-md"
          />
          <p class="mt-10">2. Pilih Layanan yang ingin diajukan</p>
          <img
            src="{{ asset('assets/img/opd1.png') }}"
            alt="Diagram Alur Permohonan"
            class="w-full rounded-lg shadow-md"
          />
          <p class="mt-10">3. Masukan data diri dengan lengkap</p>
          <img
            src="{{ asset('assets/img/opd2.png') }}"
            alt="Diagram Alur Permohonan"
            class="w-full rounded-lg shadow-md"
          />
          <p class="mt-10">4. Tunggu konfirmasi lebih lanjut setelah mengajukan layanan</p>
          <img
            src="{{ asset('assets/img/opd3.png') }}"
            alt="Diagram Alur Permohonan"
            class="w-full rounded-lg shadow-md"
          />
        </section>

        <!-- Section: FAQ -->
        <section id="faq" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">FAQ</h2>
          <div class="space-y-4">
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
              <h3 class="text-xl font-semibold">Apa itu Peladen?</h3>
              <p class="text-gray-700">
                Peladen adalah aplikasi yang memudahkan OPD dalam mengajukan berbagai permohonan
                layanan TIK.
              </p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
              <h3 class="text-xl font-semibold">Bagaimana cara mengajukan permohonan hosting?</h3>
              <p class="text-gray-700">
                Anda dapat mengajukan permohonan hosting melalui menu "Permohonan Subdomain/Hosting"
                di aplikasi Peladen.
              </p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
              <h3 class="text-xl font-semibold">Apa saja persyaratan untuk pengajuan VPN?</h3>
              <p class="text-gray-700">
                Persyaratan pengajuan VPN termasuk surat permohonan resmi dan rincian kebutuhan
                jaringan.
              </p>
            </div>
          </div>
        </section>

        <!-- Section: Helpdesk -->
        <section id="helpdesk" class="bg-white p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-2xl font-bold mb-4">Helpdesk</h2>
          <p class="text-gray-600 mb-4">
            Jika Anda membutuhkan bantuan lebih lanjut, Anda dapat menghubungi helpdesk kami:
          </p>
          <ul class="list-disc ml-5 text-gray-700">
            <li>Email: support@peladen.id</li>
            <li>Telepon: 021-12345678</li>
            <li>Live Chat: Tersedia di aplikasi Peladen</li>
          </ul>
        </section>
      </main>
    </div>
  </body>
</html>
