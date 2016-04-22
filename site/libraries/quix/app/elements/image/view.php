<?php
  $classes = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses, [
    'qx-text-left' => $field['alignment'] === 'left',
    'qx-text-center' => $field['alignment'] === 'center',
    'qx-text-right' => $field['alignment'] === 'right',
    "wow {$field['animation']}" => $field['animation']
  ]);
  // Shuffle href based on lightbox settings
  $lightbox_class = '';
  if( $field['open_lightbox'] ){
    $url = 'href="' . $field['image'] . '"';
    $lightbox_class = 'qx-image--lightbox';
  }else{
    $url  = 'href="' . $field['link']['url'] . '"';
    $url .= ($field['link']['target']) ? ' target="_blank"' : '';
  }
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>"> 
  <?php if($field['link']['url'] OR $field['open_lightbox']):?>
  <a class="<?php echo $lightbox_class?>" <?php echo $url; ?>>
  <?php endif;?>

    <img class="qx-img" src="<?php echo $field['image']; ?>" alt="<?php echo $field['alt_text']; ?>" />
    
  <?php if($field['link']['url'] OR $field['open_lightbox']):?>
  </a>
  <?php endif;?>
</div>
<!-- qx-element-image -->