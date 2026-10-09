@extends('layouts.app')

@section('title', 'All Products — Perfexa Media Limited')
@section('description', 'Explore Perfexa Media print, signage, branding, packaging and creative services.')

@section('content')
    <div class="bg-white">
        <section class="page-hero relative isolate flex min-h-[560px] items-center overflow-hidden bg-[#111936] sm:min-h-[640px]">
            <div class="absolute inset-0">
                <img
                    src="{{ asset('images/perfexa-hero.png') }}"
                    alt="Perfexa Media wide-format printing production"
                    class="hero-media h-full w-full object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-r from-[#081126]/95 via-[#081126]/80 to-[#081126]/25"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#081126]/45 via-transparent to-[#081126]/20"></div>
            </div>

            <div class="relative z-10 mx-auto w-full max-w-[1440px] px-6 py-24 lg:px-10 lg:py-32">
                <div class="hero-entrance max-w-3xl">
                    <p class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                        Print · Design · Branding
                    </p>
                    <h1 class="max-w-4xl text-5xl font-bold leading-[0.95] tracking-[-0.06em] text-white sm:text-6xl lg:text-[4.5rem]">
                        All Products
                    </h1>
                    <p class="mt-7 max-w-2xl text-base leading-8 text-white/80 sm:text-lg">
                        Explore our print, signage, branding, packaging and creative services, organized by category.
                    </p>
                </div>
            </div>
        </section>

        <div class="mx-auto max-w-[1440px] px-6 lg:px-10">
            @foreach ($categories as $category)
                <section id="{{ $category['slug'] }}" class="scroll-mt-24 border-b border-neutral-200 py-14 sm:py-16 lg:py-20">
                    <div class="grid gap-8 lg:grid-cols-12 lg:gap-12">
                        <div class="lg:col-span-4">
                            <h2 class="mt-4 text-3xl font-semibold tracking-[-0.045em] text-[#111936] sm:text-4xl">
                                {{ $category['name'] }}
                            </h2>
                            <p class="mt-4 max-w-sm text-sm leading-7 text-neutral-600">
                                {{ $category['description'] }}
                            </p>
                            <a
                                href="{{ config('contact.whatsapp_url') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-7 inline-flex items-center gap-3 text-sm font-semibold text-[#1557D6] transition hover:text-[#0F45AE]"
                            >
                                Request a Quote <span aria-hidden="true">→</span>
                            </a>
                        </div>

                        <div class="grid gap-x-8 sm:grid-cols-2 lg:col-span-8 lg:gap-x-10">
                            @foreach ($category['products'] as $product)
                                <article id="{{ $product['slug'] }}" class="scroll-mt-24 border-t border-neutral-200 py-5 transition-colors hover:border-[#1557D6]">
                                    <h3 class="text-lg font-semibold tracking-tight text-neutral-900">
                                        {{ $product['name'] }}
                                    </h3>
                                    <p class="mt-2 text-sm leading-6 text-neutral-600">
                                        {{ $product['description'] }}
                                    </p>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
    </div>
@endsection
