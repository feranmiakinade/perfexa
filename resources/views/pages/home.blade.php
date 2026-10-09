@extends('layouts.app')

@section('title', 'Perfexa Media Limited — Print, Design & Branding')
@section('description', 'Perfexa Media Limited provides print, design, signage and branding solutions in Lagos, Nigeria.')

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section
    x-data="{
        activeSlide: 0,
        slides: [
            'We bring your brand into the physical world.',
            'Print. Brand. Built to be seen.',
            'Your ideas, made tangible.'
        ],
        isSlideVisible: true,
        slideTimer: null,
        transitionTimer: null,
        init() {
            this.slideTimer = setInterval(() => this.advanceSlide(), 5000);
        },
        destroy() {
            clearInterval(this.slideTimer);
            clearTimeout(this.transitionTimer);
        },
        advanceSlide() {
            this.isSlideVisible = false;
            this.transitionTimer = setTimeout(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                this.isSlideVisible = true;
            }, 300);
        }
    }"
    class="page-hero relative min-h-[680px] overflow-hidden bg-[#111936]"
>

    {{-- Hero Image --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/perfexa-hero.png') }}"
            alt="Perfexa Media wide-format printing"
            class="hero-media absolute inset-0 h-full w-full object-cover"
        >

        <div class="absolute inset-0 bg-gradient-to-r from-[#081126]/95 via-[#081126]/80 to-[#081126]/25"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#081126]/45 via-transparent to-[#081126]/20"></div>

    </div>

    {{-- Hero Copy --}}
    <div class="relative z-10 mx-auto flex min-h-[680px] max-w-[1440px] items-center px-6 lg:px-10">
        <div class="hero-entrance max-w-2xl py-16 lg:py-20">

            <p class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                Print · Design · Branding
            </p>

            <h1
                class="min-h-[2.85em] max-w-3xl text-5xl font-bold leading-[0.95] tracking-[-0.06em] text-white transition-[opacity,transform] duration-500 ease-out motion-reduce:transition-none sm:text-6xl lg:text-[4.5rem]"
                :class="isSlideVisible ? 'translate-y-0 opacity-100' : 'translate-y-2 opacity-0'"
                aria-live="polite"
                x-text="slides[activeSlide]"
            >
                We bring your brand into the physical world.
            </h1>

            <p class="mt-7 max-w-xl text-base leading-8 text-white/80 sm:text-lg">
                Professional print, design and branding solutions for
                businesses that care about how they are seen.
            </p>

            <div class="mt-10 flex flex-col gap-3 sm:flex-row">

                <a
                    href="{{ config('contact.whatsapp_url') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center bg-[#1557D6] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#0F45AE]"
                >
                    Get a Quote
                    <span class="ml-4">→</span>
                </a>

                <a
                    href="{{ route('portfolio') }}"
                    class="inline-flex items-center justify-center border border-white/60 bg-white/10 px-6 py-4 text-sm font-semibold text-white transition hover:bg-white/20"
                >
                    View Our Work
                    <span class="ml-4">↗</span>
                </a>

            </div>

        </div>
    </div>

    {{-- Quality Prints message --}}
    <div class="absolute bottom-8 right-8 z-10 hidden max-w-sm bg-[#1557D6]/95 p-7 backdrop-blur-sm md:block">
        <p class="text-2xl font-extrabold leading-[1.05] tracking-[-0.04em] text-white sm:text-3xl">
            Quality Prints.
            <br>
            Stronger Visibility.
        </p>

        <div class="mt-5 h-px w-12 bg-white/50"></div>

        <p class="mt-4 text-xs font-medium uppercase tracking-[0.16em] text-white/70">
            Perfexa Media Limited
        </p>
    </div>

    {{-- Small image label --}}
    <div class="absolute right-6 top-6 z-10">
        <span class="bg-white px-4 py-3 text-[10px] font-bold uppercase tracking-[0.15em] text-neutral-950 shadow-sm">
            Large Format Printing
        </span>
    </div>

</section>


{{-- =========================================================
     CAPABILITIES STRIP
========================================================= --}}

<section class="border-y border-neutral-200 bg-white">

    <div class="mx-auto grid max-w-[1440px] sm:grid-cols-2 lg:grid-cols-4">

        @foreach ([
            ['Large Format', 'Large-format printing for campaigns, signage and outdoor visibility.'],
            ['Digital Print', 'High-quality digital printing for business and promotional materials.'],
            ['Signage', 'Indoor and outdoor signage designed to make your brand visible.'],
            ['Branding', 'Physical brand applications that keep your identity consistent.'],
        ] as [$title, $description])

            <a
                href="{{ match ($title) {
                    'Large Format' => route('products.index') . '#large-format-printing',
                    'Digital Print' => route('products.index') . '#design-creative-materials',
                    'Signage' => route('products.index') . '#signage',
                    'Branding' => route('products.index') . '#branding',
                    default => url('/services'),
                } }}"
                class="group border-b border-neutral-200 px-6 py-7 transition hover:bg-[#F5F7FB] sm:px-8 lg:border-b-0 lg:border-r lg:px-7 last:lg:border-r-0"
            >

                <h2 class="flex items-center justify-between gap-4 text-lg font-semibold tracking-tight text-neutral-950">
                    {{ $title }}
                    <span aria-hidden="true" class="text-[#1557D6] transition-transform group-hover:translate-x-1">→</span>
                </h2>

                <p class="mt-3 text-sm leading-6 text-neutral-600">
                    {{ $description }}
                </p>

            </a>

        @endforeach

    </div>

</section>


{{-- =========================================================
     INTRODUCTION
========================================================= --}}

<section class="bg-white">

    <div class="mx-auto max-w-[1440px] px-6 py-24 lg:px-10 lg:py-32">

        <div class="grid gap-12 lg:grid-cols-12">

            <div class="lg:col-span-7">

                <p class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-[#1557D6]">
                    Built for brands that mean business
                </p>

                <h2 class="max-w-3xl text-4xl font-extrabold leading-[0.98] tracking-[-0.055em] text-neutral-950 sm:text-6xl">
                    From ideas to
                    <span class="text-[#1557D6]">real-world impact.</span>
                </h2>

            </div>


            <div class="flex items-end lg:col-span-4 lg:col-start-9">

                <p class="max-w-md text-sm leading-7 text-neutral-600 sm:text-base">
                    At Perfexa Media, we help businesses translate their ideas
                    into high-quality print, branding and signage that create
                    visibility and leave a lasting impression.
                </p>

            </div>

        </div>


        {{-- Intro image --}}
        <div class="mt-16 grid gap-4 lg:grid-cols-12">

            <div class="relative overflow-hidden bg-neutral-200 lg:col-span-8">
                <img
                    src="{{ asset('images/workpageheroimage.png') }}"
                    alt="Perfexa Media printing production"
                    class="h-auto w-full"
                    loading="lazy"
                >

            </div>


            <div class="relative overflow-hidden bg-[#1557D6] lg:col-span-4">
                <img
                    src="{{ asset('images/perfexa-hero.png') }}"
                    alt="Perfexa Media branded print materials"
                    class="h-auto w-full"
                    loading="lazy"
                >

            </div>

        </div>


        <a
            href="{{ url('/about') }}"
            class="mt-7 inline-flex items-center text-sm font-semibold text-[#1557D6]"
        >
            Discover More
            <span class="ml-3 transition-transform hover:translate-x-1">
                →
            </span>
        </a>

    </div>

</section>


{{-- =========================================================
     FEATURED WORK
========================================================= --}}

<section class="bg-[#F5F7FB]">

    <div class="mx-auto max-w-[1440px] px-6 py-24 lg:px-10 lg:py-28">

        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div>

                <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#1557D6]">
                    Featured Work
                </p>

                <h2 class="text-4xl font-extrabold tracking-[-0.05em] text-neutral-950 sm:text-5xl">
                    Recent Projects
                </h2>

            </div>

            
        </div>


        @php
            $recentProjects = [
                ['image' => 'birthdaylargeformatprinting.png', 'alt' => 'Birthday large format print', 'category' => 'Large Format Printing', 'title' => 'Birthday Large Format Print'],
                ['image' => 'birthdaypilliowspromotionalbrandedmaterials.png', 'alt' => 'Birthday promotional branded pillows', 'category' => 'Promotional & Branded Materials', 'title' => 'Birthday Branded Pillows'],
                ['image' => 'birthdaypromotionalandbrandin.png', 'alt' => 'Birthday promotional branding', 'category' => 'Promotional & Branded Materials', 'title' => 'Birthday Promotional Branding'],
                ['image' => 'glowinglamppromotionalandbrandingmaterials.png', 'alt' => 'Glowing lamp promotional branding', 'category' => 'Signage & Branding', 'title' => 'Glowing Lamp Branding'],
                ['image' => 'lightup9japackagingandlabels.png', 'alt' => 'Light Up 9ja packaging and labels', 'category' => 'Packaging & Labels', 'title' => 'Light Up 9ja Packaging'],
                ['image' => 'petyblespackaginglabels.png', 'alt' => 'Petybles packaging and labels', 'category' => 'Packaging & Labels', 'title' => 'Petybles Packaging & Labels'],
                ['image' => 'ripplesstitchessignageandbranding.png', 'alt' => 'Ripples Stitches signage and branding', 'category' => 'Signage & Branding', 'title' => 'Ripples Stitches Signage'],
                ['image' => 'tastycubesvehiclebranding.png', 'alt' => 'Tasty Cubes vehicle branding', 'category' => 'Vehicle Branding', 'title' => 'Tasty Cubes Vehicle Branding'],
                ['image' => 'vanwait.png', 'alt' => 'Branded van project', 'category' => 'Vehicle Branding', 'title' => 'Branded Van'],
                ['image' => 'vehiclebrandinblueheaven.png', 'alt' => 'Blue Heaven vehicle branding', 'category' => 'Vehicle Branding', 'title' => 'Blue Heaven Vehicle Branding'],
                ['image' => 'independence.jpeg', 'alt' => 'Perfexa Media Independence Day Nigeria campaign design', 'category' => 'Large Format', 'title' => 'Independence Day Campaign'],
                ['image' => 'octobercampaign.jpeg', 'alt' => 'Perfexa Media October campaign design', 'category' => 'Digital Print', 'title' => 'October Campaign'],
                ['image' => 'vanroad.png', 'alt' => 'Tasty Cubes vehicle branding on a delivery truck', 'category' => 'Vehicle Branding', 'title' => 'Tasty Cubes Delivery Truck'],
                ['image' => 'serviceweek.jpeg', 'alt' => 'Perfexa Media Customer Service Week campaign', 'category' => 'Digital Print · Campaign', 'title' => 'Customer Service Week'],
            ];
        @endphp

        <div
            class="mt-12 flex items-center gap-3 sm:gap-5"
            x-data="{
                projectCount: {{ count($recentProjects) }},
                index: {{ count($recentProjects) }},
                touchStartX: 0,
                timer: null,
                paused: false,
                motionQuery: null,
                motionChangeHandler: null,
                reducedMotion: false,
                visibleCount() {
                    return window.innerWidth >= 768 ? 2 : 1;
                },
                init() {
                    this.motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
                    this.reducedMotion = this.motionQuery.matches;
                    this.motionChangeHandler = (event) => {
                        this.reducedMotion = event.matches;
                        this.$refs.track.style.transitionDuration = event.matches ? '0ms' : '800ms';
                        this.startAutoplay();
                    };
                    this.motionQuery.addEventListener('change', this.motionChangeHandler);
                    this.updateTrack();
                    this.startAutoplay();
                },
                destroy() {
                    clearInterval(this.timer);
                    this.motionQuery?.removeEventListener('change', this.motionChangeHandler);
                },
                updateTrack() {
                    this.$nextTick(() => {
                        const slide = this.$refs.track.children[this.index];
                        this.$refs.track.style.transform = `translateX(-${slide ? slide.offsetLeft : 0}px)`;
                    });
                },
                move(direction, manual = true) {
                    this.index += direction;
                    this.updateTrack();
                    if (manual) this.startAutoplay();
                },
                refresh() {
                    this.updateTrack();
                },
                finishTransition(event) {
                    if (event.target !== this.$refs.track || event.propertyName !== 'transform') return;

                    if (this.index >= this.projectCount * 2) {
                        this.reposition(this.projectCount);
                    } else if (this.index < this.projectCount) {
                        this.reposition(this.projectCount * 2 - 1);
                    }
                },
                reposition(index) {
                    this.$refs.track.style.transitionDuration = '0ms';
                    this.index = index;
                    this.updateTrack();
                    requestAnimationFrame(() => requestAnimationFrame(() => {
                        this.$refs.track.style.transitionDuration = this.reducedMotion ? '0ms' : '800ms';
                    }));
                },
                startAutoplay() {
                    clearInterval(this.timer);
                    if (this.paused || this.reducedMotion) return;
                    this.timer = setInterval(() => this.move(1, false), 4500);
                },
                pauseAutoplay() {
                    this.paused = true;
                    clearInterval(this.timer);
                },
                resumeAutoplay() {
                    this.paused = false;
                    this.startAutoplay();
                },
                touchEnd(event) {
                    const distance = this.touchStartX - event.changedTouches[0].screenX;
                    if (Math.abs(distance) > 45) this.move(distance > 0 ? 1 : -1, true);
                }
            }"
            x-init="init()"
            @resize.window.debounce.100ms="refresh()"
            @mouseenter="pauseAutoplay()"
            @mouseleave="resumeAutoplay()"
            role="region"
            aria-roledescription="carousel"
            aria-label="Recent projects carousel"
        >
            <button
                type="button"
                class="flex h-10 w-10 shrink-0 items-center justify-center text-[#1557D6] transition-colors hover:text-[#0F45AE] disabled:cursor-not-allowed disabled:text-neutral-300"
                aria-label="Previous projects"
                @click="move(-1, true)"
            >
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M19 12H5m0 0 7 7m-7-7 7-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div
                class="min-w-0 flex-1 overflow-hidden"
                x-ref="viewport"
                @touchstart.passive="touchStartX = $event.changedTouches[0].screenX"
                @touchend="touchEnd($event)"
            >
                <div
                    x-ref="track"
                    class="relative flex touch-pan-y gap-5 transition-transform duration-[800ms] ease-in-out motion-reduce:transition-none"
                    :style="`transition-duration: ${reducedMotion ? '0ms' : '800ms'}`"
                    @transitionend.self="finishTransition($event)"
                >
                    @foreach ($recentProjects as $project)
                        <article aria-hidden="true" class="group w-full shrink-0 md:w-[calc(50%_-_0.625rem)]">
                            <div class="overflow-hidden">
                                <img
                                    src="{{ asset('images/'.$project['image']) }}"
                                    alt=""
                                    class="h-auto w-full object-contain"
                                    loading="lazy"
                                >
                            </div>
                            <div class="mt-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-neutral-400">
                                    {{ $project['category'] }}
                                </p>
                                <h3 class="mt-2 text-lg font-bold tracking-[-0.03em] text-neutral-950">
                                    {{ $project['title'] }}
                                </h3>
                            </div>
                        </article>
                    @endforeach

                    @foreach ($recentProjects as $project)
                        <article class="group w-full shrink-0 md:w-[calc(50%_-_0.625rem)]">
                            <div class="overflow-hidden">
                                <img
                                    src="{{ asset('images/'.$project['image']) }}"
                                    alt="{{ $project['alt'] }}"
                                    class="h-auto w-full object-contain"
                                    loading="lazy"
                                >
                            </div>
                            <div class="mt-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-neutral-400">
                                    {{ $project['category'] }}
                                </p>
                                <h3 class="mt-2 text-lg font-bold tracking-[-0.03em] text-neutral-950">
                                    {{ $project['title'] }}
                                </h3>
                            </div>
                        </article>
                    @endforeach

                    @foreach ($recentProjects as $project)
                        <article aria-hidden="true" class="group w-full shrink-0 md:w-[calc(50%_-_0.625rem)]">
                            <div class="overflow-hidden">
                                <img
                                    src="{{ asset('images/'.$project['image']) }}"
                                    alt=""
                                    class="h-auto w-full object-contain"
                                    loading="lazy"
                                >
                            </div>
                            <div class="mt-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-neutral-400">
                                    {{ $project['category'] }}
                                </p>
                                <h3 class="mt-2 text-lg font-bold tracking-[-0.03em] text-neutral-950">
                                    {{ $project['title'] }}
                                </h3>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <button
                type="button"
                class="flex h-10 w-10 shrink-0 items-center justify-center text-[#1557D6] transition-colors hover:text-[#0F45AE] disabled:cursor-not-allowed disabled:text-neutral-300"
                aria-label="Next projects"
                @click="move(1, true)"
            >
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12h14m0 0-7-7m7 7-7 7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

    </div>

</section>


{{-- =========================================================
     FINAL CTA
========================================================= --}}

<section class="relative overflow-hidden bg-[#1557D6]">

    <div class="relative mx-auto flex max-w-[1440px] flex-col gap-10 px-6 py-20 lg:flex-row lg:items-center lg:justify-between lg:px-10 lg:py-24">

        <div>
            <p class="mb-5 text-xs font-bold uppercase tracking-[0.2em] text-white/60">
                Let's work together
            </p>

            <h2 class="max-w-3xl text-4xl font-bold leading-[1] tracking-[-0.055em] text-white sm:text-6xl">
                Have a project in mind?
                <br>
                Let's bring it to life.
            </h2>

            <p class="mt-6 max-w-xl text-sm leading-7 text-white/75 sm:text-base">
                Get in touch and let's discuss how we can bring your
                ideas into the physical world.
            </p>

        </div>


        <a
            href="{{ config('contact.whatsapp_url') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex shrink-0 items-center justify-center bg-white px-7 py-4 text-sm font-bold text-neutral-950 transition hover:bg-neutral-100"
        >
            Work With Us
            <span class="ml-4">→</span>
        </a>

    </div>

</section>

@endsection