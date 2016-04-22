<?php
  $classes = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, [
    "wow {$field['animation']}" => $field['animation']
  ]);
?>
<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
  <?php echo qxModuleById($field['module_id'], 'none') ; ?>
</div>
<!-- qx-element-joomla-module -->