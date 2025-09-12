<!-- Advisers Management -->
<main id="advisers-management-page"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    @if (auth()->user() && auth()->user()->hasPermission('modify-advisers-list'))
        <h1 class="mb-4 text-2xl font-bold text-[#575757]">Advisers Management</h1>

        <form id="create-adviser-form" class="mb-6 grid grid-cols-1 gap-3 sm:grid-cols-3">
            <input type="text" name="name" placeholder="Adviser name"
                class="rounded-lg border border-gray-300 px-4 py-2" />
            <select name="program_id" id="adviser-program-select"
                class="rounded-lg border border-gray-300 px-4 py-2"></select>
            <button type="submit"
                class="rounded-lg bg-gradient-to-r from-[#FFC360] to-[#FFA104] px-4 py-2 text-white shadow hover:brightness-110">Add
                Adviser</button>
        </form>

        <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Program</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Action</th>
                    </tr>
                </thead>
                <tbody id="advisers-table-body" class="divide-y divide-gray-200 text-[#575757]">
                </tbody>
            </table>
        </div>
    @else
        <p class="text-red-600">You don't have permission to modify advisers.</p>
    @endif
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tbody = document.getElementById('advisers-table-body');
        const programSelect = document.getElementById('adviser-program-select');
        if (!tbody) return;

        function loadProgramsForSelect() {
            return fetch('/admin/programs').then(r => r.json()).then(list => {
                programSelect.innerHTML = list.map(p => `<option value="${p.id}">${p.name}</option>`)
                    .join('');
            });
        }

        function loadAdvisers() {
            fetch('/admin/advisers').then(r => r.json()).then(list => {
                tbody.innerHTML = '';
                list.forEach(item => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td class="px-6 py-3">
                            <input class="w-full rounded border px-2 py-1" value="${item.name}" data-field="name" data-id="${item.id}">
                        </td>
                        <td class="px-6 py-3">
                            <select class="w-full rounded border px-2 py-1" data-field="program_id" data-id="${item.id}"></select>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            <button class="update-adviser text-blue-600 hover:underline" data-id="${item.id}">Update</button>
                            <button class="delete-adviser ml-3 text-red-600 hover:underline" data-id="${item.id}">Delete</button>
                        </td>`;
                    tbody.appendChild(tr);

                    // populate the program select for this row
                    fetch('/admin/programs').then(r => r.json()).then(programs => {
                        const sel = tr.querySelector('select[data-id="' + item.id +
                            '"][data-field="program_id"]');
                        sel.innerHTML = programs.map(p =>
                            `<option value="${p.id}" ${p.id===item.program_id?'selected':''}>${p.name}</option>`
                            ).join('');
                    });
                });
            });
        }

        document.getElementById('create-adviser-form')?.addEventListener('submit', e => {
            e.preventDefault();
            const form = e.target;
            const body = new URLSearchParams(new FormData(form));
            fetch('/admin/advisers', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body
            }).then(async r => {
                if (!r.ok) alert('Failed to add adviser');
                loadAdvisers();
                form.reset();
            });
        });

        tbody.addEventListener('click', e => {
            const delBtn = e.target.closest('.delete-adviser');
            const updBtn = e.target.closest('.update-adviser');
            if (delBtn) {
                const id = delBtn.dataset.id;
                fetch(`/admin/advisers/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        }
                    })
                    .then(() => loadAdvisers());
            }
            if (updBtn) {
                const id = updBtn.dataset.id;
                const name = tbody.querySelector(`input[data-id="${id}"][data-field="name"]`)?.value
                    .trim();
                const program_id = tbody.querySelector(
                    `select[data-id="${id}"][data-field="program_id"]`)?.value;
                const body = new URLSearchParams({
                    name,
                    program_id
                });
                fetch(`/admin/advisers/${id}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        },
                        body
                    })
                    .then(r => {
                        if (!r.ok) alert('Failed to update');
                        loadAdvisers();
                    });
            }
        });

        Promise.all([loadProgramsForSelect()]).then(loadAdvisers);
    });
</script>
