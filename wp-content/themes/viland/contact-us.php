<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 15/02/2017
 * Time: 10:47
 * Template Name: About us
 */
get_header(); ?>
<div class="wrapper-content">
    <div class="about-content">
        <div class="right-about-us">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <div class="left-about-us">
            <div id="TA_selfserveprop37" class="TA_selfserveprop">
                <ul id="fGcCYx7Gm" class="TA_links S2lrJkGlltQm">
                    <li id="RL1Hypa" class="GYYemwO">
                        <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                    </li>
                </ul>
            </div>
            <script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=37&amp;locationId=10514184&amp;lang=en_US&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=true&amp;display_version=2"></script>
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
