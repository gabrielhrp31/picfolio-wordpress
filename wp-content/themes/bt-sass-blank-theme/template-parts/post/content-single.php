<?php
global $wpdb;
$l=0;
$postid=get_the_id();
$clientmac=get_client_mac();
$row1 = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid' AND clientip = '$clientmac'");
if(!empty($row1)){
    $l=1;
}
?>
<article <?php post_class(array('entry')); ?> id="post-<?php the_ID(); ?>" role="article" style="margin-top:98px;">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <h1 class="entry-title text-center"><?php the_title(); ?></h1>
            </div>
            <div class="col-12 d-flex justify-content-center mt-4 mb-2">
                <input type="hidden" value="<?php the_ID(); ?>" id="post-id">
                <div class="post_like">
                    <a class="h5 pp_like <?php if($l==1) {echo "liked"; } ?>" href="#" data-id="<?php echo get_the_id(); ?>">
                        <i class="<?php echo($l==1?"fas":"far"); ?> fa-heart"></i>
                        <span id="likes-count">
                            <?php echo get_posts_like($postid); ?>
                        </span>
                        <span id="likes-text">
                            <?php echo (get_posts_like($postid)==0 || get_posts_like($postid)>1?"Curtidas":"Curtida"); ?>

                        </span>
                    </a>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center mb-4">
                <h5 class="text-primary">
                    <i class="fas fa-eye"></i>
                    <?php echo get_posts_views($postid); ?>
                    <?php echo (get_posts_views($postid)==0 || get_posts_views($postid)>1?"Visualizações":"Visualização"); ?>
                </h5>
            </div>
            <div class="col-12">
                <?php the_tags(); ?>
                <section class="entry-content">
                    <?php
                    // Content example for CSS adjustments - Uncomment it if you need
                    //get_template_part( 'template-parts/post/content', 'example' );
                    the_content();
                    ?>
                </section>
            </div>
        </div>
<!--        --><?php //comments_template(); ?>
    </div>
    <script src="<?php echo get_template_directory_uri() . '/js/post-views.js' ?>"></script>
</article>
