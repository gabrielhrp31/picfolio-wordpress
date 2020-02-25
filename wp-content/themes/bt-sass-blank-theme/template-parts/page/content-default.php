<article <?php post_class(array('entry')); ?> id="page-<?php the_ID(); ?>" role="page">
    <section class="entry-content py-4">
        <h1 class="page-title text-center"><?php the_title(); ?></h1>
        <?php
        // Content example for CSS ajustments - Uncomment it if you need
        //get_template_part( 'template-parts/post/content', 'example' );
        the_content();
        ?>
    </section>
</article>
