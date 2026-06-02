document.addEventListener("DOMContentLoaded", function () {
  const addButtons = document.querySelectorAll(".add-btn");
  const body = document.body;

  const modal = document.createElement("div");
  modal.className = "modal-overlay";
  modal.innerHTML = `
    <div class="modal-box">
      <h2>Tambah Data Baru</h2>

      <label>Judul</label>
      <input type="text" id="modalTitle" placeholder="Masukkan judul">

      <label>Kategori / Mata Kuliah</label>
      <input type="text" id="modalCategory" placeholder="Contoh: Pemrograman Web">

      <label>Tanggal / Waktu</label>
      <input type="text" id="modalDate" placeholder="Contoh: Senin, 08:00">

      <label>Keterangan</label>
      <textarea id="modalDesc" placeholder="Masukkan keterangan"></textarea>

      <div class="modal-actions">
        <button id="cancelModal">Batal</button>
        <button id="saveModal">Simpan</button>
      </div>
    </div>
  `;

  body.appendChild(modal);

  const modalTitle = document.getElementById("modalTitle");
  const modalCategory = document.getElementById("modalCategory");
  const modalDate = document.getElementById("modalDate");
  const modalDesc = document.getElementById("modalDesc");

  let currentPage = document.title;

  addButtons.forEach(button => {
    button.addEventListener("click", function () {
      modal.classList.add("show");
    });
  });

  document.getElementById("cancelModal").addEventListener("click", function () {
    modal.classList.remove("show");
    clearForm();
  });

  document.getElementById("saveModal").addEventListener("click", function () {
    if (modalTitle.value.trim() === "") {
      alert("Judul wajib diisi");
      return;
    }

    const data = {
      title: modalTitle.value,
      category: modalCategory.value,
      date: modalDate.value,
      desc: modalDesc.value,
      page: currentPage,
      createdAt: new Date().toLocaleString()
    };

    let oldData = JSON.parse(localStorage.getItem("uniportalData")) || [];
    oldData.push(data);

    localStorage.setItem("uniportalData", JSON.stringify(oldData));

    alert("Data berhasil disimpan!");
    modal.classList.remove("show");
    clearForm();
  });

  function clearForm() {
    modalTitle.value = "";
    modalCategory.value = "";
    modalDate.value = "";
    modalDesc.value = "";
  }
});