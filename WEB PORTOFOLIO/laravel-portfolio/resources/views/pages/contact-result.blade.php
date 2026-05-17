@extends('layouts.app')

@section('title', 'Hasil Pengiriman | Portofolio')

@push('styles')
<style>
    body {
        font-family: 'Inter', sans-serif;
        padding-left: 250px;
        background-image: url('{{ asset('images/BackgroundIno.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #ffffff;
    }
    .result-container { margin-top: 40px; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 40px; max-width: 700px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3); animation: fadeIn 0.5s ease; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .alert { padding: 20px; border-radius: 12px; margin-bottom: 25px; display: flex; align-items: flex-start; gap: 15px; }
    .alert-icon { font-size: 1.8rem; flex-shrink: 0; }
    .alert-content h2 { margin: 0 0 10px 0; font-size: 1.4rem; }
    .alert-content p { margin: 0; color: #e2e8f0; line-height: 1.5; }
    .alert-success { background: rgba(16, 185, 129, 0.1); border-left: 4px solid #10b981; }
    .alert-success .alert-content h2 { color: #34d399; }
    .data-card { background: rgba(255, 255, 255, 0.05); border-radius: 12px; padding: 25px; margin-top: 20px; }
    .data-card h3 { margin-top: 0; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); color: #0ea5e9; }
    .data-item { margin-bottom: 15px; }
    .data-item label { display: block; color: #94a3b8; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 5px; }
    .data-item .value { font-size: 1.1rem; font-weight: 500; background: rgba(0, 0, 0, 0.2); padding: 12px; border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.05); word-break: break-word; }
    .action-btns { margin-top: 30px; display: flex; gap: 15px; }
    .btn-primary { background: linear-gradient(135deg, #0ea5e9, #0284c7); color: white; box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3); padding: 12px 24px; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(14, 165, 233, 0.5); }
    .btn-secondary { background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid rgba(255, 255, 255, 0.2); padding: 12px 24px; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; }
    .btn-secondary:hover { background: rgba(255, 255, 255, 0.2); transform: translateY(-2px); }
</style>
@endpush

@section('content')
    <div class="result-container">
        @if($success)
            <div class="alert alert-success">
                <div class="alert-icon">✅</div>
                <div class="alert-content">
                    <h2>Berhasil Mengirim Pesan!</h2>
                    <p>Terima kasih <strong>{{ $data->name }}</strong>. Pesan Anda telah dikirim dan disimpan ke database.</p>
                </div>
            </div>

            <div class="data-card">
                <h3>Detail Data Anda</h3>
                <div class="data-item">
                    <label>Nama Lengkap</label>
                    <div class="value">{{ $data->name }}</div>
                </div>
                <div class="data-item">
                    <label>Alamat Email</label>
                    <div class="value">{{ $data->email }}</div>
                </div>
                <div class="data-item">
                    <label>Isi Pesan</label>
                    <div class="value">{!! nl2br(e($data->message)) !!}</div>
                </div>
            </div>

            <div class="action-btns">
                <a href="{{ route('contact') }}" class="btn-primary">⬅ Kirim Pesan Lagi</a>
                <a href="{{ route('home') }}" class="btn-secondary">Kembali ke Beranda</a>
            </div>
        @endif
    </div>
@endsection
