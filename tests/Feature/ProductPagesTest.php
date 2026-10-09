<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductPagesTest extends TestCase
{
    public function test_products_page_lists_categories_and_products_without_product_images(): void
    {
        $response = $this->get('/products');

        $response
            ->assertOk()
            ->assertSee('All Products')
            ->assertSee('Corporate &amp; Business Print', false)
            ->assertSee('Large Format Printing')
            ->assertSee('Signage')
            ->assertSee('Branding')
            ->assertSee('Promotional &amp; Branded Materials', false)
            ->assertSee('Packaging &amp; Labels', false)
            ->assertSee('Design &amp; Creative Materials', false)
            ->assertSee('Business Cards')
            ->assertSee('3D Signage')
            ->assertSee('Logo Design')
            ->assertSee('id="corporate-business-print"', false)
            ->assertSee('id="business-cards"', false)
            ->assertSee('href="'.route('contact').'"', false)
            ->assertDontSee('images/products')
            ->assertDontSee('Types &amp; details', false)
            ->assertDontSee('Custom Business Cards');
    }

    public function test_mega_menu_links_products_to_their_catalogue_sections(): void
    {
        $response = $this->get('/products');

        $response
            ->assertOk()
            ->assertSee(":href=\"'".route('products.index')."#' + product.slug\"", false)
            ->assertSee(":href=\"'".route('products.index')."#' + category.slug\"", false)
            ->assertSee('href="'.route('products.index').'"', false)
            ->assertDontSee('/products/business-cards');
    }

    public function test_individual_product_routes_are_no_longer_active(): void
    {
        $this->get('/products/business-cards')->assertNotFound();
        $this->get('/products/not-a-configured-product')->assertNotFound();
    }

    public function test_contact_route_redirects_to_the_configured_whatsapp_contact(): void
    {
        $this->get('/contact')->assertRedirect(config('contact.whatsapp_url'));
    }

    public function test_pages_show_contextual_cta_labels_and_contact_destinations(): void
    {
        $whatsappUrl = e(config('contact.whatsapp_url'));

        $this->get('/')
            ->assertOk()
            ->assertSee('Get a Quote')
            ->assertSee('Work With Us')
            ->assertSee('href="'.$whatsappUrl.'"', false);

        $this->get('/about')
            ->assertOk()
            ->assertSee('Let’s Talk')
            ->assertSee('Work With Us')
            ->assertSee('href="'.$whatsappUrl.'"', false);

        $this->get('/portfolio')
            ->assertOk()
            ->assertSee('View Our Work')
            ->assertSee('Work With Us')
            ->assertSee('href="'.$whatsappUrl.'"', false);

        $this->get('/products')
            ->assertOk()
            ->assertSee('Request a Quote')
            ->assertSee('href="'.$whatsappUrl.'"', false);

        $this->get('/contact')
            ->assertOk()
            ->assertSee('Request a Quote')
            ->assertSee('href="'.$whatsappUrl.'"', false)
            ->assertSee('whatsappUrl', false);
    }

    public function test_portfolio_displays_each_additional_image_once_in_selected_work(): void
    {
        $images = [
            'birthdaylargeformatprinting.png',
            'birthdaypilliowspromotionalbrandedmaterials.png',
            'birthdaypromotionalandbrandin.png',
            'glowinglamppromotionalandbrandingmaterials.png',
            'lightup9japackagingandlabels.png',
            'petyblespackaginglabels.png',
            'ripplesstitchessignageandbranding.png',
            'tastycubesvehiclebranding.png',
            'vanwait.png',
            'vehiclebrandinblueheaven.png',
        ];

        $response = $this->get('/portfolio')->assertOk();
        $html = $response->getContent();
        $selectedWorkStart = strpos($html, 'id="selected-work"');
        $selectedWorkEnd = strpos($html, '<section class="bg-[#111936] text-white">', $selectedWorkStart);
        $selectedWork = substr($html, $selectedWorkStart, $selectedWorkEnd - $selectedWorkStart);

        foreach ($images as $image) {
            $this->assertFileExists(public_path('images/'.$image));
            $this->assertSame(1, substr_count($selectedWork, asset('images/'.$image)));
        }
    }
}
