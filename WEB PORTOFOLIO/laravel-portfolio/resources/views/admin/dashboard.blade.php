@extends('layouts.admin')

@section('title', 'Dashboard | Admin Panel')

@push('styles')
<style>
    body { padding-left: 250px; font-family: 'Inter', sans-serif; }
    .btn-small { padding: 8px 12px; border-radius: 6px; text-decoration: none; color: white; display: inline-block; font-size: 0.85rem; margin: 2px; font-weight: 500; transition: opacity 0.3s; }
    .btn-small:hover { opacity: 0.8; }
    .btn-view { background-color: #3b82f6; }
    .btn-edit { background-color: #f59e0b; }
    .btn-delete { background-color: #ef4444; }
    .table-admin { width: 100%; border-collapse: collapse; margin-top: 30px; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(10px); border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2); color: #e2e8f0; }
    .table-admin th, .table-admin td { padding: 16px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.05); }
    .table-admin th { background: rgba(15, 23, 42, 0.9); color: #0ea5e9; font-weight: 600; }
    .table-admin tr:hover { background: rgba(255,255,255,0.02); }
    .header-dash { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
</style>
@endpush

@section('content')
    <div class="header-dash">
        <h2>Manajemen Data Proyek (Portofolio)</h2>
        <a href="{{ route('projects.create') }}" class="btn">➕ Tambah Data (Add)</a>
    </div>

    <table class="table-admin">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tahun</th>
                <th width="40%">Nama Proyek</th>
                <th width="40%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $project->year }}</td>
                <td style="font-weight: 500;">{{ $project->title }}</td>
                <td>
                    <a href="{{ route('projects.show', $project) }}" class="btn-small btn-view">👀 View</a>
                    <a href="{{ route('projects.edit', $project) }}" class="btn-small btn-edit">✏️ Edit</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-small btn-delete" style="border: none; cursor: pointer; font-family: inherit;">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center; padding: 30px; color: #94a3b8;">
                    Data proyek masih kosong. Silahkan tambah data.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
