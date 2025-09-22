@extends('layouts.template.base', ['cssClass' => 'bg-[#fdfdfd]'])
@section('title', 'Home')

@section('childContent')
    <x-layout-partials.landing-header />
    <x-popups.logout-m />
    <x-popups.downloadable-files-one />
    <x-popups.downloadable-files-two />

    @if (Route::currentRouteName() === 'home')
        <x-popups.data-privacy-m />
    @endif
    <!-- PAGE CONTENT -->
    <section class="relative z-10 flex flex-grow flex-col items-center justify-center space-y-6 py-8 md:py-12">
        @if (Route::currentRouteName() === 'home')
            <!-- HOME UI -->
            <div class="flex space-x-4 md:space-x-8">
                <div class="h-16 w-16 overflow-hidden rounded-full md:h-20 md:w-20">
                    <img src="{{ asset('assets/usep-logo.png') }}" class="h-full w-full object-cover" />
                </div>
                <div class="h-16 w-16 overflow-hidden rounded-full md:h-20 md:w-20">
                    <img src="{{ asset('assets/ctet-logo.png') }}" class="h-full w-full object-cover" />
                </div>
            </div>

            <h1 class="text-2xl font-bold text-[#575757] md:text-4xl">RESEARCH OFFICE</h1>

            <!-- SEARCH FORM -->
            <form action="{{ route('search') }}" method="GET"
                class="flex w-[80%] overflow-hidden rounded border border-[#575757] md:w-[30vw]">
                <span class="flex items-center justify-center px-3 text-[#575757]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                </span>
                <div class="h-5 w-px place-self-center bg-[#dddddd]"></div>
                <input type="text" name="query" placeholder="Search…"
                    class="w-full bg-[#fdfdfd] px-3 py-2 text-sm focus:outline-none md:text-base" maxlength="200"
                    oninput="this.value = this.value
                        .replace(/[<>]/g, '')
                        .replace(/[\u0000-\u001F\u007F]/g, '')">
            </form>
        @elseif (Route::currentRouteName() === 'downloads')
            <!-- DOWNLOADABLE FORMS UI -->
            <!-- Back Button - Absolutely positioned at the top-right, excluded from centered content -->
            <div class="absolute right-6 top-6">
                <button onclick="history.back()"
                    class="inline-flex items-center gap-2 rounded-lg border border-[#A44444] bg-white px-3 py-2 text-[#A44444] shadow-sm transition-colors duration-200 hover:bg-[#fff5f5] focus:outline-none focus:ring-2 focus:ring-[#A44444]/30">
                    <span class="font-medium">Back</span>
                </button>
            </div>
            <div class="w-full max-w-screen-2xl">
                <div class="mt-15 flex justify-center">
                    <h1 class="text-2xl font-bold text-[#575757] md:text-4xl">RESEARCH OFFICE</h1>
                </div>
            </div>
            <p class="ml-[6.25%] mr-[6.25%] max-w-full text-center text-sm text-[#575757] md:text-base">
                The Research Center of the University of Southeastern Philippines – Tagum-Mabini Campus (Tagum Unit) is
                responsible for overseeing the evaluation and processing of student thesis and research papers. Its primary
                function is to review submitted research proposals to ensure they meet institutional standards, providing
                either approval for implementation or feedback for revision or rejection. The office plays a vital role in
                upholding academic integrity, guiding researchers through the approval process, and promoting quality
                research aligned with the university's goals.
            </p>
            <div class="mt-6 flex w-[90%] items-center justify-center rounded border p-8 md:w-[50%]">
                <div class="flex flex-col items-center justify-center md:flex-row md:space-x-8">
                    <div class="flex-1 space-y-2">
                        <span id="downloadable-one" class="cursor-pointer font-bold text-[#9D3E3E] hover:underline">R&DD
                            Forms, Templates, and References</span>
                    </div>
                    <div class="flex-1 space-y-2">
                        <span id="downloadable-two" class="cursor-pointer font-bold text-[#9D3E3E] hover:underline">R&DD MOA
                            Forms, Samples, and References</span>
                    </div>
                </div>
            </div>
        @elseif (Route::currentRouteName() === 'search')
            <!-- SEARCH FORM -->
            <div class="flex w-full items-center justify-center pl-10 pr-10">
                <form action="{{ route('search') }}" method="GET"
                    class="flex w-full overflow-hidden rounded border border-[#575757] md:w-[30vw]">
                    <span class="flex items-center justify-center px-3 text-[#575757]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                        </svg>
                    </span>
                    <div class="h-5 w-px place-self-center bg-[#dddddd]"></div>
                    <input type="text" name="query" placeholder="Search…"
                        class="w-full bg-[#fdfdfd] px-3 py-2 text-sm focus:outline-none md:text-base" maxlength="200"
                        value="{{ request('query') }}"
                        oninput="this.value = this.value
                        .replace(/[<>]/g, '')
                        .replace(/[\u0000-\u001F\u007F]/g, '')">
                </form>
            </div>

            @if (!empty($results))
                <div class="w-full pl-10 pr-10">
                    <h2 class="mb-4 text-xl font-bold text-[#575757] md:text-2xl">
                        Search Results for: <span class="text-[#9D3E3E]">{{ $query }}</span>
                    </h2>

                    <!-- Responsive Table for md+ screens -->
                    <div class="hidden overflow-x-auto md:block">
                        <table class="watermarked-table min-w-full border border-[#dddddd] text-sm text-[#575757]">
                            <thead class="bg-[#D56C6C] text-[#fdfdfd]">
                                <tr>
                                    <th class="px-4 py-2 text-left">Title</th>
                                    <th class="px-4 py-2 text-left">Author</th>
                                    <th class="px-4 py-2 text-left">Abstract</th>
                                    <th class="px-4 py-2 text-left">Adviser</th>
                                    <th class="px-4 py-2 text-left">Program</th>
                                    <th class="px-4 py-2 text-left">Academic Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $item)
                                    @php
                                        $bgColor = $loop->iteration % 2 == 0 ? 'bg-orange-50' : 'bg-[#fdfdfd]';
                                    @endphp
                                    <tr class="{{ $bgColor }}">
                                        <td class="px-4 py-2 align-top font-semibold">{{ $item['title'] }}</td>
                                        <td class="px-4 py-2 align-top">{{ $item['authors'] }}</td>
                                        <td class="px-4 py-2 align-top">
                                            <button type="button" id="view-btn-{{ $loop->index }}"
                                                class="cursor-pointer text-xs font-semibold text-[#9D3E3E] hover:underline"
                                                onclick="
                                        document.getElementById('abstract-row-{{ $loop->index }}').classList.remove('hidden');
                                        document.getElementById('view-btn-{{ $loop->index }}').classList.add('hidden');
                                        document.getElementById('hide-btn-{{ $loop->index }}').classList.remove('hidden');
                                    ">View
                                                Abstract</button>
                                            <button type="button" id="hide-btn-{{ $loop->index }}"
                                                class="hidden text-xs text-[#9D3E3E] underline hover:text-[#D56C6C]"
                                                onclick="
                                        document.getElementById('abstract-row-{{ $loop->index }}').classList.add('hidden');
                                        document.getElementById('hide-btn-{{ $loop->index }}').classList.add('hidden');
                                        document.getElementById('view-btn-{{ $loop->index }}').classList.remove('hidden');
                                    ">Hide
                                                Abstract</button>
                                        </td>
                                        <td class="px-4 py-2 align-top">{{ $item['adviser'] }}</td>
                                        <td class="px-4 py-2 align-top">{{ $item->program->name ?? 'N/A' }}</td>
                                        <td class="px-4 py-2 align-top">{{ $item['academic_year'] }}</td>
                                    </tr>
                                    <tr id="abstract-row-{{ $loop->index }}" class="hidden">
                                        <td colspan="6"
                                            class="{{ $bgColor }} bg-[#fdfdf5] px-4 py-2 text-sm text-[#575757]">
                                            <div class="border-t border-[#dddddd] pt-2 text-justify">
                                                <strong>Abstract:</strong> {{ $item['abstract'] }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Stacked Card Style for small screens -->
                    <div class="space-y-4 md:hidden">
                        @foreach ($results as $item)
                            <div class="w-full rounded border border-[#dddddd] bg-[#fdfdf5] p-4">
                                <div class="mb-2">
                                    <span class="font-bold text-[#9D3E3E]">{{ $item['title'] }}</span>
                                </div>
                                <div class="text-sm text-[#575757]"><strong>Author:</strong> {{ $item['author'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Abstract:</strong> {{ $item['abstract'] }}
                                </div>
                                <div class="text-sm text-[#575757]"><strong>Adviser:</strong> {{ $item['adviser'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Program:</strong> {{ $item['program'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>School Year:</strong> {{ $item['sy'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Custom Previous / Next Pagination -->
                    <div class="mt-4">

                        <div class="flex flex-row justify-end space-x-2">
                            @if ($results->onFirstPage())
                                <span class="cursor-not-allowed rounded border px-4 py-2 text-gray-400">Previous</span>
                            @else
                                <a href="{{ $results->previousPageUrl() }}"
                                    class="rounded border px-4 py-2 text-[#9D3E3E] hover:bg-[#f5f5f5]">Previous</a>
                            @endif
                            <div class="flex items-center justify-center text-sm text-gray-600">
                                Page {{ $results->currentPage() }} of {{ $results->lastPage() }}
                            </div>
                            @if ($results->hasMorePages())
                                <a href="{{ $results->nextPageUrl() }}"
                                    class="rounded border px-4 py-2 text-[#9D3E3E] hover:bg-[#f5f5f5]">Next</a>
                            @else
                                <span class="cursor-not-allowed rounded border px-4 py-2 text-gray-400">Next</span>
                            @endif
                        </div>
                    </div>

                </div>
            @else
                <p class="text-[#575757]">No results found.</p>
            @endif

            </div>
        @endif
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // document.addEventListener('contextmenu', event => event.preventDefault());
            // document.addEventListener('keydown', function(e) {
            //     // Disable Ctrl+U, Ctrl+S, Ctrl+C, Ctrl+Shift+I, F12
            //     if (
            //         (e.ctrlKey && ['u', 's', 'c'].includes(e.key.toLowerCase())) ||
            //         (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === 'i') ||
            //         e.key === 'F12'
            //     ) {
            //         e.preventDefault();
            //     }
            // });
            // document.addEventListener('keyup', function(e) {
            //     if (e.key === 'PrintScreen') {
            //         document.body.style.filter = 'blur(10px)';
            //         setTimeout(() => document.body.style.filter = '', 1000);
            //     }
            // });
            // window.addEventListener('blur', () => {
            //     document.body.style.filter = 'blur(12px)';
            // });
            // window.addEventListener('focus', () => {
            //     document.body.style.filter = '';
            // });

            // Downloadable files popup handlers
            const downloadableOne = document.getElementById('downloadable-one');
            const downloadableTwo = document.getElementById('downloadable-two');
            const popupOne = document.getElementById('downloadable-files-popup-one');
            const popupTwo = document.getElementById('downloadable-files-popup-two');

            if (downloadableOne) {
                downloadableOne.addEventListener('click', function() {
                    popupOne.style.display = 'flex';
                });
            }
            if (downloadableTwo) {
                downloadableTwo.addEventListener('click', function() {
                    popupTwo.style.display = 'flex';
                });
            }

            const closeBtnOne = document.getElementById('close-popup-one');
            const closeBtnTwo = document.getElementById('close-popup-two');
            if (closeBtnOne) {
                closeBtnOne.addEventListener('click', () => {
                    popupOne.style.display = 'none';
                });
            }

            if (closeBtnTwo) {
                closeBtnTwo.addEventListener('click', () => {
                    popupTwo.style.display = 'none';
                });
            }
        });
    </script>

    <x-layout-partials.footer />
@endsection
