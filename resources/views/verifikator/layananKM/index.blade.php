@extends('layouts.admin')

@section('content')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tables 
    </h2>
     <!-- Alert Sukses -->
     @if (session('success'))
     <div class="bg-green-100 bg-gradient-to-r border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
         <p class="font-bold">Berhasil!</p>
         <p class="text-sm">{{ session('success') }}</p>
     </div>
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
                                <a href="{{ route('verifikator.layananKM.edit', $layananKM->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg width="40px" height="40px" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" fill="#000000">

                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                        
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                        
                                        <g id="SVGRepo_iconCarrier"> <g fill="none" fill-rule="evenodd" transform="translate(2 2)"> <g stroke="#00ccff" stroke-linecap="round" stroke-linejoin="round"> <circle cx="8.5" cy="8.5" r="8"/> <path d="m8.5 12.5v-4h-1"/> <path d="m7.5 12.5h2"/> </g> <circle cx="8.5" cy="5.5" fill="#00ccff" r="1"/> </g> </g>
                                        
                                        </svg>
                                </a>
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
@endsection
