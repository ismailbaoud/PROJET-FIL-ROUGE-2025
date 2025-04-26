function toggleForm(id) {
    const el = document.getElementById(id);
    el.classList.toggle('hidden');
}
function applyFilters() {
    const status = document.getElementById('statusFilter').value;
    const sortBy = document.getElementById('sortBy').value;

    const url = new URL(window.location.href);
    status ? url.searchParams.set('status', status) : url.searchParams.delete('status');
    sortBy ? url.searchParams.set('sort', sortBy) : url.searchParams.delete('sort');
    url.searchParams.set('page', 1);
    window.location.href = url.toString();
}

function resetFilters() {
    window.location.href = window.location.pathname;
}