// ========== MODAL HANDLING ==========
const addBtn = document.querySelector('.add-btn');
const modal = document.getElementById('modalAgenda');
const closeModalBtn = document.getElementById('closeModal');
const saveAgendaBtn = document.getElementById('saveAgenda');

// Buka modal
addBtn.addEventListener('click', function() {
  modal.classList.add('show');
  resetForm();
});

// Tutup modal
closeModalBtn.addEventListener('click', function() {
  modal.classList.remove('show');
  resetForm();
});

// Tutup modal saat klik overlay
modal.addEventListener('click', function(e) {
  if (e.target === modal) {
    modal.classList.remove('show');
    resetForm();
  }
});

// ========== FORM HANDLING ==========
function resetForm() {
  document.getElementById('judulAgenda').value = '';
  document.getElementById('tanggalAgenda').value = '';
  document.getElementById('kategoriAgenda').value = 'Pribadi';
  document.getElementById('waktuAgenda').value = '';
  document.getElementById('keterangan').value = '';
}

// Simpan agenda
saveAgendaBtn.addEventListener('click', function() {
  const judul = document.getElementById('judulAgenda').value.trim();
  const tanggal = document.getElementById('tanggalAgenda').value;
  const kategori = document.getElementById('kategoriAgenda').value;
  const waktu = document.getElementById('waktuAgenda').value;
  const keterangan = document.getElementById('keterangan').value.trim();

  // Validasi
  if (!judul) {
    alert('Judul Agenda wajib diisi');
    return;
  }
  if (!tanggal) {
    alert('Tanggal wajib diisi');
    return;
  }

  // Buat object agenda
  const agenda = {
    id: Date.now(),
    judul: judul,
    tanggal: tanggal,
    kategori: kategori,
    waktu: waktu,
    keterangan: keterangan,
    createdAt: new Date().toLocaleDateString('id-ID')
  };

  // Simpan ke localStorage
  let dataAgenda = JSON.parse(localStorage.getItem('dataAgenda')) || [];
  dataAgenda.push(agenda);
  localStorage.setItem('dataAgenda', JSON.stringify(dataAgenda));

  // Tutup modal
  modal.classList.remove('show');
  resetForm();

  // Tampilkan agenda baru
  renderAgenda();

  // Notifikasi
  showNotification('Agenda berhasil ditambahkan');
});

// ========== RENDER AGENDA ==========
function renderAgenda() {
  const container = document.getElementById('agendaContainer');
  const dataAgenda = JSON.parse(localStorage.getItem('dataAgenda')) || [];

  // Sort berdasarkan tanggal
  dataAgenda.sort((a, b) => new Date(a.tanggal) - new Date(b.tanggal));

  container.innerHTML = '';

  if (dataAgenda.length === 0) {
    container.innerHTML = '<p class="empty-message">Belum ada agenda</p>';
    return;
  }

  const categoryColors = {
    'Jadwal Kuliah': 'blue-line',
    'Deadline Tugas': 'red-line',
    'Ujian': 'orange-line',
    'Kerja Kelompok': 'green-line',
    'Presentasi': 'purple-line',
    'Pribadi': 'gray-line'
  };

  dataAgenda.forEach((agenda) => {
    const tanggal = new Date(agenda.tanggal);
    const tanggalFormatted = tanggal.toLocaleDateString('id-ID', {
      month: 'short',
      day: 'numeric'
    }).toUpperCase();

    const lineClass = categoryColors[agenda.kategori] || 'gray-line';

    const card = document.createElement('div');
    card.className = `agenda ${lineClass}`;
    card.setAttribute('data-id', agenda.id);

    card.innerHTML = `
      <small>${tanggalFormatted}</small>
      <h4>${agenda.judul}</h4>
      <p>${agenda.kategori}${agenda.waktu ? ' • ' + agenda.waktu : ''}</p>
      ${agenda.keterangan ? `<small class="note">${agenda.keterangan}</small>` : ''}
      <button class="delete-btn" data-id="${agenda.id}"><i class="fa-solid fa-trash"></i></button>
    `;

    container.appendChild(card);

    // Add event listener
    card.querySelector('.delete-btn').addEventListener('click', function() {
      deleteAgenda(agenda.id);
    });
  });
}

// ========== DELETE AGENDA ==========
function deleteAgenda(id) {
  if (confirm('Apakah Anda yakin ingin menghapus agenda ini?')) {
    let dataAgenda = JSON.parse(localStorage.getItem('dataAgenda')) || [];
    dataAgenda = dataAgenda.filter(a => a.id !== id);
    localStorage.setItem('dataAgenda', JSON.stringify(dataAgenda));
    renderAgenda();
    showNotification('Agenda berhasil dihapus');
  }
}

// ========== NOTIFICATION ==========
function showNotification(message) {
  const notification = document.createElement('div');
  notification.className = 'notification';
  notification.textContent = message;
  document.body.appendChild(notification);

  setTimeout(() => {
    notification.classList.add('show');
  }, 10);

  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => {
      notification.remove();
    }, 300);
  }, 3000);
}

// ========== INIT ==========
document.addEventListener('DOMContentLoaded', function() {
  renderAgenda();
});
