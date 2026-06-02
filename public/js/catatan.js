// ========== MODAL HANDLING ==========
const addBtn = document.querySelector('.add-btn');
const modal = document.getElementById('modalCatatan');
const closeModalBtn = document.getElementById('closeModal');
const saveCatatanBtn = document.getElementById('saveCatatan');

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
  document.getElementById('judulCatatan').value = '';
  document.getElementById('mataKuliahCatatan').value = '';
  document.getElementById('isiCatatan').value = '';
  document.getElementById('penting').checked = false;
}

// Simpan catatan
saveCatatanBtn.addEventListener('click', function() {
  const judul = document.getElementById('judulCatatan').value.trim();
  const mataKuliah = document.getElementById('mataKuliahCatatan').value.trim();
  const isi = document.getElementById('isiCatatan').value.trim();
  const penting = document.getElementById('penting').checked;

  // Validasi
  if (!judul) {
    alert('Judul Catatan wajib diisi');
    return;
  }
  if (!isi) {
    alert('Isi Catatan wajib diisi');
    return;
  }

  // Buat object catatan
  const catatan = {
    id: Date.now(),
    judul: judul,
    mataKuliah: mataKuliah,
    isi: isi,
    penting: penting,
    createdAt: new Date().toLocaleDateString('id-ID'),
    updatedAt: new Date().toLocaleDateString('id-ID')
  };

  // Simpan ke localStorage
  let dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];
  dataCatatan.push(catatan);
  localStorage.setItem('dataCatatan', JSON.stringify(dataCatatan));

  // Tutup modal
  modal.classList.remove('show');
  resetForm();

  // Tampilkan catatan baru
  renderCatatan();
  updateStats();

  // Notifikasi
  showNotification('Catatan berhasil ditambahkan');
});

// ========== RENDER CATATAN ==========
function renderCatatan() {
  const container = document.getElementById('catatanContainer');
  const dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];

  container.innerHTML = '';

  if (dataCatatan.length === 0) {
    container.innerHTML = '<p class="empty-message">Belum ada catatan</p>';
    return;
  }

  // Sort: penting dulu
  dataCatatan.sort((a, b) => b.penting - a.penting);

  dataCatatan.forEach((catatan) => {
    const card = document.createElement('div');
    card.className = `note-card ${catatan.penting ? 'important' : ''}`;
    card.setAttribute('data-id', catatan.id);

    card.innerHTML = `
      <div class="note-header">
        <div>
          <h3>${catatan.judul}</h3>
          ${catatan.mataKuliah ? `<span class="category">${catatan.mataKuliah}</span>` : ''}
        </div>
        <button class="important-btn ${catatan.penting ? 'active' : ''}" data-id="${catatan.id}" title="Tandai Penting">
          <i class="fa-solid fa-star"></i>
        </button>
      </div>

      <div class="note-content">
        <p>${catatan.isi}</p>
      </div>

      <div class="note-footer">
        <small>${catatan.createdAt}</small>
        <button class="delete-btn" data-id="${catatan.id}"><i class="fa-solid fa-trash"></i></button>
      </div>
    `;

    container.appendChild(card);

    // Add event listeners
    card.querySelector('.important-btn').addEventListener('click', function() {
      togglePenting(catatan.id);
    });

    card.querySelector('.delete-btn').addEventListener('click', function() {
      deleteCatatan(catatan.id);
    });
  });
}

// ========== TOGGLE PENTING ==========
function togglePenting(id) {
  let dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];
  dataCatatan = dataCatatan.map(c => {
    if (c.id === id) {
      c.penting = !c.penting;
    }
    return c;
  });
  localStorage.setItem('dataCatatan', JSON.stringify(dataCatatan));
  renderCatatan();
  updateStats();
  showNotification(dataCatatan.find(c => c.id === id).penting ? 'Catatan ditandai penting' : 'Catatan tidak lagi penting');
}

// ========== DELETE CATATAN ==========
function deleteCatatan(id) {
  if (confirm('Apakah Anda yakin ingin menghapus catatan ini?')) {
    let dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];
    dataCatatan = dataCatatan.filter(c => c.id !== id);
    localStorage.setItem('dataCatatan', JSON.stringify(dataCatatan));
    renderCatatan();
    updateStats();
    showNotification('Catatan berhasil dihapus');
  }
}

// ========== UPDATE STATS ==========
function updateStats() {
  const dataCatatan = JSON.parse(localStorage.getItem('dataCatatan')) || [];
  
  const total = dataCatatan.length;
  const penting = dataCatatan.filter(c => c.penting).length;
  const mataKuliahSet = new Set(dataCatatan.map(c => c.mataKuliah).filter(mk => mk));
  const mataKuliah = mataKuliahSet.size;
  const updateHariIni = dataCatatan.filter(c => {
    const today = new Date().toLocaleDateString('id-ID');
    return c.createdAt === today;
  }).length;

  // Update stat cards
  const statCards = document.querySelectorAll('.stat-card');
  if (statCards[0]) statCards[0].querySelector('h3').textContent = total;
  if (statCards[1]) statCards[1].querySelector('h3').textContent = penting;
  if (statCards[2]) statCards[2].querySelector('h3').textContent = mataKuliah;
  if (statCards[3]) statCards[3].querySelector('h3').textContent = updateHariIni;
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
  renderCatatan();
  updateStats();
});
