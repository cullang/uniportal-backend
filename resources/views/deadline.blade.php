<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Deadline Tugas</title>

  <link rel="stylesheet" href="{{ asset('css/deadline.css') }}">
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
        <a href="{{ route('deadline') }}" class="active"><i class="fa-regular fa-calendar-xmark"></i> Deadline Tugas</a>
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

    <!-- ===================== HEADER DEADLINE ===================== -->
    <header class="topbar">
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari tugas atau mata kuliah...">
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

      <!-- ===================== HEADER DEADLINE ===================== -->
      <div class="title-row">
        <div>
          <h1>Deadline Tugas</h1>
          <p>Kelola daftar tugas kuliah yang kamu input secara manual.</p>
        </div>

        <button class="add-btn">
          <i class="fa-solid fa-plus"></i> Tambah Tugas
        </button>
      </div>

      <!-- ===================== STATISTIK CARD ===================== -->
      <div class="stats-grid">
        <div class="stat-card red">
          <i class="fa-regular fa-clock"></i>
          <div>
            <h3>2</h3>
            <p>Deadline Dekat</p>
          </div>
        </div>

        <div class="stat-card yellow">
          <i class="fa-solid fa-spinner"></i>
          <div>
            <h3>4</h3>
            <p>Sedang Dikerjakan</p>
          </div>
        </div>

        <div class="stat-card green">
          <i class="fa-regular fa-circle-check"></i>
          <div>
            <h3>6</h3>
            <p>Tugas Selesai</p>
          </div>
        </div>

        <div class="stat-card blue">
          <i class="fa-regular fa-clipboard"></i>
          <div>
            <h3>12</h3>
            <p>Total Tugas</p>
          </div>
        </div>
      </div>

      <!-- ===================== FILTER DEADLINE ===================== -->
      <div class="filter-row">
        <button class="active">Semua</button>
        <button>Belum</button>
        <button>Proses</button>
        <button>Selesai</button>

        <select>
          <option>Semua Mata Kuliah</option>
          <option>Pemrograman Web</option>
          <option>Basis Data</option>
          <option>IMK</option>
        </select>
      </div>

      <!-- ===================== CARD DEADLINE ===================== -->
      <div class="main-grid">

        <div class="left">

          <div class="task-card urgent">
            <div class="task-main">
              <span class="tag red-tag">DEADLINE DEKAT</span>
              <h3>Laporan Praktikum Pemrograman Web</h3>
              <p>
                Membuat laporan hasil praktikum CRUD Laravel dan screenshot hasil pengujian.
              </p>

              <div class="task-meta">
                <span><i class="fa-solid fa-book"></i> Pemrograman Web</span>
                <span><i class="fa-regular fa-calendar"></i> Besok, 23:59</span>
              </div>
            </div>

            <div class="task-action">
              <span class="status belum">Belum</span>
              <button>Tandai Selesai</button>
            </div>
          </div>

          <div class="task-card process-line">
            <div class="task-main">
              <span class="tag yellow-tag">PROSES</span>
              <h3>Normalisasi Database Rental</h3>
              <p>
                Menyusun tabel database dari bentuk tidak normal sampai 3NF.
              </p>

              <div class="task-meta">
                <span><i class="fa-solid fa-book"></i> Basis Data Lanjut</span>
                <span><i class="fa-regular fa-calendar"></i> Jumat, 20:00</span>
              </div>
            </div>

            <div class="task-action">
              <span class="status proses">Proses</span>
              <button>Tandai Selesai</button>
            </div>
          </div>

          <div class="task-card normal-line">
            <div class="task-main">
              <span class="tag blue-tag">MINGGU INI</span>
              <h3>Analisis Tampilan Aplikasi Mobile</h3>
              <p>
                Membuat analisis UI/UX aplikasi berdasarkan prinsip usability dan accessibility.
              </p>

              <div class="task-meta">
                <span><i class="fa-solid fa-book"></i> Interaksi Manusia dan Komputer</span>
                <span><i class="fa-regular fa-calendar"></i> Minggu, 21:00</span>
              </div>
            </div>

            <div class="task-action">
              <span class="status belum">Belum</span>
              <button>Tandai Selesai</button>
            </div>
          </div>

          <div class="task-card done-line done-card">
            <div class="task-main">
              <span class="tag green-tag">SELESAI</span>
              <h3>Rangkuman Materi Jaringan Komputer</h3>
              <p>
                Membuat ringkasan materi subnetting dan konfigurasi dasar jaringan.
              </p>

              <div class="task-meta">
                <span><i class="fa-solid fa-book"></i> Jaringan Komputer</span>
                <span><i class="fa-regular fa-circle-check"></i> Sudah selesai</span>
              </div>
            </div>

            <div class="task-action">
              <span class="status selesai">Selesai</span>
              <button class="outline">Lihat</button>
            </div>
          </div>

          <!-- TUGAS TAMBAHAN ANDA -->
          <div id="tugasContainer">
            <p class="empty-message">Belum ada tugas tambahan</p>
          </div>

        </div>

        <div class="right">

          <div class="side-card reminder-card">
            <h3><i class="fa-regular fa-bell"></i> Pengingat Pribadi</h3>
            <p>Jangan lupa menyelesaikan tugas yang deadline-nya paling dekat terlebih dahulu.</p>

            <div class="reminder-box">
              <small>PALING DEKAT</small>
              <h4>Laporan Praktikum Web</h4>
              <p>Besok, 23:59</p>
            </div>
          </div>

          <div class="side-card progress-card">
            <h3><i class="fa-solid fa-chart-simple"></i> Progress Tugas</h3>

            <div class="progress-row">
              <span>Selesai</span>
              <b>60%</b>
            </div>

            <div class="progress-bar">
              <div></div>
            </div>

            <p>6 dari 10 tugas aktif sudah diselesaikan.</p>
          </div>

          <div class="side-card quick-card">
            <h3>Aksi Cepat</h3>

            <a href="{{ route('jadwal') }}">
              <i class="fa-regular fa-calendar"></i> Lihat Jadwal Kuliah
            </a>

            <a href="{{ route('catatan') }}">
              <i class="fa-regular fa-file-lines"></i> Buat Catatan Tugas
            </a>

            <a href="{{ route('kalender') }}">
              <i class="fa-regular fa-calendar-days"></i> Masukkan ke Kalender
            </a>
          </div>

        </div>

      </div>

    </section>

  </main>

</div>

<div class="modal-overlay" id="modalTugas">
  <div class="modal-box">
    <h2>Tambah Tugas</h2>

    <label>Nama Tugas</label>
    <input type="text" id="namaTugas" placeholder="Contoh: Laporan Praktikum Web">

    <label>Mata Kuliah</label>
    <input type="text" id="mataKuliah" placeholder="Contoh: Pemrograman Web">

    <label>Tanggal Deadline</label>
    <input type="date" id="tanggalDeadline">

    <label>Status</label>
    <select id="status">
      <option>Belum</option>
      <option>Proses</option>
      <option>Selesai</option>
    </select>

    <label>Keterangan</label>
    <textarea id="keterangan" placeholder="Deskripsi tugas atau catatan penting..."></textarea>

    <div class="modal-actions">
      <button type="button" id="closeModal">Batal</button>
      <button type="button" id="saveTugas">Simpan</button>
    </div>
  </div>
</div>


<script src="{{ asset('js/deadline.js') }}"></script>
</body>
</html>