<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard UniPortal</title>

  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="dashboard">

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar">
    <div>
      <!-- ===================== LOGO SIDEBAR ===================== -->
      <div class="logo">
        <h2>UniPortal</h2>
        <p>Personal Study Planner</p>
      </div>

      <!-- ===================== MENU NAVIGASI ===================== -->
      <nav class="menu">
        <a href="{{ route('dashboard') }}" class="active"><i class="fa-solid fa-border-all"></i> Dashboard</a>
        <a href="{{ route('jadwal') }}"><i class="fa-regular fa-rectangle-list"></i> Jadwal Kuliah</a>
        <a href="{{ route('deadline') }}"><i class="fa-regular fa-calendar-xmark"></i> Deadline Tugas</a>
        <a href="{{ route('kalender') }}"><i class="fa-regular fa-calendar-days"></i> Kalender Pribadi</a>
        <a href="{{ route('informasi') }}"><i class="fa-solid fa-circle-info"></i> Info Kuliah</a>
        <a href="{{ route('catatan') }}"><i class="fa-regular fa-file-lines"></i> Catatan Mahasiswa</a>
      </nav>
    </div>

    <!-- ===================== BOTTOM MENU ===================== -->
    <div class="bottom-menu">
      <a href="{{ route('settings') }}"><i class="fa-solid fa-user-gear"></i> Profil Mahasiswa</a>
      <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
  </aside>

  <main class="main">

    <!-- ===================== HEADER DASHBOARD ===================== -->
    <header class="topbar">
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari jadwal, tugas, atau catatan...">
      </div>

      <div class="profile">
        <i class="fa-regular fa-bell"></i>
        <img src="https://i.pravatar.cc/100?img=12" alt="user">
        <div>
          <h4>Ruslan</h4>
          <p>Mahasiswa</p>
        </div>
      </div>
    </header>

    <section class="content">

      <!-- ===================== WELCOME SECTION ===================== -->
      <div class="welcome-card">
        <div>
          <h1>Selamat Datang, Ruslan 👋</h1>
          <p>Ini adalah dashboard pribadi untuk mengatur jadwal kuliah, deadline tugas, dan catatan belajar secara manual.</p>
        </div>

        <div class="date-box">
          <h3>Hari Ini</h3>
          <p>Senin, 20 Mei 2026</p>
        </div>
      </div>

      <!-- ===================== STATISTIK CARD ===================== -->
      <div class="stats-grid">
        <div class="stat-card blue">
          <i class="fa-regular fa-calendar"></i>
          <div>
            <h3>3</h3>
            <p>Jadwal Hari Ini</p>
          </div>
        </div>

        <div class="stat-card red">
          <i class="fa-regular fa-clock"></i>
          <div>
            <h3>2</h3>
            <p>Deadline Dekat</p>
          </div>
        </div>

        <div class="stat-card green">
          <i class="fa-regular fa-circle-check"></i>
          <div>
            <h3>6</h3>
            <p>Tugas Selesai</p>
          </div>
        </div>

        <div class="stat-card yellow">
          <i class="fa-regular fa-file-lines"></i>
          <div>
            <h3>8</h3>
            <p>Catatan Tersimpan</p>
          </div>
        </div>
      </div>

      <!-- ===================== QUICK ACTION ===================== -->
      <div class="quick-actions">
        <a href="{{ route('jadwal') }}"><i class="fa-solid fa-plus"></i> Tambah Jadwal</a>
        <a href="{{ route('deadline') }}"><i class="fa-solid fa-plus"></i> Tambah Deadline</a>
        <a href="{{ route('catatan') }}"><i class="fa-solid fa-plus"></i> Tambah Catatan</a>
        <a href="{{ route('kalender') }}"><i class="fa-regular fa-calendar-days"></i> Buka Kalender</a>
      </div>

      <!-- ===================== RINGKASAN DATA ===================== -->
      <div class="main-grid">

        <div class="left">

          <div class="card" data-section="jadwal-hari-ini">
            <div class="card-title">
              <h3><i class="fa-regular fa-calendar"></i> Jadwal Kuliah Hari Ini</h3>
              <a href="{{ route('jadwal') }}">Lihat Semua</a>
            </div>

            <div>
              <p class="empty-state">Tidak ada jadwal hari ini</p>
            </div>
          </div>

          <div class="card" data-section="deadline-terdekat">
            <div class="card-title">
              <h3><i class="fa-regular fa-clipboard"></i> Deadline Terdekat</h3>
              <a href="{{ route('deadline') }}">Lihat Semua</a>
            </div>

            <div>
              <p class="empty-state">Tidak ada deadline</p>
            </div>
          </div>

        </div>

        <div class="right">

          <div class="card" data-section="catatan-cepat">
            <h3><i class="fa-regular fa-note-sticky"></i> Catatan Penting</h3>

            <div>
              <p class="empty-state">Belum ada catatan penting</p>
            </div>
          </div>

          <div class="card" data-section="agenda-terdekat">
            <h3><i class="fa-regular fa-calendar-days"></i> Agenda Terdekat</h3>

            <div>
              <p class="empty-state">Tidak ada agenda</p>
            </div>
          </div>

      </div>

    </section>

  </main>

</div>

<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>