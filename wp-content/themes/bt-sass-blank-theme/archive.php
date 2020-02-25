<?php get_header(); ?>
    <section class="archive-section">
        <div class="container">
            <?php
            // Get ID for the named category
            $category_id = get_cat_ID( 'portfolio' );
            // Get ID for the named
            $category = get_queried_object();
            $categories = get_categories(array('child_of'=>$category_id,'hide_empty'=>0,'orderby'=>'id','order'=>'ASC'));
            $args = [
                'post_type' => 'post',
                'order' => 'DESC',
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $category->term_id,
                    ],
                ],
            ];

            $query = new WP_Query( $args );?>
            <div class="row justify-content-center py-4">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="category-navigate col-3 col-lg-2 mb-3 <?php echo ($category->slug=="portfolio"?'active-category':'') ?>"  data-url="<?php echo get_category_link($category_id)?>">
                            <h5>
                                Todos
                            </h5>
                        </div>
                        <?php foreach ($categories as $current):  ?>
                            <div class="category-navigate col-3 col-lg-2 mb-3 <?php echo ($current->term_id==$category->term_id?'active-category':'') ?>" data-url="<?php echo get_category_link($current->term_id)?>">
                                <h5>
	                                <?php echo $current->name ?>
                                </h5>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0 py-4">
            <div class="row align-items-center m-0" style="min-height: 400px">
                <?php
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) :
                            $query->the_post();
                            ?>
                            <div class="col-6 col-md-3 p-0">
                                <?php get_template_part('template-parts/post/content', 'job'); ?>
                            </div>
                        <?php
                        endwhile;  wp_reset_postdata();
                    else:
                ?>
                    <div class="col-12">
                        <h2 class="text-info text-center">
                            Nenhum Ensaio Para Esta Categoria!
                        </h2>
                    </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </section>
<?php
    get_footer();
?>