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