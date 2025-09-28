<?php

/* Template Name: Services Page */

get_header();

$hero_img = get_field('hero_img');
$hero_title = get_field('hero_title');
$hero_text = get_field('hero_text');
$select_services = get_field('select_services');


$grouped_services = [];

foreach ($select_services as $service_item) {
    $post_id = is_object($service_item) ? $service_item->ID : (int) $service_item;
    $terms = get_the_terms($post_id, 'service_type');

    if (!empty($terms) && !is_wp_error($terms)) {
        $term = array_shift($terms);
        $group_key = (string) $term->term_id;
        if (!isset($grouped_services[$group_key])) {
            $grouped_services[$group_key] = [
                'term' => $term,
                'posts' => []
            ];
        }
        $grouped_services[$group_key]['posts'][] = $service_item;
    } else {
        $group_key = 'uncategorized';
        if (!isset($grouped_services[$group_key])) {
            $grouped_services[$group_key] = [
                'term' => (object) ['name' => 'بدون دسته‌بندی', 'slug' => 'uncategorized'],
                'posts' => []
            ];
        }
        $grouped_services[$group_key]['posts'][] = $service_item;
    }
}
?>

<main class="main services" id="service-overview">

    <section class="services-section-page">

        <div class="service-hero">

            <div class="custom-column">

                <div class="custom-column content-column container">
                    <h1 class="h1"><?= $hero_title ?></h1>
                    <div class="excerpt-content"><?= $hero_text ?></div>
                </div>

            </div>

        </div>

    </section>

    <?php if ($select_services) : ?>

        <?php foreach ($grouped_services as $group) : ?>

            <section class="container flex flex-col gap-4 mt-10 max-sm:mt-16">

                <h2 class="h2 text-[#00337c] max-sm:font-semibold sm:text-3xl max-sm:text-2xl"><?= esc_html($group['term']->name); ?></h2>

                <div class="flex flex-wrap gap-4">

                    <?php foreach ($group['posts'] as $select_service) : ?>

                        <a href="<?= get_permalink($select_service); ?>" class="service-content cursor-pointer flex flex-col max-sm:flex-row xl:w-[calc(25%-12px)] max-xl:w-[calc(33.33%-11px)] max-lg:w-[calc(50%-8px)] max-sm:w-full shadow-[0px_0px_10px_0px_rgba(0,_0,_0,_0.14)] rounded-2xl">

                            <div class="image max-sm:w-2/5">
                                <?= get_the_post_thumbnail($select_service, 'full', ['class' => 'rounded-t-2xl max-sm:rounded-tl-none max-sm:rounded-r-2xl sm:h-80 max-sm:h-32']) ?>
                            </div>

                            <div class="content flex flex-col gap-3 p-3 max-sm:gap-1 max-sm:w-3/5 max-sm:justify-between">

                                <h3 class="h2 text-[#00337c] font-medium"><?= get_the_title($select_service); ?></h3>

                                <div class="excerpt-service max-sm:!line-clamp-1"><?= get_the_excerpt($select_service) ?></div>

                                <div class="btn-content max-sm:!justify-start">
                                    <button class="btn-b max-sm:hidden">اطلاعات بیشتر</button>
                                    <button class="text-[#00337c] sm:hidden text-base font-medium">اطلاعات بیشتر</button>
                                </div>

                            </div>

                        </a>

                    <?php endforeach; ?>

                </div>

            </section>

        <?php endforeach; ?>

    <?php endif; ?>

</main>


<?php get_footer(); ?>