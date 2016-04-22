<?php
  // HTML class
  $classes = classNames( "qx-element qx-element-{$type} {$field['class']}",$visibilityClasses, [
    "wow {$field['animation']}" => $field['animation']
  ]);
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
  <div class="qx-media">
    <div class="qx-media-left">
      <img class="qx-img-responsive <?php echo $field['image_style']?>" src="<?php echo $field['image']?>" alt="<?php echo $field['name']?>">
    </div>
    <div class="qx-media-body">
      <div class="qx-testimony"><?php echo $field['testimony']?></div>
      <h4><?php echo $field['name']?></h4>
      <p class="qx-text-muted"><?php echo $field['company']?></p>
    </div>
  </div>
</div>
<!-- qx-element-testimonial -->