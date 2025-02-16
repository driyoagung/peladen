@extends('layouts.admin')

@section('content')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tables 
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

    <!-- With actions -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table Layanan Konten Multimedia
    </h4>
    
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama Pemohon</th>
                        <th class="px-4 py-3">NIP/NIK</th>
                        <th class="px-4 py-3">Peruntukan</th>
                        <th class="px-4 py-3">Unit Kerja</th>
                        <th class="px-4 py-3">Tanggal Permohonan</th>
                        <th class="px-4 py-3">Waktu Permohonan</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Perangkat Daerah</th>
                        <th class="px-4 py-3">Status Permohonan</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($layananKMs as $layananKM)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">{{ $layananKM->nama_pemohon }}</td>
                        <td class="px-4 py-3">{{ $layananKM->nip_nik }}</td>
                        <td class="px-4 py-3">{{ $layananKM->peruntukan }}</td>
                        <td class="px-4 py-3">{{ $layananKM->unit_kerja }}</td>
                        <td class="px-4 py-3">{{ $layananKM->tanggal_permohonan ? \Carbon\Carbon::parse($layananKM->tanggal_permohonan)->format('d/m/Y') : 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $layananKM->waktu_permohonan ? \Carbon\Carbon::parse($layananKM->waktu_permohonan)->format('H:i') : 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $layananKM->kategori ? $layananKM->kategori->kategori_layanan : 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $layananKM->perangkatDaerah ? $layananKM->perangkatDaerah->perangkat_daerah : 'N/A' }}</td>
                        <td class="px-4 py-3">
                            @php
                                $status = $layananKM->statusPermohonan ? $layananKM->statusPermohonan->status : 'N/A';
                                $badgeColor = match ($status) {
                                    'Approved' => 'bg-green-100 text-green-700 dark:bg-green-700 dark:text-green-100',
                                    'Pending' => 'bg-red-100 text-red-700 dark:bg-red-700 dark:text-red-100',
                                    'Rejected' => 'bg-red-100 text-red-700 dark:bg-gray-700 dark:text-red-100',
                                    'In Progress' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100',
                                    'Completed' => 'bg-blue-100 text-blue-700 dark:bg-blue-700 dark:text-blue-700',
                                    default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-100',
                                };
                            @endphp
                            <span class="px-2 py-1 font-semibold leading-tight {{ $badgeColor }} rounded-full">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.layananKM.edit', $layananKM->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.layananKM.destroy', $layananKM->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-btn flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-col px-4 py-3 text-sm font-medium text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-gray-700 dark:text-gray-300">
                    Menampilkan {{ $layananKMs->firstItem() }} hingga {{ $layananKMs->lastItem() }} dari {{ $layananKMs->total() }} hasil
                </span>
                <div class="flex items-center">
                    <!-- Pagination Links -->
                    {{ $layananKMs->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            // event.preventDefault(); // Mencegah form submit otomatis
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            })
        });
    });
</script>
@endsection
