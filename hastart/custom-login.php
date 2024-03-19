<?php
/**
 * Template Name: Custom Login
 */

get_header();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['log'] ) && isset( $_POST['pwd'] ) ) {
    $credentials = array(
        'user_login'    => $_POST['log'],
        'user_password' => $_POST['pwd'],
        'remember'      => isset( $_POST['rememberme'] ),
    );

    $user = wp_signon( $credentials, false );

    if ( is_wp_error( $user ) ) {
        // Login failed, display an error message.
        echo '<div class="login-error">Login failed. Please try again.</div>';
    } else {
        // Login successful, perform custom redirection.
        wp_redirect( home_url(  ) ); // Change the URL as needed.
        exit;
    }
}
?>



 ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <form name="loginform" id="loginform"  action="<?php echo esc_url( site_url( $_SERVER['REQUEST_URI'] ) ); ?>" method="post">
    <p>
        <label for="user_login"><?php esc_html_e( 'Username or Email Address', 'textdomain' ); ?></label>
        <input type="text" name="log" id="user_login" class="input" value="" size="20" />
    </p>
    <p>
        <label for="user_pass"><?php esc_html_e( 'Password', 'textdomain' ); ?></label>
        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
    </p>
    <p class="forgetmenot">
        <label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember Me', 'textdomain' ); ?></label>
    </p>
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="<?php esc_attr_e( 'Log In', 'textdomain' ); ?>" />
        <input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url() ); ?>" />
    </p>
</form>


    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
