@props(['undergraduate', 'graduate', 'advisers'])
<!-- Inventory Table -->
<main id="inventory-table" class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="w-full">
            <div class="mb-5 flex w-full items-center justify-between">
                <h1 class="text-2xl font-bold text-[#575757]">Inventory</h1>
                <div class="flex flex-wrap justify-end gap-1 sm:gap-2">
                    <!-- Buttons -->
                    @if (auth()->user() && auth()->user()->hasPermission('add-inventory'))
                        <button id="add-inventory-btn"
                            class="w-full max-w-[150px] cursor-pointer rounded-lg bg-gradient-to-r from-[#CE6767] to-[#A44444] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110 sm:w-auto">
                            Add
                        </button>
                    @endif

                    @if (auth()->user() && auth()->user()->hasPermission('import-inventory'))
                        <button id="import-excel-file"
                            class="w-full max-w-[150px] cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC360] to-[#FFA104] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110 sm:w-auto">
                            Import
                        </button>
                    @else
                        <button id="import-excel-file" class="hidden">
                            Import
                        </button>
                    @endif

                    @if (auth()->user() && auth()->user()->hasPermission('export-inventory'))
                        <a id="export-file-btn"
                            class="inline-block w-full max-w-[150px] cursor-pointer rounded-lg bg-gradient-to-r from-[#27C50D] to-[#1CA405] px-4 py-2 text-center text-[#fdfdfd] shadow hover:brightness-110 sm:w-auto">
                            Export
                        </a>
                    @else
                        <button id="export-file-btn" class="hidden">
                            Export
                        </button>
                    @endif
                </div>
            </div>

            <!-- Responsive Actions Wrapper -->
            <div class="flex flex-col gap-2 sm:flex-row sm:justify-between sm:gap-4">
                <input type="text" id="inventory-search" name="inventory-search" placeholder="Search..."
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] placeholder-gray-400 focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-[300px] md:w-[400px]" />
                <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                    <!-- Program Dropdown -->
                    <select name="inv-dd-program"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                        <option value="">All Programs</option>
                        @if ($undergraduate->isNotEmpty())
                            <optgroup label="Undergraduate Programs">
                                @foreach ($undergraduate as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </optgroup>
                        @endif
                        @if ($graduate->isNotEmpty())
                            <optgroup label="Graduate Programs">
                                @foreach ($graduate as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </optgroup>
                        @endif
                    </select>
                </div>

            </div>
        </div>

    </div>

    @if (auth()->user() && auth()->user()->hasPermission('view-inventory'))
        <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
                    <tr>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Inventory No.
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Title
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Author/s
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Abstract
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Uploaded File
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Adviser
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Program
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            S.Y.
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted by
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed by
                        </th>

                        @if (auth()->user() && auth()->user()->hasPermission('edit-inventory'))
                            <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                data-column="0" data-order="asc" onclick="sortTable(this)">
                                Actions
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody id="inventory-table-body" class="divide-y divide-gray-200 bg-[#fdfdfd] text-[#575757]">
                </tbody>
            </table>

            <!-- PDF Preview Modal -->
            <div id="pdf-preview-modal-inv"
                class="shadow-xl/30 backdrop-blur-xs fixed inset-0 z-50 flex hidden items-center justify-center">
                <div class="relative w-full max-w-7xl rounded-lg bg-white px-2 pb-2 pt-2 shadow-lg">
                    <div class="flex items-center justify-between pb-1 pl-2 pr-2">
                        <p class="text-sm text-gray-500" id="pdf-prev-fn-inv">Filename</p>
                        <button id="close-preview-modal-inv"
                            class="text-2xl font-bold text-black hover:text-red-600">X</button>
                    </div>
                    <iframe id="pdf-preview-iframe-inv" class="h-[70vh] w-full rounded-lg border shadow"
                        src=""></iframe>
                </div>
            </div>

        </div>
        <div id="pagination-controls-inventory" class="mt-4 flex justify-end space-x-2">
            <button onclick="changePage('inventory', -1)"
                class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&lt;</button>
            <span id="pagination-info-inventory" class="px-3 py-1 text-[#575757]">Page 1</span>
            <button onclick="changePage('inventory', 1)"
                class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&gt;</button>
        </div>
    @else
        <p class="text-red-600">You have no view permissions for Inventory.</p>

        <select name="inv-dd-program" class="hidden">
            <option value="">N/A</option>
        </select>

        <select name="inv-dd-academic_year" class="hidden">
            <option value="">N/A</option>
        </select>
    @endif
</main>

<!-- Add Inventory page -->
<main id="add-inventory-page"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">

    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-[#575757]">Add Inventory</h1>

        <button
            class="backto-inventory-btn cursor-pointer rounded-lg bg-gradient-to-r from-[#CE6767] to-[#A44444] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
            Back
        </button>
    </div>

    <form id="add-inventory-form" method="POST" action="{{ route('inventory.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="border-1 flex justify-center rounded-xl border-[#c2c2c2] p-10 pt-0">
            <div
                class="mx-auto flex w-[70vw] flex-col items-center justify-center gap-5 px-4 py-10 md:grid md:grid-cols-2 md:grid-rows-2 md:gap-5 md:px-12 lg:px-20">

                <!-- LEFT COLUMN (4 stacked inputs) -->
                <div class="flex w-full flex-col md:col-start-1 md:row-start-1">
                    <span class="mt-13 text-2xl font-semibold text-[#575757]">Title</span>

                    <!-- Textarea -->
                    <textarea name="title" id="thesis-title" placeholder="Thesis title"
                        class="mt-5 min-h-[5vh] w-full resize-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light uppercase text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>

                    <div class="flex w-full justify-end">
                        <button id="title-scan-btn" data-title = "Title" data-input = "thesis-title"
                            class="scan-btn mt-3 cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC15C] to-[#FFA206] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
                            Scan
                        </button>
                    </div>
                </div>

                <!-- dropdown hell -->
                <div class="flex w-full flex-col space-y-4 md:col-start-2 md:row-start-2">

                    <!-- adviser -->
                    <div class="flex flex-col space-y-2">
                        <span class="text-2xl font-semibold text-[#575757]">Adviser</span>

                        <select name="adviser"
                            class="mt-5 min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none">
                            <option value="" disabled selected>Select adviser</option>

                            @if ($advisers->isNotEmpty())
                                @foreach ($advisers->groupBy('program.name') as $programName => $programAdvisers)
                                    <optgroup label="{{ $programName }}">
                                        @foreach ($programAdvisers as $adviser)
                                            <option value="{{ $adviser->name }}">{{ $adviser->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- program -->
                    <div class="flex flex-col space-y-2">
                        <span class="text-2xl font-semibold text-[#575757]">Program</span>
                        <div>
                            <select id="program-select" name="program_id"
                                class="min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none">
                                <option value="" disabled selected>Select your program</option>

                                @if ($undergraduate->isNotEmpty())
                                    <optgroup label="Undergraduate Programs">
                                        @foreach ($undergraduate as $program)
                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endif

                                @if ($graduate->isNotEmpty())
                                    <optgroup label="Graduate Programs">
                                        @foreach ($graduate as $program)
                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endif
                            </select>
                        </div>
                    </div>

                    <!-- school year -->
                    <div class="flex flex-col space-y-2">
                        <span class="text-2xl font-semibold text-[#575757]">School Year</span>
                        <select name="academic_year"
                            class="mt-5 min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none">
                            <option value="" disabled selected>Select year</option>
                            @for ($year = date('Y'); $year >= 1990; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="flex w-full flex-col md:col-start-2 md:row-start-1">
                    <span class="text-2xl font-semibold text-[#575757]">Author/s</span>

                    <!-- Textarea -->
                    <textarea name="authors" id="authors" placeholder="Authors"
                        class="mt-5 min-h-[5vh] w-full resize-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>
                </div>

                <div class="flex w-full h-full flex-col md:col-start-1 md:row-span-2 md:row-start-2">
                    <span class="text-2xl font-semibold text-[#575757]">Abstract</span>

                    <!-- Textarea -->
                    <textarea name="abstract" id="abstract" placeholder="Abstract"
                        class="mt-5 min-h-[41vh] w-full h-full resize-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>

                    <div class="flex w-full justify-end">
                        <button id="abstract-scan-btn" data-title = "Abstract" data-input = "abstract"
                            class="scan-btn mt-3 cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC15C] to-[#FFA206] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
                            Scan
                        </button>
                    </div>
                </div>

                <div class="flex w-full flex-col md:col-start-2 md:row-start-3">
                    <span class="text-2xl font-semibold text-[#575757]">Upload thesis</span>
                    <button type="button" id="admin-upload-btn"
                        class="mt-4 min-h-[45px] w-full cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC15C] to-[#FFA206] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
                        Upload file
                    </button>
                    <input type="file" name="document" id="admin-upload-input" class="absolute opacity-0"
                        accept=".pdf">

                    <!-- dispay when fikle is chosen -->
                    <div id="admin-uploaded-file" class="ml-10 hidden items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#575757" class="h-10 w-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span id="adminUp-file-name" class="mt-2 text-sm font-semibold text-[#575757]"></span>
                        <button id="admin-cancel-upload-btn" class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-10 flex justify-end">
                        <button id="submit-inventory"
                            class="rounded-lg bg-[#4CAF50] px-6 py-3 text-white hover:brightness-110">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<!-- Edit Inventory page -->
<main id="edit-inventory-page"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-[#575757]">Edit Thesis</h1>
        <button
            class="backto-inventory-btn cursor-pointer rounded-lg bg-gradient-to-r from-[#CE6767] to-[#A44444] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
            Back
        </button>
    </div>

    <form id="edit-inventory-form" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="edit-item-id">

        <div class="border-1 flex justify-center rounded-xl border-[#c2c2c2] p-10 pt-0">
            <div
                class="mx-auto flex w-[70vw] flex-col items-center justify-center gap-5 px-4 py-10 md:grid md:grid-cols-2 md:grid-rows-2 md:gap-y-0 md:gap-x-5 md:px-12 lg:px-20">

                <!-- LEFT COLUMN (4 stacked inputs) -->
                <div class="flex w-full flex-col md:col-start-1 md:row-start-1">
                    <span class="mt-13 text-2xl font-semibold text-[#575757]">Title</span>
                    <textarea name="title" id="edit-thesis-title" placeholder="Thesis title"
                        class="mt-5 min-h-[5vh] w-full resize-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light uppercase text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>
                    <div class="flex w-full justify-end">
                        <button id="edit-title-scan-btn" data-title="Title" data-input="edit-thesis-title"
                            class="scan-btn mt-3 cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC15C] to-[#FFA206] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
                            Scan
                        </button>
                    </div>
                </div>

                <!-- dropdown hell -->
                <div class="flex w-full flex-col space-y-4 md:col-start-2 md:row-start-2">

                    <!-- adviser -->
                    <div class="flex flex-col space-y-2">
                        <span class="text-2xl font-semibold text-[#575757]">Adviser</span>
                        <select name="adviser"
                            class="mt-5 min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none">
                            <option value="" disabled selected>Select adviser</option>

                            @if ($advisers->isNotEmpty())
                                @foreach ($advisers->groupBy('program.name') as $programName => $programAdvisers)
                                    <optgroup label="{{ $programName }}">
                                        @foreach ($programAdvisers as $adviser)
                                            <option value="{{ $adviser->name }}">{{ $adviser->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endif
                        </select>
                        <div
                            class="pointer-events-none absolute bottom-1 right-3 -translate-y-1/2 transform text-[#575757]">
                            <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <!-- program -->
                    <div class="flex flex-col space-y-2">
                        <span class="text-2xl font-semibold text-[#575757]">Program</span>
                        <select name="program_id" id="edit-program-select"
                            class="min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none">
                            <option value="" disabled selected>Select your program</option>
                            @if ($undergraduate->isNotEmpty())
                                <optgroup label="Undergraduate Programs">
                                    @foreach ($undergraduate as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endif
                            @if ($graduate->isNotEmpty())
                                <optgroup label="Graduate Programs">
                                    @foreach ($graduate as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endif
                        </select>
                        <div
                            class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 transform text-[#575757]">
                            <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <!-- school year -->
                    <div class="flex flex-col space-y-2">
                        <span class="text-2xl font-semibold text-[#575757]">School Year</span>
                        <select name="academic_year"
                            class="mt-5 min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none">
                            <option value="" disabled selected>Select year</option>
                            @for ($year = date('Y'); $year >= 1990; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <div
                            class="pointer-events-none absolute bottom-1 right-3 -translate-y-1/2 transform text-[#575757]">
                            <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="flex w-full flex-col md:col-start-2 md:row-start-1">
                    <span class="text-2xl font-semibold text-[#575757]">Author/s</span>
                    <textarea name="authors" id="edit-authors" placeholder="Authors"
                        class="mt-5 min-h-[5vh] w-full resize-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>
                </div>

                <div class="flex w-full h-full flex-col md:col-start-1 md:row-span-2 md:row-start-2">
                    <span class="text-2xl font-semibold text-[#575757]">Abstract</span>
                    <textarea name="abstract" id="edit-abstract" placeholder="Abstract"
                        class="mt-5 min-h-[41vh] w-full h-full resize-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>
                    <div class="flex w-full justify-end">
                        <button id="edit-abstract-scan-btn" data-title="Abstract" data-input="edit-abstract"
                            class="scan-btn mt-3 cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC15C] to-[#FFA206] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
                            Scan
                        </button>
                    </div>
                </div>

                <div class="flex w-full flex-col md:col-start-2 md:row-start-3">
                    <span class="text-2xl font-semibold text-[#575757]">Upload thesis</span>
                    <button type="button" id="edit-admin-upload-btn"
                        class="mt-4 min-h-[45px] w-full cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC15C] to-[#FFA206] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110">
                        Upload file
                    </button>
                    <input type="file" name="manuscript" id="edit-admin-upload-input" class="absolute opacity-0"
                        accept=".pdf">
                    <div id="edit-admin-uploaded-file" class="ml-10 hidden items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#575757" class="h-10 w-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span id="adminEdit-file-name" class="mt-2 text-sm font-semibold text-[#575757]"></span>
                        <button type="button" id="edit-admin-cancel-upload-btn"
                            class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-10 flex justify-end">
                        <button type="submit" id="edit-submit-inventory"
                            class="cursor-pointer rounded-lg bg-[#4CAF50] px-6 py-3 text-white hover:brightness-110">
                            Update Thesis
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popupSuc = document.getElementById('universal-ok-popup');

            const xTopTextSuc = document.getElementById('OKtopText');
            const xSubTextSuc = document.getElementById('OKsubText');

            xTopTextSuc.textContent = "Successful!";
            xSubTextSuc.textContent = @json(session('success'));
            popupSuc.style.display = 'flex';
        });

        kButton.addEventListener('click', () => {
            const popupSuc = document.getElementById('universal-ok-popup');
            popupSuc.style.display = 'none';
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- ADD INVENTORY FORM ---
        const addForm = document.getElementById('add-inventory-form');
        if (addForm) {
            const uploadBtn = document.getElementById('admin-upload-btn');
            const fileInput = document.getElementById('admin-upload-input');
            const uploadedFileContainer = document.getElementById('admin-uploaded-file');
            const fileNameSpan = document.getElementById('adminUp-file-name');
            const cancelUploadBtn = document.getElementById('admin-cancel-upload-btn');

            // File upload UI
            uploadBtn.addEventListener('click', function(e) {
                e.preventDefault();
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    fileNameSpan.textContent = fileInput.files[0].name;
                    uploadedFileContainer.classList.remove('hidden');
                    uploadedFileContainer.classList.add('flex');
                } else {
                    uploadedFileContainer.classList.add('hidden');
                }
            });

            cancelUploadBtn.addEventListener('click', function(event) {
                event.preventDefault();
                fileInput.value = '';
                fileNameSpan.textContent = '';
                uploadedFileContainer.classList.add('hidden');
            });

            // Validation on submit
            addForm.addEventListener('submit', function(event) {
                const title = document.getElementById("thesis-title").value.trim();
                const adviser = addForm.querySelector('select[name="adviser"]').value.trim();
                const program = document.getElementById("program-select").value.trim();
                const year = addForm.querySelector('select[name="academic_year"]').value.trim();
                const authors = document.getElementById("authors").value.trim();
                const abstract = document.getElementById("abstract").value.trim();

                let missing = [];
                if (!title) missing.push("Title");
                if (!adviser) missing.push("Adviser");
                if (!program) missing.push("Program");
                if (!year) missing.push("School Year");
                if (!authors) missing.push("Authors");
                if (!abstract) missing.push("Abstract");

                // Reset highlights
                document.getElementById("thesis-title").classList.remove("border-red-500");
                addForm.querySelector('select[name="adviser"]').classList.remove("border-red-500");
                document.getElementById("program-select").classList.remove("border-red-500");
                addForm.querySelector('select[name="academic_year"]').classList.remove(
                    "border-red-500");
                document.getElementById("authors").classList.remove("border-red-500");
                document.getElementById("abstract").classList.remove("border-red-500");
                uploadBtn.classList.remove("text-red-500");

                // Highlight missing fields
                if (!title) document.getElementById("thesis-title").classList.add("border-red-500");
                if (!adviser) addForm.querySelector('select[name="adviser"]').classList.add(
                    "border-red-500");
                if (!program) document.getElementById("program-select").classList.add("border-red-500");
                if (!year) addForm.querySelector('select[name="academic_year"]').classList.add(
                    "border-red-500");
                if (!authors) document.getElementById("authors").classList.add("border-red-500");
                if (!abstract) document.getElementById("abstract").classList.add("border-red-500");

                if (missing.length > 0) {
                    event.preventDefault();
                    document.getElementById('x-topText').textContent = "Missing Required Fields";
                    document.getElementById('x-subText').innerHTML =
                        "Please fill in all the fields before submitting";
                    document.getElementById('universal-x-popup').style.display = 'flex';
                    document.getElementById('inventory-table').classList.add('hidden');
                    document.getElementById('add-inventory-page').classList.remove('hidden');
                    const firstMissing = document.querySelector('.border-red-500');
                    if (firstMissing) firstMissing.scrollIntoView({
                        behavior: "smooth",
                        block: "center"
                    });
                    return;
                }
            });
        }

        // --- EDIT INVENTORY FORM ---
        const editForm = document.getElementById('edit-inventory-form');
        if (editForm) {
            const uploadBtnEdit = document.getElementById('edit-admin-upload-btn');
            const fileInputEdit = document.getElementById('edit-admin-upload-input');
            const uploadedFileContainerEdit = document.getElementById('edit-admin-uploaded-file');
            const fileNameSpanEdit = document.getElementById('adminEdit-file-name');
            const cancelUploadBtnEdit = document.getElementById('edit-admin-cancel-upload-btn');

            uploadBtnEdit.addEventListener('click', function() {
                fileInputEdit.click();
            });

            fileInputEdit.addEventListener('change', function() {
                if (fileInputEdit.files.length > 0) {
                    fileNameSpanEdit.textContent = fileInputEdit.files[0].name;
                    uploadedFileContainerEdit.classList.remove('hidden');
                    uploadedFileContainerEdit.classList.add('flex');
                } else {
                    uploadedFileContainerEdit.classList.add('hidden');
                }
            });

            cancelUploadBtnEdit.addEventListener('click', function(event) {
                event.preventDefault();
                fileInputEdit.value = '';
                fileNameSpanEdit.textContent = '';
                uploadedFileContainerEdit.classList.add('hidden');
            });

            editForm.addEventListener('submit', function(event) {
                const title = document.getElementById("edit-thesis-title").value.trim();
                const authors = document.getElementById("edit-authors").value.trim();
                const abstract = document.getElementById("edit-abstract").value.trim();
                const adviser = editForm.querySelector('select[name="adviser"]').value.trim();
                const program = document.getElementById("edit-program-select").value.trim();
                const year = editForm.querySelector('select[name="academic_year"]').value.trim();

                let missing = [];
                if (!title) missing.push("Title");
                if (!adviser) missing.push("Adviser");
                if (!program) missing.push("Program");
                if (!year) missing.push("School Year");
                if (!authors) missing.push("Authors");
                if (!abstract) missing.push("Abstract");

                // Reset highlights
                document.getElementById("edit-thesis-title").classList.remove("border-red-500");
                editForm.querySelector('select[name="adviser"]').classList.remove("border-red-500");
                document.getElementById("edit-program-select").classList.remove("border-red-500");
                editForm.querySelector('select[name="academic_year"]').classList.remove(
                    "border-red-500");
                document.getElementById("edit-authors").classList.remove("border-red-500");
                document.getElementById("edit-abstract").classList.remove("border-red-500");

                // Highlight missing
                if (!title) document.getElementById("edit-thesis-title").classList.add(
                    "border-red-500");
                if (!adviser) editForm.querySelector('select[name="adviser"]').classList.add(
                    "border-red-500");
                if (!program) document.getElementById("edit-program-select").classList.add(
                    "border-red-500");
                if (!year) editForm.querySelector('select[name="academic_year"]').classList.add(
                    "border-red-500");
                if (!authors) document.getElementById("edit-authors").classList.add("border-red-500");
                if (!abstract) document.getElementById("edit-abstract").classList.add("border-red-500");

                if (missing.length > 0) {
                    event.preventDefault();
                    document.getElementById('x-topText').textContent = "Missing Required Fields";
                    document.getElementById('x-subText').innerHTML =
                        "Please fill in all the fields before submitting";
                    document.getElementById('universal-x-popup').style.display = 'flex';
                    document.getElementById('inventory-table').classList.add('hidden');
                    document.getElementById('edit-inventory-page').classList.remove('hidden');
                    const firstMissing = document.querySelector('.border-red-500');
                    if (firstMissing) firstMissing.scrollIntoView({
                        behavior: "smooth",
                        block: "center"
                    });
                    return;
                }
            });
        }
    });
</script>
