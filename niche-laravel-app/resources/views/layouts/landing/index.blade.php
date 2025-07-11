@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])

@section('title', 'Research Office')

@section('childContent')
    <!-- Top Gradient -->
    <div class="h-1 w-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E]"></div>

    <!-- Navbar -->
    <nav class="h-[3.8vw] flex justify-between items-center border-b border-b-[#dddddd] bg-[#fffff0] px-6 py-2 shadow-sm md:px-12 lg:px-24">
        <div class="flex items-center space-x-8">
            <a href="{{ route('home') }}"
               class="text-sm font-semibold {{ $page === 'home' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }}">
                Home
            </a>
            <a href="{{ route('downloads') }}"
               class="text-sm font-semibold {{ $page === 'downloads' ? 'underline text-[#9D3E3E]' : 'hover:text-[#9D3E3E]' }}">
                Downloadable forms
            </a>
        </div>
        <a href="{{ route('login') }}"
           class="text-sm font-semibold hover:text-[#9D3E3E]">
            Login
        </a>
    </nav>

    <!-- PAGE CONTENT -->
    <section class="flex flex-col items-center py-8 md:py-12 space-y-6 mb-15 mt-10 flex-grow">

        @if ($page === 'home')
            <!-- HOME UI -->
            <div class="flex space-x-4 md:space-x-8">
                <div class="h-16 w-16 md:h-20 md:w-20 rounded-full overflow-hidden">
                    <img src="{{ asset('assets/usep-logo.png') }}" class="h-full w-full object-cover" />
                </div>
                <div class="h-16 w-16 md:h-20 md:w-20 rounded-full overflow-hidden">
                    <img src="{{ asset('assets/ctet-logo.png') }}" class="h-full w-full object-cover" />
                </div>
            </div>

            <h1 class="text-2xl md:text-4xl font-bold text-[#575757]">RESEARCH OFFICE</h1>

            <!-- SEARCH FORM -->
            <form action="{{ route('search') }}" method="GET"
                  class="flex border border-[#575757] rounded overflow-hidden w-[80%] md:w-[30vw]">
                <span class="flex items-center justify-center px-3 text-[#575757]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                </span>
                <div class="place-self-center h-5 w-px bg-[#dddddd]"></div>
                <input
                    type="text"
                    name="q"
                    placeholder="Search…"
                    class="w-full px-3 py-2 text-sm md:text-base bg-[#fffff0] focus:outline-none">
            </form>

        @elseif ($page === 'downloads')
            <!-- DOWNLOADABLE FORMS UI -->
            <h1 class="text-2xl md:text-4xl font-bold text-[#575757]">RESEARCH OFFICE</h1>
            <p class="max-w-xl text-center text-[#575757] text-sm md:text-base">
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum...
            </p>
            <div class="border p-8 rounded mt-6 w-[90%] md:w-[60%]">
                <div class="flex flex-col md:flex-row md:space-x-8">
                    <div class="flex-1 space-y-2">
                        <span class="underline text-[#9D3E3E]">Downloadable #1</span>
                        <p class="text-sm text-[#575757]">Aliquam erat volutpat. Sed non venenatis sem.</p>
                    </div>
                    <div class="flex-1 space-y-2">
                        <span class="underline text-[#9D3E3E]">Downloadable #2</span>
                        <p class="text-sm text-[#575757]">Aliquam erat volutpat. Sed non venenatis sem.</p>
                    </div>
                    <div class="flex-1 space-y-2">
                        <span class="underline text-[#9D3E3E]">Downloadable #3</span>
                        <p class="text-sm text-[#575757]">Aliquam erat volutpat. Sed non venenatis sem.</p>
                    </div>
                </div>
            </div>

        @elseif (($page ?? '') === 'search')
            <!-- Search Results UI -->
            @if (!empty($results))
                <div class="w-full pl-30 pr-30">
                    <h2 class="text-xl md:text-2xl font-bold text-[#575757] mb-4">
                        Search Results for: <span class="text-[#9D3E3E]">{{ $query }}</span>
                    </h2>

                    <!-- Responsive Table for md+ screens -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full border border-[#dddddd] text-[#575757] text-sm">
                            <thead class="bg-[#D56C6C] text-[#fffff0]">
                                <tr>
                                    <th class="px-4 py-2 text-left">Title</th>
                                    <th class="px-4 py-2 text-left">Author</th>
                                    <th class="px-4 py-2 text-left">Abstract</th>
                                    <th class="px-4 py-2 text-left">Adviser</th>
                                    <th class="px-4 py-2 text-left">Program</th>
                                    <th class="px-4 py-2 text-left">School Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $item)
                                    @php
                                        $bgColor = ($loop->iteration % 2 == 0) ? 'bg-orange-50' : 'bg-[#fffff0]';
                                    @endphp
                                    <tr class="{{ $bgColor }}">
                                        <td class="px-4 py-2 align-top font-semibold">
                                            {{ $item['title'] }}
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            {{ $item['author'] }}
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            <button 
                                                type="button" 
                                                class="text-[#9D3E3E] underline text-xs hover:text-[#D56C6C]"
                                                onclick="
                                                    let row = document.getElementById('abstract-row-{{ $loop->index }}');
                                                    row.classList.toggle('hidden');
                                                "
                                            >
                                                View Abstract
                                            </button>
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            {{ $item['adviser'] }}
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            {{ $item['program'] }}
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            {{ $item['sy'] }}
                                        </td>
                                    </tr>
                                    <tr id="abstract-row-{{ $loop->index }}" class="hidden">
                                        <td colspan="6" class="px-4 py-2 bg-[#fdfdf5] text-[#575757] text-sm {{ $bgColor }}">
                                            <div class="border-t border-[#dddddd] pt-2 text-justify">
                                                <strong>Abstract:</strong> {{ $item['abstract'] }}
                                                <div class="mt-2">
                                                    <button 
                                                        type="button" 
                                                        class="text-[#9D3E3E] underline text-xs hover:text-[#D56C6C]"
                                                        onclick="
                                                            document.getElementById('abstract-row-{{ $loop->index }}').classList.add('hidden');
                                                        "
                                                    >
                                                        Hide Abstract
                                                    </button>
                                                </div>
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
                            <div class="border border-[#dddddd] rounded p-4 bg-[#fdfdf5]">
                                <div class="mb-2">
                                    <span class="text-[#9D3E3E] font-bold">{{ $item['title'] }}</span>
                                </div>
                                <div class="text-sm text-[#575757]"><strong>Author:</strong> {{ $item['author'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Abstract:</strong> {{ $item['abstract'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Adviser:</strong> {{ $item['adviser'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>Program:</strong> {{ $item['program'] }}</div>
                                <div class="text-sm text-[#575757]"><strong>School Year:</strong> {{ $item['sy'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-[#575757]">No results found.</p>
            @endif
            </div>
        @endif
    </section>

    <x-layout-partials.footer />
@endsection
