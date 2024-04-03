<?php
/**
 * The base (and only) template
 *
 * @package WordPress
 * @subpackage yankaforge
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>html,body{min-height:100%;overflow:hidden;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;font-size:13px;line-height:1.4em;margin:0}
body{background-color: #f5f5f5; background-size:cover}
.site-title-bg{background:rgba(0,0,0,0.5);color:#fff;padding:5px}
.site-title h1,.site-title p{font-size:16px;display:inline-block;padding:5px 0 5px 5px;margin:0}
.site-title h1 a{color:#fff;font-weight:700;text-decoration:none}
.custom-logo{display:block;position:absolute;left:50%;top:50%;-ms-transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);max-width:100%;height:auto}
#colophon{position:absolute;width:100%;left:0;bottom:0;padding:10px 0;text-align:center;color:#333;background-color:rgba(241,241,241,0.4)}
#colophon a{text-decoration:none; color: #333;}</style>
<?php wp_head(); ?>
</head><body <?php body_class(); ?>><?php wp_body_open(); ?><div id="page">

<div class="site-title"><div class="site-title-bg">
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php
$yanka_description = get_bloginfo( 'description', 'display' );
if ( $yanka_description || is_customize_preview() ) :
	?>
	<p class="site-description"><?php echo esc_html( $yanka_description ); ?></p>
<?php endif; ?>
</div></div>
<?php the_custom_logo(); ?>
<footer id="colophon" class="site-footer">
	<?php if ( get_theme_mod( 'yanka_show_copyright', true ) ) : ?>
	<div class="site-info">
		<?php echo wp_kses_post( get_theme_mod( 'yanka_copyright', __( 'Headless NextJS/React - Proudly powered by WordPress', 'yankaforge' ) ) ); ?>
	</div>
	<?php endif; ?>
</footer>
</div><!-- #page -->
<?php wp_footer(); ?></body></html>
