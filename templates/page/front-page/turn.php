<?php

?>
<section class="container">
    <div class="title">
        <h2><?= get_field('turn_title'); ?></h2>
        <p><?= get_field('turn_subtitle'); ?></p>
    </div>
 <?=   get_template_part('templates/components/contact',null,);  ?>



</section>