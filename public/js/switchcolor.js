document.addEventListener("DOMContentLoaded", function () {
    const colorBoxes = document.querySelectorAll('.color-box');
    const sidebar = document.querySelector('.sidebar');
    const navbar = document.querySelector('.navbar');
    const colorPickerBtn = document.getElementById('color-picker-btn');
    const colorContainer = document.getElementById('color-container');
    const submenu = document.querySelectorAll('.submenu');

    // Fungsi untuk mengupdate tampilan
    function applyColors(warna_sidebar, warna_navbar) {
        if (sidebar) {
            sidebar.style.backgroundColor = warna_sidebar;
            submenu.forEach(sub => sub.style.backgroundColor = warna_sidebar);
        }
        if (navbar) {
            navbar.style.backgroundColor = warna_navbar;
        }
    }

    // Terapkan warna yang disimpan di localStorage
    const savedwarna_sidebar = localStorage.getItem('warna_sidebar');
    const savedwarna_navbar = localStorage.getItem('warna_navbar');
    if (savedwarna_sidebar && sidebar) {
        applyColors(savedwarna_sidebar, savedwarna_navbar);
    }

    // Event listener untuk setiap warna yang dipilih
    colorBoxes.forEach(box => {
        box.addEventListener('click', function () {
            const warna_sidebar = box.getAttribute('data-sidebar-color');
            const warna_navbar = box.getAttribute('data-navbar-color');

            // Panggil fungsi fetch dari layout
            sendColorData(warna_sidebar, warna_navbar)
                .then(data => {
                    if (data.success) {
                        alert(data.message);

                        // Simpan warna ke localStorage
                        localStorage.setItem('warna_sidebar', warna_sidebar);
                        localStorage.setItem('warna_navbar', warna_navbar);

                        // Terapkan warna secara langsung tanpa reload
                        applyColors(warna_sidebar, warna_navbar);
                    } else {
                        alert('Gagal menyimpan warna: ' + data.message);
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
        });
    });

    // Toggle visibility untuk color picker
    if (colorPickerBtn && colorContainer) {
        colorPickerBtn.addEventListener('click', () => {
            colorContainer.style.display = colorContainer.style.display === 'none' ? 'block' : 'none';
        });
    }

    // Menghapus kelas warna default jika ada
    if (sidebar) sidebar.classList.remove('bg-gradient-primary');
    if (navbar) navbar.classList.remove('bg-white');
});
