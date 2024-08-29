document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.getElementById('menu-button');
    const closeButton = document.getElementById('close-button');
    const sidebar = document.getElementById('sidebar');

    // Open the sidebar
    menuButton.addEventListener('click', () => {
        sidebar.classList.add('active');
    });

    // Close the sidebar
    closeButton.addEventListener('click', () => {
        sidebar.classList.remove('active');
    });

    // Optional: Close the sidebar if clicking outside of it
    document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !menuButton.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    });
});
