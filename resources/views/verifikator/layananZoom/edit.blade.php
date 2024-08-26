@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detail Layanan Zoom
    </h2>
     <!-- Alert Sukses -->
     @if (session('success'))
     <script>
         Swal.fire({
             icon: 'success',
             title: 'Success',
             text: '{{ session('success') }}',
         });
     </script>
     @endif
     

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4">
            <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-4">
                Informasi Layanan Zoom
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Detail Fields -->
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Nama Pemohon:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->nama_pemohon }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>NIP/NIK:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->nip_nik }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Lokasi:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->lokasi }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Acara:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->acara }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Kategori:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $kategoris->kategori_layanan }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Unit Kerja:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->unit_kerja }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Tanggal Permohonan:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->tanggal_permohonan }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-2"><strong>Waktu Permohonan:</strong></p>
                    <p class="text-gray-900 dark:text-gray-100">{{ $layananZoom->waktu_permohonan }}</p>
                </div>

                <!-- Status Permohonan with Badge Style -->
                <div class="mb-4">
                    <p class="text-gray-700 dark:text-gray-400 mb-4"><strong>Status Permohonan:</strong></p>
                    @php
                        $status = $layananZoom->statusPermohonan ? $layananZoom->statusPermohonan->status : 'N/A';
                        $badgeColor = match ($status) {
                            'Approved' => 'bg-green-100 text-green-700 dark:bg-green-700 dark:text-green-100',
                            'Pending' => 'bg-red-100 text-red-700 dark:bg-red-700 dark:text-red-100',
                            'Rejected' => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-100',
                            'In Progress' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100',
                            'Completed' => 'bg-blue-100 text-blue-700 dark:bg-blue-700 dark:text-blue-100',
                            default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-100',
                        };
                    @endphp
                    <span class="px-2 py-1 font-semibold leading-tight {{ $badgeColor }} rounded-full">
                        {{ $status }}
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <!-- Button to trigger modal -->
                <a href="{{ route ('verifikator.layananZoom') }}">
                <button onclick="" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                   Back
                </button>
                 </a>
                <button onclick="openModal()" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Edit Status
                </button>
                
            </div>
            
            
        </div>
    </div>
</div>

<!-- Modal -->
<div id="statusModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 ease-out">
    <div class="modal-content bg-white dark:bg-gray-800 rounded-lg shadow-md w-full max-w-md transform transition-transform duration-300 scale-90 opacity-0">
        <div class="px-6 py-4">
            <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-4">Update Status Permohonan</h3>
            <form id="statusForm" method="POST" action="{{ route('verifikator.layananZoom.updateStatus', $layananZoom->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 dark:text-gray-400 mb-2">Status Permohonan</label>
                    <select id="status" name="status" class="form-select block w-full mt-1 border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300">
                        @foreach(['Pending', 'Approved', 'Rejected', 'In Progress', 'Completed'] as $statusOption)
                            <option value="{{ $statusOption }}" {{ $statusOption === $status ? 'selected' : '' }}>
                                {{ $statusOption }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-red-700 border border-transparent rounded-lg hover:bg-red-700 dark:hover:bg-red-600 ">
                        Cancel
                    </button>
                    
                    <button type="submit" class="ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 dark:bg-blue-700 border border-transparent rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        const modal = document.getElementById('statusModal');
        const modalContent = modal.querySelector('.modal-content');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-90', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('statusModal');
        const modalContent = modal.querySelector('.modal-content');

        modalContent.classList.add('scale-90', 'opacity-0');
        modalContent.classList.remove('scale-100', 'opacity-100');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
@endsection
