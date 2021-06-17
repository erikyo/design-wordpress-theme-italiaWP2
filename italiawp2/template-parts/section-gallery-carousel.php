<?php
/*
 * ### SEZIONE GALLERIE ###
 * Create tramite un Custom Type Post
 *
 */
?>

<section id="articolo-dettaglio-testo" class="galleriahome u-background-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="titolosezione">
                    <h3><?php echo __('Photo galleries','italiawp2'); ?> <small>(<?php echo __('scroll','italiawp2'); ?>)</small></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="articolo-paragrafi">

<div class="row">
    <div class="col-12 paragrafo">
        <a id="articolo-par-3"> </a>
        <div class="galleriaslide">
            <div id="owl-galleria"
                 accesskey=""class="owl-carousel owl-center owl-theme owl-loaded owl-drag"
                 role="tablist">
                
<?php
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'gallerie'
);

$i=1;

$the_query = new WP_Query($args);
if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'news-image');
        if ($img_url != "") {
            $img_url = $img_url[0];
        } else {
            $img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
            if($img_url=="") {
                $img_url = esc_url( get_template_directory_uri() ) . "/images/400x220.png";
            }
        }

        $category = get_the_category();
        $datapost = get_the_date('j F Y', '', ''); ?>
                
                <figure>
                    <div class="galleria-foto">
                        <a href="<?php the_permalink(); ?>" aria-labelledby="desc-<?php echo $i; ?>">
                            <img src="<?php print $img_url; ?>"
                                 alt="<?php the_title(); ?>"
                                 class="img-fluid"/>
                        </a>
                    </div>
                    <figcaption>
                        <small>
                            <p>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-camera"></use></svg> <?php echo $datapost; ?>
                            </p>
                        </small>
                        <p id="desc-<?php echo $i; ?>">
                            <?php the_title(); ?>
                        </p>
                    </figcaption>
                </figure>
                
<?php
    $i++;

    endwhile;  endif;
    wp_reset_postdata();
    
    ?>
                
            </div>
        </div>
    </div>
</div>
                    
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 veditutti">
                <a href="<?php echo get_post_type_archive_link('gallerie'); ?>" title="<?php echo __('Go to the page','italiawp2'); ?>: <?php echo __('Galleries','italiawp2'); ?>" class="btn btn-default btn-verde">
                    <?php echo __('All galleries','italiawp2'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
