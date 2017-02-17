<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 15/02/2017
 * Time: 10:47
 * Template Name: Homepage
 */
get_header(); ?>
<div class="wrapper-content">
    <?php echo do_shortcode('[rev_slider alias="homepage-slider"]');?>

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
        <button class="view-all-tours"> View All</button>
    </div>
</div>
<?php get_footer(); ?>
