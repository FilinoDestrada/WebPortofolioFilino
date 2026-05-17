@extends('layouts.app')

@section('title', 'Tentang Saya | Portofolio')
@section('description', 'Halaman About - Kenali lebih jauh siapa saya, latar belakang, dan tujuan saya di dunia web.')

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

    .about-hero { display: flex; align-items: center; gap: 40px; padding-bottom: 40px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 40px; }
    .about-photo { width: 180px; height: 220px; object-fit: cover; border-radius: 16px; border: 3px solid rgba(14, 165, 233, 0.7); box-shadow: 0 10px 30px rgba(14, 165, 233, 0.3); flex-shrink: 0; transition: transform 0.3s ease; }
    .about-photo:hover { transform: scale(1.03); }
    .about-hero-text h1 { font-size: 2rem; font-weight: 800; color: #ffffff; margin-bottom: 8px; }
    .about-hero-text .tagline { font-size: 1rem; color: #7dd3fc; font-weight: 500; margin-bottom: 16px; letter-spacing: 0.5px; }
    .about-hero-text p { color: #cbd5e1; font-size: 0.97rem; line-height: 1.8; }
    .info-badges { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 20px; }
    .badge { display: flex; align-items: center; gap: 8px; background: rgba(14, 165, 233, 0.15); border: 1px solid rgba(14, 165, 233, 0.3); border-radius: 30px; padding: 7px 16px; font-size: 0.85rem; color: #bae6fd; font-weight: 500; }
    .badge span.icon { font-size: 1rem; }
    .skills-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 10px; }
    .skill-item label { display: flex; justify-content: space-between; font-size: 0.9rem; color: #e2e8f0; margin-bottom: 8px; font-weight: 500; }
    .skill-bar-track { width: 100%; height: 8px; background: rgba(255, 255, 255, 0.08); border-radius: 99px; overflow: hidden; }
    .skill-bar-fill { height: 100%; border-radius: 99px; background: linear-gradient(90deg, #0ea5e9, #14b8a6); animation: fillBar 1.2s ease forwards; }
    @keyframes fillBar { from { width: 0%; } }
    .interests-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 10px; }
    .interest-card { background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 14px; padding: 20px 16px; text-align: center; transition: all 0.3s ease; }
    .interest-card:hover { background: rgba(14, 165, 233, 0.15); border-color: rgba(14, 165, 233, 0.4); transform: translateY(-4px); }
    .interest-card .emoji { font-size: 2rem; display: block; margin-bottom: 10px; }
    .interest-card p { color: #cbd5e1; font-size: 0.88rem; margin: 0; }
    .cta-row { display: flex; align-items: center; gap: 16px; margin-top: 20px; flex-wrap: wrap; }
    .cta-row .btn { margin-top: 0; }
    .btn-outline { display: inline-flex; align-items: center; justify-content: center; gap: 8px; border: 2px solid rgba(14, 165, 233, 0.7); color: #7dd3fc; padding: 12px 26px; text-decoration: none; border-radius: 30px; font-weight: 600; font-size: 1rem; transition: all 0.3s ease; }
    .btn-outline:hover { background: rgba(14, 165, 233, 0.2); color: #ffffff; transform: translateY(-2px); }
    .about-section { margin-bottom: 45px; }
</style>
@endpush

@section('content')
    <!-- HERO ABOUT -->
    <section class="about-hero">
        <img src="{{ asset('images/Ino.jpeg') }}" alt="Foto Profil" class="about-photo">
        <div class="about-hero-text">
            <h1>Halo, Saya <span class="text-highlight">Pelajar Web</span> 👋</h1>
            <p class="tagline">Web Developer · Desainer UI · Pelajar Teknologi</p>
            <p>Saya adalah seorang individu yang antusias dan bersemangat dalam mempelajari dunia desain dan pengembangan web. Saat ini saya berfokus pada HTML dan CSS, serta membangun fondasi yang kuat sebelum menjelajahi JavaScript dan framework modern. Saya percaya bahwa memahami dasar dengan baik adalah kunci untuk menjadi developer yang handal.</p>
            <div class="info-badges">
                <div class="badge"><span class="icon">📍</span>Indonesia</div>
                <div class="badge"><span class="icon">🎓</span>Pelajar Aktif</div>
                <div class="badge"><span class="icon">💻</span>Front-end Developer</div>
                <div class="badge"><span class="icon">🌱</span>Terus Belajar</div>
            </div>
        </div>
    </section>

    <!-- KEAHLIAN TEKNIS -->
    <section class="about-section">
        <h2 class="section-title">Keahlian Teknis</h2>
        <div class="skills-grid">
            <div class="skill-item">
                <label><span>HTML5</span><span>90%</span></label>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 90%;"></div></div>
            </div>
            <div class="skill-item">
                <label><span>CSS Murni</span><span>80%</span></label>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 80%;"></div></div>
            </div>
            <div class="skill-item">
                <label><span>Desain Responsif</span><span>70%</span></label>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 70%;"></div></div>
            </div>
            <div class="skill-item">
                <label><span>JavaScript (Belajar)</span><span>40%</span></label>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 40%;"></div></div>
            </div>
            <div class="skill-item">
                <label><span>UI/UX Design</span><span>60%</span></label>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 60%;"></div></div>
            </div>
            <div class="skill-item">
                <label><span>Git & Version Control</span><span>50%</span></label>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 50%;"></div></div>
            </div>
        </div>
    </section>

    <!-- MINAT & HOBI -->
    <section class="about-section">
        <h2 class="section-title">Minat & Hobi</h2>
        <div class="interests-grid">
            <div class="interest-card"><span class="emoji">🎨</span><strong style="color:#e2e8f0;">Desain UI</strong><p>Membuat tampilan yang indah dan intuitif untuk pengguna</p></div>
            <div class="interest-card"><span class="emoji">📸</span><strong style="color:#e2e8f0;">Fotografi</strong><p>Mengabadikan momen dan eksplorasi sudut pandang baru</p></div>
            <div class="interest-card"><span class="emoji">🚀</span><strong style="color:#e2e8f0;">Teknologi</strong><p>Selalu mengikuti perkembangan dunia teknologi terkini</p></div>
            <div class="interest-card"><span class="emoji">📚</span><strong style="color:#e2e8f0;">Belajar</strong><p>Membaca, mengikuti kursus, dan eksplorasi topik baru</p></div>
            <div class="interest-card"><span class="emoji">🎮</span><strong style="color:#e2e8f0;">Gaming</strong><p>Menikmati game sebagai cara berkreasi dan relaksasi</p></div>
            <div class="interest-card"><span class="emoji">🌐</span><strong style="color:#e2e8f0;">Open Source</strong><p>Tertarik berkontribusi pada proyek komunitas global</p></div>
        </div>
    </section>

    <!-- MARI TERHUBUNG -->
    <section class="about-section">
        <h2 class="section-title">Mari Terhubung</h2>
        <p style="color:#cbd5e1; margin-bottom: 20px;">Tertarik untuk berkolaborasi, berdiskusi tentang proyek, atau sekadar menyapa? Saya selalu terbuka untuk koneksi baru!</p>
        <div class="cta-row">
            <a href="{{ route('contact') }}" class="btn">✉️ Kirim Pesan</a>
            <a href="{{ route('home') }}" class="btn-outline">🏠 Kembali ke Home</a>
        </div>
    </section>
@endsection
