<?php
get_header()
?>
    <?php

    if (get_queried_object()->post_type == 'service') :

        get_template_part('templates/single-service');

    elseif (get_queried_object()->post_type == 'post') :
        get_template_part('templates/single-blog');
    endif;
    ?>


<?php get_footer(); ?>