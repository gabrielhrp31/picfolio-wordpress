
<a href="<?php the_permalink(); ?>">
    <div class="job">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="Avatar" class="image">
        <div class="overlay-job">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <h5 class="text-white"><?php echo get_the_title(); ?></h5>
                </div>
                <div class="row justify-content-center">
                    <h6 class="text-white font-weight-normal"><?php echo get_the_category( $id )[0]->name ?></h6>
                </div>
                <div class="row justify-content-center">
                    <h6 class="text-white font-weight-normal">
                        <i class="<?php echo (get_posts_like( $id )>0?"fas":"far") ?> fa-heart mr-2"></i><?php echo get_posts_like( $id ) ?>
                        <i class="<?php echo (get_posts_like( $id )>0?"fas":"far") ?> fa-eye mx-2"></i><?php echo get_posts_views( $id ) ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</a>