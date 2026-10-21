<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Perfexa Media Limited')</title>

    <meta
        name="description"
        content="@yield('description', 'Perfexa Media Limited — Print, Design and Branding Solutions.')"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-white text-neutral-950 antialiased">

    <div id="site-preloader" class="site-preloader" role="status" aria-label="Loading Perfexa Media">
        <div class="site-preloader__content">
            <img
                src="{{ asset('images/perfexa-logo.png') }}"
                alt=""
                class="site-preloader__logo"
                fetchpriority="high"
            >
            <div class="site-preloader__track" aria-hidden="true">
                <span></span>
            </div>
            <span class="sr-only">Loading Perfexa Media</span>
        </div>
    </div>
    <script>
        (() => {
            const preloader = document.getElementById('site-preloader');
            if (!preloader) return;

            const startedAt = performance.now();
            let finished = false;
            const finishLoading = () => {
                if (finished) return;
                finished = true;

                window.setTimeout(() => {
                    preloader.classList.add('is-hidden');
                    document.body.classList.remove('site-preloader-active');
                    window.setTimeout(() => preloader.classList.remove('is-active'), 300);
                }, Math.max(0, 400 - (performance.now() - startedAt)));
            };

            preloader.classList.add('is-active');
            document.body.classList.add('site-preloader-active');

            if (document.readyState === 'complete') {
                finishLoading();
            } else {
                window.addEventListener('load', finishLoading, { once: true });
            }

            window.setTimeout(finishLoading, 6000);
        })();
    </script>

    @php
        $productMegaMenu = collect(config('products.categories'))
            ->map(fn ($category) => [
                'name' => $category['name'],
                'slug' => \Illuminate\Support\Str::slug($category['name']),
                'products' => collect($category['products'])
                    ->map(fn ($product, $slug) => [
                        'name' => $product['name'],
                        'slug' => $slug,
                    ])
                    ->values()
                    ->all(),
            ])
            ->values()
            ->all();
    @endphp

    {{-- Header --}}
    <header
        x-data="{
            open: false,
            productsOpen: false,
            activeCategory: 0,
            mobileCategory: null,
            productCategories: @js($productMegaMenu),
            selectCategory(index) {
                this.activeCategory = index;
            }
        }"
        class="fixed inset-x-0 top-0 z-50 border-b border-black/10 bg-white/95 backdrop-blur-md"
        @click.outside="productsOpen = false; open = false; mobileCategory = null"
        @keydown.escape.window="productsOpen = false; open = false; mobileCategory = null"
    >
        <div class="mx-auto flex h-20 max-w-[1440px] items-center justify-between px-6 lg:px-10">

            {{-- Logo --}}
        <a
            href="{{ url('/') }}"
            class="flex items-center"
            aria-label="Perfexa Media Limited"
        >
            <img
                src="{{ asset('images/perfexa-logo.png') }}"
                alt="Perfexa Media Limited"
                class="h-12 w-auto object-contain"
            >
        </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-8 lg:flex">

                <a
                    href="{{ url('/') }}"
                    @if (request()->routeIs('home')) aria-current="page" @endif
                    @class([
                        'text-sm font-medium transition hover:text-[#1557D6]',
                        'text-[#1557D6]' => request()->routeIs('home'),
                        'text-neutral-700' => !request()->routeIs('home'),
                    ])
                >
                    Home
                </a>

                <a
                href="{{ route('portfolio') }}"
                @if (request()->routeIs('portfolio')) aria-current="page" @endif
                @class([
                    'text-sm font-medium transition hover:text-[#1557D6]',
                    'text-[#1557D6]' => request()->routeIs('portfolio'),
                    'text-neutral-700' => !request()->routeIs('portfolio'),
                ])
            >
                Portfolio
            </a>

                <div class="relative flex items-center gap-1">
                    <a
                        href="{{ route('products.index') }}"
                        @mouseenter="productsOpen = true"
                        @focus="productsOpen = true"
                        @if (request()->routeIs('products.index')) aria-current="page" @endif
                        class="text-sm font-medium transition hover:text-[#1557D6] {{ request()->routeIs('products.index') ? 'text-[#1557D6]' : 'text-neutral-700' }}"
                    >
                        All Products
                    </a>
                    <button
                        type="button"
                        @click="productsOpen = !productsOpen"
                        :aria-expanded="productsOpen"
                        aria-haspopup="true"
                        aria-label="Toggle All Products menu"
                        class="inline-flex items-center text-neutral-700 transition hover:text-[#1557D6]"
                    >
                        <svg class="h-3.5 w-3.5 transition-transform" :class="{ 'rotate-180': productsOpen }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.22 7.22a.75.75 0 0 1 1.06 0L10 10.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 8.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                </div>

                <a
                    href="{{ url('/about') }}"
                    @if (request()->is('about')) aria-current="page" @endif
                    @class([
                        'text-sm font-medium transition hover:text-[#1557D6]',
                        'text-[#1557D6]' => request()->is('about'),
                        'text-neutral-700' => !request()->is('about'),
                    ])
                >
                    About
                </a>

                <a
                    href="{{ route('contact') }}"
                    @if (request()->is('contact')) aria-current="page" @endif
                    @class([
                        'text-sm font-medium transition hover:text-[#1557D6]',
                        'text-[#1557D6]' => request()->is('contact'),
                        'text-neutral-700' => !request()->is('contact'),
                    ])
                >
                    Contact
                </a>

            </nav>

            {{-- Desktop CTA --}}
            <a
                href="{{ config('contact.whatsapp_url') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="hidden bg-[#1557D6] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#0F45AE] lg:inline-flex"
            >
                Get in Touch
            </a>

            {{-- Mobile Menu Button --}}
            <button
                type="button"
                @click="open = !open"
                class="flex h-10 w-10 items-center justify-center border border-black/10 lg:hidden"
                aria-label="Toggle navigation"
            >
                <span class="text-xl" x-text="open ? '×' : '☰'"></span>
            </button>

        </div>

        {{-- Desktop product mega menu --}}
        <section
            x-cloak
            x-show="productsOpen"
            x-transition.opacity.duration.150ms
            class="absolute left-1/2 top-full z-40 hidden w-[min(94vw,1120px)] -translate-x-1/2 border border-neutral-200 bg-white shadow-[0_18px_45px_-24px_rgba(15,23,42,0.28)] lg:block"
            aria-label="All products"
        >
            <div class="grid max-h-[min(72vh,620px)] grid-cols-[minmax(0,0.9fr)_minmax(0,1.6fr)] overflow-y-auto">
                <div class="border-r border-neutral-200 bg-neutral-50/70 px-5 py-6">
                    <p class="mb-4 px-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-neutral-500">Explore products</p>
                    <nav class="space-y-1" aria-label="Product categories">
                        <template x-for="(category, categoryIndex) in productCategories" :key="category.name">
                            <button
                                type="button"
                                @mouseenter="selectCategory(categoryIndex)"
                                @focus="selectCategory(categoryIndex)"
                                @click="selectCategory(categoryIndex)"
                                :aria-current="activeCategory === categoryIndex ? 'true' : null"
                                :class="activeCategory === categoryIndex ? 'bg-white text-[#1557D6] shadow-[inset_3px_0_0_#1557D6]' : 'text-neutral-700 hover:bg-white/80 hover:text-neutral-950'"
                                class="flex min-h-12 w-full items-center justify-between gap-3 px-4 py-3 text-left text-sm font-medium leading-5 transition-colors duration-150"
                            >
                                <span class="min-w-0" x-text="category.name"></span>
                                <svg class="h-4 w-4 shrink-0 text-neutral-400 transition-colors" :class="{ 'text-[#1557D6]': activeCategory === categoryIndex }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 0 1 .02-1.06L10.94 10 7.23 6.29a.75.75 0 1 1 1.06-1.06l4.24 4.24a.75.75 0 0 1 0 1.06l-4.24 4.24a.75.75 0 0 1-1.08 0Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </template>
                    </nav>
                </div>

                <div class="px-7 py-6">
                    <div class="mb-4 flex items-end justify-between gap-4 border-b border-neutral-200 pb-4">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-neutral-500">Selected category</p>
                            <h2 class="mt-2 text-lg font-semibold leading-6 tracking-tight text-[#171717]" x-text="productCategories[activeCategory].name"></h2>
                        </div>
                        <a
                            :href="'{{ route('products.index') }}#' + productCategories[activeCategory].slug"
                            @click="productsOpen = false; open = false"
                            class="mb-0.5 shrink-0 text-xs font-semibold text-[#1557D6] transition-colors hover:text-[#0F45AE]"
                        >
                            View category <span aria-hidden="true">→</span>
                        </a>
                    </div>
                    <nav class="grid grid-cols-2 gap-x-6" aria-label="Products in selected category">
                        <template x-for="product in productCategories[activeCategory].products" :key="product.slug">
                            <a
                                :href="'{{ route('products.index') }}#' + product.slug"
                                @click="productsOpen = false; open = false"
                                class="group flex min-h-14 items-center justify-between gap-3 border-b border-neutral-100 px-3 py-3 text-sm font-medium leading-5 text-neutral-700 transition-colors hover:border-neutral-200 hover:bg-neutral-50 hover:text-[#1557D6]"
                            >
                                <span class="min-w-0" x-text="product.name"></span>
                                <svg class="h-4 w-4 shrink-0 text-neutral-300 transition-colors group-hover:text-[#1557D6]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 0 1 .02-1.06L10.94 10 7.23 6.29a.75.75 0 1 1 1.06-1.06l4.24 4.24a.75.75 0 0 1 0 1.06l-4.24 4.24a.75.75 0 0 1-1.08 0Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </template>
                    </nav>
                </div>
            </div>
        </section>

        {{-- Mobile Navigation --}}
        <div
            x-show="open"
            x-transition
            class="border-t border-black/10 bg-white lg:hidden"
        >
            <nav class="mx-auto flex max-w-[1440px] flex-col px-6 py-5">

                <a href="{{ url('/') }}" @if (request()->routeIs('home')) aria-current="page" @endif @class([
                    'border-b border-black/5 py-4 text-sm font-medium',
                    'text-[#1557D6]' => request()->routeIs('home'),
                    'text-neutral-700' => !request()->routeIs('home'),
                ])>
                    Home
                </a>

                <a href="{{ route('portfolio') }}" @if (request()->routeIs('portfolio')) aria-current="page" @endif @class([
                    'border-b border-black/5 py-4 text-sm font-medium',
                    'text-[#1557D6]' => request()->routeIs('portfolio'),
                    'text-neutral-700' => !request()->routeIs('portfolio'),
                ])>
                Portfolio
            </a>

                <div class="border-b border-black/5">
                    <div class="flex items-center justify-between">
                        <a
                            href="{{ route('products.index') }}"
                            @if (request()->routeIs('products.index')) aria-current="page" @endif
                            class="py-4 text-sm font-medium {{ request()->routeIs('products.index') ? 'text-[#1557D6]' : 'text-neutral-800' }}"
                        >
                            All Products
                        </a>
                        <button
                            type="button"
                            @click="productsOpen = !productsOpen"
                            :aria-expanded="productsOpen"
                            aria-label="Toggle All Products menu"
                            class="p-3 text-neutral-700 transition hover:text-[#1557D6]"
                        >
                            <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': productsOpen }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.22 7.22a.75.75 0 0 1 1.06 0L10 10.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 8.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div x-cloak x-show="productsOpen" x-transition class="max-h-[65vh] overflow-y-auto pb-4">
                        <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-neutral-500">Explore products</p>
                        <div class="divide-y divide-neutral-200 border-t border-neutral-200">
                            <template x-for="(category, categoryIndex) in productCategories" :key="category.name">
                                <section>
                                    <button
                                        type="button"
                                        @click="mobileCategory = mobileCategory === categoryIndex ? null : categoryIndex"
                                        :aria-expanded="mobileCategory === categoryIndex"
                                        :class="mobileCategory === categoryIndex ? 'text-[#1557D6]' : 'text-neutral-800'"
                                        class="flex min-h-14 w-full items-center justify-between gap-4 py-3 text-left text-sm font-semibold leading-5 transition-colors hover:text-[#1557D6]"
                                    >
                                        <span x-text="category.name"></span>
                                        <svg class="h-4 w-4 shrink-0 text-neutral-400 transition-transform duration-150" :class="{ 'rotate-180 text-[#1557D6]': mobileCategory === categoryIndex }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.22 7.22a.75.75 0 0 1 1.06 0L10 10.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 8.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <div x-cloak x-show="mobileCategory === categoryIndex" x-transition class="pb-4 pl-3">
                                        <a
                                            :href="'{{ route('products.index') }}#' + category.slug"
                                            @click="productsOpen = false; open = false"
                                            class="mb-2 inline-flex text-xs font-semibold text-[#1557D6] transition-colors hover:text-[#0F45AE]"
                                        >
                                            View category <span class="ml-2" aria-hidden="true">→</span>
                                        </a>
                                        <template x-for="product in category.products" :key="product.slug">
                                            <a
                                                :href="'{{ route('products.index') }}#' + product.slug"
                                                @click="productsOpen = false; open = false"
                                                class="flex min-h-11 items-center justify-between border-l border-neutral-200 py-2 pl-4 pr-2 text-sm text-neutral-700 transition-colors hover:border-[#1557D6] hover:text-[#1557D6]"
                                            >
                                                <span x-text="product.name"></span>
                                                <span class="text-neutral-400" aria-hidden="true">›</span>
                                            </a>
                                        </template>
                                    </div>
                                </section>
                            </template>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/about') }}" @if (request()->is('about')) aria-current="page" @endif @class([
                    'border-b border-black/5 py-4 text-sm font-medium',
                    'text-[#1557D6]' => request()->is('about'),
                    'text-neutral-700' => !request()->is('about'),
                ])>
                    About
                </a>

                <a href="{{ route('contact') }}" @if (request()->is('contact')) aria-current="page" @endif @class([
                    'py-4 text-sm font-medium',
                    'text-[#1557D6]' => request()->is('contact'),
                    'text-neutral-700' => !request()->is('contact'),
                ])>
                    Contact
                </a>

            </nav>
        </div>
    </header>


    {{-- Main Content --}}
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>


    {{-- Footer --}}
    <footer class="border-t border-black/10 bg-neutral-950 text-white">

        <div class="mx-auto max-w-[1440px] px-6 py-16 lg:px-10">

            <div class="grid gap-12 lg:grid-cols-12">

                {{-- Brand --}}
<div class="lg:col-span-5">

    <div class="flex items-center gap-3">

        <img
    src="{{ asset('images/perfexalogowhite.png') }}"
    alt="Perfexa Media Limited"
    class="h-12 w-auto object-contain"
        >

    </div>

    <p class="mt-6 max-w-md text-sm leading-7 text-neutral-400">
        Print, design and branding solutions built to help
        businesses show up professionally in the physical world.
    </p>

</div>


                {{-- Navigation --}}
                <div class="lg:col-span-2">

                    <p class="mb-5 text-xs font-semibold uppercase tracking-[0.18em] text-neutral-500">
                        Explore
                    </p>

                    <div class="flex flex-col gap-3">

                        <a href="{{ route('home') }}" class="text-sm text-neutral-300 transition hover:text-white">
                            Home
                        </a>

                        <a href="{{ route('portfolio') }}" class="text-sm text-neutral-300 transition hover:text-white">
                            Portfolio
                        </a>

                        <a href="{{ url('/about') }}" class="text-sm text-neutral-300 transition hover:text-white">
                            About
                        </a>

                        <a href="{{ route('contact') }}" class="text-sm text-neutral-300 transition hover:text-white">
                            Contact
                        </a>

                    </div>

                </div>


                {{-- Services --}}
                <div class="lg:col-span-2">

                    <p class="mb-5 text-xs font-semibold uppercase tracking-[0.18em] text-neutral-500">
                        Capabilities
                    </p>

                    <div class="flex flex-col gap-3 text-sm text-neutral-300">

                        <span>Large Format</span>
                        <span>Digital Print</span>
                        <span>Signage</span>
                        <span>Branding</span>

                    </div>

                </div>


                {{-- Contact --}}
                <div class="lg:col-span-3">

                    <p class="mb-5 text-xs font-semibold uppercase tracking-[0.18em] text-neutral-500">
                        Visit
                    </p>

                    <p class="text-sm leading-6 text-neutral-300">
                        32, Akeju Street,<br>
                        Shomolu, Lagos,<br>
                        Nigeria.
                    </p>

                    <a
                        href="{{ config('contact.whatsapp_url') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-6 inline-flex text-sm font-semibold text-white underline decoration-white/30 underline-offset-4 transition hover:decoration-white"
                    >
                        Start a conversation →
                    </a>

                </div>

            </div>


           {{-- Footer Bottom --}}

</div>

@stack('scripts')

</body>
</html>