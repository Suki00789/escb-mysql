<?php
$classes = classNames( "qx-section {$field['class']}", $visibilityClasses, [
  'qx-section-parallax' => $field['bg_parallax']
] );
?>
<div id="<?php echo $id ?>" class="<?php echo $classes ?>">
  <!--<?php echo $title; ?>-->

  <?php // Parallax div will top of every div
  if ( $field['bg_parallax'] ):?>
    <div class="qx-parallax-bg" style="background-image: url(<?php echo $field['bg_image'] ?>);"></div>
  <?php endif; ?>

  <?php if ( $field['container'] ): ?>
  <div class="qx-container">
  <?php endif; ?>

    <?php echo $renderer->render( $node['children'] ) ?>

  <?php if ( $field['container'] ): ?>
  </div>
  <?php endif; ?>

</div>
<!-- qx-section -->
