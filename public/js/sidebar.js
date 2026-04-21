function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const icon = document.getElementById('toggle-icon');
    const texts = document.querySelectorAll('.sidebar-text');
    const miniLogo = document.querySelector('.sidebar-mini-text');

    if (sidebar.classList.contains('w-64')) {
        // Minimize
        sidebar.classList.replace('w-64', 'w-20');
        texts.forEach(t => t.classList.add('hidden'));
        miniLogo.classList.remove('hidden');
        icon.setAttribute('data-feather', 'chevron-right');
    } else {
        // Expand
        sidebar.classList.replace('w-20', 'w-64');
        texts.forEach(t => t.classList.remove('hidden'));
        miniLogo.classList.add('hidden');
        icon.setAttribute('data-feather', 'chevron-left');
    }
    feather.replace(); // Refresh icon
}