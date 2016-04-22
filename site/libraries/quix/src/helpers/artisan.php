<?php

use ThemeXpert\View\View;

function wpvention_view($file, $data){
  return View::getInstance()->make($file, $data);
}
