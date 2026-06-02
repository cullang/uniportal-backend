// ========== MODAL HANDLING ==========
const addBtn = document.querySelector('.add-btn');
const modal = document.getElementById('modalInfo');
const closeModalBtn = document.getElementById('closeModal');
const saveInfoBtn = document.getElementById('saveInfo');

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
  document.getElementById('judulInfo').value = '';
  document.getElementById('kategoriInfo').value = 'Kelas';
  document.getElementById('tanggalInfo').value = '';
  document.getElementById('isiInfo').value = '';
}

// Simpan info
saveInfoBtn.addEventListener('click', function() {
  const judul = document.getElementById('judulInfo').value.trim();
  const kategori = document.getElementById('kategoriInfo').value;
  const tanggal = document.getElementById('tanggalInfo').value;
  const isi = document.getElementById('isiInfo').value.trim();

  // Validasi
  if (!judul) {
    alert('Judul Info wajib diisi');
    return;
  }
  if (!isi) {
    alert('Isi Info wajib diisi');
    return;
  }

  // Buat object info
  const info = {
    id: Date.now(),
    judul: judul,
    kategori: kategori,
    tanggal: tanggal || new Date().toLocaleDateString('id-ID'),
    isi: isi,
    createdAt: new Date().toLocaleDateString('id-ID')
  };

  // Simpan ke localStorage
  let dataInfo = JSON.parse(localStorage.getItem('dataInfo')) || [];
  dataInfo.push(info);
  localStorage.setItem('dataInfo', JSON.stringify(dataInfo));

  // Tutup modal
  modal.classList.remove('show');
  resetForm();

  // Tampilkan info baru
  renderInfo();

  // Notifikasi
  showNotification('Info berhasil ditambahkan');
});

// ========== RENDER INFO ==========
function renderInfo() {
  const container = document.getElementById('infoContainer');
  const dataInfo = JSON.parse(localStorage.getItem('dataInfo')) || [];

  container.innerHTML = '';

  if (dataInfo.length === 0) {
    container.innerHTML = '<p class="empty-message">Belum ada info tambahan</p>';
    return;
  }

  const categoryIcons = {
    'Kelas': 'fa-book',
    'Dosen': 'fa-user-tie',
    'Organisasi': 'fa-users',
    'Pribadi': 'fa-lightbulb'
  };

  const categoryColors = {
    'Kelas': 'blue-line blue',
    'Dosen': 'green-line green',
    'Organisasi': 'orange-line orange',
    'Pribadi': 'purple-line purple'
  };

  dataInfo.forEach((info) => {
    const [colorLine, colorIcon] = categoryColors[info.kategori].split(' ');
    const icon = categoryIcons[info.kategori] || 'fa-lightbulb';

    const card = document.createElement('div');
    card.className = `info-card ${colorLine}`;
    card.setAttribute('data-id', info.id);

    card.innerHTML = `
      <div class="icon ${colorIcon}">
        <i class="fa-solid ${icon}"></i>
      </div>

      <div class="info-content">
        <div>
          <span class="tag ${info.kategori.toLowerCase()}-tag">${info.kategori.toUpperCase()}</span>
          <small>${info.createdAt}</small>
        </div>

        <h3>${info.judul}</h3>
        <p>${info.isi}</p>

        <div class="meta">
          ${info.tanggal ? `<span><i class="fa-regular fa-calendar"></i> ${info.tanggal}</span>` : ''}
          <button class="delete-btn" data-id="${info.id}"><i class="fa-solid fa-trash"></i></button>
        </div>
      </div>
    `;

    container.appendChild(card);

    // Add event listener
    card.querySelector('.delete-btn').addEventListener('click', function() {
      deleteInfo(info.id);
    });
  });
}

// ========== DELETE INFO ==========
function deleteInfo(id) {
  if (confirm('Apakah Anda yakin ingin menghapus info ini?')) {
    let dataInfo = JSON.parse(localStorage.getItem('dataInfo')) || [];
    dataInfo = dataInfo.filter(i => i.id !== id);
    localStorage.setItem('dataInfo', JSON.stringify(dataInfo));
    renderInfo();
    showNotification('Info berhasil dihapus');
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
  renderInfo();
});
