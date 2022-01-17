<?php
/**
 * Template part for displaying contact information.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<div class="contentBlock row">
  <div class="eight columns">
    <?php if ( is_active_sidebar( 'connect-slide' ) ) : ?>
      <?php dynamic_sidebar( 'connect-slide' ); ?>
    <?php endif; ?>
  </div>
</div>
<div class="row">
  <div class="formBlock eight columns">
    <h3>Send A Note</h3>
    <?php echo do_shortcode( '[contact-form-7 id="71" title="Contact Me" html_id="contactForm"]' ); ?>
  </div>
  <div class="linksBlock four columns">
    <?php if ( is_active_sidebar( 'connect-links' ) ) : ?>
      <?php dynamic_sidebar( 'connect-links' ); ?>
    <?php endif; ?>
  </div>
</div>