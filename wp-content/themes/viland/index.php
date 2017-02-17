<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 22/04/2015
 * Time: 17:44
 * This theme was developed by Phucct, Sutunam
 */
?>
<?php get_header(); ?>
<div class="right-content">
    <div class="content">
        <section id="main-content">
            <div class="container">
                <h1 class="page-title"><?php wp_title(''); ?></h1>
                <div class="page-content">
                    <?php if (have_posts()) : while (have_posts()) :the_post(); ?>
                        <?php get_template_part('content', get_post_format())?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <?php get_template_part('content','none'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>