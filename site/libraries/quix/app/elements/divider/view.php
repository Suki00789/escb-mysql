<?php
  $classes = classNames( "qx-element qx-element-space {$field['class']}", $visibilityClasses, [
    'qx-element-divider' => $field['divider']
  ]);
?>
<hr id="<?php echo $id; ?>" class="<?php echo $classes;?>" />