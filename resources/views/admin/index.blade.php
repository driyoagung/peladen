@extends('layouts.admin') 

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Halo, {{ $user->name }}
    </h2>
    
    <!-- Service Cards -->
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($kategoris as $kategori)
            <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 flex flex-col">
                <div class="p-6 flex-grow">
                    <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">{{ $kategori->kategori_layanan }}</h2>
    
                    @if ($kategori->kategori_layanan == 'Layanan TTE')
                        <p class="text-gray-700 mb-4 dark:text-gray-400">Tanda Tangan Elektronik adalah layanan yang memungkinkan Anda untuk menandatangani dokumen secara digital dengan validitas hukum.</p>
                    @elseif ($kategori->kategori_layanan == 'Layanan VPN')
                        <p class="text-gray-700 mb-4 dark:text-gray-400">Layanan VPN (Virtual Private Network) menyediakan koneksi aman untuk mengakses jaringan internal dari jarak jauh.</p>
                    @elseif ($kategori->kategori_layanan == 'Layanan Zoom')
                        <p class="text-gray-700 mb-4 dark:text-gray-400">Layanan Zoom digunakan untuk menyelenggarakan rapat online, webinar, dan pertemuan video dengan fitur interaktif.</p>
                    @elseif ($kategori->kategori_layanan == 'Layanan SPLP')
                        <p class="text-gray-700 mb-4 dark:text-gray-400">Surat Perjalanan Laksana Paspor (SPLP) adalah dokumen perjalanan yang diterbitkan bagi WNI yang berada di luar negeri dan kehilangan paspor.</p>
                    @elseif ($kategori->kategori_layanan == 'Layanan Konten Multimedia')
                        <p class="text-gray-700 mb-4 dark:text-gray-400">Layanan Konten Multimedia menyediakan pembuatan dan pengelolaan konten digital seperti video, grafis, dan animasi untuk kebutuhan media.</p>
                    @else
                        <p class="text-gray-700 mb-4 dark:text-gray-400">Deskripsi layanan tidak tersedia.</p>
                    @endif
                </div>
                <div class="bg-teal-500 p-4">
                    <button type="submit" class="focus:outline-none text-white w-full h-auto flex justify-between items-center"> <!-- Diubah: flex justify-between items-center -->
                        <span></span> <!-- Tambahkan untuk memberikan ruang kosong di kiri -->
                        Tersedia &rarr;
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    

    <!-- New Table -->
    <!-- Add your table code here if needed -->

</div>
@endsection
