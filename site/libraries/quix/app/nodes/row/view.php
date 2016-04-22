<?php
$classes = classNames( "qx-row {$field['class']}", $visibilityClasses, [
  'qx-section-parallax' => $field['bg_parallax'],
  'qx-equal-column' => $field['equal_column']
] );
?>

<?php if ( $field['container'] ): ?>
<div class="qx-container">
<?php endif; ?>
  <div id="<?php echo $id ?>" class="<?php echo $classes ?>">
    <?php // Parallax div will top of every div
    if ( $field['bg_parallax'] ):?>
      <div class="qx-parallax-bg" style="background-image: url(<?php echo $field['bg_image'] ?>);"></div>
    <?php endif; ?>

    <?php echo $renderer->render( $node['children'] ) ?>
  </div>
  <!-- qx-row -->
<?php if ( $field['container'] ): ?>
</div>
<?php endif; ?>
