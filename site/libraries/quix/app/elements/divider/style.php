#<?php echo $id?> {
  height : <?php echo $field['height']?>px;
}

<?php if($field['divider']):?>
  #<?php echo $id?>.qx-element-divider:before{
    <?php Css::prop('border-top-color',$field['color']);?>
    <?php if($field['divider_width']):?>
      border-top-width: <?php echo $field['divider_width']; ?>px;
    <?php endif;?>  
    <?php Css::prop('border-top-style',$field['divider_style']);?>
    <?php if($field['divider_center']):?>
      top: 50%;
      margin-top: -<?php echo $field['divider_width']; ?>px;
    <?php endif;?>
  }
<?php endif;?>