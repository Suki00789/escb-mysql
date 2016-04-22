<?php
  $classes = classNames("qx-element qx-element-{$type} {$field['class']}", $visibilityClasses);
  // Load Tab js
  \JHtml::_("script", QUIX_URL."/assets/js/tab.js");
?>
<div id="<?php echo $id; ?>" class="<?php echo $classes;?>">
  <ul class="tabs">
    <?php foreach($field['tabs'] as $key => $tab):?>
      <li class="tab"><a href="#qxt-<?php echo $id . $key?>">
        <?php if($tab['icon']):?>
            <i class="<?php echo $tab['icon']?>"></i>
          <?php endif;?>
        <?php echo $tab['title']?></a>
      </li>
    <?php endforeach;?>
  </ul>
  <?php foreach($field['tabs'] as $key => $tab):?>
    <div id="qxt-<?php echo $id . $key?>" class="tab-content">
      <?php echo $tab['content']?>
    </div>
  <?php endforeach;?>
</div>
<!-- qx-element-tabs -->