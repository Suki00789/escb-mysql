<?php
  $classes = classNames( "qx-element qx-element-{$type} {$field['class']}", $visibilityClasses,[
    "wow {$field['animation']}" => $field['animation']
  ]);
  \JHtml::_("script", QUIX_URL."/assets/js/collapse.js");
?>
<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
  <ul class="collapsible" data-collapsible="<?php echo $field['type']?>">
    <?php foreach($field['accordions'] as $key => $acc):?>
      <li>
        <div class="collapsible-header <?php echo ( $key == 0 ) ? 'active' : '' ?>">
          <?php if($acc['icon']):?>
            <i class="<?php echo $acc['icon']?>"></i>
          <?php endif;?>
          <?php echo $acc['title']?>
        </div>
        <div class="collapsible-body"><?php echo $acc['content']?></div>
      </li>
    <?php endforeach;?>
  </ul>
</div>
<!-- qx-element-accordion -->