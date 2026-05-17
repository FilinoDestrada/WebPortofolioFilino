@extends('layouts.admin')

@section('title', 'Tambah Data | Admin')

@push('styles')
<style>
    body { padding-left: 250px; font-family: 'Inter', sans-serif; }
    .form-container { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(10px); padding: 40px; border-radius: 12px; margin-top: 20px; max-width: 700px; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; color: #94a3b8; }
    .form-group input, .form-group textarea { width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: white; font-family: inherit; box-sizing: border-box; }
    .error-text { color: #ef4444; font-size: 0.85rem; margin-top: 5px; }
</style>
@endpush

@section('content')
    <h2>Tambah Proyek (Add)</h2>

    <div class="form-container">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tahun Proyek</label>
                <input type="text" name="year" required placeholder="Contoh: 2026" value="{{ old('year') }}">
                @error('year') <p class="error-text">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label>Judul/Nama Proyek</label>
                <input type="text" name="title" required placeholder="Masukkan nama karya/proyek" value="{{ old('title') }}">
                @error('title') <p class="error-text">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi Proyek</label>
                <textarea name="description" rows="5" required placeholder="Jelaskan detail proyek ini...">{{ old('description') }}</textarea>
                @error('description') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn">Simpan Data</button>
            <a href="{{ route('dashboard') }}" class="btn" style="background: rgba(255,255,255,0.1);">Batal</a>
        </form>
    </div>
@endsection
