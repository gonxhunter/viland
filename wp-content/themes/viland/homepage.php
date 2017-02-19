<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 15/02/2017
 * Time: 10:47
 * Template Name: Homepage
 */
get_header(); ?>
<div class="home-content">
	<div class="home-slider">
		<?php echo do_shortcode('[rev_slider alias="homepage-slider"]');?>
	</div>

    <div class="search-homepage">
        <h3>Find a tour</h3>
        <p><input name="txtpackagename" placeholder="Type Package name here..." type="text"></p>
        <p>
            <div class="selection-box">
                <select name="cmbcity">
                    <option value="">Choose Area/Region</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Indochina">Indochina</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Laos">Laos</option>
                    <option value="Halong Bay">Halong Bay</option>
                    <option value="Hanoi City">Hanoi City</option>
                    <option value="Ho Chi Minh">Ho Chi Minh</option>
                </select>
            </div>
        </p>
        <p>
            <div class="selection-box">
                <select name="cmbcat">
                    <option value="">Choose Travel Style</option>
                    <option value="day-tours-hanoi">Day Tours Hanoi</option>
                    <option value="vietnam-tours">Vietnam Tours</option>
                    <option value="indochina-tours">Indochina Tours</option>
                    <option value="classic-highlights">Classic Highlights</option>
                    <option value="luxury-honeymoon">Luxury &amp; Honeymoon</option>
                    <option value="backpacker-tours">Backpacker Tours</option>
                    <option value="adventure-tours">Adventure Tours</option>
                    <option value="day-tours-trips">Day Tours &amp; Trips</option>
                    <option value="family-beach-holidays">Family &amp; Beach Holidays</option>
                    <option value="halong-bay-cruises">Halong Bay Cruises</option>
                    <option value="mekong-delta-tours">Mekong Delta Tours</option>
                </select>
            </div>
        </p>
        <input name="subsearch" value="Search" type="submit">
    </div>

    <div class="popular-tour">
        <h2>Popular tour</h2>
        <?php
        $args = array(
            'post_type' => 'product',
            'stock' => 1,
            'posts_per_page' => 4,
            'orderby' =>'date',
            'order' => 'DESC' );
        $loop = new WP_Query( $args );
        ?>
        <ul class="popular-products">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <li class="item product">
                <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
                    <p>Featured</p>
                    <h3><?php the_title(); ?></h3>
                </a>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php wp_reset_query(); ?>
        <a class="view-all-tours" href="#"> View All</a>
    </div>

    <div class="categories-tour">
        <?php
        $args = array(
            'number'     => 6,
            'orderby'    => 'date',
            'order'      => 'DESC',
            'hide_empty' => 1
        );
        $product_categories = get_terms( 'product_cat', $args );
        echo '<ul class=categories-pagkage>';
        foreach ($product_categories as $cat){
            echo '<li class="item cat-item">';
            echo '<a href="'.$cat->slug.'">';
            echo $cat->name;
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            if ( $image ) {
                echo '<img src="' . $image . '" alt="" />';
            }
            echo '<span class="link-category">View tours</span>';
            echo '</a></li>';
        }
        echo '<a class="view-all-tours" href="#"> View All</a>';
        echo '</ul>';
        ?>
    </div>

    <div class="testimonial-homepage">
        <h2>Testimonials</h2>
        <?php
        $args = array(
            'post_type' => 'testimonials',
            'stock' => 1,
            'posts_per_page' => 4,
            'orderby' =>'date',
            'order' => 'DESC' );
        $loop = new WP_Query( $args );
        ?>
        <ul class="popular-products">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <li class="item product">
                    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
                        <div class="post-excerpt">
                            <?php echo the_content(); ?>
                        </div>
                        <?php $client_name = get_post_meta(get_the_ID(), 'client_name', true);
                        if (!empty($client_name)):
                            ?>
                            <div class="client_name">
                                <?php echo $client_name; ?>
                            </div>
                        <?php endif; ?>
                        <?php $company = get_post_meta(get_the_ID(), 'location', true);
                        if (!empty($company)):
                            ?>
                            <div class="company">
                                <?php echo $company; ?>
                            </div>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_query(); ?>
    </div>

    <div class="why-travel">
        <h2>Why travel with us?</h2>
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
