#<?php echo $id;?>{
  <?php Css::fonts($field['body_font']); ?>
  <?php Css::prop('color', $field['body_color']);?>
}
#<?php echo $id;?> .qx-slide h3{
 <?php Css::fonts($field['header_font']); ?> 
}

#<?php echo $id;?> .slick-prev:before, 
#<?php echo $id;?> .slick-next:before{
 <?php Css::prop('color', $field['body_color']);?> 
}