// ===================== SIDEBAR MOBILE TOGGLE =====================
// Ambil elemen DOM
const hamburgerBtn = document.getElementById('hamburgerBtn');
const bodyElement = document.body;

// Event listener untuk buka/tutup sidebar di mobile
if (hamburgerBtn) {
  hamburgerBtn.addEventListener('click', function() {
    bodyElement.classList.toggle('sidebar-open');
  });
}

// ===================== DESKTOP RESIZE RESET =====================
// Hapus status sidebar mobile saat layar menjadi lebih besar
window.addEventListener('resize', function() {
  if (window.innerWidth > 768) {
    bodyElement.classList.remove('sidebar-open');
  }
});
