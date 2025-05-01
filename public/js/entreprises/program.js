const csrfToken = "{{ csrf_token() }}";

function toggleForm(id) {
    const el = document.getElementById(id);
    el.classList.toggle('hidden');
    el.classList.toggle('flex');
}

function openUpdateForm(button) {
    const form = document.getElementById("updateProgramForm");
    form.dataset.id = button.dataset.id;
    form.querySelector('input[name="title"]').value = button.dataset.title;
    form.querySelector('textarea[name="description"]').value = button.dataset.description;
    form.querySelector('select[name="status"]').value = button.dataset.status;
    form.querySelector('input[name="min_reward"]').value = button.dataset.min_reward;
    form.querySelector('input[name="max_reward"]').value = button.dataset.max_reward;

    toggleForm('updateForm');
}

function deleteProgram(id) {
    if (confirm("Are you sure you want to delete this program?")) {
        fetch(`/tr/programs/${id}/delete`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            reloadPrograms();
        })
        .catch(error => console.error('Error:', error));
    }
}

function applyFilters() {
    const status = document.getElementById('statusFilter').value;
    const sort = document.getElementById('sortBy').value;

    fetch(`/tr/programs/filter?status=${status}&sort=${sort}`, {
        headers: {
            'Accept': 'text/html'
        }
    })
    .then(res => res.text())
    .then(html => {
        document.querySelector('.space-y-6').innerHTML = html;
    })
    .catch(error => console.error('Error:', error));
}

function reloadPrograms() {
    fetch(`/tr/programs/list`, {
        headers: {
            'Accept': 'text/html'
        }
    })
    .then(res => res.text())
    .then(html => {
        document.querySelector('.space-y-6').innerHTML = html;
    })
    .catch(error => console.error('Error:', error));
}


let updateButton = document.getElementById('updateButton');
let updateProgramForm = document.getElementById('updateProgramForm');
updateButton.addEventListener('click', (e)=>{
    e.preventDefault();
    updateProgramForm.classList.toggle('hidden');
    updateProgramForm.classList.toggle('flex');
})