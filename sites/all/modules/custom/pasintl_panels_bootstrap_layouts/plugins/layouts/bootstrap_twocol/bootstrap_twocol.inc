<?php

// Plugin definition
$plugin = array(
  'title' => t('Two column'),
  'category' => t('Mini Panels'),
  'icon' => 'twocol.png',
  'theme' => 'panels_twocol',
  'css' => 'twocol.css',
  'regions' => array(
    'left' => t('Left side'),
    'right' => t('Right side')
  ),
);
