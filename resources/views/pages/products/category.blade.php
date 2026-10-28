@extends('layouts.app')

@section('title', $category['name'] . ' — Perfexa Media Limited')

@section('description', $category['description'])

@section('content')
<div class="bg-white text-[#111936]">

    {{-- CATEGORY HERO --}}
    <section class="relative isolate flex min-h-[360px] items-center overflow-hidden bg-[#111936] sm:min-h-[420px]">

        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-[#081126] via-[#081126]/95 to-[#1557D6]/40"></div>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-[1440px] px-6 py-16 sm:px-8 lg:px-10">

            <a
                href="{{ route('products.index') }}"
                class="mb-8 inline-flex items-center gap-2 text-sm font-semibold text-[#9DBBFF] transition hover:text-white"
            >
                <span aria-hidden="true">←</span>
                Back to All Products
            </a>

            <p class="mb-4 text-xs font-bold uppercase tracking-[0.22em] text-[#9DBBFF]">
                Print · Design · Branding
            </p>

            <h1 class="max-w-4xl text-4xl font-bold leading-tight tracking-[-0.045em] text-white sm:text-5xl lg:text-6xl">
                {{ $category['name'] }}
            </h1>

            <p class="mt-5 max-w-2xl text-base leading-7 text-white/75 sm:text-lg">
                {{ $category['description'] }}
            </p>

            <a
                href="{{ config('contact.whatsapp_url') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-8 inline-flex items-center gap-3 rounded-md bg-[#1557D6] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#0F45AE]"
            >
                Request a Quote
                <span aria-hidden="true">→</span>
            </a>

        </div>
    </section>


    {{-- CATEGORY PRODUCTS --}}
    <section class="mx-auto max-w-[1440px] px-6 py-12 sm:px-10 sm:py-16 lg:px-14">

        <div class="mb-8 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

            <div>
                <p class="mb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#1557D6]">
                    Explore our services
                </p>

                <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">
                    {{ $category['name'] }} Services
                </h2>
            </div>

            <p class="text-sm text-neutral-500">
                {{ count($category['products']) }}
                {{ count($category['products']) === 1 ? 'service' : 'services' }}
            </p>

        </div>


        <div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-4 lg:gap-x-10">

            @foreach ($category['products'] as $product)

                @php
                    $images = $product['images'] ?? [];

                    if (empty($images) && !empty($product['image'])) {
                        $images = [$product['image']];
                    }

                    $images = array_values(array_filter($images));
                @endphp

                <article class="flex flex-col">

                    {{-- PRODUCT IMAGE --}}
                    <div class="relative w-full overflow-hidden rounded-lg border border-neutral-200 bg-[#E9EDF5]"
                         style="aspect-ratio: 4 / 5;">

                        @if (count($images))
                            <div class="absolute inset-0" data-category-carousel>

                                @foreach ($images as $imageIndex => $image)
                                    <img
                                        src="{{ asset($image) }}"
                                        alt="{{ $product['name'] }}"
                                        loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                                        class="absolute inset-0 h-full w-full object-cover transition-opacity duration-500 {{ $loop->first ? 'opacity-100' : 'opacity-0' }}"
                                        data-category-image
                                    >
                                @endforeach

                            </div>
                        @else
                            <div class="absolute inset-0 flex items-center justify-center text-[#B4BED2]">
                                <span class="text-sm">Image coming soon</span>
                            </div>
                        @endif

                    </div>


                    {{-- PRODUCT DETAILS --}}
                    <div class="flex flex-1 flex-col pt-4">

                        <h3 class="text-base font-semibold text-[#111936]">
                            {{ $product['name'] }}
                        </h3>

                        @if (!empty($product['description']))
                            <p class="mt-2 text-sm leading-6 text-neutral-500">
                                {{ $product['description'] }}
                            </p>
                        @endif

                        <a
                            href="{{ config('contact.whatsapp_url') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-auto inline-flex items-center gap-1.5 pt-4 text-sm font-semibold text-[#1557D6] transition hover:text-[#0F45AE]"
                        >
                            Enquire Now →
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </section>


    {{-- BOTTOM CTA --}}
    <section class="bg-[#111936]">

        <div class="mx-auto flex max-w-[1440px] flex-col justify-between gap-6 px-6 py-12 sm:px-10 sm:py-16 md:flex-row md:items-center lg:px-14">

            <div class="max-w-2xl">

                <p class="mb-3 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                    Let's work together
                </p>

                <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    Need something customised?
                </h2>

                <p class="mt-4 text-sm leading-7 text-white/70 sm:text-base">
                    Tell us what you have in mind, and let's find the right solution for your business.
                </p>

            </div>

            <a
                href="{{ config('contact.whatsapp_url') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex shrink-0 items-center justify-center gap-3 rounded-md bg-[#1557D6] px-7 py-4 text-sm font-semibold text-white transition hover:bg-[#0F45AE]"
            >
                Talk to Our Team
                <span aria-hidden="true">→</span>
            </a>

        </div>

    </section>

</div>


{{-- AUTOMATIC PRODUCT IMAGE ROTATION --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-category-carousel]').forEach(function (carousel) {
            var images = Array.from(carousel.querySelectorAll('[data-category-image]'));

            if (images.length <= 1) return;

            var currentIndex = 0;

            window.setInterval(function () {
                images[currentIndex].classList.remove('opacity-100');
                images[currentIndex].classList.add('opacity-0');

                currentIndex = (currentIndex + 1) % images.length;

                images[currentIndex].classList.remove('opacity-0');
                images[currentIndex].classList.add('opacity-100');
            }, 2500);
        });
    });
</script>
@endsection