<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catatan Mahasiswa</title>

  <link rel="stylesheet" href="{{ asset('css/catatan.css') }}">
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
        <a href="{{ route('informasi') }}"><i class="fa-solid fa-circle-info"></i> Info Kuliah</a>
        <a href="{{ route('catatan') }}" class="active"><i class="fa-regular fa-file-lines"></i> Catatan Mahasiswa</a>
      </nav>
    </div>

    <!-- ===================== BOTTOM MENU ===================== -->
    <div class="bottom-menu">
      <a href="{{ route('settings') }}"><i class="fa-solid fa-user-gear"></i> Profil Mahasiswa</a>
      <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
  </aside>

  <main class="main">

    <!-- ===================== HEADER CATATAN ===================== -->
    <header class="topbar">
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari catatan kuliah...">
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

      <!-- ===================== HEADER CATATAN ===================== -->
      <div class="title-row">
        <div>
          <h1>Catatan Mahasiswa</h1>
          <p>Simpan ringkasan materi, ide tugas, dan catatan belajar pribadi.</p>
        </div>

        <button class="add-btn">
          <i class="fa-solid fa-plus"></i> Tambah Catatan
        </button>
      </div>

      <!-- ===================== STATISTIK CARD ===================== -->
      <div class="stats-grid">
        <div class="stat-card blue">
          <i class="fa-regular fa-file-lines"></i>
          <div>
            <h3>8</h3>
            <p>Total Catatan</p>
          </div>
        </div>

        <div class="stat-card green">
          <i class="fa-solid fa-star"></i>
          <div>
            <h3>3</h3>
            <p>Catatan Penting</p>
          </div>
        </div>

        <div class="stat-card yellow">
          <i class="fa-solid fa-book"></i>
          <div>
            <h3>5</h3>
            <p>Mata Kuliah</p>
          </div>
        </div>

        <div class="stat-card red">
          <i class="fa-regular fa-clock"></i>
          <div>
            <h3>2</h3>
            <p>Update Hari Ini</p>
          </div>
        </div>
      </div>

      <div class="filter-row">
        <button class="active">Semua</button>
        <button>Penting</button>
        <button>Pemrograman Web</button>
        <button>Basis Data</button>
        <button>IMK</button>
      </div>

      <div class="main-grid">

        <div class="left">

          <div class="featured-card">
            <div>
              <span class="tag blue-tag">CATATAN UTAMA</span>
              <h2>Ringkasan Materi Laravel Routing dan Blade</h2>
              <p>
                Catatan ini berisi penjelasan tentang route, view, asset, blade template,
                serta cara menghubungkan halaman Laravel menggunakan route name.
              </p>

              <div class="featured-meta">
                <span><i class="fa-solid fa-book"></i> Pemrograman Web</span>
                <span><i class="fa-regular fa-clock"></i> Diperbarui hari ini</span>
              </div>
            </div>

            <i class="fa-solid fa-star"></i>
          </div>

          <div class="note-grid">

            <div class="note-card blue-line">
              <div class="note-top">
                <span class="tag blue-tag">WEB</span>
                <i class="fa-solid fa-star active-star"></i>
              </div>

              <h3>CRUD Laravel Dasar</h3>
              <p>
                Langkah membuat create, read, update, dan delete menggunakan controller,
                model, migration, dan route resource.
              </p>

              <div class="note-footer">
                <small>20 Mei 2026</small>
                <div>
                  <i class="fa-solid fa-eye"></i>
                  <i class="fa-solid fa-pen"></i>
                </div>
              </div>
            </div>

            <div class="note-card green-line">
              <div class="note-top">
                <span class="tag green-tag">BASIS DATA</span>
                <i class="fa-regular fa-star"></i>
              </div>

              <h3>Normalisasi Database</h3>
              <p>
                Normalisasi digunakan untuk mengurangi data ganda dan membuat struktur
                tabel menjadi lebih rapi.
              </p>

              <div class="note-footer">
                <small>18 Mei 2026</small>
                <div>
                  <i class="fa-solid fa-eye"></i>
                  <i class="fa-solid fa-pen"></i>
                </div>
              </div>
            </div>

            <div class="note-card orange-line">
              <div class="note-top">
                <span class="tag orange-tag">IMK</span>
                <i class="fa-solid fa-star active-star"></i>
              </div>

              <h3>Prinsip UI/UX</h3>
              <p>
                Tampilan aplikasi harus mudah dipahami, konsisten, responsif, dan nyaman
                digunakan oleh pengguna.
              </p>

              <div class="note-footer">
                <small>15 Mei 2026</small>
                <div>
                  <i class="fa-solid fa-eye"></i>
                  <i class="fa-solid fa-pen"></i>
                </div>
              </div>
            </div>

            <div class="note-card purple-line">
              <div class="note-top">
                <span class="tag purple-tag">JARINGAN</span>
                <i class="fa-regular fa-star"></i>
              </div>

              <h3>Subnetting Dasar</h3>
              <p>
                Subnetting membagi jaringan menjadi beberapa bagian kecil agar pengelolaan
                alamat IP lebih efisien.
              </p>

              <div class="note-footer">
                <small>12 Mei 2026</small>
                <div>
                  <i class="fa-solid fa-eye"></i>
                  <i class="fa-solid fa-pen"></i>
                </div>
              </div>
            </div>

          </div>

          <!-- CATATAN TAMBAHAN ANDA -->
          <div id="catatanContainer">
            <p class="empty-message">Belum ada catatan tambahan</p>
          </div>

        </div>

        <div class="right">

          <div class="side-card quick-note">
            <h3><i class="fa-regular fa-note-sticky"></i> Catatan Cepat</h3>

            <textarea placeholder="Tulis catatan cepat di sini..."></textarea>

            <button>Simpan Catatan</button>
          </div>

          <div class="side-card category-card">
            <h3>Kategori Catatan</h3>

            <p><span class="dot blue"></span> Pemrograman Web <b>3</b></p>
            <p><span class="dot green"></span> Basis Data <b>2</b></p>
            <p><span class="dot orange"></span> IMK <b>1</b></p>
            <p><span class="dot purple"></span> Jaringan <b>2</b></p>
          </div>

          <div class="side-card quick-card">
            <h3>Aksi Cepat</h3>

            <a href="{{ route('deadline') }}">
              <i class="fa-regular fa-calendar-xmark"></i> Buat Deadline dari Catatan
            </a>

            <a href="{{ route('jadwal') }}">
              <i class="fa-regular fa-calendar"></i> Lihat Jadwal Kuliah
            </a>

            <a href="{{ route('kalender') }}">
              <i class="fa-regular fa-calendar-days"></i> Tambah ke Kalender
            </a>
          </div>

        </div>

      </div>

    </section>

  </main>

</div>

<div class="modal-overlay" id="modalCatatan">
  <div class="modal-box">
    <h2>Tambah Catatan</h2>

    <label>Judul Catatan</label>
    <input type="text" id="judulCatatan" placeholder="Contoh: Ringkasan Materi Pemrograman Web">

    <label>Mata Kuliah / Kategori</label>
    <input type="text" id="mataKuliahCatatan" placeholder="Contoh: Pemrograman Web">

    <label>Isi Catatan</label>
    <textarea id="isiCatatan" placeholder="Tulis catatan Anda di sini..."></textarea>

    <label>
      <input type="checkbox" id="penting"> Tandai sebagai Catatan Penting
    </label>

    <div class="modal-actions">
      <button type="button" id="closeModal">Batal</button>
      <button type="button" id="saveCatatan">Simpan</button>
    </div>
  </div>
</div>

</body>
</html>