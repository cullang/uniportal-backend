<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jadwal Kuliah</title>

  <link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">
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
        <a href="{{ route('jadwal') }}" class="active"><i class="fa-regular fa-rectangle-list"></i> Jadwal Kuliah</a>
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

    <!-- ===================== HEADER JADWAL ===================== -->
    <header class="topbar">

      <div class="search-top">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari mata kuliah, ruangan, atau dosen...">
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

      <!-- ===================== HEADER JADWAL ===================== -->
      <div class="title-row">
        <div>
          <h1>Jadwal Kuliah</h1>
          <p>Kelola jadwal kuliah pribadi yang kamu input secara manual.</p>
        </div>

        <button class="add-btn">
          <i class="fa-solid fa-plus"></i> Tambah Jadwal
        </button>
      </div>

      <!-- ===================== SUMMARY CARD ===================== -->
      <div class="summary-grid">
        <div class="summary-card blue">
          <i class="fa-regular fa-calendar"></i>
          <div>
            <h3>3</h3>
            <p>Jadwal Hari Ini</p>
          </div>
        </div>

        <div class="summary-card green">
          <i class="fa-solid fa-book"></i>
          <div>
            <h3>7</h3>
            <p>Total Mata Kuliah</p>
          </div>
        </div>

        <div class="summary-card yellow">
          <i class="fa-solid fa-flask"></i>
          <div>
            <h3>2</h3>
            <p>Praktikum</p>
          </div>
        </div>

        <div class="summary-card red">
          <i class="fa-regular fa-clock"></i>
          <div>
            <h3>1</h3>
            <p>Jadwal Terdekat</p>
          </div>
        </div>
      </div>

      <!-- ===================== FILTER JADWAL ===================== -->
      <div class="filter-row">
        <select>
          <option>Semua Hari</option>
          <option>Senin</option>
          <option>Selasa</option>
          <option>Rabu</option>
          <option>Kamis</option>
          <option>Jumat</option>
        </select>

        <select>
          <option>Semua Tipe</option>
          <option>Teori</option>
          <option>Praktikum</option>
        </select>

        <div class="filter-search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Cari nama mata kuliah...">
        </div>
      </div>

      <!-- ===================== CARD JADWAL ===================== -->
      <div class="main-grid">

        <div class="left">

          <div class="day-section">
            <div class="day-title">
              <span></span>
              <h3>Senin</h3>
            </div>

            <div class="schedule-card blue-line">
              <div class="time-box blue-box">
                <h4>08:00</h4>
                <p>10:30</p>
              </div>

              <div class="schedule-info">
                <span class="badge blue-badge">TEORI</span>
                <h3>Pemrograman Web</h3>
                <p>
                  <i class="fa-regular fa-user"></i> Pak Rahmat, M.Kom
                  <i class="fa-solid fa-location-dot"></i> Lab Komputer 2
                </p>
                <small>Catatan: Bawa laptop dan koneksi internet.</small>
              </div>

              <div class="schedule-action">
                <button class="detail-btn">Detail</button>
                <button class="edit-btn"><i class="fa-solid fa-pen"></i></button>
              </div>
            </div>

            <div class="schedule-card green-line">
              <div class="time-box green-box">
                <h4>13:00</h4>
                <p>15:30</p>
              </div>

              <div class="schedule-info">
                <span class="badge green-badge">PRAKTIKUM</span>
                <h3>Jaringan Komputer</h3>
                <p>
                  <i class="fa-regular fa-user"></i> Bu Andini
                  <i class="fa-solid fa-location-dot"></i> Lab Jaringan
                </p>
                <small>Catatan: Siapkan laporan praktikum minggu lalu.</small>
              </div>

              <div class="schedule-action">
                <button class="detail-btn">Detail</button>
                <button class="edit-btn"><i class="fa-solid fa-pen"></i></button>
              </div>
            </div>
          </div>

          <div class="day-section">
            <div class="day-title gray">
              <span></span>
              <h3>Selasa</h3>
            </div>

            <div class="schedule-card orange-line">
              <div class="time-box orange-box">
                <h4>09:00</h4>
                <p>11:30</p>
              </div>

              <div class="schedule-info">
                <span class="badge orange-badge">TEORI</span>
                <h3>Basis Data Lanjut</h3>
                <p>
                  <i class="fa-regular fa-user"></i> Pak Irfan
                  <i class="fa-solid fa-location-dot"></i> Ruang A-301
                </p>
                <small>Catatan: Review materi normalisasi database.</small>
              </div>

              <div class="schedule-action">
                <button class="detail-btn">Detail</button>
                <button class="edit-btn"><i class="fa-solid fa-pen"></i></button>
              </div>
            </div>
          </div>

          <div class="day-section">
            <div class="day-title purple">
              <span></span>
              <h3>Rabu</h3>
            </div>

            <div class="schedule-card purple-line">
              <div class="time-box purple-box">
                <h4>10:00</h4>
                <p>12:00</p>
              </div>

              <div class="schedule-info">
                <span class="badge purple-badge">TEORI</span>
                <h3>Interaksi Manusia dan Komputer</h3>
                <p>
                  <i class="fa-regular fa-user"></i> Bu Siti
                  <i class="fa-solid fa-location-dot"></i> Ruang D-104
                </p>
                <small>Catatan: Siapkan tugas analisis UI aplikasi.</small>
              </div>

              <div class="schedule-action">
                <button class="detail-btn">Detail</button>
                <button class="edit-btn"><i class="fa-solid fa-pen"></i></button>
              </div>
            </div>
          </div>

          <!-- JADWAL TAMBAHAN ANDA -->
          <div class="day-section">
            <div class="day-title additional">
              <span></span>
              <h3>Jadwal Tambahan Anda</h3>
            </div>
            <div id="jadwalTambahanContainer">
              <p class="empty-message" id="emptyMessage">Belum ada jadwal tambahan</p>
            </div>
          </div>

        </div>

        <div class="right">

          <div class="side-card next-card">
            <h3><i class="fa-regular fa-clock"></i> Jadwal Terdekat</h3>

            <div class="next-box">
              <small>HARI INI • 08:00</small>
              <h4>Pemrograman Web</h4>
              <p>Lab Komputer 2</p>
            </div>

            <p class="note">Pastikan kamu sudah menyiapkan laptop dan file project sebelum kelas dimulai.</p>
          </div>

          <div class="side-card note-card">
            <h3><i class="fa-regular fa-note-sticky"></i> Catatan Jadwal</h3>

            <ul>
              <li>Senin fokus praktikum web</li>
              <li>Selasa review database</li>
              <li>Rabu kumpulkan tugas IMK</li>
            </ul>

            <a href="{{ route('catatan') }}">Buka Catatan</a>
          </div>

          <div class="side-card action-card">
            <h3>Aksi Cepat</h3>

            <a href="{{ route('deadline') }}">
              <i class="fa-solid fa-plus"></i> Tambah Deadline Tugas
            </a>

            <a href="{{ route('kalender') }}">
              <i class="fa-regular fa-calendar-days"></i> Buka Kalender Pribadi
            </a>

            <a href="{{ route('catatan') }}">
              <i class="fa-regular fa-file-lines"></i> Tambah Catatan Kuliah
            </a>
          </div>

        </div>

      </div>

    </section>

  </main>

</div>
<div class="modal-overlay" id="modalJadwal">
  <div class="modal-box">
    <h2>Tambah Jadwal Kuliah</h2>

    <label>Nama Mata Kuliah</label>
    <input type="text" id="namaMatkul" placeholder="Contoh: Pemrograman Web">

    <label>Hari</label>
    <select id="hariMatkul">
      <option>Senin</option>
      <option>Selasa</option>
      <option>Rabu</option>
      <option>Kamis</option>
      <option>Jumat</option>
    </select>

    <label>Jam Mulai</label>
    <input type="time" id="jamMulai">

    <label>Jam Selesai</label>
    <input type="time" id="jamSelesai">

    <label>Tipe Kuliah</label>
    <select id="tipeKuliah">
      <option>Teori</option>
      <option>Praktikum</option>
    </select>

    <label>Ruangan</label>
    <input type="text" id="ruangan" placeholder="Contoh: Lab Komputer 2">

    <label>Dosen</label>
    <input type="text" id="dosen" placeholder="Contoh: Pak Rahmat">

    <div class="modal-actions">
      <button type="button" id="closeModal">Batal</button>
      <button type="button" id="saveJadwal">Simpan</button>
    </div>
  </div>
</div>

<!-- Script -->
<script src="{{ asset('js/jadwal.js') }}"></script>
</body>
</html>