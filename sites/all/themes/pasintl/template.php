<?php
/**
 * @file
 * template.php
 *
 * This file should only contain light helper functions and stubs pointing to
 * other files containing more complex functions.
 *
 * The stubs should point to files within the `theme` folder named after the
 * function itself minus the theme prefix. If the stub contains a group of
 * functions, then please organize them so they are related in some way and name
 * the file appropriately to at least hint at what it contains.
 *
 * All [pre]process functions, theme functions and template implementations also
 * live in the 'theme' folder. This is a highly automated and complex system
 * designed to only load the necessary files when a given theme hook is invoked.
 * @see _bootstrap_theme()
 * @see theme/registry.inc
 *
 * Due to a bug in Drush, these includes must live inside the 'theme' folder
 * instead of something like 'includes'. If a module or theme has an 'includes'
 * folder, Drush will think it is trying to bootstrap core when it is invoked
 * from inside the particular extension's directory.
 * @see https://drupal.org/node/2102287
 */

function pasintl_preprocess_page(&$vars) {
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $tid = arg(2);
    $vid = db_query("SELECT vid FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $tid))->fetchField();
    $variables['theme_hook_suggestions'][] = 'page__vocabulary__' . $vid; 
  }
	// Do we have a node?
	if (isset($vars['node'])) {
		// Ref suggestions cuz it's stupid long.
		$suggests = &$vars['theme_hook_suggestions'];
		// Get path arguments.
		$args = arg();
		// Remove first argument of "node".
		unset($args[0]);
		// Set type.
		$type = "page__type_{$vars['node']->type}";
		// Bring it all together.
		$suggests = array_merge(
		$suggests,
		array($type),
		theme_get_suggestions($args, $type));
	}
	
	if (isset($variables['node']->type)) {
   // If the content type's machine name is "my_machine_name" the file
   // name will be "page--my-machine-name.tpl.php".
   $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }	
	 
/*   drupal_add_js(drupal_get_path('theme', 'pasintl') .'/js/jquery.js', 'file');  */ 
  drupal_add_js(drupal_get_path('theme', 'pasintl') .'/js/bootstrap.min.js', 'file');
  drupal_add_js(drupal_get_path('theme', 'pasintl') .'/js/jquery.sticky.js', 'file');
  drupal_add_js(drupal_get_path('theme', 'pasintl') .'/js/waypoints.min.js', 'file');  
  drupal_add_js(drupal_get_path('theme', 'pasintl') .'/js/waypoints-sticky.min.js', 'file');    
  drupal_add_js(drupal_get_path('theme', 'pasintl') .'/js/masonry.min.js', 'file'); 
}
