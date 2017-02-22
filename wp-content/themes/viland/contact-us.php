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
    <div class="contact-content container">
        <h3>Contact us</h3>
        <div class="contact-form">
            <p>Fill in the form below to let us know your enquiry. A consultant will contact you within 24 - 48 hours</p>
            <?php echo do_shortcode('[formidable id=6]');?>
        </div>
        <div class="container">
            <ul class="contact-info">
                <li class="item item-contact">
                    <a href="/faqs">
                        <strong>FAQs</strong>
                        <img src="/wp-content/uploads/2017/02/faq-img.jpg">
                        <p class="read-more">Read more</p>
                    </a>
                </li>
                <li class="item item-contact">
                    <a href="/custom-tour">
                        <strong>DESIGN YOUR OWN CUSTOM TOUR</strong>
                        <img src="/wp-content/uploads/2017/02/custom-tour-img.jpg">
                        <p class="read-more">Start now</p>
                    </a>
                </li>
                <li class="item item-contact">
                    <a href="/call">
                        <strong class="contact-call">
                            CALL OUR TRAVEL CONCIERGE
                            <p>Steve</p>
                        </strong>

                        <img src="/wp-content/uploads/2017/02/call-consierge-img.jpg">
                        <p class="read-more"><i class="vi-icon-phone"></i>   Call now</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="home">
        <div class="travel-info">
            <div class="container">
                <div class="menu-tab-travel">
                    <ul>
                        <li class="active"><a href="#blog" data-toggle="tab">Travel Blog</a></li>
                        <li><a href="#videos" data-toggle="tab">Travel videos</a></li>
                        <li><a href="#guides" data-toggle="tab">Travel guides</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="blog">
                        <?php
                        $args = array(
                            'post_type'=> 'post',
                            'orderby' => 'post_date',
                            'posts_per_page' => 3,
                            'order'    => 'DESC'
                        );

                        $the_query = new WP_Query( $args );
                        echo '<ul class="recent-blog">';
                        if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <li class="item-blog">
                                <a href="<?php echo get_permalink(get_the_ID())?>">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), array(800,600));?>
                                    <figure class="info">
                                        <p><?php the_title(); ?></p>
                                        <p class="read-more">Read more</p>
                                    </figure>
                                </a>
                            </li>
                        <?php endwhile; else: ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                    <div class="tab-pane" id="videos">
                        <?php
                        $args = array(
                            'post_type'=> 'video',
                            'orderby' => 'post_date',
                            'posts_per_page' => 3,
                            'order'    => 'DESC'
                        );

                        $the_query = new WP_Query( $args );
                        echo '<ul class="recent-video">';
                        if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <li class="item-video">
                                <a href="<?php echo get_permalink(get_the_ID())?>">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), array(800,600));?>
                                    <figure class="info">
                                        <p><?php the_title(); ?></p>
                                        <p class="read-more">Read more</p>
                                    </figure>
                                </a>
                            </li>
                        <?php endwhile; else: ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                    <div class="tab-pane" id="guides">
                        <?php
                        $args = array(
                            'post_type'=> 'dt_places',
                            'orderby' => 'post_date',
                            'posts_per_page' => 4,
                            'order'    => 'DESC'
                        );

                        $the_query = new WP_Query( $args );
                        echo '<ul class="recent-guides">';
                        if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <li class="guide">
                                <a href="<?php echo get_permalink(get_the_ID())?>">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), array(800,600));?>
                                    <figure class="info">
                                        <p><?php the_title(); ?></p>
                                        <p class="read-more">Read more</p>
                                    </figure>
                                </a>
                            </li>
                        <?php endwhile; else: ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                </div>
                <a class="button view-all-travel" href="#">View All</a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
