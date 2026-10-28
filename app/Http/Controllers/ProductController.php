<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $categories = $this->getCategories();

        return view('pages.products.index', compact('categories'));
    }

    public function showCategory(string $slug): View
    {
        $categories = collect($this->getCategories());

        $category = $categories->firstWhere('slug', $slug);

        abort_if(!$category, 404);

        return view('pages.products.category', compact('category'));
    }

    private function getCategories(): array
    {
        return collect(config('products.categories'))
            ->map(fn ($category) => [
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $this->categoryPurpose($category['name']),
                'products' => collect($category['products'])
                    ->map(fn ($product, $slug) => [
                        'slug' => $slug,
                        'name' => $product['name'],
                        'description' => $product['description'] ?? '',
                        'image' => $product['image'] ?? null,
                        'images' => $product['images'] ?? [],
                    ])
                    ->values()
                    ->all(),
            ])
            ->values()
            ->all();
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
