function toggleLogin() {
    const dropdown = document.getElementById('loginDropdown')
    const icon = document.getElementById('loginIcon')

    dropdown.classList.toggle('hidden')
    icon.classList.toggle('rotate-180')
}

// Tutup dropdown kalau klik di luar
document.addEventListener('click', function (e) {
    const btn = e.target.closest('button')
    const dropdown = document.getElementById('loginDropdown')

    if (!e.target.closest('.relative')) {
        dropdown.classList.add('hidden')
        document.getElementById('loginIcon').classList.remove('rotate-180')
    }
})

function toggleMobileMenu() {
    document.getElementById('mobileMenu').classList.toggle('hidden');
    document.getElementById('mobileMenu').classList.toggle('flex');
}