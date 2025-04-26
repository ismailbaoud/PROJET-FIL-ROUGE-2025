const statusForm = document.getElementById('updateStatus');
const statusItem = document.getElementById('statusItem');

document.querySelectorAll('select[id^="selectItem"]').forEach(select => {
select.addEventListener('change', function () {
    const userId = this.id.split('-')[1];
    document.getElementById('updateStatus-' + userId).submit();
});
});