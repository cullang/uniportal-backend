// ========== MODAL HANDLING ==========
const addBtn = document.querySelector('.add-btn');
const modal = document.getElementById('modalTugas');
const closeModalBtn = document.getElementById('closeModal');
const saveTugasBtn = document.getElementById('saveTugas');

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
  document.getElementById('namaTugas').value = '';
  document.getElementById('mataKuliah').value = '';
  document.getElementById('tanggalDeadline').value = '';
  document.getElementById('status').value = 'Belum';
  document.getElementById('keterangan').value = '';
}

// Simpan tugas
saveTugasBtn.addEventListener('click', function() {
  const nama = document.getElementById('namaTugas').value.trim();
  const mataKuliah = document.getElementById('mataKuliah').value.trim();
  const tanggalDeadline = document.getElementById('tanggalDeadline').value;
  const status = document.getElementById('status').value;
  const keterangan = document.getElementById('keterangan').value.trim();

  // Validasi
  if (!nama) {
    alert('Nama Tugas wajib diisi');
    return;
  }
  if (!tanggalDeadline) {
    alert('Tanggal Deadline wajib diisi');
    return;
  }

  // Buat object tugas
  const tugas = {
    id: Date.now(),
    nama: nama,
    mataKuliah: mataKuliah,
    tanggalDeadline: tanggalDeadline,
    status: status,
    keterangan: keterangan,
    createdAt: new Date().toLocaleDateString('id-ID')
  };

  // Simpan ke localStorage
  let dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];
  dataTugas.push(tugas);
  localStorage.setItem('dataTugas', JSON.stringify(dataTugas));

  // Tutup modal
  modal.classList.remove('show');
  resetForm();

  // Tampilkan tugas baru
  renderTugas();
  updateStats();

  // Notifikasi
  showNotification('Tugas berhasil ditambahkan');
});

// ========== RENDER TUGAS ==========
function renderTugas() {
  const container = document.getElementById('tugasContainer');
  const dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];

  container.innerHTML = '';

  if (dataTugas.length === 0) {
    container.innerHTML = '<p class="empty-message">Belum ada tugas tambahan</p>';
    return;
  }

  dataTugas.forEach((tugas) => {
    const statusClass = tugas.status.toLowerCase().replace(' ', '-');
    const statusLabel = tugas.status;
    const isComplete = tugas.status === 'Selesai';

    // Format tanggal
    const tanggal = new Date(tugas.tanggalDeadline);
    const tanggalFormatted = tanggal.toLocaleDateString('id-ID', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });

    const card = document.createElement('div');
    card.className = `task-card ${isComplete ? 'done-line done-card' : 'normal-line'}`;
    card.setAttribute('data-id', tugas.id);

    card.innerHTML = `
      <div class="task-main">
        <span class="tag ${getTagClass(tugas.status)}">${statusLabel.toUpperCase()}</span>
        <h3>${tugas.nama}</h3>
        ${tugas.keterangan ? `<p>${tugas.keterangan}</p>` : ''}

        <div class="task-meta">
          ${tugas.mataKuliah ? `<span><i class="fa-solid fa-book"></i> ${tugas.mataKuliah}</span>` : ''}
          <span><i class="fa-regular fa-calendar"></i> ${tanggalFormatted}</span>
        </div>
      </div>

      <div class="task-action">
        <span class="status ${statusClass}">${statusLabel}</span>
        <div class="action-buttons">
          ${!isComplete ? `<button class="complete-btn" data-id="${tugas.id}">Tandai Selesai</button>` : `<button class="outline" disabled>Selesai</button>`}
          <button class="delete-btn" data-id="${tugas.id}"><i class="fa-solid fa-trash"></i></button>
        </div>
      </div>
    `;

    container.appendChild(card);

    // Add event listeners
    if (!isComplete) {
      card.querySelector('.complete-btn').addEventListener('click', function() {
        completeTugas(tugas.id);
      });
    }

    card.querySelector('.delete-btn').addEventListener('click', function() {
      deleteTugas(tugas.id);
    });
  });
}

// ========== COMPLETE TUGAS ==========
function completeTugas(id) {
  let dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];
  dataTugas = dataTugas.map(t => {
    if (t.id === id) {
      t.status = 'Selesai';
    }
    return t;
  });
  localStorage.setItem('dataTugas', JSON.stringify(dataTugas));
  renderTugas();
  updateStats();
  showNotification('Tugas ditandai selesai');
}

// ========== DELETE TUGAS ==========
function deleteTugas(id) {
  if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {
    let dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];
    dataTugas = dataTugas.filter(t => t.id !== id);
    localStorage.setItem('dataTugas', JSON.stringify(dataTugas));
    renderTugas();
    updateStats();
    showNotification('Tugas berhasil dihapus');
  }
}

// ========== UPDATE STATS ==========
function updateStats() {
  const dataTugas = JSON.parse(localStorage.getItem('dataTugas')) || [];
  
  const deadlineDekat = dataTugas.filter(t => t.status !== 'Selesai').length;
  const sedangDikerjakan = dataTugas.filter(t => t.status === 'Proses').length;
  const selesai = dataTugas.filter(t => t.status === 'Selesai').length;
  const total = dataTugas.length;

  // Update stat cards
  const statCards = document.querySelectorAll('.stat-card');
  if (statCards[0]) statCards[0].querySelector('h3').textContent = deadlineDekat;
  if (statCards[1]) statCards[1].querySelector('h3').textContent = sedangDikerjakan;
  if (statCards[2]) statCards[2].querySelector('h3').textContent = selesai;
  if (statCards[3]) statCards[3].querySelector('h3').textContent = total;

  // Update progress
  const progressPercentage = total > 0 ? Math.round((selesai / total) * 100) : 0;
  const progressBar = document.querySelector('.progress-bar div');
  const progressText = document.querySelector('.progress-card p');
  
  if (progressBar) {
    progressBar.style.width = progressPercentage + '%';
  }
  if (progressText) {
    progressText.textContent = `${selesai} dari ${total} tugas sudah diselesaikan.`;
  }

  // Update reminder
  const nextTask = dataTugas.find(t => t.status !== 'Selesai');
  const reminderBox = document.querySelector('.reminder-box');
  if (reminderBox && nextTask) {
    const tanggal = new Date(nextTask.tanggalDeadline);
    const tanggalFormatted = tanggal.toLocaleDateString('id-ID', {
      weekday: 'short',
      month: 'short',
      day: 'numeric'
    });
    reminderBox.innerHTML = `
      <small>PALING DEKAT</small>
      <h4>${nextTask.nama}</h4>
      <p>${tanggalFormatted}</p>
    `;
  }
}

// ========== HELPER FUNCTIONS ==========
function getTagClass(status) {
  const tagClasses = {
    'Belum': 'blue-tag',
    'Proses': 'yellow-tag',
    'Selesai': 'green-tag'
  };
  return tagClasses[status] || 'blue-tag';
}

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
  renderTugas();
  updateStats();
});
