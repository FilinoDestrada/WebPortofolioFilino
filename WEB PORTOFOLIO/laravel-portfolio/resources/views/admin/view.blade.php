@extends('layouts.admin')

@section('title', 'View Data | Admin')

@push('styles')
<style>
    body { padding-left: 250px; font-family: 'Inter', sans-serif; }
    .view-container { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(10px); padding: 40px; border-radius: 12px; margin-top: 20px; max-width: 700px; }
    .view-item { margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 15px; }
    .view-item label { display: block; margin-bottom: 8px; color: #94a3b8; font-size: 0.9rem; text-transform: uppercase; }
    .view-item .value { font-size: 1.2rem; color: #fff; }
</style>
@endpush

@section('content')
    <h2>Detail Proyek (View)</h2>

    <div class="view-container">
        <div class="view-item">
            <label>ID Data di Database</label>
            <div class="value">#{{ $project->id }}</div>
        </div>
        <div class="view-item">
            <label>Tahun Proyek</label>
            <div class="value">{{ $project->year }}</div>
        </div>
        <div class="view-item">
            <label>Judul/Nama Proyek</label>
            <div class="value" style="color: #0ea5e9; font-weight: bold;">{{ $project->title }}</div>
        </div>
        <div class="view-item" style="border:none;">
            <label>Deskripsi Proyek</label>
            <div class="value" style="font-size: 1rem; line-height: 1.6; background: rgba(0,0,0,0.2); padding: 15px; border-radius: 8px;">
                {!! nl2br(e($project->description)) !!}
            </div>
        </div>

        <div style="margin-top:30px;">
            <a href="{{ route('dashboard') }}" class="btn">⬅ Kembali ke Dashboard</a>
        </div>
    </div>
@endsection
