@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit Layanan Zoom
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Edit Form
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.layananZoom.update', $layananZoom->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Pemohon</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="nama_pemohon"
                    value="{{ old('nama_pemohon', $layananZoom->nama_pemohon) }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">NIP/NIK</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="nip_nik"
                    value="{{ old('nip_nik', $layananZoom->nip_nik) }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Lokasi</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="lokasi"
                    value="{{ old('lokasi', $layananZoom->lokasi) }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Acara</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="acara"
                    value="{{ old('acara', $layananZoom->acara) }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Unit Kerja</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="unit_kerja"
                    value="{{ old('unit_kerja', $layananZoom->unit_kerja) }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Permohonan</span>
                <input
                    type="date"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="tanggal_permohonan"
                    value="{{ old('tanggal_permohonan', $layananZoom->tanggal_permohonan) }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Waktu Permohonan</span>
                <input
                    type="time"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="waktu_permohonan"
                    value="{{ old('waktu_permohonan', $layananZoom->waktu_permohonan ? \Carbon\Carbon::parse($layananZoom->waktu_permohonan)->format('H:i') : 'N/A') }}"
                    required
                />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Kategori</span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="kategori_id"
                    required
                >
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $layananZoom->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori_layanan }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Perangkat Daerah</span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="perangkat_daerah_id"
                    required
                >
                    @foreach($perangkatDaerahs as $perangkatDaerah)
                        <option value="{{ $perangkatDaerah->id }}" {{ $layananZoom->perangkat_daerah_id == $perangkatDaerah->id ? 'selected' : '' }}>{{ $perangkatDaerah->perangkat_daerah }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Status Permohonan</span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="status_permohonan_id"
                    required
                >
                    @foreach($statusPermohonans as $statusPermohonan)
                        <option value="{{ $statusPermohonan->id }}" {{ $layananZoom->status_permohonan_id == $statusPermohonan->id ? 'selected' : '' }}>{{ $statusPermohonan->status }}</option>
                    @endforeach
                </select>
            </label>

            <div class="mt-6">
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
