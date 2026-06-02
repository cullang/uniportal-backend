<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil Mahasiswa</title>

  <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
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
        <a href="{{ route('dashboard') }}">
            <i class="fa-solid fa-border-all"></i> Dashboard
        </a>

        <a href="{{ route('jadwal') }}">
            <i class="fa-regular fa-rectangle-list"></i> Jadwal Kuliah
        </a>

        <a href="{{ route('deadline') }}">
            <i class="fa-regular fa-calendar-xmark"></i> Deadline Tugas
        </a>

        <a href="{{ route('kalender') }}">
            <i class="fa-regular fa-calendar-days"></i> Kalender Pribadi
        </a>

        <a href="{{ route('informasi') }}">
            <i class="fa-solid fa-circle-info"></i> Info Kuliah
        </a>

        <a href="{{ route('catatan') }}">
            <i class="fa-regular fa-file-lines"></i> Catatan Mahasiswa
        </a>
    </nav>
    </div>

    <!-- ===================== BOTTOM MENU ===================== -->
    <div class="bottom-menu">
      <a href="{{ route('settings') }}" class="active"><i class="fa-solid fa-user-gear"></i> Profil Mahasiswa</a>
      <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
  </aside>

  <main class="main">

    <!-- ===================== HEADER PROFIL ===================== -->
    <header class="topbar">
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari pengaturan...">
      </div>

      <div class="profile-top">
        <i class="fa-regular fa-bell"></i>
        <img src="https://i.pravatar.cc/100?img=14" alt="user">
        <div>
          <h4>Ruslan</h4>
          <p>Mahasiswa</p>
        </div>
      </div>
    </header>

    <section class="content">

      <!-- ===================== HEADER PROFIL ===================== -->
      <div class="title-row">
        <div>
          <h1>Profil Mahasiswa</h1>
          <p>Kelola data pribadi, target akademik, dan reminder belajar secara manual.</p>
        </div>

        <button class="save-btn">
          <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
        </button>
      </div>

      <!-- ===================== FORM PROFIL ===================== -->
      <div class="main-grid">

        <div class="left">

          <div class="profile-card">
            <div class="avatar-box">
              <img src="https://i.pravatar.cc/200?img=14" alt="profile">
              <button><i class="fa-solid fa-camera"></i></button>
            </div>

            <h2>Ruslan</h2>
            <p>Mahasiswa Teknik Informatika</p>

            <div class="badges">
              <span>Semester 4</span>
              <span>Aktif</span>
            </div>

            <div class="line"></div>

            <div class="student-info">
              <div>
                <small>NIM</small>
                <h4>210103442</h4>
              </div>

              <div>
                <small>ANGKATAN</small>
                <h4>2024</h4>
              </div>
            </div>
          </div>

          <div class="target-card">
            <h3><i class="fa-solid fa-bullseye"></i> Target Akademik</h3>

            <div class="target-item">
              <span>Target IPK</span>
              <b>3.75</b>
            </div>

            <div class="target-item">
              <span>Target Belajar Harian</span>
              <b>3 Jam</b>
            </div>

            <div class="target-item">
              <span>Target Tugas Mingguan</span>
              <b>5 Tugas</b>
            </div>

            <div class="progress-label">
              <span>Progress Minggu Ini</span>
              <b>70%</b>
            </div>

            <div class="progress-bar">
              <div></div>
            </div>
          </div>

        </div>

        <div class="right">

          <div class="detail-card">
            <h3><i class="fa-regular fa-user"></i> Data Pribadi</h3>

            <div class="form-grid">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" id="nama">
              </div>

              <div class="form-group">
                <label>NIM</label>
                <input type="text" id="nim">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" id="email">
              </div>

              <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" id="noHp">
              </div>

              <div class="form-group">
                <label>Program Studi</label>
                <input type="text" id="prodi">
              </div>

              <div class="form-group">
                <label>Semester</label>
                <select id="semester">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4" selected>4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                </select>
              </div>

              <div class="form-group">
                <label>IPK Saat Ini</label>
                <input type="text" id="ipk">
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea id="alamat" style="resize: vertical;"></textarea>
              </div>

              <div class="form-group">
                <label>Hobi / Minat</label>
                <input type="text" id="hobi">
              </div>

              <div class="form-group">
                <label>Target Akademik</label>
                <textarea id="target" style="resize: vertical;"></textarea>
              </div>

              <div class="form-group">
                <label>Catatan Pribadi</label>
                <textarea id="catatan" style="resize: vertical;"></textarea>
              </div>
            </div>
          </div>

          <div class="settings-grid">

            <div class="reminder-card">
              <h3><i class="fa-regular fa-bell"></i> Reminder Pribadi</h3>

              <div class="toggle-row">
                <span>Reminder Jadwal Kuliah</span>
                <label class="switch">
                  <input type="checkbox" checked>
                  <span></span>
                </label>
              </div>

              <div class="toggle-row">
                <span>Reminder Deadline Tugas</span>
                <label class="switch">
                  <input type="checkbox" checked>
                  <span></span>
                </label>
              </div>

              <div class="toggle-row">
                <span>Reminder Belajar Harian</span>
                <label class="switch">
                  <input type="checkbox">
                  <span></span>
                </label>
              </div>
            </div>

            <div class="theme-card">
              <h3><i class="fa-solid fa-palette"></i> Tampilan</h3>

              <div class="theme-option active">
                <i class="fa-regular fa-sun"></i>
                <span>Mode Terang</span>
              </div>

              <div class="theme-option">
                <i class="fa-regular fa-moon"></i>
                <span>Mode Gelap</span>
              </div>

              <div class="theme-option">
                <i class="fa-solid fa-droplet"></i>
                <span>Warna Biru</span>
              </div>
            </div>

          </div>

          <div class="security-card">
            <div>
              <h3><i class="fa-solid fa-shield-halved"></i> Keamanan Akun</h3>
              <p>Kelola password dan akses akun aplikasi pribadi Anda.</p>
            </div>

            <div class="security-actions">
              <button><i class="fa-solid fa-lock"></i> Ganti Password</button>
              <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
          </div>

        </div>

      </div>

    </section>

  </main>

</div>

</body>
</html>