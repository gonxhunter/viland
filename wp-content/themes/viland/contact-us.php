<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 15/02/2017
 * Time: 10:47
 * Template Name: Contact us
 */
get_header(); ?>
<div class="wrapper-content">
    <div class="contact-content">
        <h1>Contact us</h1>
        <div class="contact-form">
            <?php echo do_shortcode('[formidable id=6]');?>
        </div>
        <div class="contact-info">
            <a href="/faqs"><img src="faqs"></a>
            <a href="/custom-tour"><img src="custom-tour"></a>
            <a href="/call"><img src="call"></a>
        </div>
    </div>
    
    <div class="travel-info">
        <div class="menu-table-travel">
            <ul>
                <li class="active"><a href="#blog" data-toggle="tab">Travel Blog</a></li>
                <li><a href="#videos" data-toggle="tab">Travel videos</a></li>
                <li><a href="#guides" data-toggle="tab">Travel guides</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="blog">
                <?php
                $args = array(
                    'post_type'=> 'post',
                    'orderby' => 'post_date',
                    'order'    => 'DESC'
                );

                $the_query = new WP_Query( $args );
                echo '<ul class="recent-blog">';
                if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <li class="item-blog">
                        <a href="<?php echo get_permalink(get_the_ID())?>">
                            <?php echo get_the_post_thumbnail(get_the_ID(), array(800,600));?>
                            <p><?php the_title(); ?></p>
                            <p class="read-more">Read more</p>
                        </a>
                    </li>
                <?php endwhile; else: ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
            <div class="tab-pane fade active in" id="videos">
                <h2>Content of videos</h2>
            </div>
            <div class="tab-pane fade active in" id="guides">
                <?php
                $args = array(
                    'post_type'=> 'dt_places',
                    'orderby' => 'post_date',
                    'order'    => 'DESC'
                );

                $the_query = new WP_Query( $args );
                echo '<ul class="recent-guides">';
                if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <li class="guide">
                        <a href="<?php echo get_permalink(get_the_ID())?>">
                            <?php echo get_the_post_thumbnail(get_the_ID(), array(800,600));?>
                            <p><?php the_title(); ?></p>
                            <p class="read-more">Read more</p>
                        </a>
                    </li>
                <?php endwhile; else: ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
