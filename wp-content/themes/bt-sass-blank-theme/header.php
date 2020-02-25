<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>

    <?php if(has_custom_logo()): ?>
        <link rel="icon" href="<?php echo(has_custom_logo()?$image[0]:'')?>">
    <?php endif; ?>

    <?php
        // ENQUEUE your css and js in inc/enqueues.php
        wp_head();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/inputmask/inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/inputmask/bindings/inputmask.binding.min.js"></script>
</head>
<body <?php echo body_class(); ?>>
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary p-1">
        <div class="container">
            <div class="navbar-collapse collapse row justify-content-center">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary-left',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => false,
                    'menu_class'      => 'navbar-nav',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
            </div>
            <div class="d-flex justify-content-center w-lg-100">
                <?php if(has_custom_logo()):
                    echo get_custom_logo();
                else:?>
                    <a class="navbar-brand mx-auto" href="#">
                        <?php echo bloginfo("name"); ?>
                    </a>
                <?php endif;
                ?>
            </div>
            <button class="navbar-toggler position-absolute" style="right:30px;" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>
            <div  id="navbarNav" class="navbar-collapse collapse collapse-right">
                <button class="btn btn-link text-decoration-none text-light position-absolute navbar-toggler mt-2 mr-2"  data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" style="right:0;">
                    <i class="fas fa-times"></i>
                </button>
                <div class="d-lg-none">
                    <div class="row p-2 mb-2">
	                    <?php if(has_custom_logo()):
		                    echo get_custom_logo();
	                    else:?>
                            <a class="navbar-brand" href="#">
			                    <?php echo bloginfo("name"); ?>
                            </a>
	                    <?php endif
	                    ?>
                    </div>
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'primary-left',
                        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container'       => false,
                        'menu_class'      => 'navbar-nav mx-auto',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );
                    ?>
                </div>
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary-right',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => false,
                    'menu_class'      => 'navbar-nav mx-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
            </div>
            <div class="overlay navbar-toggler"  data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"></div>
        </div>
    </nav>
    <!--  BANNERS OR CAROUSEL DATA  -->
    <?php
        if(!is_front_page() && is_archive()):
            // WP_Query argumentsasdsa
            ///
            $cat = get_category( get_query_var( 'cat' ) );
            // die();
            // WP_Query arguments
            $args = array (
                'post_type'              => 'post_slide' ,
                'post_status'            =>  'publish' ,
                'category_name'          => $cat->slug,
                'nopaging'               => true,
                'order'                  => 'ASC',
            );

            // The Query
            $banners = new WP_Query( $args );

        // Restore original Post Data
        wp_reset_postdata();
    ?>
    <header id="header" role="banner">

        <?php
        $index = 0;
        if ( $banners->have_posts() ) : ?>
            <div id="carouselExampleControls" class="carousel slide" style="top:0px;z-index:0;" data-ride="carousel">
                <div class="carousel-inner">
                    <?php while ( $banners->have_posts() ) :
                        $banners->the_post(); ?>
                        <div class="carousel-item <?php echo ($index==0?'active':'') ?>">
                            <div class="container-fluid position-absolute d-flex align-items-center" style="z-index:1;height:100%;">
                                <div class="w-100 carousel-content">
                                    <?php the_content() ?>
                                </div>
                            </div>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php
                        $index++;
                    endwhile; ?>
                </div>
                <?php if($index>1): ?>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <i class="icofont-rounded-left icofont-2x d-lg-none"></i>
                        <i class="icofont-rounded-left icofont-3x d-none d-lg-block"></i>
                    </a>
                    <a class="carousel-control-next" style="right:20px;" href="#carouselExampleControls" role="button" data-slide="next">
                        <i class="icofont-rounded-right icofont-2x d-lg-none"></i>
                        <i class="icofont-rounded-right icofont-3x d-none d-lg-block"></i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </header>
    <?php endif; ?>
