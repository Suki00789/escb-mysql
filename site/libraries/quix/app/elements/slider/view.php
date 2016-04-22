<?php
  // HTML class
  $classes = classNames( "qx-element qx-element-{$type} {$field['class']}",$visibilityClasses,[
    'qx-text-left' => $field['alignment'] === 'left',
    'qx-text-center' => $field['alignment'] === 'center',
    'qx-text-right' => $field['alignment'] === 'right',
  ]);
  // css
  \JHtml::_("stylesheet", QUIX_URL."/assets/css/slick.css");
  // JS script
  \JHtml::_("script", QUIX_URL."/assets/js/slick.min.js");
?>

<div id="<?php echo $id;?>" class="<?php echo $classes?>">
  <div class="qx-sliders">
  <?php foreach($field['sliders'] as $slide):?>
    <div class="qx-slide" style="background-image: url(<?php echo $slide['image'] ?>);">
        <div class="qx-slide__container">
          
          <?php if($slide['title']):?>
          <h3><?php echo $slide['title']?></h3>
          <?php endif;?>

          <?php if($slide['content']):?>
          <div class="qx-slide__content"><?php echo $slide['content']?></div>
          <?php endif;?>
          <?php if($slide['button_enabled']):?>
            <a class="qx-btn qx-btn-lg qx-btn-primary" href="<?php echo $slide['button']['url'] ?>" <?php echo ( $slide['button']['target'] ) ? ' target="_blank"' : '' ?>><?php echo $slide['button']['text']?></a>
          <?php endif;?>
        </div>
    </div>
  <?php endforeach;?>
  </div>
</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#<?php echo $id?> .qx-sliders').slick({
      infinite: true,
      adaptiveHeight: true
    });
  });
</script>
<!-- qx-element-slider -->