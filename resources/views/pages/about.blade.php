@extends('layouts.app')
 
@section('title', 'About — Perfexa Media Limited')
 
@section('content')
 
{{-- =========================================================
     HERO
========================================================= --}}
<section class="page-hero about-hero relative isolate flex min-h-[680px] items-center overflow-hidden bg-[#111936] sm:min-h-[740px]">
    <div class="absolute inset-0">
        <video
            class="hero-media h-full w-full object-cover"
            autoplay
            muted
            loop
            playsinline
            preload="metadata"
            poster="{{ asset('images/perfexa-about.png') }}"
        >
            <source src="{{ asset('videos/aboutvideo.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-r from-[#081126]/95 via-[#081126]/80 to-[#081126]/25"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#081126]/45 via-transparent to-[#081126]/20"></div>
    </div>

    <div class="container relative z-10 mx-auto w-full max-w-[1440px] px-6 py-24 sm:px-8 sm:py-28 lg:px-10 lg:py-32">
        <div class="hero-entrance max-w-3xl">
            <p class="eyebrow mb-6 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                About Perfexa
            </p>

            <h1 class="max-w-3xl text-5xl font-bold leading-[0.95] tracking-[-0.06em] text-white sm:text-6xl lg:text-[4.5rem]">
                More than printing.<br>
                <span class="text-[#9DBBFF]">We build presence.</span>
            </h1>

            <p class="mt-7 max-w-xl text-base leading-8 text-white/80 sm:text-lg">
                Perfexa Media Limited is a Lagos based print, design and production company helping businesses show up better in the physical world.
            </p>

            <div class="mt-9">
                <a href="{{ config('contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer"
                   class="btn inline-flex items-center gap-3 text-sm focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#1557D6]">
                    Let’s Talk
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>
</section>
 
 
{{-- =========================================================
     OUR STORY — text left, image right
========================================================= --}}
<section class="border-y border-neutral-200 bg-neutral-50">
 
    <div class="mx-auto max-w-[1440px] px-6 py-20 sm:px-8 lg:px-10 lg:py-28">
 
        <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
 
            <div class="lg:col-span-5">
                <p class="mb-5 text-xs font-bold uppercase tracking-[0.2em] text-[#1557D6]">Who we are</p>
                <h2 class="text-4xl font-bold leading-tight tracking-[-0.05em] text-[#111936] sm:text-5xl">
                    Our Story
                </h2>
 
                <p class="mt-4 text-lg font-semibold text-[#1557D6]">
                    Making brands visible in the real world.
                </p>
 
                <div class="mt-7 space-y-5 text-base leading-7 text-neutral-600">
                    <p>
                        Perfexa started with a simple idea to make
                        high-quality printing and branding solutions
                        accessible to businesses that value professionalism,
                        creativity and impact.
                    </p>
 
                    <p>
                        Today, we work with businesses, institutions and
                        individuals to deliver print, signage and branded
                        materials that help brands make a lasting impression.
                    </p>
                </div>
            </div>
 
            <div class="relative lg:col-span-6 lg:col-start-7">
                <div class="overflow-hidden border border-neutral-200 bg-white shadow-sm">
                    <img
                        src="{{ asset('images/perfexa-hero.png') }}"
                        alt="Perfexa Media production floor"
                        class="h-auto w-full"
                    >
                </div>
            </div>
 
        </div>
 
    </div>
 
</section>
 
 
{{-- =========================================================
     OUR VALUES — icon row with dividers
========================================================= --}}
<section class="bg-white">
 
    <div class="mx-auto max-w-[1440px] px-6 py-20 sm:px-8 lg:px-10 lg:py-24">
 
        <p class="mb-5 text-xs font-bold uppercase tracking-[0.2em] text-[#1557D6]">What matters to us</p>
        <h2 class="text-4xl font-bold tracking-[-0.05em] text-[#111936] sm:text-5xl">
            Our Values
        </h2>
        <p class="mt-4 max-w-md text-base leading-7 text-neutral-600">
            What guides the work we do for every client.
        </p>
 
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12">
 
            @php
                $values = [
                    [
                        'title' => 'Quality',
                        'text'  => 'We deliver excellent results with attention to detail.',
                        'icon'  => '<path d="M12 3l7 3v5c0 4.5-3 8.2-7 10-4-1.8-7-5.5-7-10V6l7-3z"/><path d="M9 12l2 2 4-4"/>',
                    ],
                    [
                        'title' => 'Precision',
                        'text'  => 'From design to production, every detail matters.',
                        'icon'  => '<circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3"/>',
                    ],
                    [
                        'title' => 'Reliability',
                        'text'  => 'We keep our word and deliver on time.',
                        'icon'  => '<circle cx="12" cy="13" r="8"/><path d="M12 9v4l2.5 2.5M9.5 2h5"/>',
                    ],
                    [
                        'title' => 'Creativity',
                        'text'  => 'We help brands show up bold and effectively.',
                        'icon'  => '<path d="M12 3a6 6 0 00-3.5 10.9c.6.5 1 1.2 1 2V17h5v-1.1c0-.8.4-1.5 1-2A6 6 0 0012 3z"/><path d="M10 21h4"/>',
                    ],
                ];
            @endphp
 
            @foreach ($values as $value)
                <div class="px-6 py-8 sm:px-7">
 
                    <span class="flex h-11 w-11 items-center justify-center border border-[#1557D6]/20 bg-[#F4F7FF] text-[#1557D6]">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            {!! $value['icon'] !!}
                        </svg>
                    </span>
 
                    <h3 class="mt-5 text-lg font-semibold text-[#111936]">
                        {{ $value['title'] }}
                    </h3>
 
                    <p class="mt-2 max-w-xs text-sm leading-6 text-neutral-600">
                        {{ $value['text'] }}
                    </p>
 
                </div>
            @endforeach
 
        </div>
 
    </div>
 
</section>
 
 
{{-- =========================================================
     OUR APPROACH — brand blue, four-step sequence
========================================================= --}}
<section class="bg-[#111936] text-white">
 
    <div class="mx-auto max-w-[1440px] px-6 py-20 sm:px-8 lg:px-10 lg:py-24">
 
        <p class="mb-5 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">How we work</p>
        <h2 class="text-4xl font-bold tracking-[-0.05em] sm:text-5xl">
            Our Approach
        </h2>
        <p class="mt-4 max-w-lg text-base leading-7 text-white/70">
            A straightforward process designed to deliver the best results.
        </p>
 
        <ol class="mt-14 grid gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-0">
 
            @php
                $steps = [
                    ['Understand', 'We listen to your needs and requirements before getting started.'],
                    ['Design',     'We prepare and refine the right creative direction for your project.'],
                    ['Produce',    'We use professional equipment and quality materials to bring the work to life.'],
                    ['Deliver',    'We ensure your project is completed and delivered as expected.'],
                ];
            @endphp
 
            @foreach ($steps as $i => $step)
                <li class="relative lg:px-8 lg:first:pl-0 lg:last:pr-0 {{ $i > 0 ? 'lg:border-l lg:border-white/20' : '' }}">
 
                    <div class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center border border-white/30 text-sm font-semibold text-white">
                            {{ $i + 1 }}
                        </span>
                        <span class="h-px flex-1 bg-white/20 lg:hidden"></span>
                    </div>
 
                    <h3 class="mt-6 text-xl font-semibold">
                        {{ $step[0] }}
                    </h3>
 
                    <p class="mt-3 max-w-xs text-sm leading-6 text-white/70">
                        {{ $step[1] }}
                    </p>
 
                </li>
            @endforeach
 
        </ol>
 
    </div>
 
</section>
 
 
{{-- =========================================================
     FINAL CTA — blue banner with button
========================================================= --}}
<section class="bg-white">
 
    <div class="mx-auto max-w-[1440px] px-6 py-20 sm:px-8 lg:px-10 lg:py-24">
 
        <div class="bg-[#1557D6] px-8 py-12 sm:px-12 lg:px-16 lg:py-14">
 
            <div class="relative z-10 flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
 
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-bold leading-[1.08] tracking-[-0.05em] text-white sm:text-4xl lg:text-[44px]">
                        Have a project in mind?
                        <span class="block">Let's bring it to life.</span>
                    </h2>
 
                    <p class="mt-5 max-w-md text-base leading-7 text-white/75">
                        Get in touch and let's discuss how we can bring your
                        ideas into the physical world.
                    </p>
                </div>
 
                <a href="{{ config('contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex shrink-0 items-center justify-center gap-3 bg-white px-7 py-4 text-sm font-bold text-[#111936] transition hover:bg-neutral-100 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#1557D6]">
                    Work With Us
                    <span aria-hidden="true">→</span>
                </a>
 
            </div>
 
        </div>
 
    </div>
 
</section>
 
@endsection