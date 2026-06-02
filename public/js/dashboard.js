// ========== DASHBOARD SUMMARY ==========
document.addEventListener('DOMContentLoaded', function() {
  updateDashboardSummary();
  renderDashboardContent();
});

function updateDashboardSummary() {
  // Get data from localStorage
  const dataJadwal = JSON.parse(localStorage.getItem('jadwalKuliahTambahan')) || [];
  const dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];
  const dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];
  const dataAgenda = JSON.parse(localStorage.getItem('dataAgenda')) || [];

  // Hitung jadwal hari ini
  const today = new Date().toLocaleDateString('id-ID', {
    weekday: 'long'
  }).split(',')[0];
  const jadwalHariIni = dataJadwal.filter(j => j.hari === today).length;

  // Hitung deadline dekat (3 hari ke depan)
  const deadlineDekat = dataTugas.filter(t => {
    const deadlineDate = new Date(t.tanggalDeadline);
    const threeDaysFromNow = new Date();
    threeDaysFromNow.setDate(threeDaysFromNow.getDate() + 3);
    return deadlineDate <= threeDaysFromNow && t.status !== 'Selesai';
  }).length;

  // Hitung tugas selesai
  const tugasSelesai = dataTugas.filter(t => t.status === 'Selesai').length;

  // Hitung catatan tersimpan
  const catatanTersimpan = dataCatatan.length;

  // Update stat cards
  const statCards = document.querySelectorAll('.stat-card');
  if (statCards[0]) statCards[0].querySelector('h3').textContent = jadwalHariIni || '0';
  if (statCards[1]) statCards[1].querySelector('h3').textContent = deadlineDekat || '0';
  if (statCards[2]) statCards[2].querySelector('h3').textContent = tugasSelesai || '0';
  if (statCards[3]) statCards[3].querySelector('h3').textContent = catatanTersimpan || '0';
}

function renderDashboardContent() {
  const dataJadwal = JSON.parse(localStorage.getItem('jadwalKuliahTambahan')) || [];
  const dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];
  const dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];
  const dataAgenda = JSON.parse(localStorage.getItem('dataAgenda')) || [];

  // Render Jadwal Hari Ini
  renderJadwalHariIni(dataJadwal);

  // Render Deadline Terdekat
  renderDeadlineTerminal(dataTugas);

  // Render Catatan Cepat
  renderCatatanCepat(dataCatatan);

  // Render Agenda Terdekat
  renderAgendaTerminal(dataAgenda);
}

function renderJadwalHariIni(jadwalList) {
  const section = document.querySelector('[data-section="jadwal-hari-ini"]');
  if (!section) return;

  const today = new Date().toLocaleDateString('id-ID', {
    weekday: 'long'
  }).split(',')[0];

  const jadwalHariIni = jadwalList.filter(j => j.hari === today);

  const container = section.querySelector('div');
  if (!container) return;

  container.innerHTML = '';

  if (jadwalHariIni.length === 0) {
    container.innerHTML = '<p class="empty-state">Tidak ada jadwal hari ini</p>';
    return;
  }

  jadwalHariIni.slice(0, 2).forEach(jadwal => {
    const item = document.createElement('div');
    item.className = 'dashboard-item';
    item.innerHTML = `
      <div class="item-time">${jadwal.jamMulai}</div>
      <div class="item-info">
        <h4>${jadwal.nama}</h4>
        <p>${jadwal.ruangan || 'Belum ditentukan'}</p>
      </div>
    `;
    container.appendChild(item);
  });

  if (jadwalHariIni.length > 2) {
    const more = document.createElement('p');
    more.className = 'more-items';
    more.textContent = `+${jadwalHariIni.length - 2} jadwal lagi`;
    container.appendChild(more);
  }
}

function renderDeadlineTerminal(tugasList) {
  const section = document.querySelector('[data-section="deadline-terdekat"]');
  if (!section) return;

  // Filter deadline yang belum selesai dan sort berdasarkan tanggal
  const deadlineList = tugasList
    .filter(t => t.status !== 'Selesai')
    .sort((a, b) => new Date(a.tanggalDeadline) - new Date(b.tanggalDeadline));

  const container = section.querySelector('div');
  if (!container) return;

  container.innerHTML = '';

  if (deadlineList.length === 0) {
    container.innerHTML = '<p class="empty-state">Tidak ada deadline</p>';
    return;
  }

  deadlineList.slice(0, 2).forEach(tugas => {
    const tanggal = new Date(tugas.tanggalDeadline);
    const tanggalFormatted = tanggal.toLocaleDateString('id-ID', {
      month: 'short',
      day: 'numeric'
    });

    const item = document.createElement('div');
    item.className = `dashboard-item ${tugas.status === 'Proses' ? 'progress' : 'urgent'}`;
    item.innerHTML = `
      <div class="item-badge">${tanggalFormatted}</div>
      <div class="item-info">
        <h4>${tugas.nama}</h4>
        <p>${tugas.mataKuliah || 'Tugas'}</p>
      </div>
    `;
    container.appendChild(item);
  });

  if (deadlineList.length > 2) {
    const more = document.createElement('p');
    more.className = 'more-items';
    more.textContent = `+${deadlineList.length - 2} deadline lagi`;
    container.appendChild(more);
  }
}

function renderCatatanCepat(catatanList) {
  const section = document.querySelector('[data-section="catatan-cepat"]');
  if (!section) return;

  // Sort: penting dulu, terbaru dulu
  const sortedCatatan = catatanList
    .sort((a, b) => {
      if (a.penting !== b.penting) return b.penting - a.penting;
      return new Date(b.createdAt) - new Date(a.createdAt);
    });

  const container = section.querySelector('div');
  if (!container) return;

  container.innerHTML = '';

  if (sortedCatatan.length === 0) {
    container.innerHTML = '<p class="empty-state">Belum ada catatan</p>';
    return;
  }

  sortedCatatan.slice(0, 2).forEach(catatan => {
    const item = document.createElement('div');
    item.className = `dashboard-item ${catatan.penting ? 'important' : ''}`;
    item.innerHTML = `
      <div class="item-icon">${catatan.penting ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-file-lines"></i>'}</div>
      <div class="item-info">
        <h4>${catatan.judul}</h4>
        <p>${catatan.mataKuliah || 'Catatan'}</p>
      </div>
    `;
    container.appendChild(item);
  });

  if (sortedCatatan.length > 2) {
    const more = document.createElement('p');
    more.className = 'more-items';
    more.textContent = `+${sortedCatatan.length - 2} catatan lagi`;
    container.appendChild(more);
  }
}

function renderAgendaTerminal(agendaList) {
  const section = document.querySelector('[data-section="agenda-terdekat"]');
  if (!section) return;

  // Sort berdasarkan tanggal
  const sortedAgenda = agendaList
    .sort((a, b) => new Date(a.tanggal) - new Date(b.tanggal));

  const container = section.querySelector('div');
  if (!container) return;

  container.innerHTML = '';

  if (sortedAgenda.length === 0) {
    container.innerHTML = '<p class="empty-state">Tidak ada agenda</p>';
    return;
  }

  sortedAgenda.slice(0, 2).forEach(agenda => {
    const tanggal = new Date(agenda.tanggal);
    const tanggalFormatted = tanggal.toLocaleDateString('id-ID', {
      month: 'short',
      day: 'numeric'
    });

    const item = document.createElement('div');
    item.className = 'dashboard-item';
    item.innerHTML = `
      <div class="item-badge">${tanggalFormatted}</div>
      <div class="item-info">
        <h4>${agenda.judul}</h4>
        <p>${agenda.kategori}</p>
      </div>
    `;
    container.appendChild(item);
  });

  if (sortedAgenda.length > 2) {
    const more = document.createElement('p');
    more.className = 'more-items';
    more.textContent = `+${sortedAgenda.length - 2} agenda lagi`;
    container.appendChild(more);
  }
}

// ========== PROFIL DISPLAY ==========
function loadProfilDisplay() {
  const profil = JSON.parse(localStorage.getItem('profilMahasiswa')) || {};
  
  const nameElements = document.querySelectorAll('.profile h4');
  nameElements.forEach(el => {
    el.textContent = profil.nama || 'Ruslan';
  });
}

document.addEventListener('DOMContentLoaded', function() {
  loadProfilDisplay();
});
