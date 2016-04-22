#<?php echo $id?> img{  
  <?php Css::margin($field['margin']);?>
  <?php if($field['border']):?>
    <?php Css::prop('border-style', $field['border_style']);?>
    <?php Css::prop('border-color', $field['border_color']);?>
    border-width : <?php echo floor($field['border_width'])?>px;
  <?php endif;?>
}