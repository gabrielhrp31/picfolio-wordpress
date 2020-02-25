<?php get_header(); ?>
    <?php if(is_front_page()): ?>
    <header id="header" role="banner">
        <!--  BANNERS OR CAROUSEL DATA  -->
        <?php
                // WP_Query arguments
                $args = array (
                    'post_type'              => 'post_slide' ,
                    'post_status'            =>  'publish' ,
                    'category_name'               => 'sem-categoria',
                    'nopaging'               => true,
                    'order'                  => 'ASC',
                );

                // The Query
                $banners = new WP_Query( $args );

                // Restore original Post Data
                wp_reset_postdata();
        ?>
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
    <section class="portfolio-section my-5" id="portfolio-section">
        <div class="container">
            <div class="row">
                <div class="col-12 my-2">
                    <h3 class="text-center">Portfólio</h3>
                </div>
                <div class="col-12 mb-4">
                    <p class="h5 text-center font-weight-light">Uma prévia dos meus trabalhos!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                    // Get ID for the named category
                    $category_id = get_cat_ID( 'portfolio' );
                    $categories = get_categories(array('child_of'=>$category_id,'hide_empty'=>0,'orderby'=>'id','order'=>'ASC'));
                    foreach ($categories as $category):
                ?>
                        <div class="col-6 col-lg-4 d-flex justify-content-center">
                            <figure class="snip1573">
                                <?php
                                $image_id = get_term_meta (  $category->cat_ID, 'category-image-id', true );
                                // Echo the image
                                ?>
                                <img src="<?php echo wp_get_attachment_image_url( $image_id, 'large' ); ?>" alt="<?php echo  $category->name ?>"/>
                                <figcaption>
                                    <h3><?php echo  $category->name ?></h3>
                                </figcaption>
                                <a href="<?php  echo get_category_link( $category->term_id ) ?>"></a>
                            </figure>
                        </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>
    <section class="latest-jobs bg-secondary" id="latest-jobs">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="text-center">Últimos Trabalhos</h2>
                </div>
            </div>
            <div class="row" style="border-radius: 15px;">
                <?php
                $args = [
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page' => 4,
                    'tax_query' => [
                        [
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => $category_id,
                        ],
                    ],
                ];

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) :
                        $query->the_post();
                ?>
                <div class="col-6 p-0">
                    <?php get_template_part('template-parts/post/content', 'job'); ?>
                </div>
                <?php
                    endwhile;  wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="row mt-5 justify-content-center">
                <a href="<?php echo get_category_link($category_id)?>" class="btn btn-primary font-weight-bold py-2 px-4">
                    <h4 class="text-white mb-0">Ver Mais <i class="fas fa-angle-right"></i></h4>

                </a>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
	        <?php
	        get_template_part('template-parts/page/content', 'contact');
	        ?>
        </div>
    </section>
<?php get_footer(); ?>