document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", function() {
        sidebar.classList.toggle("active");
    });
});

// Fungsi untuk mengatur agar hanya satu checkbox kategori yang bisa dipilih
function updateKategoriCheckboxes() {
    var checkboxes = document.querySelectorAll('.kategori-checkbox');
    var checkedCheckboxes = document.querySelectorAll('.kategori-checkbox.check');

    if (checkedCheckboxes.length > 1) {
        // Jika lebih dari satu checkbox diklik, reset semua checkbox menjadi tidak terpilih
        checkboxes.forEach(function(checkbox) {
            checkbox.classList.remove('check');
        });
        this.classList.add('check'); // Tandai checkbox yang baru saja diklik sebagai terpilih
    } else {
        // Jika hanya satu checkbox diklik, tambahkan/hapus class "check"
        this.classList.toggle('check');
    }
}

// Tambahkan event listener pada setiap checkbox kategori
document.querySelectorAll('.kategori-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', updateKategoriCheckboxes);
});

document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah form disubmit secara default

    // Mendapatkan nilai kategori yang dipilih
    var selectedKategori = document.querySelector('.kategori-checkbox.check');
    if (selectedKategori) {
        var kategori = selectedKategori.value.toUpperCase();
        console.log('KATEGORI yang dipilih:', kategori);
        // Lakukan proses selanjutnya dengan nilai kategori
    } else {
        alert('Silakan pilih KATEGORI terlebih dahulu.');
    }
});