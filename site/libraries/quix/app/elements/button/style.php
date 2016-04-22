#<?php echo $id?> {
  <?php Css::fonts($field['font']);?>
  <?php Css::prop('color', $field['text_color']);?>
  <?php Css::prop('background', $field['bg_color']);?>
  <?php if($field['border']):?>
    <?php Css::prop('border-style', $field['border_style']);?>
    <?php Css::prop('border-color', $field['border_color']);?>
    border-width: <?php echo $field['border_width']?>px;
    border-radius: <?php echo $field['border_radius']?>px;
  <?php endif;?>
  <?php Css::margin($field['margin']);?>
  <?php Css::padding($field['padding']);?>
}

<?php if($field['button_icon_color']):?>
  #<?php echo $id?> i{
    <?php Css::prop('color', $field['button_icon_color']);?>
  }
<?php endif;?>
  
<?php if( $field['text_color_hover'] OR $field['bg_color_hover'] ):?>
  #<?php echo $id?>:hover{
    <?php Css::prop('color', $field['text_color_hover']);?>
    <?php Css::prop('background', $field['bg_color_hover']);?>
  }
<?php endif;?>
<?php if($field['button_icon_color_hover']):?>
  #<?php echo $id?>:hover i{
    <?php Css::prop('color', $field['button_icon_color_hover']);?>
  }
<?php endif;?>
