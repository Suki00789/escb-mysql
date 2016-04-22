#<?php echo $id; ?> i{
  font-size: <?php echo $field['icon_size']?>px;
  <?php Css::prop('color',$field['color']);?>
  
  <?php if($field['border']):?>
    border-style: solid;
    border-width: <?php echo $field['border_width']?>px;
    border-radius: <?php echo $field['border_radius']?>px;
    <?php Css::prop('border-color',$field['border_color']);?>
  <?php endif;?>
  <?php Css::margin($field['margin']);?>
  <?php Css::padding($field['padding']);?>
}