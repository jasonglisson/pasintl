<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('One Column Full Width Stacked'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_onecol_fullwidth_stacked.png',
  'theme' => 'bootstrap_onecol_fullwidth_stacked',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    'first' => t('First Full Width'),
    'second' => t('Second'),
    'third' => t('Third Full Width'),
    'fourth' => t('Fourth'),
    'fifth' => t('Fifth Full Width'),
    'sixth' => t('Sixth'),        
  ),
);
