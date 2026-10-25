@extends('layouts.app')
 
@section('title', 'All Products — Perfexa Media Limited')
@section('description', 'Explore Perfexa Media print, signage, branding, packaging and creative services.')
 
@section('content')
 
<div class="bg-white text-[#111936]">
 
    {{-- PAGE HERO --}}
    <section class="page-hero relative isolate flex min-h-[460px] items-center overflow-hidden bg-[#111936] sm:min-h-[540px] lg:min-h-[580px]">
 
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/perfexa-hero.png') }}"
                alt="Perfexa Media wide-format printing production"
                class="hero-media h-full w-full object-cover"
            >
 
            <div class="absolute inset-0 bg-gradient-to-r from-[#081126]/95 via-[#081126]/80 to-[#081126]/30"></div>
 
            <div class="absolute inset-0 bg-gradient-to-t from-[#081126]/40 via-transparent to-[#081126]/20"></div>
        </div>
 
        <div class="relative z-10 mx-auto w-full max-w-[1440px] px-6 py-20 sm:px-8 sm:py-24 lg:px-10 lg:py-28">
 
            <div class="hero-entrance max-w-3xl">
 
                <p class="mb-5 text-xs font-bold uppercase tracking-[0.22em] text-[#9DBBFF]">
                    Print · Design · Branding
                </p>
 
                <h1 class="text-5xl font-bold leading-[0.98] tracking-[-0.055em] text-white sm:text-6xl lg:text-[4.5rem]">
                    All Products
                </h1>
 
                <p class="mt-6 max-w-2xl text-base leading-7 text-white/80 sm:text-lg sm:leading-8">
                    Explore our range of print, signage, branding, packaging and creative solutions, organised by category.
                </p>
 
                <a
                    href="{{ config('contact.whatsapp_url') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-8 inline-flex items-center gap-3 rounded-md bg-[#1557D6] px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-[#0F45AE]"
                >
                    Request a Quote
                    <span aria-hidden="true">→</span>
                </a>
 
            </div>
        </div>
 
    </section>
 
 
    {{-- CATEGORY PILLS --}}
<div class="mx-auto max-w-[1440px] px-6 sm:px-10 lg:px-14">
 
    <nav
        id="category-nav"
        aria-label="Product categories"
        class="-mx-6 flex flex-nowrap gap-2 overflow-x-auto px-6 py-4 sm:-mx-10 sm:px-10 md:mx-0 md:flex-wrap md:overflow-visible md:px-0"
    >
        @foreach ($categories as $category)
            <a
                href="#{{ $category['slug'] }}"
                data-pill="{{ $category['slug'] }}"
                class="cat-pill shrink-0 whitespace-nowrap rounded-md bg-[#EEF1F6] px-4 py-2.5 text-xs font-medium text-neutral-700 transition hover:bg-[#1557D6] hover:text-white {{ $loop->first ? 'is-active' : '' }}"
            >
                {{ $category['name'] }}
            </a>
        @endforeach
    </nav>
 
</div>
 
 
<style>
    /* Active (current section) pill = blue */
    .cat-pill.is-active {
        background-color: #1557D6;
        color: #ffffff;
    }
 
    /* Mobile: swipeable row */
    @media (max-width: 767px) {
        #category-nav {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        #category-nav::-webkit-scrollbar { display: none; }
        #category-nav a { flex: 0 0 auto; white-space: nowrap; }
    }
 
    /* Prev/next arrows + counter: hidden everywhere except phones */
    .product-arrow,
    .product-counter { display: none; }
 
    /* Mobile: each category's product cards swipe sideways, one card per page */
    /* (phones only, under 640px; laptops/tablets keep the normal grid) */
    @media (max-width: 639px) {
        div.product-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 3rem;
            overflow-x: auto;
            margin-left: -1.5rem;
            margin-right: -1.5rem;
            padding: 0 1.5rem 0.5rem;
            scroll-padding-left: 1.5rem;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        div.product-row::-webkit-scrollbar { display: none; }
        div.product-row > article { flex: 0 0 100%; scroll-snap-align: start; scroll-snap-stop: always; }
 
        .product-arrow {
            display: flex;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
            width: 2.5rem;
            height: 2.5rem;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            color: #1557D6;
            box-shadow: 0 4px 12px rgba(17, 25, 54, 0.18);
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
        }
        .product-arrow:active { transform: translateY(-50%) scale(0.94); }
        .product-arrow-prev { left: 0.75rem; }
        .product-arrow-next { right: 0.75rem; }
 
        .product-counter {
            display: block;
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            z-index: 2;
            padding: 0.2rem 0.6rem;
            border-radius: 9999px;
            background: rgba(17, 25, 54, 0.75);
            color: #ffffff;
            font-size: 0.7rem;
            font-weight: 600;
            line-height: 1.2;
        }
    }
</style>
 
 
<script>
    (function () {
        var nav = document.getElementById('category-nav');
        var pills = document.querySelectorAll('.cat-pill');
        if (!nav || !pills.length) return;
 
        var items = [];
        pills.forEach(function (p) {
            var section = document.getElementById(p.dataset.pill);
            if (section) items.push({ pill: p, section: section });
        });
 
        var current = null;
 
        function setActive(pill) {
            if (current === pill) return;
            current = pill;
 
            pills.forEach(function (p) { p.classList.toggle('is-active', p === pill); });
 
            // keep the active pill visible in the scrolling bar (mobile)
            if (nav.scrollWidth > nav.clientWidth) {
                nav.scrollTo({
                    left: pill.offsetLeft - (nav.clientWidth - pill.offsetWidth) / 2,
                    behavior: 'smooth'
                });
            }
        }
 
        function onScroll() {
            var activePill = items[0].pill;
 
            // the last section whose top has passed the top area of the screen
            items.forEach(function (item) {
                if (item.section.getBoundingClientRect().top <= 160) {
                    activePill = item.pill;
                }
            });
 
            // at the very bottom of the page, keep the last category active
            if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 4) {
                activePill = items[items.length - 1].pill;
            }
 
            setActive(activePill);
        }
 
        // tapping a pill turns it blue straight away
        pills.forEach(function (p) {
            p.addEventListener('click', function () { setActive(p); });
        });
 
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('load', onScroll);
        onScroll();
    })();
</script>
 
 
    {{-- Mobile: previous / next arrows move the product row one card at a time --}}
    <script>
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.product-arrow');
            if (!btn) return;
 
            var article = btn.closest('article');
            var row = btn.closest('.product-row');
            if (!article || !row) return;
 
            var dir = parseInt(btn.dataset.dir, 10);
            var target = dir > 0 ? article.nextElementSibling : article.previousElementSibling;
            if (!target) return;
 
            // distance between the two cards' left edges = exactly one page
            var delta = target.getBoundingClientRect().left - article.getBoundingClientRect().left;
            row.scrollBy({ left: delta, behavior: 'smooth' });
        });
    </script>
 
 
    {{-- Product images: read from config/products.php (matched by product slug) --}}
    @php
        $imageMap = [];
        $imageListMap = [];

        foreach (config('products.categories', []) as $cfgCategory) {
            foreach (($cfgCategory['products'] ?? []) as $cfgSlug => $cfgProduct) {
                if (!empty($cfgProduct['image'])) {
                    $imageMap[$cfgSlug] = $cfgProduct['image'];
                }

                if (!empty($cfgProduct['images']) && is_array($cfgProduct['images'])) {
                    $imageListMap[$cfgSlug] = array_values(array_filter($cfgProduct['images']));
                } elseif (!empty($cfgProduct['image'])) {
                    $imageListMap[$cfgSlug] = [$cfgProduct['image']];
                }
            }
        }
    @endphp
 
    {{-- Automatically rotate through each product's configured images --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-product-carousel]').forEach(function (carousel) {
                var images = Array.from(carousel.querySelectorAll('[data-carousel-image]'));

                if (images.length <= 1) return;

                var currentIndex = 0;
                var interval = Number(carousel.dataset.interval) || 2000;

                window.setInterval(function () {
                    images[currentIndex].classList.remove('opacity-100');
                    images[currentIndex].classList.add('opacity-0');

                    currentIndex = (currentIndex + 1) % images.length;

                    images[currentIndex].classList.remove('opacity-0');
                    images[currentIndex].classList.add('opacity-100');
                }, interval);
            });
        });
    </script>

    {{-- ALL PRODUCT CATEGORIES --}}
    <div class="mx-auto max-w-[1440px] px-6 pb-16 sm:px-10 lg:px-14">
 
        @foreach ($categories as $category)
 
            <section
                id="{{ $category['slug'] }}"
                class="scroll-mt-24 py-8 sm:py-10 {{ !$loop->last ? 'border-b border-neutral-200' : '' }}"
            >
 
                {{-- CATEGORY HEADING --}}
                <div class="mb-6 flex items-start justify-between gap-4">
 
                    <div class="max-w-2xl">
                        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">
                            {{ $category['name'] }}
                        </h2>
 
                        @if (!empty($category['description']))
                            <p class="mt-2 text-sm leading-6 text-neutral-500">
                                {{ $category['description'] }}
                            </p>
                        @endif
                    </div>
 
                    <a
                        href="{{ $category['url'] ?? config('contact.whatsapp_url') }}"
                        @unless (!empty($category['url'])) target="_blank" rel="noopener noreferrer" @endunless
                        class="mt-1 inline-flex shrink-0 items-center gap-1.5 text-sm font-semibold text-[#1557D6] transition hover:text-[#0F45AE]"
                    >
                        View All →
                    </a>
 
                </div>
 
 
                {{-- PRODUCT CARDS (swipe row on mobile, grid from sm and up) --}}
                <div class="product-row grid grid-cols-1 gap-x-8 gap-y-14 lg:gap-x-10 lg:gap-y-16 sm:grid-cols-2 lg:grid-cols-4">
 
                    @php
    $withImage = [];
    $withoutImage = [];

    foreach ($category['products'] as $p) {
        $productImages = $p['images'] ?? ($imageListMap[$p['slug']] ?? []);
        $img = $p['image'] ?? ($imageMap[$p['slug']] ?? null);

        if (!empty($productImages) || !empty($img)) {
            $withImage[] = $p;
        } else {
            $withoutImage[] = $p;
        }
    }

    $sortedProducts = array_merge($withImage, $withoutImage);
@endphp

@foreach ($sortedProducts as $product)
 
                        <article
                            id="{{ $product['slug'] }}"
                            class="scroll-mt-28 flex flex-col"
                        >
 
                            {{-- IMAGE CARD: consistent portrait frame on mobile, tablet and desktop --}}
                            <div class="relative w-full shrink-0 overflow-hidden rounded-lg border border-neutral-200 bg-[#E9EDF5]" style="aspect-ratio: 4 / 5;">
                                @php
                                    $images = $product['images'] ?? ($imageListMap[$product['slug']] ?? []);

                                    if (empty($images)) {
                                        $singleImage = $product['image'] ?? ($imageMap[$product['slug']] ?? null);
                                        $images = !empty($singleImage) ? [$singleImage] : [];
                                    }

                                    if (!is_array($images)) {
                                        $images = [$images];
                                    }

                                    $images = array_values(array_filter($images));
                                @endphp

                                @if (count($images))
                                    <div class="absolute inset-0" data-product-carousel data-interval="2000">
                                        @foreach ($images as $imageIndex => $image)
                                            <img
                                                src="{{ asset($image) }}"
                                                alt="{{ $product['name'] }}"
                                                loading="{{ $imageIndex === 0 ? 'eager' : 'lazy' }}"
                                                class="absolute inset-0 h-full w-full object-cover transition-opacity duration-500 {{ $imageIndex === 0 ? 'opacity-100' : 'opacity-0' }}"
                                                data-carousel-image
                                            >
                                        @endforeach
                                    </div>
                                @else
                                    <div class="absolute inset-0 flex h-full w-full items-center justify-center text-[#B4BED2]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                            <rect x="3" y="4" width="18" height="16" rx="2"/>
                                            <circle cx="9" cy="10" r="1.6"/>
                                            <path d="M3 17l5-5 4 4 3-3 6 6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                @endif

                                {{-- Existing mobile counter and previous / next product buttons preserved --}}
                                @if ($loop->count > 1)
                                    <span class="product-counter" aria-hidden="true">{{ $loop->iteration }} / {{ $loop->count }}</span>

                                    @unless ($loop->first)
                                        <button type="button" class="product-arrow product-arrow-prev" data-dir="-1" aria-label="Previous product">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
                                        </button>
                                    @endunless

                                    @unless ($loop->last)
                                        <button type="button" class="product-arrow product-arrow-next" data-dir="1" aria-label="Next product">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
                                        </button>
                                    @endunless
                                @endif
                            </div>

                            {{-- CARD BODY --}}
                            <div class="flex flex-1 flex-col pt-3">
 
                                <h3 class="text-sm font-semibold text-[#111936]">
                                    {{ $product['name'] }}
                                </h3>
 
                                @if (!empty($product['description']))
                                    <p class="mt-1.5 text-xs leading-5 text-neutral-500">
                                        {{ $product['description'] }}
                                    </p>
                                @endif
 
                                <a
                                    href="{{ config('contact.whatsapp_url') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-auto inline-flex items-center gap-1.5 pt-3 text-xs font-semibold text-[#1557D6] transition hover:text-[#0F45AE]"
                                >
                                    Enquire Now →
                                </a>
 
                            </div>
 
                        </article>
 
                    @endforeach
 
                </div>
 
            </section>
 
        @endforeach
 
    </div>
 
 
   {{-- FINAL CALL TO ACTION --}}
    <section class="bg-[#111936]">
 
        <div class="mx-auto max-w-[1440px] px-6 py-16 sm:px-8 sm:py-20 lg:px-10 lg:py-24">
 
            <div class="flex flex-col justify-between gap-8 md:flex-row md:items-center">
 
                <div class="max-w-2xl">
 
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                        Let's work together
                    </p>
 
                    <h2 class="text-3xl font-semibold tracking-[-0.045em] text-white sm:text-4xl lg:text-5xl">
                        Have something in mind?
                    </h2>
 
                    <p class="mt-4 max-w-xl text-sm leading-7 text-white/70 sm:text-base">
                        Tell us what you need, and let's discuss the right print or branding solution for your business.
                    </p>
 
                </div>
 
                <a
                    href="{{ config('contact.whatsapp_url') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex shrink-0 items-center justify-center gap-3 rounded-md bg-[#1557D6] px-7 py-4 text-sm font-semibold text-white transition hover:bg-[#0F45AE]"
                >
                    Work With Us
                    <span aria-hidden="true">→</span>
                </a>
 
            </div>
 
        </div>
 
    </section>
 
</div>
 
@endsection