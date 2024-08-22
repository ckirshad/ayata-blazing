    </div><!-- .site-content -->

    <footer>
        <div class="site-footer">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <nav class="footer-navigation">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                )); ?>
            </nav><!-- .footer-navigation -->
        </div><!-- .site-footer -->
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
