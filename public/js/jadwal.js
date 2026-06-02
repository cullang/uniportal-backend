// ========== MODAL HANDLING ==========
const addBtn = document.querySelector('.add-btn');
const modal = document.getElementById('modalJadwal');
const closeModalBtn = document.getElementById('closeModal');
const saveJadwalBtn = document.getElementById('saveJadwal');

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
  document.getElementById('namaMatkul').value = '';
  document.getElementById('hariMatkul').value = 'Senin';
  document.getElementById('jamMulai').value = '';
  document.getElementById('jamSelesai').value = '';
  document.getElementById('tipeKuliah').value = 'Teori';
  document.getElementById('ruangan').value = '';
  document.getElementById('dosen').value = '';
}

// Simpan jadwal
saveJadwalBtn.addEventListener('click', function() {
  const nama = document.getElementById('namaMatkul').value.trim();
  const hari = document.getElementById('hariMatkul').value;
  const jamMulai = document.getElementById('jamMulai').value;
  const jamSelesai = document.getElementById('jamSelesai').value;
  const tipe = document.getElementById('tipeKuliah').value;
  const ruangan = document.getElementById('ruangan').value.trim();
  const dosen = document.getElementById('dosen').value.trim();

  // Validasi
  if (!nama) {
    alert('Nama Mata Kuliah wajib diisi');
    return;
  }
  if (!jamMulai) {
    alert('Jam Mulai wajib diisi');
    return;
  }
  if (!jamSelesai) {
    alert('Jam Selesai wajib diisi');
    return;
  }

  // Buat object jadwal
  const jadwal = {
    id: Date.now(), // Unique ID berdasarkan timestamp
    nama: nama,
    hari: hari,
    jamMulai: jamMulai,
    jamSelesai: jamSelesai,
    tipe: tipe,
    ruangan: ruangan,
    dosen: dosen
  };

  // Simpan ke localStorage
  let dataJadwal = JSON.parse(localStorage.getItem('jadwalKuliahTambahan')) || [];
  dataJadwal.push(jadwal);
  localStorage.setItem('jadwalKuliahTambahan', JSON.stringify(dataJadwal));

  // Tutup modal
  modal.classList.remove('show');
  resetForm();

  // Tampilkan jadwal baru
  renderJadwalTambahan();

  // Notifikasi
  showNotification('Jadwal berhasil ditambahkan');
});

// ========== RENDER JADWAL TAMBAHAN ==========
function renderJadwalTambahan() {
  const container = document.getElementById('jadwalTambahanContainer');
  const emptyMessage = document.getElementById('emptyMessage');
  
  const dataJadwal = JSON.parse(localStorage.getItem('jadwalKuliahTambahan')) || [];
  
  // Clear container
  container.innerHTML = '';

  if (dataJadwal.length === 0) {
    emptyMessage.style.display = 'block';
    return;
  }

  emptyMessage.style.display = 'none';

  // Tentukan warna untuk badge dan garis
  const colorMap = {
    'Teori': {
      line: 'blue-line',
      box: 'blue-box',
      badge: 'blue-badge'
    },
    'Praktikum': {
      line: 'green-line',
      box: 'green-box',
      badge: 'green-badge'
    }
  };

  const colors = colorMap[dataJadwal[0]?.tipe] || colorMap['Teori'];

  dataJadwal.forEach((jadwal) => {
    // Tentukan warna berdasarkan tipe
    const tipeColor = jadwal.tipe === 'Praktikum' ? colorMap['Praktikum'] : colorMap['Teori'];

    const card = document.createElement('div');
    card.className = `schedule-card ${tipeColor.line}`;
    card.setAttribute('data-id', jadwal.id);

    card.innerHTML = `
      <div class="time-box ${tipeColor.box}">
        <h4>${jadwal.jamMulai}</h4>
        <p>${jadwal.jamSelesai}</p>
      </div>

      <div class="schedule-info">
        <span class="badge ${tipeColor.badge}">${jadwal.tipe.toUpperCase()}</span>
        <h3>${jadwal.nama}</h3>
        <p>
          ${jadwal.dosen ? `<i class="fa-regular fa-user"></i> ${jadwal.dosen}` : ''}
          ${jadwal.ruangan ? `<i class="fa-solid fa-location-dot"></i> ${jadwal.ruangan}` : ''}
        </p>
        <small>Hari: ${jadwal.hari}</small>
      </div>

      <div class="schedule-action">
        <button class="delete-btn" data-id="${jadwal.id}">
          <i class="fa-solid fa-trash"></i>
        </button>
      </div>
    `;

    container.appendChild(card);

    // Add event listener untuk delete button
    card.querySelector('.delete-btn').addEventListener('click', function() {
      deleteJadwal(jadwal.id);
    });
  });
}

// ========== DELETE JADWAL ==========
function deleteJadwal(id) {
  if (confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
    let dataJadwal = JSON.parse(localStorage.getItem('jadwalKuliahTambahan')) || [];
    dataJadwal = dataJadwal.filter(j => j.id !== id);
    localStorage.setItem('jadwalKuliahTambahan', JSON.stringify(dataJadwal));
    
    renderJadwalTambahan();
    showNotification('Jadwal berhasil dihapus');
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
// Render jadwal saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
  renderJadwalTambahan();
});