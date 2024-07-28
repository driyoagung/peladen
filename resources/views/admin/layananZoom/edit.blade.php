@extends('layouts.app')

@section('content')
    <h1>Edit Layanan Zoom</h1>
    <form action="{{ route('admin.layananZoom.update', $layananZoom->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Tambahkan field form sesuai dengan kolom di tabel layanan_zoom -->
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ $layananZoom->name }}">
        </div>
        <!-- Tambahkan field lainnya sesuai kebutuhan -->
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection
