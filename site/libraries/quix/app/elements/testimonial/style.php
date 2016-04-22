#<?php echo $id?>{
  <?php Css::fonts($field['font']);?>
  <?php Css::prop('background-color', $field['bg_color']);?>  
  <?php Css::margin($field['margin']);?>  
  <?php Css::padding($field['padding']);?>  
}

#<?php echo $id?> .qx-testimony{
  <?php Css::prop('color', $field['text_color']);?>  
}