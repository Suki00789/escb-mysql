<?php

function getList() {
  JModelLegacy::addIncludePath( JPATH_SITE . '/administrator/components/com_modules/models', 'ModulesModel' );

  // Get an instance of the generic articles model
  $model = JModelLegacy::getInstance( 'Modules', 'ModulesModel', [ 'ignore_request' => true ] );

  // Set the filters based on the module params
  $model->setState( 'list.start', 0 );
  $model->setState( 'list.limit', 9999 );

  $model->setState( 'filter.published', 1 );

  // Access filter
  $access = ! JComponentHelper::getParams( 'com_modules' )->get( 'show_noauth' );
  $model->setState( 'filter.access', $access );

  // Set ordering
  $model->setState( 'list.ordering', 'a.ordering' );

  $model->setState( 'list.direction', 'ASC' );

  // Retrieve Content
  $items = $model->getItems();

  return $items;
}

$modules = array_reduce( getList(), function ( $carry, $module ) {
  $carry[$module->id] = $module->title;

  return $carry;
}, [ ] );

return [
  "slug" => "joomla-module",
  "name" => "Joomla Module",
  "groups" => ["joomla", "content"],
  "form" => [
    "general" => [
      [ "name" => "module_id", "type" => "select",  "options" => $modules ],
      [ 
        "name" => 'animation', 
        "type" => "select", 
        "value" => 0, 
        "options" => [
          "fadeInLeft" => "Left To Right", 
          "fadeInRight" => "Right To Left", 
          "fadeInUp" => "Bottom To Top", 
          "fadeInDown" => "Top To Bottom",
          "fadeIn" => "Fade In",
          "zoomIn" => "Zoom In",
          0 => 'No Animation'
        ]
      ],
    ],
  ],

];
