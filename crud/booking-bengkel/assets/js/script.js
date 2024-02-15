// Konfirmasi Penghapusan
function confirmDelete() {
    return confirm("Apakah Anda yakin ingin menghapus booking ini?");
}

// Contoh Fungsi Validasi Form Sederhana
function validateForm() {
    let inputs = document.querySelectorAll('input[type="text"], input[type="date"]');
    let valid = true;

    inputs.forEach(function(input) {
        if (input.value === "") {
            alert("Field " + input.name + " harus diisi.");
            valid = false;
        }
    });

    return valid;
}

// Event Listener untuk Form Submit jika diperlukan
document.addEventListener('DOMContentLoaded', function() {
    let form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault(); // Menghentikan form dari submit jika validasi gagal
            }
        });
    }
});