<?php
 
$config = [
    'categories' => [
        [
            'name' => 'Corporate & Business Print',
            'products' => [
                'business-cards' => [
                    'name' => 'Business Cards',
                    'description' => 'Professional business cards designed to give your brand a polished and memorable first impression.',
                    'types' => ['Custom Business Cards', 'Single-sided Business Cards', 'Double-sided Business Cards', 'Premium Business Cards', 'Complimentary Business Cards', 'Foil Business Cards', 'Embossed / Debossed Business Cards'],
                ],
                'letterheads' => [
                    'name' => 'Letterheads',
                    'description' => 'Branded letterheads designed to bring a polished, consistent look to business correspondence.',
                    'types' => [],
                ],
                'complimentary-slips' => [
                    'name' => 'Complimentary Slips',
                    'description' => 'Printed slips for business notes, order inserts, and professional correspondence.',
                    'types' => [],
                ],
                'envelopes' => [
                    'name' => 'Envelopes',
                    'description' => 'Branded envelopes that carry your visual identity through business correspondence.',
                    'types' => [],
                ],
                'company-profiles' => [
                    'name' => 'Company Profiles',
                    'description' => 'Company profile materials that present your organization, services, and capabilities.',
                    'types' => [],
                ],
                'brochures' => [
                    'name' => 'Brochures',
                    'description' => 'Printed brochures designed to introduce a business, explain a service, or showcase products.',
                    'image' => 'images/custom-printed-event-booklets.jpeg',
                    'types' => ['Corporate Brochures', 'Marketing Brochures', 'Product Brochures', 'Company Profile Brochures'],
                ],
                'flyers' => [
                    'name' => 'Flyers',
                    'description' => 'Printed flyers for campaigns, events, promotions, and business announcements.',
                    'image' => 'images/custom-business-flyers.jpeg',
                    'types' => ['Single-sided Flyers', 'Double-sided Flyers', 'Promotional Flyers', 'Event Flyers'],
                ],
                'corporate-posters' => [
                    'name' => 'Posters',
                    'description' => 'Printed posters for business communications, promotions, and display.',
                    'types' => [],
                ],
                'presentation-folders' => [
                    'name' => 'Presentation Folders',
                    'description' => 'Printed folders that organize and present proposals and business documents.',
                    'types' => [],
                ],
                'corporate-stationery' => [
                    'name' => 'Corporate Stationery',
                    'description' => 'Coordinated stationery that helps maintain a consistent visual identity across business materials.',
                    'image' => 'images/custom-branded-executive-diary.jpeg',
                    'types' => [],
                ],
            ],
        ],
        [
            'name' => 'Large Format Printing',
            'products' => [
                'flex-banners' => [
                    'name' => 'Flex Banners',
                    'description' => 'Large-format banners for promotions, campaigns, events, and branded spaces.',
                    'image' => 'images/custom-flex-banner-printing.jpeg',
                    'types' => ['Outdoor Flex Banners', 'Indoor Flex Banners', 'Promotional Banners', 'Event Banners'],
                ],
                'roll-up-banners' => [
                    'name' => 'Roll-Up Banners',
                    'description' => 'Portable banner displays for presentations, exhibitions, and events.',
                    'image' => 'images/custom-roll-up-banner.jpeg',
                    'types' => [],
                ],
                'backdrop-banners' => [
                    'name' => 'Backdrop Banners',
                    'description' => 'Large printed backdrops for event stages, branded spaces, and photo areas.',
                    'types' => [],
                ],
                'large-format-posters' => [
                    'name' => 'Posters',
                    'description' => 'Large-format posters for advertising, campaigns, promotions, and display.',
                    'types' => [],
                ],
                'stickers-vinyl-prints' => [
                    'name' => 'Stickers & Vinyl Prints',
                    'description' => 'Custom printed stickers and vinyl graphics for products, windows, and branded environments.',
                    'types' => ['Product Stickers', 'Vinyl Stickers', 'Window Stickers', 'Die-cut Stickers', 'Branded Labels'],
                ],
                'window-graphics' => [
                    'name' => 'Window Graphics',
                    'description' => 'Printed graphics for storefront windows, office glass, and branded spaces.',
                    'types' => [],
                ],
                'outdoor-advertising-prints' => [
                    'name' => 'Outdoor Advertising Prints',
                    'description' => 'Large-scale print materials for outdoor campaigns and advertising placements.',
                    'image' => 'images/custom-outdoor-advertising-banner.jpeg',
                    'types' => [],
                ],
                'event-displays' => [
                    'name' => 'Event Displays',
                    'description' => 'Display materials for events, exhibitions, presentations, and promotions.',
                    'image' => 'images/custom-roll-up-banners.jpeg',
                    'types' => ['Roll-Up Displays', 'Backdrop Displays', 'X-Banners', 'Display Stands'],
                ],
            ],
        ],
        [
            'name' => 'Signage',
            'products' => [
                '3d-signage' => [
                    'name' => '3D Signage',
                    'description' => 'Dimensional signs for business names, logos, and interior or exterior brand applications.',
                    'image' => 'images/custom-3d-gold-logo-sign.jpeg',
                    'types' => ['3D Lettering', '3D Logo Signs', 'Acrylic Signs', 'Metal Lettering'],
                ],
                'led-illuminated-signs' => [
                    'name' => 'LED / Illuminated Signs',
                    'description' => 'Illuminated sign formats for business identification and brand visibility.',
                    'image' => 'images/custom-illuminated-led-sign.jpeg',
                    'types' => ['LED Logo Signs', 'Backlit Signs', 'Illuminated Business Signs', 'Lightbox Signs'],
                ],
                'office-signs' => [
                    'name' => 'Office Signs',
                    'description' => 'Workplace signs for identifying rooms, reception areas, and routes through an office.',
                    'image' => 'images/custom-glass-office-sign.jpeg',
                    'types' => ['Reception Signs', 'Room Signs', 'Directional Signs', 'Wall Signs'],
                ],
                'outdoor-signs' => [
                    'name' => 'Outdoor Signs',
                    'description' => 'Exterior signs for business identification, location information, and outdoor display.',
                    'image' => 'images/custom-pylon-signage.jpeg',
                    'types' => [],
                ],
                'directional-signs' => [
                    'name' => 'Directional Signs',
                    'description' => 'Wayfinding signs to help visitors navigate offices, venues, and facilities.',
                    'image' => 'images/custom-house-number-sign.jpeg',
                    'types' => [],
                ],
                'wall-signs' => [
                    'name' => 'Wall Signs',
                    'description' => 'Custom wall signs for brand messaging, information, and interior spaces.',
                    'image' => 'images/custom-office-wall-graphics.jpeg',
                    'types' => [],
                ],
                'reception-signs' => [
                    'name' => 'Reception Signs',
                    'description' => 'Reception area signage featuring a company name, logo, or visitor information.',
                    'image' => 'images/custom-tabletop-display-signs.jpeg',
                    'types' => [],
                ],
                'shop-business-signs' => [
                    'name' => 'Shop / Business Signs',
                    'description' => 'Custom signs for shops and business premises, indoors or outdoors.',
                    'image' => 'images/custom-shopfront-signage.jpeg',
                    'types' => [],
                ],
            ],
        ],
        [
            'name' => 'Branding',
            'products' => [
                'corporate-branding' => [
                    'name' => 'Corporate Branding',
                    'description' => 'Branded materials and applications for a consistent business identity.',
                    'image' => 'images/custom-illuminated-logo-sign.jpeg',
                    'types' => ['Office Stationery', 'Business Cards', 'Company Profiles', 'Branded Documents'],
                ],
                'office-branding' => [
                    'name' => 'Office Branding',
                    'description' => 'Printed and visual brand applications for workplace environments.',
                    'image' => 'images/custom-office-wall-branding.jpeg',
                    'types' => ['Wall Graphics', 'Reception Branding', 'Glass Branding', 'Directional Branding'],
                ],
                'wall-branding' => [
                    'name' => 'Wall Branding',
                    'description' => 'Branded wall graphics and visual features for offices and commercial spaces.',
                    'image' => 'images/custom-corporate-wall-branding.jpeg',
                    'types' => [],
                ],
                'vehicle-branding' => [
                    'name' => 'Vehicle Branding',
                    'description' => 'Vehicle graphics that apply your brand identity to cars, vans, and fleets.',
                    'image' => 'images/custom-truck-branding.jpeg',
                    'types' => ['Car Branding', 'Van Branding', 'Fleet Branding', 'Vehicle Graphics'],
                ],
                'event-branding' => [
                    'name' => 'Event Branding',
                    'description' => 'Coordinated branded materials and displays for events and activations.',
                    'image' => 'images/custom-promotional-signboards.jpeg',
                    'types' => ['Event Backdrops', 'Branded Stands', 'Directional Displays', 'Promotional Displays'],
                ],
                'branded-displays' => [
                    'name' => 'Branded Displays',
                    'description' => 'Custom branded display materials for events, exhibitions, and customer-facing spaces.',
                    'image' => 'images/custom-food-promotion-roll-up-banner.jpeg',
                    'types' => [],
                ],
                'brand-application-materials' => [
                    'name' => 'Brand Application Materials',
                    'description' => 'Physical and printed materials that apply a visual identity across everyday touchpoints.',
                    'image' => 'images/custom-branded-notebooks-keychains.jpeg',
                    'types' => [],
                ],
            ],
        ],
        [
            'name' => 'Promotional & Branded Materials',
            'products' => [
                'branded-t-shirts' => [
                    'name' => 'Branded T-Shirts',
                    'description' => 'Custom branded shirts for corporate teams, events, and campaigns.',
                    'types' => ['Custom T-Shirts', 'Event T-Shirts', 'Corporate T-Shirts', 'Campaign T-Shirts'],
                ],
                'polo-shirts' => [
                    'name' => 'Polo Shirts',
                    'description' => 'Branded polo shirts for teams, events, and corporate wear.',
                    'types' => [],
                ],
                'caps' => [
                    'name' => 'Caps',
                    'description' => 'Custom branded caps for teams, campaigns, and promotional activities.',
                    'types' => [],
                ],
                'mugs' => [
                    'name' => 'Mugs',
                    'description' => 'Custom branded mugs for corporate gifts, teams, and promotions.',
                    'types' => [],
                ],
                'notebooks' => [
                    'name' => 'Notebooks',
                    'description' => 'Branded notebooks for business use, events, and promotional materials.',
                    'image' => 'images/custom-branded-notebooks.jpeg',
                    'types' => [],
                ],
                'pens' => [
                    'name' => 'Pens',
                    'description' => 'Custom printed pens for business stationery and promotional use.',
                    'types' => [],
                ],
                'promotional-branded-bags' => [
                    'name' => 'Branded Bags',
                    'description' => 'Custom branded bags for corporate use, retail, and events.',
                    'image' => 'images/custom-printed-nylon-bags.jpeg',
                    'types' => ['Paper Bags', 'Shopping Bags', 'Corporate Bags', 'Event Bags'],
                ],
                'lanyards' => [
                    'name' => 'Lanyards',
                    'description' => 'Branded lanyards for identification, conferences, and event access.',
                    'types' => [],
                ],
                'promotional-items' => [
                    'name' => 'Promotional Items',
                    'description' => 'Branded gifts and useful items for campaigns, events, and customer engagement.',
                    'image' => 'images/premium-executive-gift-set.jpeg',
                    'types' => ['Branded Pens', 'Branded Notebooks', 'Branded Mugs', 'Branded Gifts'],
                ],
            ],
        ],
        [
            'name' => 'Packaging & Labels',
            'products' => [
                'product-labels' => [
                    'name' => 'Product Labels',
                    'description' => 'Custom printed labels for product information, identification, and brand presentation.',
                    'image' => 'images/custom-shipment-security-labels.jpeg',
                    'types' => ['Product Labels', 'Bottle Labels', 'Jar Labels', 'Custom Labels'],
                ],
                'packaging-stickers' => [
                    'name' => 'Stickers',
                    'description' => 'Custom stickers for product packaging, promotions, and branded materials.',
                    'types' => [],
                ],
                'packaging-boxes' => [
                    'name' => 'Packaging Boxes',
                    'description' => 'Printed boxes for product packaging, gifting, and branded presentation.',
                    'types' => ['Product Boxes', 'Gift Boxes', 'Branded Boxes', 'Custom Packaging'],
                ],
                'packaging-branded-bags' => [
                    'name' => 'Branded Bags',
                    'description' => 'Printed bags for product packaging and brand presentation.',
                    'image' => 'images/custom-printed-paper-gift-bags.jpeg',
                    'types' => [],
                ],
                'product-packaging' => [
                    'name' => 'Product Packaging',
                    'description' => 'Branded packaging materials prepared around your product and presentation needs.',
                    'image' => 'images/custom-printed-pet-food-packaging.jpeg',
                    'types' => [],
                ],
                'seals-tags' => [
                    'name' => 'Seals / Tags',
                    'description' => 'Printed seals and tags for product identification and packaging details.',
                    'image' => 'images/custom-clothing-hang-tags.jpeg',
                    'types' => ['Product Tags', 'Hang Tags', 'Packaging Seals', 'Brand Tags'],
                ],
            ],
        ],
        [
            'name' => 'Design & Creative Materials',
            'products' => [
                'marketing-flyers' => [
                    'name' => 'Marketing Flyers',
                    'description' => 'Designed flyer materials for promotions, product information, and announcements.',
                    'image' => 'images/product-promotion-flyers.jpeg',
                    'types' => [],
                ],
                'campaign-materials' => [
                    'name' => 'Campaign Materials',
                    'description' => 'Coordinated creative materials for campaigns across print and display formats.',
                    'image' => 'images/custom-academic-calendar-banner.jpeg',
                    'types' => [],
                ],
                'advertising-designs' => [
                    'name' => 'Advertising Designs',
                    'description' => 'Creative layouts and graphics for print advertisements and promotions.',
                    'image' => 'images/custom-business-flyer-design.jpeg',
                    'types' => ['Campaign Designs', 'Print Advertisements', 'Promotional Graphics', 'Marketing Materials'],
                ],
                'logo-design' => [
                    'name' => 'Logo Design',
                    'description' => 'Logo development to establish or refine a clear visual signature for your brand.',
                    'types' => ['Logo Creation', 'Logo Redesign', 'Logo Variations', 'Logo Applications'],
                ],
                'brand-identity-materials' => [
                    'name' => 'Brand Identity Materials',
                    'description' => 'Visual identity materials and guidelines for consistent brand presentation.',
                    'types' => ['Brand Identity', 'Business Cards', 'Letterheads', 'Brand Guidelines', 'Corporate Stationery'],
                ],
                'promotional-designs' => [
                    'name' => 'Promotional Designs',
                    'description' => 'Creative artwork for promotions, launches, and branded campaigns.',
                    'image' => 'images/custom-restaurant-promotional-design.jpeg',
                    'types' => [],
                ],
            ],
        ],
    ],
];

// Automatically arrange categories by the number of products with images.
// Categories with equal counts retain their original relative order.
$categories = $config['categories'];

$indexedCategories = [];

foreach ($categories as $index => $category) {
    $imageCount = 0;

    foreach ($category['products'] ?? [] as $product) {
        if (!empty($product['image'])) {
            $imageCount++;
        }
    }

    $indexedCategories[] = [
        'index' => $index,
        'image_count' => $imageCount,
        'category' => $category,
    ];
}

usort($indexedCategories, function ($a, $b) {
    $countComparison = $b['image_count'] <=> $a['image_count'];

    return $countComparison !== 0
        ? $countComparison
        : $a['index'] <=> $b['index'];
});

$config['categories'] = array_column($indexedCategories, 'category');

return $config;