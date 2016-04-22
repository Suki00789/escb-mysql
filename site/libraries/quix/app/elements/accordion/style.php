#<?php echo $id ?> .collapsible-header{
  <?php Css::prop("background-color", $field['header_bg_color'])?>
  <?php Css::prop("color", $field['header_text_color'])?>
  <?php Css::fonts( $field['header_font'] ); ?>
}

#<?php echo $id ?> .collapsible-body{
  <?php Css::fonts( $field['body_font'] ); ?>
  <?php Css::prop("background-color", $field['body_bg_color'])?>
  <?php Css::prop("color", $field['body_text_color'])?>
}

#<?php echo $id?> .collapsible-body,
#<?php echo $id?> .collapsible li{
  <?php Css::prop("border-color", $field['border_color'])?>
}
