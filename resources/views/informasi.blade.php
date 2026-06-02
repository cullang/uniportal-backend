<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Info Kuliah</title>

  <link rel="stylesheet" href="{{ asset('css/informasi.css') }}">
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
        <a href="{{ route('kalender') }}"><i class="fa-regular fa-calendar-days"></i> Kalender Pribadi</a>
        <a href="{{ route('informasi') }}" class="active"><i class="fa-solid fa-circle-info"></i> Info Kuliah</a>
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

    <!-- ===================== HEADER INFO ===================== -->
    <header class="topbar">
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari info kuliah...">
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

      <!-- ===================== HEADER INFO ===================== -->
      <div class="title-row">
        <div>
          <h1>Info Kuliah</h1>
          <p>Simpan informasi penting dari grup kelas, dosen, organisasi, dan aktivitas kuliah secara manual.</p>
        </div>

        <button class="add-btn">
          <i class="fa-solid fa-plus"></i> Tambah Info
        </button>
      </div>

      <!-- ===================== CARD INFO ===================== -->
      <div class="main-grid">

        <div class="left">

          <div class="highlight-card">
            <span>INFO PENTING</span>
            <h2>Pengumpulan Laporan Praktikum Web Dipercepat</h2>
            <p>
              Berdasarkan informasi dari grup kelas, laporan praktikum Pemrograman Web dikumpulkan
              paling lambat besok pukul 23:59.
            </p>

            <div class="highlight-footer">
              <small><i class="fa-regular fa-clock"></i> Dicatat hari ini</small>
              <a href="{{ route('deadline') }}">Masukkan ke Deadline</a>
            </div>
          </div>

          <div class="filter-row">
            <button class="active">Semua</button>
            <button>Dosen</button>
            <button>Kelas</button>
            <button>Organisasi</button>
            <button>Pribadi</button>
          </div>

          <div class="info-card blue-line">
            <div class="icon blue">
              <i class="fa-solid fa-book"></i>
            </div>

            <div class="info-content">
              <div>
                <span class="tag blue-tag">KELAS</span>
                <small>Hari ini</small>
              </div>

              <h3>Perubahan Ruangan Kuliah Basis Data</h3>
              <p>
                Kuliah Basis Data hari Selasa dipindahkan dari Ruang A-301 ke Lab Komputer 1.
              </p>

              <div class="meta">
                <span><i class="fa-solid fa-location-dot"></i> Lab Komputer 1</span>
                <span><i class="fa-regular fa-calendar"></i> Selasa</span>
              </div>
            </div>
          </div>

          <div class="info-card green-line">
            <div class="icon green">
              <i class="fa-solid fa-user-tie"></i>
            </div>

            <div class="info-content">
              <div>
                <span class="tag green-tag">DOSEN</span>
                <small>Kemarin</small>
              </div>

              <h3>Materi IMK Minggu Ini</h3>
              <p>
                Dosen meminta mahasiswa membaca materi usability testing sebelum pertemuan berikutnya.
              </p>

              <div class="meta">
                <span><i class="fa-regular fa-file-lines"></i> Usability Testing</span>
                <span><i class="fa-regular fa-clock"></i> Sebelum Rabu</span>
              </div>
            </div>
          </div>

          <div class="info-card orange-line">
            <div class="icon orange">
              <i class="fa-solid fa-users"></i>
            </div>

            <div class="info-content">
              <div>
                <span class="tag orange-tag">ORGANISASI</span>
                <small>2 hari lalu</small>
              </div>

              <h3>Rapat Persiapan Kegiatan HMJ</h3>
              <p>
                Rapat koordinasi dilaksanakan hari Jumat pukul 16:00 di sekretariat HMJ.
              </p>

              <div class="meta">
                <span><i class="fa-solid fa-location-dot"></i> Sekretariat HMJ</span>
                <span><i class="fa-regular fa-calendar"></i> Jumat</span>
              </div>
            </div>
          </div>

          <!-- INFO TAMBAHAN ANDA -->
          <div id="infoContainer">
            <p class="empty-message">Belum ada info tambahan</p>
          </div>

        </div>

        <div class="right">

          <div class="side-card reminder-card">
            <h3><i class="fa-regular fa-bell"></i> Info yang Perlu Diingat</h3>

            <div class="reminder-item">
              <small>BESOK</small>
              <h4>Kumpul laporan praktikum</h4>
            </div>

            <div class="reminder-item">
              <small>RABU</small>
              <h4>Baca materi usability testing</h4>
            </div>

            <div class="reminder-item">
              <small>JUMAT</small>
              <h4>Rapat HMJ</h4>
            </div>
          </div>

          <div class="side-card category-card">
            <h3>Kategori Info</h3>

            <p><span class="dot blue"></span> Info Kelas</p>
            <p><span class="dot green"></span> Info Dosen</p>
            <p><span class="dot orange"></span> Organisasi</p>
            <p><span class="dot purple"></span> Pribadi</p>
          </div>

          <div class="side-card quick-card">
            <h3>Aksi Cepat</h3>

            <a href="{{ route('deadline') }}">
              <i class="fa-solid fa-plus"></i> Jadikan Deadline
            </a>

            <a href="{{ route('kalender') }}">
              <i class="fa-regular fa-calendar-days"></i> Tambahkan ke Kalender
            </a>

            <a href="{{ route('catatan') }}">
              <i class="fa-regular fa-file-lines"></i> Simpan ke Catatan
            </a>
          </div>

        </div>

      </div>

    </section>

  </main>

</div>

<div class="modal-overlay" id="modalInfo">
  <div class="modal-box">
    <h2>Tambah Info</h2>

    <label>Judul Info</label>
    <input type="text" id="judulInfo" placeholder="Contoh: Perubahan Jadwal Kuliah">

    <label>Kategori</label>
    <select id="kategoriInfo">
      <option>Kelas</option>
      <option>Dosen</option>
      <option>Organisasi</option>
      <option>Pribadi</option>
    </select>

    <label>Tanggal (Opsional)</label>
    <input type="date" id="tanggalInfo">

    <label>Isi Info</label>
    <textarea id="isiInfo" placeholder="Detail informasi penting..."></textarea>

    <div class="modal-actions">
      <button type="button" id="closeModal">Batal</button>
      <button type="button" id="saveInfo">Simpan</button>
    </div>
  </div>
</div>

</body>
</html>