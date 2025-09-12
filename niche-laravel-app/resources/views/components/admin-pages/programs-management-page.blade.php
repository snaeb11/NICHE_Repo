<!-- Programs Management -->
<main id="programs-management-page"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    @if (auth()->user() && auth()->user()->hasPermission('modify-programs-list'))
        <h1 class="mb-4 text-2xl font-bold text-[#575757]">Programs Management</h1>

        <form id="create-program-form" class="mb-6 grid grid-cols-1 gap-3 sm:grid-cols-3">
            <input type="text" name="name" placeholder="Program name (e.g., BSIT)"
                class="rounded-lg border border-gray-300 px-4 py-2" />
            <select name="degree" class="rounded-lg border border-gray-300 px-4 py-2">
                <option value="Undergraduate">Undergraduate</option>
                <option value="Graduate">Graduate</option>
            </select>
            <button type="submit"
                class="rounded-lg bg-gradient-to-r from-[#FFC360] to-[#FFA104] px-4 py-2 text-white shadow hover:brightness-110">Add
                Program</button>
        </form>

        <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Degree</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Action</th>
                    </tr>
                </thead>
                <tbody id="programs-table-body" class="divide-y divide-gray-200 text-[#575757]">
                </tbody>
            </table>
        </div>
    @else
        <p class="text-red-600">You don't have permission to modify programs.</p>
    @endif
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tbody = document.getElementById('programs-table-body');
        if (!tbody) return;

        function loadPrograms() {
            fetch('/admin/programs').then(r => r.json()).then(list => {
                tbody.innerHTML = '';
                list.forEach(item => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td class="px-6 py-3">
                            <input class="w-full rounded border px-2 py-1" value="${item.name}" data-field="name" data-id="${item.id}">
                        </td>
                        <td class="px-6 py-3">
                            <select class="w-full rounded border px-2 py-1" data-field="degree" data-id="${item.id}">
                                <option ${item.degree==='Undergraduate'?'selected':''}>Undergraduate</option>
                                <option ${item.degree==='Graduate'?'selected':''}>Graduate</option>
                            </select>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            <button class="update-program text-blue-600 hover:underline" data-id="${item.id}">Update</button>
                            <button class="delete-program ml-3 text-red-600 hover:underline" data-id="${item.id}">Delete</button>
                        </td>`;
                    tbody.appendChild(tr);
                });
            });
        }

        document.getElementById('create-program-form')?.addEventListener('submit', e => {
            e.preventDefault();
            const form = e.target;
            const body = new URLSearchParams(new FormData(form));
            fetch('/admin/programs', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body
            }).then(async r => {
                if (!r.ok) alert('Failed to add program');
                loadPrograms();
                form.reset();
            });
        });

        tbody.addEventListener('click', e => {
            const delBtn = e.target.closest('.delete-program');
            const updBtn = e.target.closest('.update-program');
            if (delBtn) {
                const id = delBtn.dataset.id;
                fetch(`/admin/programs/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        }
                    })
                    .then(() => loadPrograms());
            }
            if (updBtn) {
                const id = updBtn.dataset.id;
                const name = tbody.querySelector(`input[data-id="${id}"][data-field="name"]`)?.value
                    .trim();
                const degree = tbody.querySelector(`select[data-id="${id}"][data-field="degree"]`)
                    ?.value;
                const body = new URLSearchParams({
                    name,
                    degree
                });
                fetch(`/admin/programs/${id}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        },
                        body
                    })
                    .then(r => {
                        if (!r.ok) alert('Failed to update');
                        loadPrograms();
                    });
            }
        });

        loadPrograms();
    });
</script>
