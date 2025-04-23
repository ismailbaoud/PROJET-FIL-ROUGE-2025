        function toggleForm(id) {
            const el = document.getElementById(id);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
                el.classList.add('flex');
            } else {
                el.classList.add('hidden');
                el.classList.remove('flex');
            }
        }

        function openUpdateForm(id) {
            const form = document.getElementById("updateProgramForm");
            form.action = `/tr/programs/${id}/update`;
            toggleForm('updateForm');
        }
