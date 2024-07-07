<?php
$id = get_queried_object_id();

$args = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false
));
$all_terms = new WP_Query($args);
$terms = $all_terms->query; ?>


<!-- ------------------------------------for mobile view-->
<div class="cat-list-mobile">
    <select class="mobile-cat" id="mobile-category-list">
        <option id="all" value="<?= get_bloginfo('url') ?>/blogs"><span class="text">دسته بندی ها</span>( همه)</option>
        <?php foreach ($terms as $key => $term) : ?>
            <?php if ($key < 5) : ?>
                <option <?= ($id == $term->term_id) ? 'selected' : '' ?> value="<?= get_term_link($term->term_id) ?>">
                    <?= $term->name ?></option>
        <?php
            endif;
        endforeach; ?>
    </select>
</div>
<?php
if (is_single() || is_search()) : ?>
    <?php $post_id = get_queried_object_id();
    $currentCat = get_the_category($post_id); ?>
    <ul class="cat-list">
        <li><a href="/blogs">همه</a></li>
        <?php foreach ($terms as $key => $term) :
            if ($key < 5) :
                if (is_single()) : ?>
                    <li class="<?= ($term->term_id == $currentCat[0]->term_id) ? 'current' : '' ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></li>
                <?php else : ?>
                    <li><a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></li>
        <?php endif;
            endif;
        endforeach; ?>
    </ul>
<?php else : ?>
    <div class="categories">
        <ul>
            <li id="all" class="<?= (!is_category()) ? 'active' : '' ?>"><a href="/blogs">همه</a></li>
            <?php foreach ($terms as $key => $term) : ?>
                <?php if ($key < 5) : ?>
                    <li class="<?= ($id == $term->term_id) ? 'active' : '' ?>"><a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></li>
            <?php
                endif;
            endforeach; ?>
        </ul>
    </div>
<?php endif; ?>