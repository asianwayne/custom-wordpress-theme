<?php 

function ha_get_option($option) {
  global $theme_options;

  if (!empty($theme_options[$option])) {
    return $theme_options[$option];
  }

  return false;
}

