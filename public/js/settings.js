// ========== FORM HANDLING ==========
const saveBtn = document.querySelector('.save-btn');
const inputs = document.querySelectorAll('.form-group input, .form-group textarea, .form-group select');

// Load profil saat halaman dibuka
document.addEventListener('DOMContentLoaded', function() {
  loadProfil();
});

function loadProfil() {
  const profil = JSON.parse(localStorage.getItem('profilMahasiswa')) || {};

  // Isi form dengan data dari localStorage
  if (document.getElementById('nama')) document.getElementById('nama').value = profil.nama || 'Ruslan';
  if (document.getElementById('nim')) document.getElementById('nim').value = profil.nim || '';
  if (document.getElementById('email')) document.getElementById('email').value = profil.email || '';
  if (document.getElementById('noHp')) document.getElementById('noHp').value = profil.noHp || '';
  if (document.getElementById('prodi')) document.getElementById('prodi').value = profil.prodi || 'Teknik Informatika';
  if (document.getElementById('semester')) document.getElementById('semester').value = profil.semester || '4';
  if (document.getElementById('ipk')) document.getElementById('ipk').value = profil.ipk || '';
  if (document.getElementById('alamat')) document.getElementById('alamat').value = profil.alamat || '';
  if (document.getElementById('hobi')) document.getElementById('hobi').value = profil.hobi || '';
  if (document.getElementById('target')) document.getElementById('target').value = profil.target || '';
  if (document.getElementById('catatan')) document.getElementById('catatan').value = profil.catatan || '';
}

// Simpan profil
saveBtn.addEventListener('click', function() {
  const profil = {
    nama: document.getElementById('nama').value.trim() || 'Ruslan',
    nim: document.getElementById('nim').value.trim(),
    email: document.getElementById('email').value.trim(),
    noHp: document.getElementById('noHp').value.trim(),
    prodi: document.getElementById('prodi').value,
    semester: document.getElementById('semester').value,
    ipk: document.getElementById('ipk').value.trim(),
    alamat: document.getElementById('alamat').value.trim(),
    hobi: document.getElementById('hobi').value.trim(),
    target: document.getElementById('target').value.trim(),
    catatan: document.getElementById('catatan').value.trim(),
    updatedAt: new Date().toLocaleDateString('id-ID')
  };

  // Validasi
  if (!profil.nama) {
    alert('Nama wajib diisi');
    return;
  }

  // Simpan ke localStorage
  localStorage.setItem('profilMahasiswa', JSON.stringify(profil));

  // Notifikasi
  showNotification('Profil berhasil disimpan');

  // Update nama di halaman
  updateProfileDisplay(profil);
});

function updateProfileDisplay(profil) {
  // Update nama di halaman
  const nameElements = document.querySelectorAll('.profile h4, .profile-card h2');
  nameElements.forEach(el => {
    if (el.textContent.includes('Ruslan') || el.classList.contains('profile-name')) {
      el.textContent = profil.nama;
    }
  });

  // Update badge semester
  const badgeElements = document.querySelectorAll('.badges span');
  badgeElements.forEach(el => {
    if (el.textContent.includes('Semester')) {
      el.textContent = `Semester ${profil.semester}`;
    }
  });
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
