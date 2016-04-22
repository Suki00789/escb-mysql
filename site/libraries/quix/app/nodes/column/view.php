<?php

/** make 12 col bootstrap compitable grid */
$grids = implode( " ", array_map( function ( $device, $size ) {
  return "qx-col-{$device}-" . ceil( $size * 12 );
}, array_keys( $node['size'] ), $node['size'] ) );

$classes = classNames( "qx-column {$field['class']}", $grids,[
  'qx-flex qx-flex-middle qx-flex-center' => $field['center_text']
]);
?>

<div id="<?php echo $id?>" class="<?php echo $classes ?>">
  <?php echo $renderer->render( $node['children'] ) ?>
</div>
<!-- qx-col -->
