<?php get_header(); ?>

<main class="site-main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <p>Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
                </div>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer">
                <p><?php the_tags(); ?></p>
                <nav class="post-navigation">
                    <div class="nav-previous"><?php previous_post_link(); ?></div>
                    <div class="nav-next"><?php next_post_link(); ?></div>
                </nav>
            </footer>
        </article>

    <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
