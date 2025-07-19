@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Home')

@section('childContent')
    <x-layout-partials.landing-header />
    <x-popups.logout-m />

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
                <input type="text" name="q" placeholder="Search…"
                    class="w-full bg-[#fffff0] px-3 py-2 text-sm focus:outline-none md:text-base">
            </form>
        @elseif (Route::currentRouteName() === 'downloads')
            <!-- DOWNLOADABLE FORMS UI -->
            <h1 class="text-2xl font-bold text-[#575757] md:text-4xl">RESEARCH OFFICE</h1>
            <p class="max-w-xl text-center text-sm text-[#575757] md:text-base">
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum...
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
            <!-- Search Results UI -->
            @if (!empty($results))
                <div class="pl-30 pr-30 w-full">
                    <h2 class="mb-4 text-xl font-bold text-[#575757] md:text-2xl">
                        Search Results for: <span class="text-[#9D3E3E]">{{ $query }}</span>
                    </h2>

                    <!-- Responsive Table for md+ screens -->
                    <div class="hidden overflow-x-auto md:block">
                        <table class="min-w-full border border-[#dddddd] text-sm text-[#575757]">
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
                                        $bgColor = $loop->iteration % 2 == 0 ? 'bg-orange-50' : 'bg-[#fffff0]';
                                    @endphp
                                    <tr class="{{ $bgColor }}">
                                        <td class="px-4 py-2 align-top font-semibold">
                                            {{ $item['title'] }}
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            {{ $item['author'] }}
                                        </td>
                                        <td class="px-4 py-2 align-top">
                                            <button type="button"
                                                class="text-xs text-[#9D3E3E] underline hover:text-[#D56C6C]"
                                                onclick="
                                                    let row = document.getElementById('abstract-row-{{ $loop->index }}');
                                                    row.classList.toggle('hidden');
                                                ">
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
                                        <td colspan="6"
                                            class="{{ $bgColor }} bg-[#fdfdf5] px-4 py-2 text-sm text-[#575757]">
                                            <div class="border-t border-[#dddddd] pt-2 text-justify">
                                                <strong>Abstract:</strong> {{ $item['abstract'] }}
                                                <div class="mt-2">
                                                    <button type="button"
                                                        class="text-xs text-[#9D3E3E] underline hover:text-[#D56C6C]"
                                                        onclick="
                                                            document.getElementById('abstract-row-{{ $loop->index }}').classList.add('hidden');
                                                        ">
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
                </div>
            @else
                <p class="text-[#575757]">No results found.</p>
            @endif
            </div>
        @endif
    </section>

    <x-layout-partials.footer />
@endsection
