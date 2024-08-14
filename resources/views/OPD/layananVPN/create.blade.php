@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Layanan VPN
    </h2>
    <!-- Alert Sukses -->
    @if (session('success'))
    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
        <p class="font-bold">Berhasil!</p>
        <p class="text-sm">{{ session('success') }}</p>
    </div>
    @endif
    <!-- General elements -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Masukkan data formulir di bawah 
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('opd.layananVPN.store') }}" method="POST">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Pemohon</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="nama_pemohon"
                    placeholder="Jane Doe"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">NIP/NIK</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="nip_nik"
                    placeholder="123456789"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Lokasi</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="lokasi"
                    placeholder="Location"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Unit Kerja</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="unit_kerja"
                    placeholder="Unit"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Permohonan</span>
                <input
                    type="date"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="tanggal_permohonan"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Waktu Permohonan</span>
                <input
                    type="time"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="waktu_permohonan"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Kategori</span>
                <input
                    type="text"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    value="{{ $kategoris->kategori_layanan }}"
                    disabled
                />
                <input type="hidden" name="kategori_id" value="{{ $kategoris->id }}">
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Perangkat Daerah</span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="perangkat_daerah_id"
                    required
                >
                    @foreach($perangkatDaerahs as $perangkatDaerah)
                        <option value="{{ $perangkatDaerah->id }}">{{ $perangkatDaerah->perangkat_daerah }}</option>
                    @endforeach
                </select>
            </label>

            <button
                type="submit"
                class="mt-6 px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
