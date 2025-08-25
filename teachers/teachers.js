document.addEventListener('DOMContentLoaded', function() {
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('#navbar a');
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active";
        }
    }

    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        const teacherItems = document.querySelectorAll('.teacher-item');

        teacherItems.forEach(function(item) {
            const text = item.innerText.toLowerCase();
            if (text.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
