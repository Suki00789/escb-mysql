<?php
  $classes = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, [
    'qx-text-left' => $field['alignment'] === 'left',
    'qx-text-center' => $field['alignment'] === 'center',
    'qx-text-right' => $field['alignment'] === 'right'
  ]);
?>
<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
  <i class="<?php echo $field['icon']?>"></i>
</div>
<!-- qx-element-icon -->