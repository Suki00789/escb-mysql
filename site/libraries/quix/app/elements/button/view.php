<?php
$classes = classNames( "qx-btn qx-element qx-element-{$type} {$field['class']} {$field['style']}", $visibilityClasses, [
  "wow {$field['animation']}" => $field['animation'],
  'qx-btn-block' => $field['type'] == 'fullwidth',
] );
?>

<p <?php echo ( $field['alignment'] !== 'left' ) ? 'class="qx-text-' . $field['alignment'] . '"' : '' ?>>
  <a id="<?php echo $id; ?>" class="<?php echo $classes ?>"
     href="<?php echo $field['button']['url'] ?>" <?php echo ( $field['button']['target'] ) ? ' target="_blank"' : '' ?>>
    <?php if ( ( $field['icon'] ) AND ( $field['icon_placement'] == 'left' ) ): ?>
      <i class="<?php echo $field['icon'] ?>"></i>
    <?php endif; ?>
    <?php echo $field['button']['text'] ?>
    <?php if ( ( $field['icon'] ) AND ( $field['icon_placement'] == 'right' ) ): ?>
      <i class="<?php echo $field['icon'] ?>"></i>
    <?php endif; ?>
  </a>
</p>
<!-- qx-element-button -->
