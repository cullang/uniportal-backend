<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kalender Pribadi</title>

  <link rel="stylesheet" href="{{ asset('css/kalender.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="layout">

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
        <a href="{{ route('dashboard') }}"><i class="fa-solid fa-border-all"></i> Dashboard</a>
        <a href="{{ route('jadwal') }}"><i class="fa-regular fa-rectangle-list"></i> Jadwal Kuliah</a>
        <a href="{{ route('deadline') }}"><i class="fa-regular fa-calendar-xmark"></i> Deadline Tugas</a>
        <a href="{{ route('kalender') }}" class="active"><i class="fa-regular fa-calendar-days"></i> Kalender Pribadi</a>
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

    <!-- ===================== HEADER KALENDER ===================== -->
    <header class="topbar">
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari agenda pribadi...">
      </div>

      <div class="profile">
        <i class="fa-regular fa-bell"></i>
        <div>
          <h4>Ruslan</h4>
          <p>Mahasiswa</p>
        </div>
        <img src="https://i.pravatar.cc/100?img=14" alt="user">
      </div>
    </header>

    <section class="content">

      <!-- ===================== HEADER KALENDER ===================== -->
      <div class="title-row">
        <div>
          <h1>Kalender Pribadi</h1>
          <p>Catat agenda kuliah, UTS, UAS, presentasi, dan kegiatan penting secara manual.</p>
        </div>

        <button class="add-btn">
          <i class="fa-solid fa-plus"></i> Tambah Agenda
        </button>
      </div>

      <!-- ===================== KALENDAR MINI ===================== -->
      <div class="main-grid">

        <div class="calendar-section">

          <!-- ===================== AGENDA LIST ===================== -->
          <div class="month-header">
            <button><i class="fa-solid fa-chevron-left"></i></button>
            <h2>Mei 2026</h2>
            <button><i class="fa-solid fa-chevron-right"></i></button>
          </div>

          <div class="calendar">
            <div class="day-name">Min</div>
            <div class="day-name">Sen</div>
            <div class="day-name">Sel</div>
            <div class="day-name">Rab</div>
            <div class="day-name">Kam</div>
            <div class="day-name">Jum</div>
            <div class="day-name">Sab</div>

            <div class="date muted">26</div>
            <div class="date muted">27</div>
            <div class="date muted">28</div>
            <div class="date muted">29</div>
            <div class="date muted">30</div>
            <div class="date">1</div>
            <div class="date">2</div>

            <div class="date">3</div>
            <div class="date event-blue">4 <span>Kuliah</span></div>
            <div class="date">5</div>
            <div class="date event-red">6 <span>Deadline</span></div>
            <div class="date">7</div>
            <div class="date event-green">8 <span>Kelompok</span></div>
            <div class="date">9</div>

            <div class="date">10</div>
            <div class="date event-orange">11 <span>UTS</span></div>
            <div class="date">12</div>
            <div class="date">13</div>
            <div class="date event-purple">14 <span>Presentasi</span></div>
            <div class="date">15</div>
            <div class="date">16</div>

            <div class="date">17</div>
            <div class="date today">18 <span>Hari Ini</span></div>
            <div class="date">19</div>
            <div class="date event-blue">20 <span>Praktikum</span></div>
            <div class="date">21</div>
            <div class="date event-red">22 <span>Tugas</span></div>
            <div class="date">23</div>

            <div class="date">24</div>
            <div class="date">25</div>
            <div class="date event-green">26 <span>Diskusi</span></div>
            <div class="date">27</div>
            <div class="date event-orange">28 <span>UAS</span></div>
            <div class="date">29</div>
            <div class="date">30</div>
          </div>

        </div>

        <div class="right">

          <div class="side-card">
            <h3><i class="fa-regular fa-calendar-check"></i> Agenda Terdekat</h3>

            <div id="agendaContainer">
              <p class="empty-message">Belum ada agenda</p>
            </div>

          </div>

          <div class="side-card category-card">
            <h3>Kategori Agenda</h3>

            <p><span class="dot blue"></span> Jadwal Kuliah</p>
            <p><span class="dot red"></span> Deadline Tugas</p>
            <p><span class="dot orange"></span> Ujian</p>
            <p><span class="dot green"></span> Kerja Kelompok</p>
            <p><span class="dot purple"></span> Presentasi</p>
          </div>

          <div class="side-card quick-card">
            <h3>Aksi Cepat</h3>

            <a href="{{ route('deadline') }}">
              <i class="fa-solid fa-plus"></i> Tambah Deadline
            </a>

            <a href="{{ route('jadwal') }}">
              <i class="fa-regular fa-calendar"></i> Lihat Jadwal Kuliah
            </a>

            <a href="{{ route('catatan') }}">
              <i class="fa-regular fa-file-lines"></i> Buat Catatan Agenda
            </a>
          </div>

        </div>

      </div>

    </section>

  </main>

</div>

<div class="modal-overlay" id="modalAgenda">
  <div class="modal-box">
    <h2>Tambah Agenda</h2>

    <label>Judul Agenda</label>
    <input type="text" id="judulAgenda" placeholder="Contoh: UTS Pemrograman Web">

    <label>Tanggal</label>
    <input type="date" id="tanggalAgenda">

    <label>Kategori</label>
    <select id="kategoriAgenda">
      <option>Jadwal Kuliah</option>
      <option>Deadline Tugas</option>
      <option>Ujian</option>
      <option>Kerja Kelompok</option>
      <option>Presentasi</option>
      <option>Pribadi</option>
    </select>

    <label>Waktu (Opsional)</label>
    <input type="time" id="waktuAgenda">

    <label>Keterangan</label>
    <textarea id="keterangan" placeholder="Catatan penting..."></textarea>

    <div class="modal-actions">
      <button type="button" id="closeModal">Batal</button>
      <button type="button" id="saveAgenda">Simpan</button>
    </div>
  </div>
</div>

<script src="{{ asset('js/kalender.js') }}"></script>
</body>
</html>