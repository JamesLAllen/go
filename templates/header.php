<body <?php body_class(); ?>>
  <header class="site-header" role="banner">
    <nav id="site-navigation" class="main-navigation" role="navigation">
      <div>
        <h3 class="menu-toggle"><?php _e( 'Menu', 'Go' ); ?></h2>
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation'));
          endif;
        ?>
      </div>
    </nav>
    <div class="site-banner">
      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img class="site-logo" src= <?php echo get_template_directory_uri() . "/assets/build/images/logo-large.png" ?> height="150" width="150" alt="Eric Thor Logo">
        </a>
      </h1>
      <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    </div>
  </header>
  <div class="wrap" role="document">