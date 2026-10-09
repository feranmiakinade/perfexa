@extends('layouts.app')

@section('title', 'Contact — Perfexa Media Limited')

@section('content')

@php
    $contactServices = [
        ['value' => 'corporate-print', 'label' => 'Corporate & Business Print'],
        ['value' => 'large-format', 'label' => 'Large Format Printing'],
        ['value' => 'signage', 'label' => 'Signage'],
        ['value' => 'branding', 'label' => 'Branding'],
        ['value' => 'production', 'label' => 'Production'],
        ['value' => 'promotional', 'label' => 'Promotional & Branded Materials'],
        ['value' => 'packaging', 'label' => 'Packaging & Labels'],
        ['value' => 'other', 'label' => 'Other'],
    ];
@endphp

{{-- =========================================================
     CONTACT HERO
========================================================= --}}
<section x-data="{}" class="contact-hero page-hero relative isolate flex min-h-[680px] items-center overflow-hidden bg-[#111936] sm:min-h-[740px]" aria-labelledby="contact-title">
    <svg
        class="pointer-events-none absolute -right-[250px] top-[72%] h-[360px] w-[440px] -translate-y-1/2 text-[#9DBBFF] opacity-[0.07] sm:-right-24 sm:top-[40%] sm:h-[440px] sm:w-[535px] sm:opacity-10 lg:-right-28 lg:top-1/2 lg:h-[560px] lg:w-[680px] lg:opacity-[0.12]"
        viewBox="0 0 680 560"
        fill="none"
        aria-hidden="true"
    >
        <path d="M125 92h344c28 0 50 22 50 50v183c0 28-22 50-50 50H290l-84 66v-66h-81c-28 0-50-22-50-50V142c0-28 22-50 50-50Z" stroke="currentColor" stroke-width="2"/>
        <path d="M149 161h249M149 209h300M149 257h207" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        <circle cx="457" cy="161" r="5" fill="currentColor"/>
        <circle cx="477" cy="161" r="5" fill="currentColor"/>
        <circle cx="497" cy="161" r="5" fill="currentColor"/>
        <path d="M358 351h189c22 0 40 18 40 40v75c0 22-18 40-40 40H443l-55 39v-39h-30c-22 0-40-18-40-40v-75c0-22 18-40 40-40Z" fill="#1557D6" fill-opacity=".35" stroke="currentColor" stroke-width="2"/>
        <path d="M388 395h135M388 427h92" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
    </svg>

    <div class="relative z-10 mx-auto grid w-full max-w-[1440px] items-center gap-12 px-6 py-20 sm:px-10 sm:py-24 lg:grid-cols-[1.15fr_0.85fr] lg:gap-20 lg:px-16 lg:py-28">
        <div class="hero-entrance max-w-3xl">
            <p class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-[#9DBBFF]">
                Get in touch
            </p>
            <h1 id="contact-title" class="max-w-3xl text-5xl font-bold leading-[0.95] tracking-[-0.06em] text-white sm:text-6xl lg:text-[4.5rem]">
                Tell us what you need.
                <span class="mt-2 block text-[#9DBBFF]">We'll take it from there.</span>
            </h1>
            <p class="mt-7 max-w-2xl text-base leading-8 text-white/80 sm:text-lg">
                Print, signage, branding or full production. Send us the brief and we'll take it from there.
            </p>

            <a href="{{ config('contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer"
               class="mt-8 inline-flex items-center gap-4 bg-[#1557D6] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#0F45AE] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                Get a quote
                <span aria-hidden="true">↗</span>
            </a>
        </div>

        <aside class="contact-hero__ticket bg-[#1557D6] p-7 text-white sm:p-9 lg:p-10" aria-label="Start a request">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/65">
                Start a request
            </p>
            <h2 class="mt-4 text-3xl font-bold tracking-[-0.04em] sm:text-4xl">
                What are you after?
            </h2>
            <p class="mt-3 text-sm leading-6 text-white/80">
                Choose a service to jump to the form.
            </p>

            <ul class="mt-7 flex flex-wrap gap-2.5">
                @foreach ($contactServices as $service)
                    <li>
                        <a
                            href="#form"
                            @click="$dispatch('select-service', { service: @js($service['value']) })"
                            class="inline-flex border border-white/35 px-4 py-2.5 text-sm font-medium transition hover:border-white hover:bg-white/10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                        >
                            {{ $service['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <a href="#form" class="mt-8 inline-flex w-full items-center justify-between bg-white px-5 py-4 text-sm font-bold text-[#111936] transition hover:bg-neutral-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                Send a request
                <span aria-hidden="true">→</span>
            </a>

            <div class="mt-8 border-t border-white/30 pt-6">
                <p class="text-xs leading-6 text-white/75">
                    Prefer to message us directly?
                </p>
                <a href="{{ config('contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="mt-2 inline-flex items-center gap-2 text-sm font-semibold text-white transition hover:text-white/75">
                    Continue on WhatsApp <span aria-hidden="true">↗</span>
                </a>
            </div>
        </aside>
    </div>
</section>


{{-- =========================================================
     CONTACT / QUOTE SECTION
========================================================= --}}
<section class="bg-white">

    <div class="mx-auto max-w-[1400px] px-6 py-24 sm:px-10 lg:px-16 lg:py-32">

        <div class="grid gap-16 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20">

            {{-- FORM --}}
            <div>

                <div class="mb-10">

                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#1557D6]">
                        Request a quote
                    </p>

                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.035em] text-[#0A0A0A] sm:text-4xl">
                        Tell us about your project.
                    </h2>

                    <p class="mt-4 max-w-xl text-sm leading-7 text-slate-500">
                        Give us a few details about what you need and our team
                        will get back to you.
                    </p>

                </div>


                <form
                    id="form"
                    x-data="{
                        whatsappUrl: @js(config('contact.whatsapp_url')),
                        service: '',
                        sendQuote(event) {
                            const formData = new FormData(event.currentTarget);
                            const fields = [
                                ['Name', formData.get('name')],
                                ['Company', formData.get('company')],
                                ['Email', formData.get('email')],
                                ['Phone', formData.get('phone')],
                                ['Service', event.currentTarget.elements.service.selectedOptions[0].text],
                                ['Project details', formData.get('message')],
                            ].filter(([, value]) => value);
                            const whatsappUrl = new URL(this.whatsappUrl);
                            whatsappUrl.searchParams.set('text', [
                                'Hello Perfexa, I would like to request a quote.',
                                ...fields.map(([label, value]) => `${label}: ${value}`),
                            ].join('\n'));
                            window.location.assign(whatsappUrl.toString());
                        }
                    }"
                    @submit.prevent="sendQuote($event)"
                    @select-service.window="service = $event.detail.service"
                    class="space-y-7"
                >

                    {{-- Name + Company --}}
                    <div class="grid gap-7 sm:grid-cols-2">

                        <div>
                            <label
                                for="name"
                                class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-[#0A0A0A]"
                            >
                                Full Name
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Your name"
                                required
                                class="contact-form-control w-full border border-neutral-200 bg-[#F7F8FA] px-4 py-3.5 text-sm text-[#111936] placeholder:text-neutral-400 transition-colors focus:border-[#1557D6] focus:bg-white focus:outline-none focus:ring-0"
                            >
                        </div>


                        <div>
                            <label
                                for="company"
                                class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-[#0A0A0A]"
                            >
                                Company / Organisation
                            </label>

                            <input
                                id="company"
                                name="company"
                                type="text"
                                placeholder="Company name"
                                class="contact-form-control w-full border border-neutral-200 bg-[#F7F8FA] px-4 py-3.5 text-sm text-[#111936] placeholder:text-neutral-400 transition-colors focus:border-[#1557D6] focus:bg-white focus:outline-none focus:ring-0"
                            >
                        </div>

                    </div>


                    {{-- Email + Phone --}}
                    <div class="grid gap-7 sm:grid-cols-2">

                        <div>
                            <label
                                for="email"
                                class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-[#0A0A0A]"
                            >
                                Email Address
                            </label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="you@example.com"
                                required
                                class="contact-form-control w-full border border-neutral-200 bg-[#F7F8FA] px-4 py-3.5 text-sm text-[#111936] placeholder:text-neutral-400 transition-colors focus:border-[#1557D6] focus:bg-white focus:outline-none focus:ring-0"
                            >
                        </div>


                        <div>
                            <label
                                for="phone"
                                class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-[#0A0A0A]"
                            >
                                Phone Number
                            </label>

                            <input
                                id="phone"
                                name="phone"
                                type="tel"
                                placeholder="+234..."
                                class="contact-form-control w-full border border-neutral-200 bg-[#F7F8FA] px-4 py-3.5 text-sm text-[#111936] placeholder:text-neutral-400 transition-colors focus:border-[#1557D6] focus:bg-white focus:outline-none focus:ring-0"
                            >
                        </div>

                    </div>


                    {{-- Service --}}
                    <div>

                        <label
                            for="service"
                            class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-[#0A0A0A]"
                        >
                            What do you need?
                        </label>

                        <div class="relative">
                            <select
                                id="service"
                                name="service"
                                x-model="service"
                                required
                                class="contact-form-control w-full appearance-none border border-neutral-200 bg-[#F7F8FA] px-4 py-3.5 pr-12 text-sm text-[#111936] transition-colors focus:border-[#1557D6] focus:bg-white focus:outline-none focus:ring-0"
                            >
                                <option value="" class="bg-white text-neutral-500">Select a category</option>
                                @foreach ($contactServices as $service)
                                    <option value="{{ $service['value'] }}" class="bg-white text-[#111936]">{{ $service['label'] }}</option>
                                @endforeach
                            </select>
                            <svg class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-500" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="m5 7.5 5 5 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                    </div>


                    {{-- Message --}}
                    <div>

                        <label
                            for="message"
                            class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-[#0A0A0A]"
                        >
                            Tell us about your project
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            placeholder="Tell us what you're looking to produce..."
                            required
                            class="contact-form-control w-full resize-y border border-neutral-200 bg-[#F7F8FA] px-4 py-3.5 text-sm leading-6 text-[#111936] placeholder:text-neutral-400 transition-colors focus:border-[#1557D6] focus:bg-white focus:outline-none focus-visible:outline-none focus:ring-0"
                        ></textarea>

                    </div>


                    {{-- Submit --}}
                    <div class="pt-3">

                        <button
                            type="submit"
                            class="group inline-flex items-center gap-5 bg-[#1557D6] px-7 py-4 text-sm font-bold text-white transition hover:bg-[#0F44AD]"
                        >
                            Request a Quote

                            <span class="transition-transform duration-300 group-hover:translate-x-1">
                                →
                            </span>
                        </button>

                    </div>

                </form>

            </div>


            {{-- CONTACT DETAILS --}}
            <aside>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#1557D6]">
                    Find us
                </p>

                <h2 class="mt-4 text-3xl font-bold tracking-[-0.035em] text-[#0A0A0A] sm:text-4xl">
                    Come by the studio.
                </h2>

                <p class="mt-4 max-w-lg text-sm leading-7 text-slate-500">
                    Visit Perfexa Media Limited in Shomolu, Lagos.
                </p>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=32+Akeju+Street+Shomolu+Lagos"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group mt-5 inline-flex items-center gap-4 text-sm font-bold text-[#0A0A0A]"
                >
                    Get Directions
                    <span class="text-[#1557D6] transition-transform duration-300 group-hover:translate-x-1">
                        →
                    </span>
                </a>

                <div class="relative mt-8 h-[300px] overflow-hidden bg-slate-200 sm:h-[380px] lg:h-[420px]">
                    <iframe
                        src="https://www.google.com/maps?q=32%20Akeju%20Street%2C%20Shomolu%2C%20Lagos&output=embed"
                        class="absolute inset-0 h-full w-full border-0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Perfexa Media Limited location on Google Maps"
                    ></iframe>
                </div>

            </aside>

        </div>

    </div>

</section>


{{-- =========================================================
     CONTACT DETAILS
========================================================= --}}
<section class="w-full bg-[#1557D6] text-white">
    <div class="mx-auto max-w-[1400px] px-6 py-14 sm:px-10 sm:py-16 lg:px-16 lg:py-20">
        <div class="flex flex-col gap-4 border-b border-white/25 pb-8 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-white/65">
                    Contact
                </p>
                <h2 class="mt-3 text-3xl font-bold tracking-[-0.035em] sm:text-4xl">
                    Contact details
                </h2>
            </div>
            <p class="max-w-md text-sm leading-6 text-white/80">
                Have a question, an idea or a production requirement? We'd be happy to hear from you.
            </p>
        </div>

        <div class="grid gap-x-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="border-b border-white/25 py-6 lg:border-b-0 lg:border-r lg:pr-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-white/65">Visit us</p>
                <p class="mt-3 text-base font-semibold leading-7">
                    32, Akeju Street, Shomolu, Lagos
                </p>
            </div>

            <div class="border-b border-white/25 py-6 sm:border-l sm:pl-6 lg:border-b-0 lg:border-l-0 lg:border-r lg:px-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-white/65">Call us</p>
                <p class="mt-3 text-base font-semibold">+234 816 019 5377</p>
            </div>

            <div class="py-6 sm:border-l sm:pl-6 lg:border-l-0 lg:pl-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-white/65">Instagram</p>
                <a
                    href="https://instagram.com/perfexa_media"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group mt-3 inline-flex items-center gap-3 text-base font-semibold"
                >
                    @perfexa_media
                    <span class="text-white/70 transition-transform duration-300 group-hover:translate-x-1">→</span>
                </a>
            </div>
        </div>
    </div>
</section>


@endsection