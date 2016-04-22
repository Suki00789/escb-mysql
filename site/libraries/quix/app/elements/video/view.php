<?php
  $classes = classNames("qx-element qx-element-{$type} {$field['class']}", $visibilityClasses);
  // Get Embeed URL based on host. Now support Youtube and vimeo. more coming
  $source = parse_url($field['video_url']);
  
  switch ($source['host']) {
    case 'youtube.com':
    case 'www.youtube.com':
      parse_str($source['query'], $query);
      $video_id = $query['v'];
      $url = '//www.youtube.com/embed/' . $video_id;
      break;
    case 'youtu.be' :
      $video_id = trim( $source['path'], '/' );
      $url = '//www.youtube.com/embed/' . $video_id;
      break;
    case 'vimeo.com':
    case 'www.vimeo.com':
      $video_id = trim($source['path'],'/');
      $url = '//player.vimeo.com/video/' . $video_id;
  }
?>

<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>">
  <iframe 
    class="qx-video" 
    src="<?php echo $url; ?>" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
</div>
<!-- qx-element-video -->