@extends('layouts.app')

@section('content')

    <main>

        {{-- Work Hero --}}
<section class="page-hero relative min-h-[640px] overflow-hidden bg-[#111936] sm:min-h-[680px]">

    {{-- Hero Image Collage --}}
    <div class="absolute inset-0 grid grid-cols-2 grid-rows-4 gap-1 sm:grid-cols-4 sm:grid-rows-4">
        @foreach ([
            'independence.jpeg',
            'octobercampaign.jpeg',
            'serviceweek.jpeg',
            'lightup9japackagingandlabels.png',
            'birthdaypilliowspromotionalbrandedmaterials.png',
            'ripplesstitchessignageandbranding.png',
            'glowinglamppromotionalandbrandingmaterials.png',
            'vanroad.png',
            'vehiclebrandinblueheaven.png',
            'birthdaypromotionalandbrandin.png',
            'tastycubesvehiclebranding.png',
            'vanwait.png',
            'petyblespackaginglabels.png',
        ] as $portfolioImage)
            <img
                src="{{ asset('images/'.$portfolioImage) }}"
                alt=""
                aria-hidden="true"
                class="h-full w-full object-cover {{ $loop->index >= 8 ? '!hidden sm:!block' : '' }}"
                loading="{{ $loop->index < 8 ? 'eager' : 'lazy' }}"
                @if ($loop->index === 0) fetchpriority="high" @endif
            >
        @endforeach

        {{-- Dark overlays preserve hero text contrast --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#081126]/95 via-[#081126]/80 to-[#081126]/45 sm:to-[#081126]/25"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#081126]/45 via-transparent to-[#081126]/20"></div>

    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 mx-auto flex min-h-[520px] max-w-[1440px] items-start px-6 pt-10 pb-8 sm:min-h-[680px] sm:items-center sm:py-16 lg:px-10">

        <div class="hero-entrance max-w-2xl sm:py-16 lg:py-20">

            <p class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                Portfolio
            </p>

            {{-- Heading --}}
            <h1 class="max-w-3xl text-[clamp(2.875rem,12.3vw,3rem)] font-bold leading-[0.95] tracking-[-0.06em] text-white sm:text-6xl lg:text-[4.5rem]">
                Print.
                <br>
                Brand.
                <br>
                <span>
                    Built to be seen.
                </span>
            </h1>


            {{-- Description --}}
            <p class="mt-4 max-w-xl text-base leading-6 text-white/80 sm:mt-7 sm:leading-8 sm:text-lg">
                A selection of print, signage, branding and visual production
                work created to help businesses show up with confidence.
            </p>


            {{-- CTA --}}
            <div class="mt-4 flex flex-wrap items-center gap-4 sm:mt-10">

                <a
                    href="{{ route('portfolio') }}#selected-work"
                    class="inline-flex items-center px-2 py-4 text-sm font-semibold text-white transition hover:text-[#9DBBFF]"
                >
                    View Our Work
                    <span class="ml-3">→</span>
                </a>

            </div>

        </div>

    </div>

</section>


        {{-- Work Grid --}}
        <section id="selected-work" class="bg-white">
            <div class="mx-auto max-w-[1440px] px-6 py-20 lg:px-10 lg:py-28">
                <div class="mb-12 flex flex-col gap-4 pb-7 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#1557D6]">Selected work</p>
                        <h2 class="text-4xl font-bold tracking-[-0.05em] text-[#111936] sm:text-5xl">Made for the real world</h2>
                    </div>
                    <p class="max-w-md text-sm leading-6 text-neutral-600">
                        A few examples of campaign print and vehicle branding produced by Perfexa.
                    </p>
                </div>

                <div class="grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                    <article class="group" x-data="{ emphasized: false }">
                        <div class="overflow-hidden">
                            <button type="button" class="block w-full cursor-pointer p-0 text-left" aria-label="Toggle image emphasis for Independence Day Nigeria" :aria-pressed="emphasized" @click="emphasized = !emphasized">
                                <img
                                    src="{{ asset('images/independence.jpeg') }}"
                                    alt="Perfexa Media Independence Day Nigeria campaign design"
                                    class="h-auto w-full object-contain transition duration-500 ease-out group-hover:saturate-110"
                                    :class="{ 'saturate-110': emphasized }"
                                    loading="lazy"
                                >
                            </button>
                        </div>
                        <div class="mt-5">
                            <p class="min-h-5 text-xs font-semibold uppercase tracking-[0.14em] text-neutral-500">Digital Print · Campaign</p>
                            <h3 class="mt-2 min-h-14 text-xl font-semibold leading-7 tracking-tight text-[#111936]">Independence Day Nigeria</h3>
                        </div>
                    </article>

                    <article class="group" x-data="{ emphasized: false }">
                        <div class="overflow-hidden">
                            <button type="button" class="block w-full cursor-pointer p-0 text-left" aria-label="Toggle image emphasis for October Campaign" :aria-pressed="emphasized" @click="emphasized = !emphasized">
                                <img
                                    src="{{ asset('images/octobercampaign.jpeg') }}"
                                    alt="Perfexa Media October campaign design"
                                    class="h-auto w-full object-contain transition duration-500 ease-out group-hover:saturate-110"
                                    :class="{ 'saturate-110': emphasized }"
                                    loading="lazy"
                                >
                            </button>
                        </div>
                        <div class="mt-5">
                            <p class="min-h-5 text-xs font-semibold uppercase tracking-[0.14em] text-neutral-500">Digital Print · Campaign</p>
                            <h3 class="mt-2 min-h-14 text-xl font-semibold leading-7 tracking-tight text-[#111936]">October Campaign</h3>
                        </div>
                    </article>

                    <article class="group" x-data="{ emphasized: false }">
                        <div class="overflow-hidden">
                            <button type="button" class="block w-full cursor-pointer p-0 text-left" aria-label="Toggle image emphasis for Customer Service Week" :aria-pressed="emphasized" @click="emphasized = !emphasized">
                                <img
                                    src="{{ asset('images/serviceweek.jpeg') }}"
                                    alt="Perfexa Media Customer Service Week campaign"
                                    class="h-auto w-full object-contain transition duration-500 ease-out group-hover:saturate-110"
                                    :class="{ 'saturate-110': emphasized }"
                                    loading="lazy"
                                >
                            </button>
                        </div>
                        <div class="mt-5">
                            <p class="min-h-5 text-xs font-semibold uppercase tracking-[0.14em] text-neutral-500">Digital Print · Campaign</p>
                            <h3 class="mt-2 min-h-14 text-xl font-semibold leading-7 tracking-tight text-[#111936]">Customer Service Week</h3>
                        </div>
                    </article>

                    <article class="group" x-data="{ emphasized: false }">
                        <div class="overflow-hidden">
                            <button type="button" class="block w-full cursor-pointer p-0 text-left" aria-label="Toggle image emphasis for Light Up 9ja Packaging" :aria-pressed="emphasized" @click="emphasized = !emphasized">
                                <img
                                    src="{{ asset('images/lightup9japackagingandlabels.png') }}"
                                    alt="Light Up 9ja packaging and labels"
                                    class="h-auto w-full object-contain transition duration-500 ease-out group-hover:saturate-110"
                                    :class="{ 'saturate-110': emphasized }"
                                    loading="lazy"
                                >
                            </button>
                        </div>
                        <div class="mt-5">
                            <p class="min-h-5 text-xs font-semibold uppercase tracking-[0.14em] text-neutral-500">Packaging &amp; Labels</p>
                            <h3 class="mt-2 min-h-14 text-xl font-semibold leading-7 tracking-tight text-[#111936]">Light Up 9ja Packaging</h3>
                        </div>
                    </article>

                    @php
                        $additionalProjects = [
                            [
                                'image' => 'birthdaypilliowspromotionalbrandedmaterials.png',
                                'alt' => 'Birthday promotional branded pillows',
                                'category' => 'Promotional & Branded Materials',
                                'title' => 'Birthday Branded Pillows',
                            ],
                            [
                                'image' => 'ripplesstitchessignageandbranding.png',
                                'alt' => 'Ripples Stitches signage and branding',
                                'category' => 'Signage & Branding',
                                'title' => 'Ripples Stitches Signage',
                            ],
                            [
                                'image' => 'glowinglamppromotionalandbrandingmaterials.png',
                                'alt' => 'Glowing lamp promotional branding',
                                'category' => 'Signage & Branding',
                                'title' => 'Glowing Lamp Branding',
                            ],
                            [
                                'image' => 'vanroad.png',
                                'alt' => 'Tasty Cubes vehicle branding on a delivery truck',
                                'category' => 'Vehicle Branding',
                                'title' => 'Tasty Cubes Delivery Truck',
                            ],
                            [
                                'image' => 'vehiclebrandinblueheaven.png',
                                'alt' => 'Blue Heaven vehicle branding',
                                'category' => 'Vehicle Branding',
                                'title' => 'Blue Heaven Vehicle Branding',
                            ],
                            [
                                'image' => 'birthdaypromotionalandbrandin.png',
                                'alt' => 'Birthday promotional branding',
                                'category' => 'Promotional & Branded Materials',
                                'title' => 'Birthday Promotional Branding',
                            ],
                            [
                                'image' => 'tastycubesvehiclebranding.png',
                                'alt' => 'Tasty Cubes vehicle branding',
                                'category' => 'Vehicle Branding',
                                'title' => 'Tasty Cubes Vehicle Branding',
                            ],
                            [
                                'image' => 'vanwait.png',
                                'alt' => 'Vehicle branding project',
                                'category' => 'Vehicle Branding',
                                'title' => 'Branded Van',
                            ],
                            [
                                'image' => 'petyblespackaginglabels.png',
                                'alt' => 'Petybles packaging and labels',
                                'category' => 'Packaging & Labels',
                                'title' => 'Petybles Packaging & Labels',
                            ],
                        ];
                    @endphp

                    @foreach ($additionalProjects as $project)
                        <article class="group" x-data="{ emphasized: false }">
                            <div class="overflow-hidden">
                                <button type="button" class="block w-full cursor-pointer p-0 text-left" aria-label="Toggle image emphasis for {{ $project['title'] }}" :aria-pressed="emphasized" @click="emphasized = !emphasized">
                                    <img
                                        src="{{ asset('images/'.$project['image']) }}"
                                        alt="{{ $project['alt'] }}"
                                        class="h-auto w-full object-contain transition duration-500 ease-out group-hover:saturate-110"
                                        :class="{ 'saturate-110': emphasized }"
                                        loading="lazy"
                                    >
                                </button>
                            </div>
                            <div class="mt-5">
                                <p class="min-h-5 text-xs font-semibold uppercase tracking-[0.14em] text-neutral-500">{{ $project['category'] }}</p>
                                <h3 class="mt-2 min-h-14 text-xl font-semibold leading-7 tracking-tight text-[#111936]">{{ $project['title'] }}</h3>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- CTA --}}
        <section class="bg-[#111936] text-white">
            <div class="mx-auto max-w-[1440px] px-6 py-20 lg:px-10 lg:py-28">

                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#9DBBFF]">
                    Have something in mind?
                </p>

                <h2 class="mt-5 max-w-4xl text-4xl font-semibold leading-tight tracking-[-0.04em] sm:text-5xl lg:text-7xl">
                    Let's create something
                    <span class="text-[#9DBBFF]">worth seeing.</span>
                </h2>

                <a
                    href="{{ config('contact.whatsapp_url') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-10 inline-flex items-center bg-white px-7 py-4 text-sm font-semibold text-[#111936] transition hover:bg-neutral-100"
                >
                    Work With Us →
                </a>
            </div>
        </section>

    </main>

@endsection
