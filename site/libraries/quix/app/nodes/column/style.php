#<?php echo $id?>{
  <?php if($field['bg_image']):?>
    background-image: url(<?php Css::image($field['bg_image']); ?>);
    <?php Css::prop('background-repeat', $field['image_repeat']);?>
    <?php Css::prop('background-position', $field['image_position']);?>
    <?php Css::prop('background-size', $field['image_size']);?>
  <?php endif;?>  
  <?php Css::prop('background-color', $field['bg_color']);?>
  <?php Css::padding($field['padding']);?>
  <?php Css::margin($field['margin']);?>
}

<?php echo $renderer->render( $node['children'] ); ?>