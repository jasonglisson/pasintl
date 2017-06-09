<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('One Column Stacked'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_onecol_stacked.png',
  'theme' => 'bootstrap_onecol_stacked',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    'first' => t('First'),
    'second' => t('Second'),
    'third' => t('Third'),
    'forth' => t('Forth'),
    'fifth' => t('Fifth'),
    'sixth' => t('Sixth'),        
  ),
);
