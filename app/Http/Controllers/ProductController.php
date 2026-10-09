<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $categories = collect(config('products.categories'))
            ->map(fn ($category) => [
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $this->categoryPurpose($category['name']),
                'products' => collect($category['products'])
                    ->map(fn ($product, $slug) => [
                        'slug' => $slug,
                        'name' => $product['name'],
                        'description' => $product['description'],
                    ])
                    ->values()
                    ->all(),
            ])
            ->values()
            ->all();

        return view('pages.products.index', compact('categories'));
    }

    private function categoryPurpose(string $category): string
    {
        return match ($category) {
            'Corporate & Business Print' => 'Print materials for business communication, information sharing and brand presentation.',
            'Large Format Printing' => 'Large-scale print for promotions, events and branded spaces.',
            'Signage' => 'Signs for identifying places, guiding visitors and presenting brands in physical spaces.',
            'Branding' => 'Brand applications for workplaces, vehicles, events and customer touchpoints.',
            'Promotional & Branded Materials' => 'Branded items for everyday use, campaigns, events and customer interactions.',
            'Packaging & Labels' => 'Packaging and labels for product identification and presentation.',
            'Design & Creative Materials' => 'Creative materials for campaign messages and visual identity.',
            default => 'Print, design and branding services for business communication and presentation.',
        };
    }
}
