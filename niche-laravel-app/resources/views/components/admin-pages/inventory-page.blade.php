@props(['undergraduate', 'graduate'])
<!-- Inventory Table -->
    <main id="inventory-table" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-4">
            <h1 class="text-2xl font-bold text-[#575757]">Inventory</h1>

            <!-- Responsive Actions Wrapper -->
            <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                <!-- Program Dropdown -->
                <select name="inv-dd-program"
                    class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer w-full sm:w-auto">
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

                <!-- A.Y. Dropdown -->
                <select name="inv-dd-academic_year"
                    class="px-4 py-2 rounded-lg text-[#575757] bg-white border border-gray-300 focus:outline-none focus:ring focus:ring-[#FFA104] hover:cursor-pointer w-full sm:w-auto">
                <option value="">All A.Y.</option>
                </select>

                <!-- Buttons -->
                <button id="add-inventory-btn"
                    class="px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer w-full sm:w-auto">
                Add
                </button>

                <button id="import-excel-file"
                    class="px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC360] to-[#FFA104] shadow hover:brightness-110 cursor-pointer w-full sm:w-auto">
                Import
                </button>

                <a id="export-file-btn"
                class="px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#27C50D] to-[#1CA405] shadow hover:brightness-110 cursor-pointer inline-block text-center w-full sm:w-auto">
                Export
                </a>
            </div>
        </div>


        <div class="overflow-x-auto bg-[#fdfdfd] shadow rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Author/s
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Abstract
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Adviser
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Program
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            S.Y.
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed by
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="inventory-table-body" class="bg-[#fdfdfd] divide-y divide-gray-200 text-[#575757]">
                </tbody>
            </table>

            <div id="pagination-controls-inventory" class="flex justify-end mt-4 space-x-2">
                <button onclick="changePage('inventory', -1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&lt;</button>
                <span id="pagination-info-inventory" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('inventory', 1)" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">&gt;</button>
            </div>

        </div>
    </main>

    <!-- Add Inventory page -->
    <main id="add-inventory-page" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Add Inventory</h1>

            <button class="px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer backto-inventory-btn">
                    Back
                </button>
        </div>

        <form method="POST" action="{{ route('inventory.store') }}" >
            @csrf
            <div class="border-[#c2c2c2] border-1 rounded-xl p-10 pt-0 flex justify-center">
                <div class="w-[70vw] px-4 md:px-12 lg:px-20 py-10 mx-auto flex flex-col gap-5 justify-center items-center md:grid md:grid-cols-2 md:grid-rows-4 md:gap-5">

                    <!-- LEFT COLUMN (4 stacked inputs) -->
                    <div class="flex flex-col w-full md:col-start-1 md:row-start-1">
                        <span class="text-[#575757] font-semibold text-2xl mt-13">Title</span>

                        <!-- Textarea -->
                        <textarea
                            name="title"
                            id="thesis-title"
                            placeholder="Thesis title"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="title-scan-btn"
                            data-title = "Title"
                            data-input = "thesis-title"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-2">
                        <span class="text-[#575757] font-semibold text-2xl">Adviser</span>

                        <!-- Textarea -->
                        <textarea
                            name="adviser"
                            id="adviser"
                            placeholder="Adviser"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="adviser-scan-btn"
                            data-title = "Adviser"
                            data-input = "adviser"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-3">
                        <span class="text-[#575757] font-semibold text-2xl">Program</span>

                        <div>
                            <div class="mt-5 relative">
                                <select id="program-select" name="program_id"
                                    class="min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none"
                                    required>
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
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-4">
                        <span class="text-[#575757] font-semibold text-2xl">School Year</span>
                        <div class="relative">
                            <select
                                name="academic_year"
                                class="w-full min-h-[45px] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 text-[#575757] font-light focus:border-[#D56C6C] focus:outline-none appearance-none"
                                required
                            >
                                <option value="" disabled selected>Select year</option>
                                @for ($year = 2025; $year >= 1990; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <div
                                class="pointer-events-none absolute right-3 bottom-1 -translate-y-1/2 transform text-[#575757]">
                                <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-1">
                        <span class="text-[#575757] font-semibold text-2xl">Author/s</span>

                        <!-- Textarea -->
                        <textarea
                            name="authors"
                            id="authors"
                            placeholder="Authors"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-2 md:row-span-2">
                        <span class="text-[#575757] font-semibold text-2xl">Abstract</span>

                        <!-- Textarea -->
                        <textarea
                            name="abstract"
                            id="abstract"
                            placeholder="Abstract"
                            class="w-full min-h-[41vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="abstract-scan-btn"
                            data-title = "Abstract"
                            data-input = "abstract"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-4">
                        <span class="text-[#575757] font-semibold text-2xl">Upload thesis</span>
                        <button type="button" id="admin-upload-btn" class="mt-4 px-4 py-2 w-full min-h-[45px] rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer">
                            Upload file
                        </button>

                        <!-- dispay when fikle is chosen -->
                        <div id="admin-uploaded-file" class="hidden items-center space-x-2 ml-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span id="adminUp-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-5">
                        <div class="flex justify-end mt-10">
                            <button id="submit-inventory" class="px-6 py-3 rounded-lg bg-[#4CAF50] text-white hover:brightness-110">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Edit Inventory page -->
    <main id="edit-inventory-page" class="ml-[4vw] group-hover:ml-[18vw] transition-all duration-300 ease-in-out p-8 hidden">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-[#575757]">Edit I-Thesis title-</h1>

            <button class="px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#CE6767] to-[#A44444] shadow hover:brightness-110 cursor-pointer backto-inventory-btn">
                    Back
                </button>
        </div>

        <form method="POST" action="{{ route('inventory.store') }}">
            @csrf
            <div class="border-[#c2c2c2] border-1 rounded-xl p-10 pt-0 flex justify-center">
                <div class="w-[70vw] px-4 md:px-12 lg:px-20 py-10 mx-auto flex flex-col gap-5 justify-center items-center md:grid md:grid-cols-2 md:grid-rows-4 md:gap-5">

                    <!-- LEFT COLUMN (4 stacked inputs) -->
                    <div class="flex flex-col w-full md:col-start-1 md:row-start-1">
                        <span class="text-[#575757] font-semibold text-2xl mt-13">Title</span>

                        <!-- Textarea -->
                        <textarea
                            name="edit-title"
                            id="edit-thesis-title"
                            placeholder="Thesis title"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="edit-title-scan-btn"
                            data-title = "Title"
                            data-input = "edit-thesis-title"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-2">
                        <span class="text-[#575757] font-semibold text-2xl">Adviser</span>

                        <!-- Textarea -->
                        <textarea
                            name="edit-adviser"
                            id="edit-adviser"
                            placeholder="Adviser"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="edit-adviser-scan-btn"
                            data-title = "Adviser"
                            data-input = "edit-adviser"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-3">
                        <span class="text-[#575757] font-semibold text-2xl">Program</span>

                        <div>
                            <div class="mt-5 relative">
                                <select id="edit-program-select" name="edit-program_id"
                                    class="min-h-[45px] w-full appearance-none rounded-[10px] border border-[#c2c2c2] px-4 py-2 font-light text-[#575757] focus:border-[#D56C6C] focus:outline-none"
                                    required>
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
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-1 md:row-start-4">
                        <span class="text-[#575757] font-semibold text-2xl">School Year</span>
                        <div class="relative">
                            <select
                                name="edit-academic_year"
                                class="w-full min-h-[45px] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 text-[#575757] font-light focus:border-[#D56C6C] focus:outline-none appearance-none"
                                required
                            >
                                <option value="" disabled selected>Select year</option>
                                @for ($year = 2025; $year >= 1990; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <div
                                class="pointer-events-none absolute right-3 bottom-1 -translate-y-1/2 transform text-[#575757]">
                                <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-1">
                        <span class="text-[#575757] font-semibold text-2xl">Author/s</span>

                        <!-- Textarea -->
                        <textarea
                            name="edit-authors"
                            id="edit-authors"
                            placeholder="Authors"
                            class="w-full min-h-[5vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-2 md:row-span-2">
                        <span class="text-[#575757] font-semibold text-2xl">Abstract</span>

                        <!-- Textarea -->
                        <textarea
                            name="edit-abstract"
                            id="edit-abstract"
                            placeholder="Abstract"
                            class="w-full min-h-[41vh] rounded-[10px] border border-[#c2c2c2] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] resize-none transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"
                        ></textarea>

                        <div class="flex justify-end w-full">
                            <button
                            id="edit-abstract-scan-btn"
                            data-title = "Abstract"
                            data-input = "edit-abstract"
                            class="scan-btn mt-3 px-4 py-2 rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer"
                            >
                            Scan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-4">
                        <span class="text-[#575757] font-semibold text-2xl">Upload thesis</span>
                        <button type="button" id="edit-admin-upload-btn" class="mt-4 px-4 py-2 w-full min-h-[45px] rounded-lg text-[#fdfdfd] bg-gradient-to-r from-[#FFC15C] to-[#FFA206] shadow hover:brightness-110 cursor-pointer">
                            Upload file
                        </button>

                        <!-- dispay when fikle is chosen -->
                        <div id="admin-uploaded-file" class="hidden items-center space-x-2 ml-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span id="adminUp-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col w-full  md:col-start-2 md:row-start-5">
                        <div class="flex justify-end mt-10">
                            <button id="edit-submit-inventory" class="px-6 py-3 rounded-lg bg-[#4CAF50] text-white hover:brightness-110">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>