@extends('layouts.template.base', ['cssClass' => 'bg-[#fdfdfd]'])
@section('title', 'Home')

@section('childContent')
    <x-layout-partials.landing-header />
    <x-popups.logout-m />

    @if (Route::currentRouteName() === 'home')
        <x-popups.data-privacy-m />
    @endif
    <!-- PAGE CONTENT -->
    <section class="z-10 -mt-20 flex flex-grow flex-col items-center justify-center space-y-6 py-8 md:py-12">
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
                    class="w-full bg-[#fdfdfd] px-3 py-2 text-sm focus:outline-none md:text-base">
            </form>
        @elseif (Route::currentRouteName() === 'downloads')
            <!-- DOWNLOADABLE FORMS UI -->
            <h1 class="text-2xl font-bold text-[#575757] md:text-4xl">RESEARCH OFFICE</h1>
            <p class="max-w-full ml-[6.25%] mr-[6.25%] text-center text-sm text-[#575757] md:text-base">
                The Research Office of the University of Southeastern Philippines – Tagum-Mabini Campus (Tagum Unit) is
                responsible for overseeing the evaluation and processing of student thesis and research papers. Its primary
                function is to review submitted research proposals to ensure they meet institutional standards, providing
                either approval for implementation or feedback for revision or rejection. The office plays a vital role in
                upholding academic integrity, guiding researchers through the approval process, and promoting quality
                research aligned with the university's goals.
            </p>
            <div class="mt-6 w-[90%] rounded border p-8 md:w-[60%]">
                <div class="flex flex-col md:flex-row md:space-x-8">
                    <div class="flex-1 space-y-2">
                        <span class="text-[#9D3E3E] underline">Downloadable #1</span>
                        <p class="text-sm text-[#575757]">Aliquam erat volutpat. Sed non venenatis sem.</p>
                    </div>
                    <div class="flex-1 space-y-2">
                        <span class="text-[#9D3E3E] underline">Downloadable #2</span>
                        <p class="text-sm text-[#575757]">Aliquam erat volutpat. Sed non venenatis sem.</p>
                    </div>
                    <div class="flex-1 space-y-2">
                        <span class="text-[#9D3E3E] underline">Downloadable #3</span>
                        <p class="text-sm text-[#575757]">Aliquam erat volutpat. Sed non venenatis sem.</p>
                    </div>
                </div>
            </div>
        @elseif (Route::currentRouteName() === 'search')
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
                    class="w-full bg-[#fdfdfd] px-3 py-2 text-sm focus:outline-none md:text-base">
            </form>
            @if (!empty($results))
                <div class="pl-30 pr-30 w-full">
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
                                                class="text-xs text-[#9D3E3E] font-semibold hover:underline cursor-pointer"
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
                            <div class="rounded border border-[#dddddd] bg-[#fdfdf5] p-4">
                                <div class="mb-2">
                                    <span class="font-bold text-[#9D3E3E]">{{ $item['title'] }}</span>
                                </div>
                                <div class="text-sm text-[#575757]"><strong>Author:</strong> {{ $item['author'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Abstract:</strong> {{ $item['abstract'] }}
                                </div>
                                <div class="text-sm text-[#575757]"><strong>Adviser:</strong> {{ $item['adviser'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Program:</strong> {{ $item['program'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>School Year:</strong> {{ $item['sy'] }}</div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Custom Previous / Next Pagination -->
                    <div class="mt-4">

                        <div class="flex flex-row space-x-2 justify-end">
                            @if ($results->onFirstPage())
                                <span class="px-4 py-2 rounded border text-gray-400 cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $results->previousPageUrl() }}"
                                    class="px-4 py-2 rounded border text-[#9D3E3E] hover:bg-[#f5f5f5]">Previous</a>
                            @endif
                            <div class="text-sm text-gray-600 flex justify-center items-center">
                                Page {{ $results->currentPage() }} of {{ $results->lastPage() }}
                            </div>
                            @if ($results->hasMorePages())
                                <a href="{{ $results->nextPageUrl() }}"
                                    class="px-4 py-2 rounded border text-[#9D3E3E] hover:bg-[#f5f5f5]">Next</a>
                            @else
                                <span class="px-4 py-2 rounded border text-gray-400 cursor-not-allowed">Next</span>
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
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.addEventListener('keydown', function(e) {
            // Disable Ctrl+U, Ctrl+S, Ctrl+C, Ctrl+Shift+I, F12
            if (
                (e.ctrlKey && ['u', 's', 'c'].includes(e.key.toLowerCase())) ||
                (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === 'i') ||
                e.key === 'F12'
            ) {
                e.preventDefault();
            }
        });
        document.addEventListener('keyup', function(e) {
            if (e.key === 'PrintScreen') {
                document.body.style.filter = 'blur(10px)';
                setTimeout(() => document.body.style.filter = '', 1000);
            }
        });
        window.addEventListener('blur', () => {
            document.body.style.filter = 'blur(12px)';
        });
        window.addEventListener('focus', () => {
            document.body.style.filter = '';
        });
    </script>

    <x-layout-partials.footer />
@endsection
