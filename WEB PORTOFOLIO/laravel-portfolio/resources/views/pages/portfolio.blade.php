@extends('layouts.app')

@section('title', 'Portfolio | Hasil Karya')
@section('description', 'Halaman Portfolio - Koleksi hasil karya dan proyek web sederhana saya.')

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
    .portfolio-header { text-align: center; margin-bottom: 50px; }
    .portfolio-header h1 { font-size: 2.2rem; font-weight: 800; color: #ffffff; margin-bottom: 15px; }
    .portfolio-header p { color: #cbd5e1; font-size: 1rem; max-width: 600px; margin: 0 auto; line-height: 1.6; }
    .portfolio-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px; }
    .project-card { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px; overflow: hidden; transition: all 0.4s ease; display: flex; flex-direction: column; }
    .project-card:hover { transform: translateY(-8px); background: rgba(14, 165, 233, 0.1); border-color: rgba(14, 165, 233, 0.4); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3); }
    .project-img-container { width: 100%; height: 180px; background: rgba(15, 23, 42, 0.6); display: flex; align-items: center; justify-content: center; border-bottom: 1px solid rgba(255, 255, 255, 0.05); position: relative; overflow: hidden; }
    .project-img-container span.placeholder-icon { font-size: 4rem; opacity: 0.8; transition: transform 0.4s ease; }
    .project-card:hover .project-img-container span.placeholder-icon { transform: scale(1.1); }
    .project-content { padding: 24px; flex-grow: 1; display: flex; flex-direction: column; }
    .project-title { color: #ffffff; font-size: 1.25rem; font-weight: 700; margin-bottom: 10px; }
    .project-desc { color: #94a3b8; font-size: 0.9rem; line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }
    .project-tags { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px; }
    .project-tags span { background: rgba(255, 255, 255, 0.08); color: #cbd5e1; font-size: 0.75rem; padding: 4px 10px; border-radius: 4px; font-weight: 500; }
    .project-card:hover .project-tags span { background: rgba(14, 165, 233, 0.2); color: #e0f2fe; }
</style>
@endpush

@section('content')
    <section class="portfolio-header">
        <h1><span class="text-highlight">Proyek</span> & Karya</h1>
        <p>Eksplorasi sederhana langkah awal saya di dunia web. Fokus pada fundamental yang rapi dan logis.</p>
    </section>

    <section class="portfolio-grid">
        <article class="project-card">
            <div class="project-img-container"><span class="placeholder-icon">🎨</span></div>
            <div class="project-content">
                <h3 class="project-title">Desain Portofolio Murni</h3>
                <p class="project-desc">Membuat layout portofolio pribadi modern berorientasi tampilan premium menggunakan teknik Glassmorphism murni dengan HTML & CSS.</p>
                <div class="project-tags"><span>HTML5</span><span>CSS Murni</span><span>UI/UX</span></div>
            </div>
        </article>

        <article class="project-card">
            <div class="project-img-container"><span class="placeholder-icon">📰</span></div>
            <div class="project-content">
                <h3 class="project-title">Tugas HTML Dasar Blog</h3>
                <p class="project-desc">Membuat kerangka artikel blog sederhana yang mementingkan struktur pemosisian semantic tag yang rapi agar kode mudah dicerna.</p>
                <div class="project-tags"><span>HTML Semantic</span><span>Content Layout</span></div>
            </div>
        </article>

        <article class="project-card">
            <div class="project-img-container"><span class="placeholder-icon">🚀</span></div>
            <div class="project-content">
                <h3 class="project-title">Landing Page Edukasi</h3>
                <p class="project-desc">Eksplorasi dan latihan membuat laman tunggal (landing page) sederhana untuk mendalami mekanisme tata letak Flexbox dan penempatan elemen responsif.</p>
                <div class="project-tags"><span>Flexbox Layout</span><span>CSS Design</span></div>
            </div>
        </article>
    </section>
@endsection
