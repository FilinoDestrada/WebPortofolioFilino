@extends('layouts.app')

@section('title', 'Kontak | Berhubungan')
@section('description', 'Halaman Kontak - Hubungi saya untuk kolaborasi atau pertanyaan.')

@push('styles')
<style>
    body {
        font-family: 'Inter', 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        padding-left: 250px;
        background-image: url('{{ asset('images/BackgroundIno.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .contact-container { display: flex; gap: 40px; margin-top: 20px; }
    .contact-info { flex: 1; padding-right: 20px; }
    .contact-info h1 { font-size: 2.2rem; font-weight: 800; color: #ffffff; margin-bottom: 20px; }
    .contact-info p { color: #cbd5e1; line-height: 1.8; margin-bottom: 30px; }
    .info-card { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 20px; margin-bottom: 15px; display: flex; align-items: center; gap: 15px; transition: all 0.3s ease; }
    .info-card:hover { background: rgba(14, 165, 233, 0.1); border-color: rgba(14, 165, 233, 0.4); transform: translateX(5px); }
    .info-icon { font-size: 1.5rem; background: rgba(14, 165, 233, 0.2); width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; border-radius: 50%; color: #e0f2fe; flex-shrink: 0; }
    .info-details h3 { margin: 0; color: #ffffff; font-size: 1rem; font-weight: 600; margin-bottom: 4px; }
    .info-details p { margin: 0; color: #94a3b8; font-size: 0.9rem; }
    .contact-form-wrapper { flex: 1.2; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 40px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3); }
    .contact-form-wrapper h2 { color: #ffffff; font-size: 1.5rem; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; color: #cbd5e1; margin-bottom: 8px; font-size: 0.9rem; font-weight: 500; }
    .form-control { width: 100%; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.2); color: #ffffff; padding: 14px 16px; border-radius: 8px; font-family: inherit; font-size: 1rem; transition: all 0.3s ease; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: #0ea5e9; background: rgba(255, 255, 255, 0.1); box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2); }
    textarea.form-control { resize: vertical; min-height: 120px; }
    .submit-btn { width: 100%; display: flex; justify-content: center; align-items: center; gap: 10px; background: linear-gradient(135deg, #0ea5e9, #0284c7); color: #ffffff; padding: 16px; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(14, 165, 233, 0.4); }
    .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(14, 165, 233, 0.6); }
    .error-text { color: #ef4444; font-size: 0.85rem; margin-top: 5px; }
    @media (max-width: 900px) { .contact-container { flex-direction: column; } }
</style>
@endpush

@section('content')
    <div class="contact-container" style="max-width: 950px;">

        <!-- INFORMASI KIRI -->
        <div class="contact-info">
            <h1>Hubungi <span class="text-highlight">Saya</span></h1>
            <p>Silakan sapa saya! Saya sedang mencari peluang proyek, kolaborasi ide web, dan hal-hal seru soal programming. Anda bisa menggunakan wujud isian ini atau kontak langsung.</p>

            <div class="info-card">
                <div class="info-icon">📧</div>
                <div class="info-details"><h3>Email</h3><p>filinomdh.em@gmail.com</p></div>
            </div>
            <div class="info-card">
                <div class="info-icon">📍</div>
                <div class="info-details"><h3>Lokasi</h3><p>Cikarang, Indonesia</p></div>
            </div>
            <div class="info-card">
                <div class="info-icon">📱</div>
                <div class="info-details"><h3>Sosial Media</h3><p>@filinomdh</p></div>
            </div>
        </div>

        <!-- FORMULIR KANAN -->
        <div class="contact-form-wrapper">
            <h2>Kirim Pesan Baru</h2>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Tuliskan nama Anda" value="{{ old('name') }}" required>
                    @error('name') <p class="error-text">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
                    @error('email') <p class="error-text">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="message">Pesan Anda</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Tuliskan pertanyaan atau pesan di sini..." required>{{ old('message') }}</textarea>
                    @error('message') <p class="error-text">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="submit-btn">
                    <span>Kirim Sekarang</span> 🚀
                </button>
            </form>
        </div>

    </div>
@endsection
