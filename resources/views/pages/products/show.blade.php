@extends('layouts.app')

@section('title', $product['name'].' | Perfexa Media Limited')
@section('description', $product['description'])

@section('content')
    <div class="bg-white">
        <nav aria-label="Breadcrumb" class="mx-auto max-w-[1440px] px-6 pt-8 lg:px-10">
            <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-neutral-500 sm:text-sm">
                <li><a href="{{ url('/') }}" class="transition hover:text-[#1557D6]">Home</a></li>
                <li aria-hidden="true">/</li>
                <li><a href="{{ url('/') }}" class="transition hover:text-[#1557D6]">All Products</a></li>
                <li aria-hidden="true">/</li>
                <li>{{ $product['category'] }}</li>
                <li aria-hidden="true">/</li>
                <li class="font-medium text-neutral-900" aria-current="page">{{ $product['name'] }}</li>
            </ol>
        </nav>

        <section class="mx-auto grid max-w-[1440px] items-center gap-12 px-6 py-12 sm:py-16 lg:grid-cols-2 lg:gap-16 lg:px-10 lg:py-20">
            <div class="max-w-2xl">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1557D6]">{{ $product['category'] }}</p>
                <h1 class="mt-5 text-5xl font-semibold leading-[0.98] tracking-[-0.055em] text-[#111936] sm:text-6xl lg:text-7xl">
                    {{ $product['name'] }}
                </h1>
                <p class="mt-7 max-w-xl text-lg leading-8 text-neutral-600">
                    {{ $product['description'] }}
                </p>
                <a href="{{ config('contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="mt-9 inline-flex items-center gap-4 bg-[#1557D6] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#0F45AE]">
                    Discuss a project <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="relative">
                @if (is_file(public_path($product['image'])))
                    <img
                        src="{{ asset($product['image']) }}"
                        alt="{{ $product['name'] }}"
                        class="h-auto w-full object-contain"
                    >
                @else
                    <div class="product-image-placeholder w-full py-28" role="img" aria-label="{{ $product['name'] }} image placeholder">
                        <span class="product-placeholder-mark" aria-hidden="true"></span>
                        <div class="relative z-10 text-center">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1557D6]">Product visual</p>
                            <p class="mt-3 text-sm text-neutral-500">Add an image to</p>
                            <p class="mt-1 text-xs font-medium text-neutral-700">public/{{ $product['image'] }}</p>
                        </div>
                    </div>
                @endif
                <p class="mt-3 text-xs text-neutral-400">A dedicated space for Perfexa product photography.</p>
            </div>
        </section>

        <section class="border-y border-neutral-200 bg-[#F7F8FA]">
            <div class="mx-auto grid max-w-[1440px] gap-12 px-6 py-16 lg:grid-cols-12 lg:gap-16 lg:px-10 lg:py-24">
                <div class="lg:col-span-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1557D6]">About the product</p>
                    <h2 class="mt-5 text-3xl font-semibold leading-tight tracking-[-0.04em] text-[#111936] sm:text-4xl">
                        Made to carry your message into the world.
                    </h2>
                </div>
                <div class="grid gap-10 sm:grid-cols-2 lg:col-span-8">
                    <div>
                        <h3 class="text-sm font-semibold text-neutral-900">Product overview</h3>
                        <p class="mt-3 text-sm leading-7 text-neutral-600">{{ $product['description'] }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-neutral-900">What it is used for</h3>
                        <p class="mt-3 text-sm leading-7 text-neutral-600">{{ $product['purpose'] }}</p>
                    </div>
                </div>
            </div>
        </section>

        @if (count($product['types']))
            <section class="mx-auto max-w-[1440px] px-6 py-16 lg:px-10 lg:py-24">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1557D6]">Available types</p>
                    <h2 class="mt-4 text-4xl font-semibold tracking-[-0.045em] text-[#111936] sm:text-5xl">Find the right format.</h2>
                    <p class="mt-5 text-base leading-7 text-neutral-600">
                        Explore the options below and share your intended use and artwork when discussing your project.
                    </p>
                </div>

                <div class="mt-12 grid gap-x-6 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($product['types'] as $type)
                        <article>
                            @if (is_file(public_path($type['image'])))
                                <img
                                    src="{{ asset($type['image']) }}"
                                    alt="{{ $type['name'] }}"
                                    class="h-auto w-full object-contain"
                                >
                            @else
                                <div class="product-image-placeholder w-full py-24" role="img" aria-label="{{ $type['name'] }} image placeholder">
                                    <span class="product-placeholder-mark" aria-hidden="true"></span>
                                    <div class="relative z-10 text-center">
                                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1557D6]">Type photograph</p>
                                        <p class="mt-3 text-sm text-neutral-500">Add an image to</p>
                                        <p class="mt-1 max-w-full break-all px-4 text-xs font-medium text-neutral-700">public/{{ $type['image'] }}</p>
                                    </div>
                                </div>
                            @endif
                            <h3 class="mt-5 text-xl font-semibold tracking-tight text-[#111936]">{{ $type['name'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-neutral-600">{{ $type['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="bg-[#111936] text-white">
            <div class="mx-auto grid max-w-[1440px] gap-10 px-6 py-16 lg:grid-cols-12 lg:items-center lg:px-10 lg:py-20">
                <div class="lg:col-span-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-white/50">Why Perfexa</p>
                </div>
                <div class="lg:col-span-8">
                    <h2 class="max-w-3xl text-3xl font-semibold leading-tight tracking-[-0.04em] sm:text-4xl">
                        Thoughtful print, shaped around your brief.
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-white/70">
                        Share your artwork, intended application and preferences with our team. We can discuss suitable formats and the print considerations relevant to your project.
                    </p>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-[1440px] px-6 py-16 lg:px-10 lg:py-24">
            <div class="flex flex-col items-start justify-between gap-8 border-t border-neutral-200 pt-10 sm:flex-row sm:items-end">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1557D6]">Start a conversation</p>
                    <h2 class="mt-4 text-3xl font-semibold tracking-[-0.045em] text-[#111936] sm:text-5xl">
                        Need {{ strtolower($product['name']) }} for your brand?
                    </h2>
                </div>
                <a href="{{ config('contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="inline-flex shrink-0 items-center gap-4 bg-[#1557D6] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#0F45AE]">
                    Request a Quote <span aria-hidden="true">→</span>
                </a>
            </div>
        </section>
    </div>
@endsection
