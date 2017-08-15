<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?> <!-- <?php print_r($node); ?> -->

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
 <?php print theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb())); ?>
  	<div class="col-xs-12 col-sm-12 col-md-6 product-images">
	  	<div class="well product-image-uc"><?php
		  	echo views_embed_view('product_images');?>	
		</div>
  	</div>
  	
	<div class="col-xs-12 col-sm-12 col-md-6">  	
	  	<br>
	  	<div id="price">
				<?php /* print uc_currency_format($node->sell_price);  */
				
				$sell_price = uc_currency_format($node->sell_price);
				$list_price = uc_currency_format($node->list_price);
				
				if ($sell_price < $list_price) {
					//echo "<div class=\"price-box\">Price: <span class=\"offer-price\">" . $list_price . "</span><span class=\"sale-price\"> " . $sell_price . "</span></div>";
					uc_currency_format($node->sell_price);
				} else {
					echo "Price: " . uc_currency_format($node->list_price);
				}
			?>
		</div>	
	  	<br>
		<div id="cartButtons">
			<?php
			$cart = drupal_get_form('uc_product_add_to_cart_form_'.$node->nid, $node);
			print drupal_render($cart);
			?>
		</div>
	  	<br>
		<div id="short-summary">
			<?php 
				
		    $nodeBody = $node->body;
		    if (isset($nodeBody['und'][0]['value'])) {
		        print $nodeBody['und'][0]['value'];
		    }				
				
			?>
		</div>
		<hr>
<!--
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div id="sku">
		  		SKU: <?php print $node->model; ?>
		  	</div>	
<!--
		  	<div id="sku">
			  	Weight: <?php print $node->weight; ?> <?php print $node->weight_units; ?>
		  	</div>

		</div>  
-->
<!--
		<div class="col-xs-6 col-sm-6 col-md-6">	
		  	<div id="sku">
			  	Length: <?php print $node->length; ?> <?php print $node->length_units; ?><br>
			  	Width: <?php print $node->width; ?> <?php print $node->length_units; ?><br>
			  	Height: <?php print $node->height; ?> <?php print $node->length_units; ?><br>
			</div>
		</div> 	
-->
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 product-tabs">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
		  <?php 
		  $nodeAddSpec = $node->field_additional_specifications;
		  if ($nodeAddSpec) {?><li><a href="#shipping" data-toggle="tab">Technical Specifications</a></li><?php } ?>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane fade in active" id="details"><?php 
			  
		    $nodeShortDesc = $node->field_short_description;
		    if (isset($nodeShortDesc['und'][0]['value'])) {
		        print $nodeShortDesc['und'][0]['value'];
		    }			  
			  
		  ?></div>
		  <div class="tab-pane fade" id="shipping">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="sku addspecs">
					<?php 
				    if (isset($nodeAddSpec['und'][0]['value'])) {
				        print $nodeAddSpec['und'][0]['value'];
				    }?>
				</div><?php      	
					$carrycase = $node->field_carrying_case;
					$casesize = $node->field_case_size;
					$beltpouch = $node->field_nylon_belt_pouch;
					$battery = $node->field_unit_batteries_4_aaa_;
					$mouthpiece = $node->field_mouthpieces_5_;
					$manual = $node->field_instruction_manual;
					$advmanual = $node->field_advanced_manual;	
					$printer = $node->field_thermal_printer;
					$printpaper = $node->field_printer_paper_2_rolls_;
					$printbattery = $node->field_printer_battery_li_ion_;
					$charger = $node->field_battery_charger;
					$acadapter = $node->field_ac_adapter;
					$usbcable = $node->field_usb_cable;
					$mouths = $node->field_addt_l_mouthpieces_100_;
					$dotforms = $node->field_dot_forms_100_;
					$nondotforms = $node->field_non_dot_forms_100_;
					$tampertape = $node->field_tamper_evident_tape_2_roll;
					$drygas = $node->field_dry_gas_cylinder_34l_;
					$pushbutton = $node->field_push_button_regulator;
									
																			
				echo '<div class="table-responsive">
						<table class="table table-hover">';
						
				 		    if (isset($carrycase['und'][0]['value'])) {
							    echo '<tr><td>Carrying Case</td><td></td><td>'.$carrycase['und'][0]['value'].'</td></tr>';
						    } else {
							    echo '';	
						    }  
				 		    if (isset($casesize['und'][0]['value'])) {
							    echo '<tr><td>Case Size</td><td></td><td>'.$casesize['und'][0]['value'].'</td></tr>';
						    } else {
							    echo '';	
						    } 
						    if (isset($beltpouch['und'][0]['value']) && $beltpouch['und'][0]['value'] == 'N/A') {
						        echo '';
						    } elseif (isset($beltpouch['und'][0]['value']) && $beltpouch['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Nylon Belt Pouch</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($beltpouch['und'][0]['value']) && $beltpouch['und'][0]['value'] == 'No') {
								echo '<tr><td>Nylon Belt Pouch</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    } 
						    if (isset($battery['und'][0]['value']) && $battery['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($battery['und'][0]['value']) && $battery['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Unit Batteries (4 AAA)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($battery['und'][0]['value']) && $battery['und'][0]['value'] == 'No') {
								echo '<tr><td>Unit Batteries (4 AAA)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    } 						      
						    if (isset($mouthpiece['und'][0]['value']) && $mouthpiece['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($mouthpiece['und'][0]['value']) && $mouthpiece['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Mouthpieces (5)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($mouthpiece['und'][0]['value']) && $mouthpiece['und'][0]['value'] == 'No') {
								echo '<tr><td>Mouthpieces (5)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    } 
						    if (isset($manual['und'][0]['value']) && $manual['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($manual['und'][0]['value']) && $manual['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Instruction Manual</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($manual['und'][0]['value']) && $manual['und'][0]['value'] == 'No') {
								echo '<tr><td>Instruction Manual</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    } 	
						    if (isset($advmanual['und'][0]['value']) && $advmanual['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($advmanual['und'][0]['value']) && $advmanual['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Advanced Manual</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($advmanual['und'][0]['value']) && $advmanual['und'][0]['value'] == 'No') {
								echo '<tr><td>Advanced Manual</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }  	
						    if (isset($printer['und'][0]['value']) && $printer['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($printer['und'][0]['value']) && $printer['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Thermal Printer</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($printer['und'][0]['value']) && $printer['und'][0]['value'] == 'No') {
								echo '<tr><td>Thermal Printer</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($printpaper['und'][0]['value']) && $printpaper['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($printpaper['und'][0]['value']) && $printpaper['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Printer Paper (2 Rolls)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($printpaper['und'][0]['value']) && $printpaper['und'][0]['value'] == 'No') {
								echo '<tr><td>Printer Paper (2 Rolls)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($printbattery['und'][0]['value']) && $printbattery['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($printbattery['und'][0]['value']) && $printbattery['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Printer Battery (Li Ion)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($printbattery['und'][0]['value']) && $printbattery['und'][0]['value'] == 'No') {
								echo '<tr><td>Printer Battery (Li Ion)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($charger['und'][0]['value']) && $charger['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($charger['und'][0]['value']) && $charger['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Battery Charger</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($charger['und'][0]['value']) && $charger['und'][0]['value'] == 'No') {
								echo '<tr><td>Battery Charger</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($acadapter['und'][0]['value']) && $acadapter['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($acadapter['und'][0]['value']) && $acadapter['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>AC Adapter</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($acadapter['und'][0]['value']) && $acadapter['und'][0]['value'] == 'No') {
								echo '<tr><td>AC Adapter</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($usbcable['und'][0]['value']) && $usbcable['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($usbcable['und'][0]['value']) && $usbcable['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>USB Cable</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($usbcable['und'][0]['value']) && $usbcable['und'][0]['value'] == 'No') {
								echo '<tr><td>USB Cable</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($mouths['und'][0]['value']) && $mouths['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($mouths['und'][0]['value']) && $mouths['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Addt\'l Mouthpieces (100)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($mouths['und'][0]['value']) && $mouths['und'][0]['value'] == 'No') {
								echo '<tr><td>Addt\'l Mouthpieces (100)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($dotforms['und'][0]['value']) && $dotforms['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($dotforms['und'][0]['value']) && $dotforms['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>DOT Forms (100)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($dotforms['und'][0]['value']) && $dotforms['und'][0]['value'] == 'No') {
								echo '<tr><td>DOT Forms (100)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($nondotforms['und'][0]['value']) && $nondotforms['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($nondotforms['und'][0]['value']) && $nondotforms['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Non-Dot Forms (100)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($nondotforms['und'][0]['value']) && $nondotforms['und'][0]['value'] == 'No') {
								echo '<tr><td>Non-Dot Forms (100)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($tampertape['und'][0]['value']) && $tampertape['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($tampertape['und'][0]['value']) && $tampertape['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Tamper Evident Tape (2 Rolls)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($tampertape['und'][0]['value']) && $tampertape['und'][0]['value'] == 'No') {
								echo '<tr><td>Tamper Evident Tape (2 Rolls)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }
						    if (isset($drygas['und'][0]['value']) && $drygas['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($drygas['und'][0]['value']) && $drygas['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Dry Gas Cylinder (34L)</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($drygas['und'][0]['value']) && $drygas['und'][0]['value'] == 'No') {
								echo '<tr><td>Dry Gas Cylinder (34L)</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }						    						    					    					    						    							    if (isset($pushbutton['und'][0]['value']) && $pushbutton['und'][0]['value'] == NULL) {
						        echo '';
						    } elseif (isset($pushbutton['und'][0]['value']) && $pushbutton['und'][0]['value'] == 'Yes') {
						        echo '<tr><td>Push Button Regulator</td><td></td><td><span class="glyphicon glyphicon-ok" style="color:green;"></span></td></tr>';
						    } elseif (isset($pushbutton['und'][0]['value']) && $pushbutton['und'][0]['value'] == 'No') {
								echo '<tr><td>Push Button Regulator</td><td></td><td><span class="glyphicon glyphicon-remove" style="color:red;"></span></td></tr>';	
						    }				    
				  echo '</table>
					  </div>';
				    
				   
				    ?>  
			</div>
		  </div>
		</div>
	</div>
	<div id="related-items">
		<?php		
		
		  $view = views_get_view('related_items');
		  if (!empty($view)){
		  	print $view->execute_display('default');
		  }
		?>  
	</div>
</div>

