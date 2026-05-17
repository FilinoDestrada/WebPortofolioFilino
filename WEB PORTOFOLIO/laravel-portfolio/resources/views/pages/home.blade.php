@extends('layouts.app')

@section('title', 'Portofolio Pribadi | Beranda')

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
</style>
@endpush

@section('content')
    <section class="hero-section" style="text-align: center; padding: 60px 20px;">
        <img src="{{ asset('images/Ino.jpeg') }}" class="profile-img" alt="Foto Profil Filino">

        <h1>Halo, Saya <span class="text-highlight">Filino</span></h1>
        <p>Saya adalah seorang individu yang antusias mempelajari desain web, khususnya HTML dan CSS.
            Selamat datang di halaman portofolio saya yang sederhana ini.</p>
        <a href="{{ route('portfolio') }}" class="btn">Lihat Portfolio</a>
    </section>

    <section class="content-section" id="about">
        <h2 class="section-title">Keahlian Saya</h2>
        <p>Berikut adalah beberapa bahasa dan alat yang sedang saya pelajari:</p>

        <ul class="skills-list">
            <li>Pemahaman kerangka dokumen dengan HTML</li>
            <li>Desain visual dan layout menggunakan CSS</li>
            <li>Pembuatan navigasi horizontal</li>
            <li>Penulisan kode yang rapi, semantik, dan mudah dibaca</li>
        </ul>
    </section>

    <section class="content-section" id="portfolio">
        <h2 class="section-title">Pengalaman & Proyek</h2>
        <p>Di bawah ini adalah rekam jejak atau proyek sederhana yang pernah saya kerjakan saat belajar:</p>

        <table class="experience-table">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Nama Proyek</th>
                    <th>Deskripsi Proyek</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2025</td>
                    <td>Website Skillzone</td>
                    <td>Membuat website untuk platform saling bertukar skill</td>
                </tr>
                <tr>
                    <td>2026</td>
                    <td>Desain Portofolio</td>
                    <td>Membuat layout halaman ini tanpa menggunakan Bootstrap maupun Tailwind.</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
