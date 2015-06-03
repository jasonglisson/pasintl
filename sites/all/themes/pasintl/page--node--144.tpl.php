<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<?php include('nav.php');
	
/* print_r($node->field_product_2['und'][0]['entity']); */
	
?>

<!-- <div class="main-container container"> -->

<header role="banner" id="page-header">
	<?php if (!empty($site_slogan)): ?>
	  <p class="lead"><?php print $site_slogan; ?></p>
	<?php endif; ?>
	
	<?php print render($page['header']); ?>
	  </header> <!-- /#page-header -->
	<div id="micro-top-drawer">
  		<div class="container">
			<div class="col-lg-12">
				<?php $drawertext = $node->field_top_drawer_text;
					if (isset($drawertext['und'][0]['value'])) {
					print $drawertext['und'][0]['value'];
					}?>
				<div id="close-drawer"></div>	
			</div>
  		</div>	
  	</div>	
<div class="row micro-container">
	      <?php if (!empty($page['highlighted'])): ?>
	        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
	      <?php endif; ?>
	<!--       <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?> -->
	      <a id="main-content"></a>
	      <?php print render($title_prefix); ?>
	      <?php if (!empty($title)): ?>
	      <?php endif; ?>
	      <?php print render($title_suffix); ?>
	      <?php if (!empty($tabs)): ?>
	        <?php print render($tabs); ?>
	      <?php endif; ?>
	      <?php if (!empty($page['help'])): ?>
	        <?php print render($page['help']); ?>
	      <?php endif; ?>
	      <?php if (!empty($action_links)): ?>
	        <ul class="action-links"><?php print render($action_links); ?></ul>
	      <?php endif; ?>
		  <?php print render($page['content']); ?> 
		<div id="micro-header">
			<div id="micro-header-bg"></div>
			<div id="micro-header-bg-color"></div>			
			<div id="micro-header-bg1" style="background-image:url(/sites/default/files/<?php $headerbg1 = $node->field_header_bg_1;
								if (isset($headerbg1['und'][0]['filename'])) {
								print $headerbg1['und'][0]['filename'];
								}?>); z-index:1;" class="header-bg"></div>							
			<div class="container visible-lg" id="micro-tagline">
				<div class="col-lg-12">
				<?php $section1tagline = $node->field_tagline;
				if (isset($section1tagline['und'][0]['value'])) {
				print $section1tagline['und'][0]['value'];
				}?>			
				</div>
			</div>
			<div id="micro-sub-video-text" class="visible-lg">
				<div class="container"> 
					<div class="text-wrapper">
					<?php $videosubtext = $node->field_video_subtext;
						if (isset($videosubtext['und'][0]['value'])) {
						print $videosubtext['und'][0]['value'];
						}?>
					</div>	
				</div>	
			</div>
			<div class="container hidden-lg" id="micro-tagline">
				<div class="col-lg-12">
				<?php $section1tagline = $node->field_tagline;
				if (isset($section1tagline['und'][0]['value'])) {
				print $section1tagline['und'][0]['value'];
				}?>			
				</div>
			</div>
			<div id="micro-sub-video-text" class="hidden-lg">
				<div class="container"> 
					<div class="text-wrapper">
					<?php $videosubtext = $node->field_video_subtext;
						if (isset($videosubtext['und'][0]['value'])) {
						print $videosubtext['und'][0]['value'];
						}?>
					</div>	
				</div>	
			</div>			
			<div class="container" id="micro-video-text">
				<div class="col-lg-12 visible-lg" id="micro-video-link">
				<?php $section1videotext = $node->field_watch_video_text;
				if (isset($section1videotext['und'][0]['value'])) {
				print $section1videotext['und'][0]['value'];
				}?>
					<div class="micro-slide-obj2 visible-lg" style="background-image:url(/sites/default/files/<?php $slideobj2 = $node->field_slide_object_2;
								if (isset($slideobj2['und'][0]['filename'])) {
								print $slideobj2['und'][0]['filename'];
								}?>);"></div>	
					<div class="micro-slide-obj1 visible-lg" style="background-image:url(/sites/default/files/<?php $slideobj1 = $node->field_slide_object_1;
								if (isset($slideobj1['und'][0]['filename'])) {
								print $slideobj1['und'][0]['filename'];
								}?>);"></div>		
				</div>
				<div class="col-lg-12 hidden-lg" id="micro-video-link-small">
					<a href="https://www.youtube.com/watch?v=<?php $microYouTube = $node->field_featured_video;
									if (isset($microYouTube['und'][0]['value'])) {
									print $microYouTube['und'][0]['value'];
									}?>" target="_blank"><?php $section1videotext = $node->field_watch_video_text;
					if (isset($section1videotext['und'][0]['value'])) {
					print $section1videotext['und'][0]['value'];
					}?></a>		
				</div>								
			</div>
			<div id="micro-video">
				<div id="player"></div>
				<div id="close-player"></div>
				<script>
				  // 2. This code loads the IFrame Player API code asynchronously.
				  var tag = document.createElement('script');
				
				  tag.src = "https://www.youtube.com/iframe_api";
				  var firstScriptTag = document.getElementsByTagName('script')[0];
				  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				  // 3. This function creates an <iframe> (and YouTube player)
				  //    after the API code downloads.
				  var player;
				  function onYouTubeIframeAPIReady() {
				    player = new YT.Player('player', {
				      height: '100%',
				      width: '100%',
				      videoId: '<?php $microYouTube = $node->field_featured_video;
								if (isset($microYouTube['und'][0]['value'])) {
								print $microYouTube['und'][0]['value'];
								}?>',
				      events: {
				        'onReady': onPlayerReady,
				        'onStateChange': onPlayerStateChange
				      }
				    });
				  }
				
				  // 4. The API will call this function when the video player is ready.
				  function onPlayerReady(event) {
				    /* event.target.pauseVideo(); */
				  }
				
				  // 5. The API calls this function when the player's state changes.
				  //    The function indicates that when playing a video (state=1),
				  //    the player should play for six seconds and then stop.
				  var done = false;
				  function onPlayerStateChange(event) {
				    if (event.data == YT.PlayerState.PLAYING && !done) {
				      done = true;
				    }
				  }
				  function stopVideo() {
				    player.stopVideo();
				  }
				</script>							
			</div>
		</div>
	</div>	  
<div id="micro-menu-wrapper" class="visible-lg">	
	<div id="micro-menu" class="visible-lg">
		<div class="container">
			<div class="col-lg-12">
				<ul class="micro-menu">
					<img src="/sites/all/themes/pasintl/images/micro-logo.png" class="micro-logo">
					<li id="drawer-toggle">History</li>
					<li id="section1btn"><?php $section1title = $node->field_section_title;
					if (isset($section1title['und'][0]['value'])) {
					print $section1title['und'][0]['value'];
					}?></li>
					<li id="section2btn"><?php $section2title = $node->field_section_2_title;
					if (isset($section2title['und'][0]['value'])) {
					print $section2title['und'][0]['value'];
					}?></li>
					<li id="section3btn"><?php $section3title = $node->field_section_3_title;
					if (isset($section3title['und'][0]['value'])) {
					print $section3title['und'][0]['value'];
					}?></li>
					<li id="section4btn"><?php $section4title = $node->field_section_4_title;
					if (isset($section4title['und'][0]['value'])) {
					print $section4title['und'][0]['value'];
					}?></li>
					<li id="section5btn"><?php $section5title = $node->field_section_5_title;
					if (isset($section5title['und'][0]['value'])) {
					print $section5title['und'][0]['value'];
					}?></li>
					<li><div id="cart-lg" class="well well-sm">
				    	<a href="/cart">
					    <span class="glyphicon glyphicon-shopping-cart"></span>
						<?php
						  $items = 0;
						  foreach (uc_cart_get_contents() as $item) {
						    $items += $item->qty;
						  }
						print $items;
						?>
				    	</a>
				    </div></li>
					<li class="micro-back"><a href="/"><span class="glyphicon glyphicon-share-alt right"></span><br>Back to Main Site</a></li>
				</ul>	
			</div>	
		</div>	
	</div>
</div>		
<div id="micro-menu-small-wrapper" class="hidden-lg">
	<div id="micro-menu-small" class="">
		<img src="/sites/all/themes/pasintl/images/micro-logo.png" class="micro-logo">
		<span class="glyphicon glyphicon-align-justify menu-button" id="menu-toggle"></span>	
		<ul class="micro-menu">
			<li id="drawer-stoggle">History</li>
			<li id="section1sbtn"><?php $section1title = $node->field_section_title;
			if (isset($section1title['und'][0]['value'])) {
			print $section1title['und'][0]['value'];
			}?></li>
			<li id="section2sbtn"><?php $section2title = $node->field_section_2_title;
			if (isset($section2title['und'][0]['value'])) {
			print $section2title['und'][0]['value'];
			}?></li>
			<li id="section3sbtn"><?php $section3title = $node->field_section_3_title;
			if (isset($section3title['und'][0]['value'])) {
			print $section3title['und'][0]['value'];
			}?></li>
			<li id="section4sbtn"><?php $section4title = $node->field_section_4_title;
			if (isset($section4title['und'][0]['value'])) {
			print $section4title['und'][0]['value'];
			}?></li>
			<li id="section5sbtn"><?php $section5title = $node->field_section_5_title;
			if (isset($section5title['und'][0]['value'])) {
			print $section5title['und'][0]['value'];
			}?></li>
			<li><a href="/">Back to Main Site</a></li>
		</ul>	
	</div>	
</div>	
<section class="" id="section-1"> 	
	<div id="button-wrapper" class="section-1">	
		<div class="container">
			<?php print $messages; ?>
			<div class="col-lg-12 col-md-12">
				<h2 class="micro-section-title" id="section1"><?php $section1title = $node->field_section_title;
			if (isset($section1title['und'][0]['value'])) {
			print $section1title['und'][0]['value'];
			}?></h2>
				<div class="col-lg-4 col-md-4">
					<div id="item1">
							<div id="s1i1" class="round-btns">
								<div style="background-image:url(/sites/default/files/<?php $section1img1 = $node->field_section_1_img_item_1;
								if (isset($section1img1['und'][0]['filename'])) {
								print $section1img1['und'][0]['filename'];
								}?>);" class="s1img"></div>
							</div>	
							<div class="s1title"><?php $section1title1 = $node->field_section_1_img_title_1;
								if (isset($section1title1['und'][0]['value'])) {
								print $section1title1['und'][0]['value'];
								}?></div>
						</div>	
				</div>
				<div class="col-lg-4 col-md-4">
					<div id="item2">
							<div id="s1i2" class="round-btns">
								<div style="background-image:url(/sites/default/files/<?php $section1img2 = $node->field_section_1_img_item_2;
								if (isset($section1img2['und'][0]['filename'])) {
								print $section1img2['und'][0]['filename'];
								}?>);" class="s1img"></div>
							</div>
							<div class="s1title"><?php $section1title2 = $node->field_section_1_img_title_2;
								if (isset($section1title2['und'][0]['value'])) {
								print $section1title2['und'][0]['value'];
								}?></div> 
						</div>	
				</div>
				<div class="col-lg-4 col-md-4"> 
					<div id="item3">
							<div id="s1i3" class="round-btns">
								<div style="background-image:url(/sites/default/files/<?php $section1img3 = $node->field_section_1_img_item_3;
								if (isset($section1img3['und'][0]['filename'])) {
								print $section1img3['und'][0]['filename'];
								}?>);" class="s1img"></div>
							</div>
							<div class="s1title"><?php $section1title3 = $node->field_section_1_img_title_3;
								if (isset($section1title3['und'][0]['value'])) {
								print $section1title3['und'][0]['value'];
								}?></div>
						</div>	
				</div> 	
			</div>	
		</div>	
	</div><!-- #button-wrapper -->	
	<div id="button-arrow">
		<div class="container">
		<div class="col-lg-12 col-md-12">
			<div class="col-lg-4 col-md-4">
				<div id="arrow1" class="arrow">
					<div id="arrow-img"></div>
				</div>
			</div>	
			<div class="col-lg-4 col-md-4">
				<div id="arrow2" class="arrow">
					<div id="arrow-img"></div>
				</div>
			</div>			
			<div class="col-lg-4 col-md-4">
				<div id="arrow3" class="arrow">
					<div id="arrow-img"></div>
				</div>
			</div>	
		</div>	
		</div>						
	</div>		
	<div id="button-content">
		<div class="col-lg-10 col-md-12 col-sm-12">					
			<div id="item1-content" class="container">
				<span class="close glyphicon glyphicon-remove"></span>
				<div class="micro-product-img">
					<div style="background-image:url(/sites/default/files/<?php $product1 = $node->field_product;
					if (isset($product1['und'][0]['entity']->uc_product_image['und'][0]['filename'])) {
					print $product1['und'][0]['entity']->uc_product_image['und'][0]['filename'];
					}?>);"></div>
				</div>			
				<h2><?php
				if (isset($product1['und'][0]['entity']->title)) {
				print $product1['und'][0]['entity']->title;
			}?></h2>
				<div id="price">
					<?php print uc_currency_format($product1['und'][0]['entity']->price); ?>
				</div>	
			<?php
				$node1 = node_load($product1['und'][0]['entity']->nid);
				$add_to_cart = array(
				'#theme' => 'uc_product_add_to_cart',
				'#form' => drupal_get_form('uc_product_add_to_cart_form_' . $product1['und'][0]['entity']->nid, $node1),
				);
				print drupal_render($add_to_cart);				
			?>						
			<?php
				if (isset($product1['und'][0]['entity']->field_short_description['und'][0]['value'])) {
				print $product1['und'][0]['entity']->field_short_description['und'][0]['value'];
			}?>						
			</div>
			<div id="item2-content" class="container">
				<span class="close glyphicon glyphicon-remove"></span>		
				<div class="micro-product-img">
					<div style="background-image:url(/sites/default/files/<?php $product2 = $node->field_product_2;
					if (isset($product2['und'][0]['entity']->uc_product_image['und'][0]['filename'])) {
					print $product2['und'][0]['entity']->uc_product_image['und'][0]['filename'];
					}?>);"></div>
				</div>				
				<h2><?php
					if (isset($product2['und'][0]['entity']->title)) {
					print $product2['und'][0]['entity']->title;
				}?></h2>
				<div id="price">
					<?php print uc_currency_format($product2['und'][0]['entity']->price); ?>
				</div>	
			<?php
				$node2 = node_load($product2['und'][0]['entity']->nid);
				$add_to_cart = array(
				'#theme' => 'uc_product_add_to_cart',
				'#form' => drupal_get_form('uc_product_add_to_cart_form_' . $product2['und'][0]['entity']->nid, $node2),
				);
				print drupal_render($add_to_cart);				
			?>				
			<?php
				if (isset($product2['und'][0]['entity']->field_short_description['und'][0]['value'])) {
				print $product2['und'][0]['entity']->field_short_description['und'][0]['value'];
			}?>			
			</div>		
			<div id="item3-content" class="container">
				<span class="close glyphicon glyphicon-remove"></span>			
				<div class="micro-product-img">
					<div style="background-image:url(/sites/default/files/<?php $product3 = $node->field_product_3;
					if (isset($product3['und'][0]['entity']->uc_product_image['und'][0]['filename'])) {
					print $product3['und'][0]['entity']->uc_product_image['und'][0]['filename'];
					}?>);"></div>
				</div>				
				<h2><?php $product3 = $node->field_product_3;
					if (isset($product3['und'][0]['entity']->title)) {
					print $product3['und'][0]['entity']->title;
				}?></h2>
				<div id="price">
					<?php print uc_currency_format($product3['und'][0]['entity']->price); ?>
				</div>	
				<?php
				$node3 = node_load($product3['und'][0]['entity']->nid);
				$add_to_cart = array(
				'#theme' => 'uc_product_add_to_cart',
				'#form' => drupal_get_form('uc_product_add_to_cart_form_' . $product3['und'][0]['entity']->nid, $node3),
				);
				print drupal_render($add_to_cart);				
				?>					
				<?php $product3 = $node->field_product_3;
				if (isset($product3['und'][0]['entity']->field_short_description['und'][0]['value'])) {
				print $product3['und'][0]['entity']->field_short_description['und'][0]['value'];
				}?>		
			</div>		
		</div>		
	</div>
</section>	    
<section class="" id="section-2">
	  	<div class="container">  
			<div class="col-lg-12 col-md-12">
				<h2 class="micro-section-title" id="section2"><?php $section2title = $node->field_section_2_title;
				if (isset($section2title['und'][0]['value'])) {
				print $section2title['und'][0]['value'];
				}?></h2>	
			</div>			
	  	</div>  
	  	<div class="visible-lg">
	  		<div id="section-2-menu" class="section-menu">
	  		<div class="container">  
				<div class="col-lg-12 col-md-12">
					<ul>
						<?php $section2title = $node->field_section_2_title;
							if (isset($section2title['und'][0]['value'])) {
								print '<li><h2 class="sub-menu-title" id="s2">' .$section2title['und'][0]['value'] .'</h2></li>';
								}?>
						<?php $section2subtitle1 = $node->field_sub_section_1_title;
							if (isset($section2subtitle1['und'][0]['value'])) {
								print '<li id="s2item1" class="sub-link">' .$section2subtitle1['und'][0]['value']. '</li>';
								}?>
						<?php $section2subtitle2 = $node->field_sub_section_2_title;
							if (isset($section2subtitle2['und'][0]['value'])) {
								print '<li id="s2item2" class="sub-link">' .$section2subtitle2['und'][0]['value']. '</li>';
								}?>
						<?php $section2subtitle3 = $node->field_sub_section_3_title;
							if (isset($section2subtitle3['und'][0]['value'])) {
								print '<li id="s2item3" class="sub-link">' .$section2subtitle3['und'][0]['value']. '</li>';
						 }?>					 
					</ul>			
				</div>
	  		</div>				
	  	</div>	 
	  	</div> 	
	  	<div id="section-2-content-1" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section2subtitle1 = $node->field_sub_section_1_title;
				if (isset($section2subtitle1['und'][0]['value'])) {
				print $section2subtitle1['und'][0]['value'];
				}?></div>			
				<div class="section-text">
					<div id="section-1-info-1" ><?php $section2info1 = $node->field_section_2_info_box_1;
					if (isset($section2info1['und'][0]['value'])) {
					print $section2info1['und'][0]['value'];
					}?>
					</div>				
				<?php $section2content1 = $node->field_section_2_sub_content_1;
				if (isset($section2content1['und'][0]['value'])) {
				print $section2content1['und'][0]['value'];
				}?>
					<div id="section-1-info-2" ><?php $section2info2 = $node->field_section_2_info_box_2;
					if (isset($section2info2['und'][0]['value'])) {
					print $section2info2['und'][0]['value'];
					}?>
					</div>					
				</div>					
			</div>		  	
	  	</div>  	
	  	<div id="section-2-content-2" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section2subtitle2 = $node->field_sub_section_2_title;
				if (isset($section2subtitle2['und'][0]['value'])) {
				print $section2subtitle2['und'][0]['value'];
				}?></div>			
				<div class="section-text"><?php $section2content2 = $node->field_section_2_sub_content_2;
				if (isset($section2content2['und'][0]['value'])) {
				print $section2content2['und'][0]['value'];
				}?></div>					
			</div>		  	
	  	</div>
	  	<div id="section-2-content-3" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section2subtitle3 = $node->field_sub_section_3_title;
				if (isset($section2subtitle3['und'][0]['value'])) {
				print $section2subtitle3['und'][0]['value'];
				}?></div>			
				<div class="section-text"><?php $section2content3 = $node->field_section_2_sub_content_3;
				if (isset($section2content3['und'][0]['value'])) {
				print $section2content3['und'][0]['value'];
				}?></div>					
			</div>		  	
	  	</div> 	  		  	  		  	  
</section>
<section class="" id="section-3">
	  	<div class="container">  
			<div class="col-lg-12 col-md-12">
					<h2 class="micro-section-title" id="section3"><?php $section3title = $node->field_section_3_title;
				if (isset($section3title['und'][0]['value'])) {
				print $section3title['und'][0]['value'];
				}?></h2>	
			</div>
		</div>	
		<div class="visible-lg">
	  		<div id="section-3-menu" class="section-menu">
	  		<div class="container">  
				<div class="col-lg-12 col-md-12">
					<ul>
						<?php $section3title = $node->field_section_3_title;
							if (isset($section3title['und'][0]['value'])) {
								print '<li><h2 class="sub-menu-title" id="s3">' .$section3title['und'][0]['value'] . '</h2></li>';	
								}?>
						<?php $section3subtitle1 = $node->field_sub_section_3_title_1;
							if (isset($section3subtitle1['und'][0]['value'])) {
								print '<li id="s3item1" class="sub-link">' . $section3subtitle1['und'][0]['value'] . '</li>';
								}?>
						<?php $section3subtitle2 = $node->field_sub_section_3_title_2;
							if (isset($section3subtitle2['und'][0]['value'])) {
								print '<li id="s3item2" class="sub-link">' . $section3subtitle2['und'][0]['value'] . '</li>';
								}?>
						<?php $section3subtitle3 = $node->field_sub_section_3_title_3;
							if (isset($section3subtitle3['und'][0]['value'])) {
								print '<li id="s3item3" class="sub-link">' . $section3subtitle3['und'][0]['value'] . '</li>';
								}?>
						<?php $section3subtitle4 = $node->field_sub_section_3_title_4;
							if (isset($section3subtitle4['und'][0]['value'])) {
								print '<li id="s3item4" class="sub-link">' . $section3subtitle4['und'][0]['value'] . '</li>';
								}?>					 
					</ul>			
				</div>
	  		</div>				
	  	</div>	 
		</div> 
	  	<div id="section-3-content-1" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section3subtitle1 = $node->field_sub_section_3_title_1;
				if (isset($section3subtitle1['und'][0]['value'])) {
				print $section3subtitle1['und'][0]['value'];
				}?></div>			
				<div class="section-text">			
				<?php $section3content1 = $node->field_section_3_sub_content_1;
				if (isset($section3content1['und'][0]['value'])) {
				print $section3content1['und'][0]['value'];
				}?>			
				</div>					
			</div>		  	
	  	</div>  	
	  	<div id="section-3-content-2" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section3subtitle2 = $node->field_sub_section_3_title_2;
				if (isset($section3subtitle2['und'][0]['value'])) {
				print $section3subtitle2['und'][0]['value'];
				}?></div>			
				<div class="section-text"><?php $section3content2 = $node->field_section_3_sub_content_2;
				if (isset($section3content2['und'][0]['value'])) {
				print $section3content2['und'][0]['value'];
				}?></div>					
			</div>		  	
	  	</div>
	  	<div id="section-3-content-3" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section3subtitle3 = $node->field_sub_section_3_title_3;
				if (isset($section3subtitle3['und'][0]['value'])) {
				print $section3subtitle3['und'][0]['value'];
				}?></div>			
				<div class="section-text"><?php $section3content3 = $node->field_section_3_sub_content_3;
				if (isset($section3content3['und'][0]['value'])) {
				print $section3content3['und'][0]['value'];
				}?>			
				</div>					
			</div>		  	
	  	</div> 
	  	<div id="section-3-content-4" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section3subtitle4 = $node->field_sub_section_3_title_4;
				if (isset($section3subtitle4['und'][0]['value'])) {
				print $section3subtitle4['und'][0]['value'];
				}?></div>			
				<div class="section-text"><?php $section3content4 = $node->field_section_3_sub_content_4;
				if (isset($section3content4['und'][0]['value'])) {
				print $section3content4['und'][0]['value'];
				}?></div>					
			</div>		  	
	  	</div> 	  		  		  
</section>  
<section class="" id="section-4">
		<div class="container">  
				<div class="col-lg-12 col-md-12">
					<h2 class="micro-section-title" id="section4"><?php $section4title = $node->field_section_4_title;
				if (isset($section4title['und'][0]['value'])) {
				print $section4title['und'][0]['value'];
				}?></h2>	
				</div>
	  	  </div>
		<div class="visible-lg">	 
			<div id="section-4-menu" class="section-menu">
			<div class="container">  
				<div class="col-lg-12 col-md-12">
					<ul>
						<?php $section4title = $node->field_section_4_title;
							if (isset($section4title['und'][0]['value'])) {
								print '<li><h2 class="sub-menu-title" id="s4">' .$section4title['und'][0]['value'] . '</h2></li>';	
								}?>
						<?php $section4subtitle1 = $node->field_sub_section_4_title_1;
							if (isset($section4subtitle1['und'][0]['value'])) {
								print '<li id="s4item1" class="sub-link">' . $section4subtitle1['und'][0]['value'] . '</li>';
								}?>
						<?php $section4subtitle2 = $node->field_sub_section_4_title_2;
							if (isset($section4subtitle2['und'][0]['value'])) {
								print '<li  id="s4item2" class="sub-link">' . $section4subtitle2['und'][0]['value'] . '</li>';
								}?>
						<?php $section4subtitle3 = $node->field_sub_section_4_title_3;
							if (isset($section4subtitle3['und'][0]['value'])) {
								print '<li  id="s4item3" class="sub-link">' . $section4subtitle3['und'][0]['value'] . '</li>';
								}?>
					</ul>			
				</div>
			</div>				
		</div>
		</div>
		<div id="section-4-content-1" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section4subtitle1 = $node->field_sub_section_4_title_1;
				if (isset($section4subtitle1['und'][0]['value'])) {
				print $section4subtitle1['und'][0]['value'];
				}?></div>			
				<div class="section-text">			
				<?php $section4content1 = $node->field_section_4_sub_content_1;
				if (isset($section4content1['und'][0]['value'])) {
				print $section4content1['und'][0]['value'];
				}?>			
				</div>					
			</div>		  	
	  	</div> 
	  	<div id="section-4-content-2" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section4subtitle2 = $node->field_sub_section_4_title_2;
				if (isset($section4subtitle2['und'][0]['value'])) {
				print $section4subtitle2['und'][0]['value'];
				}?>
				</div>
				<div class="section-text">	
				<?php $section4content2 = $node->field_section_4_sub_content_2;
				if (isset($section4content2['und'][0]['value'])) {
				print $section4content2['und'][0]['value'];
				}?>		
				<?php print $messages; ?>
				<?php
				$view = views_get_view('calibration_product');
				print $view->execute_display('default');
				?><br>
				</div>				
			</div>		  	
	  	</div> 
	  	<div id="section-4-content-3" class="container">
			<div class="col-lg-12 col-md-12">
				<div class="section-title"><?php $section4subtitle3 = $node->field_sub_section_4_title_3;
				if (isset($section4subtitle3['und'][0]['value'])) {
				print $section4subtitle3['und'][0]['value'];
				}?></div>			
				<div class="section-text">			
				<?php $section4content3 = $node->field_section_4_sub_content_3;
				if (isset($section4content3['und'][0]['value'])) {
				print $section4content3['und'][0]['value'];
				}?>		
				</div><br><br>
				<div class="row">
				  <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
					  <?php
						$view = views_get_view('calibration_form');
						print $view->execute_display('default');
					  ?>
				  </div>
				</div>									
			</div>		  	
	  	</div> 	  					  	  	  	  
	</section>   
<section class="" id="section-5">
			<div class="container">  
				<div class="col-lg-12 col-md-12">
					<h2 class="micro-section-title" id="section5"><?php $section5title = $node->field_section_5_title;
				if (isset($section5title['und'][0]['value'])) {
				print $section5title['und'][0]['value'];
				}?></h2>	
				</div>
			</div>
			<div class="visible-lg">
				<div id="section-5-menu" class="section-menu">
				<div class="container">  
					<div class="col-lg-12 col-md-12">
						<ul>
							<?php $section5title = $node->field_section_5_title;
								if (isset($section5title['und'][0]['value'])) {
									print '<li><h2 class="sub-menu-title" id="s5">' .$section5title['und'][0]['value'] . '</h2></li>';	
									}?>
							<?php $section5subtitle1 = $node->field_sub_section_5_title_1;
								if (isset($section5subtitle1['und'][0]['value'])) {
									print '<li  id="s5item1" class="sub-link">' . $section5subtitle1['und'][0]['value'] . '</li>';
									}?>
							<?php $section5subtitle2 = $node->field_sub_section_5_title_2;
								if (isset($section5subtitle2['und'][0]['value'])) {
									print '<li  id="s5item2" class="sub-link">' . $section5subtitle2['und'][0]['value'] . '</li>';
									}?>
						</ul>			
					</div>
				</div>				
			</div>	
			</div>
			<div id="section-5-content-1" class="container">
				<div class="col-lg-12 col-md-12">
					<div class="section-title"><?php $section5subtitle1 = $node->field_sub_section_5_title_1;
					if (isset($section5subtitle1['und'][0]['value'])) {
					print $section5subtitle1['und'][0]['value'];
					}?></div>			
					<div class="section-text">			
					<?php $section5content1 = $node->field_section_5_sub_content_1;
					if (isset($section5content1['und'][0]['value'])) {
					print $section5content1['und'][0]['value'];
					}?>			
					</div>					
				</div>		  	
		  	</div>	
			<div id="section-5-content-2" class="container">
				<div class="col-lg-12 col-md-12">

					<div class="section-title"><?php $section5subtitle2 = $node->field_sub_section_5_title_2;
					if (isset($section5subtitle2['und'][0]['value'])) {
					print $section5subtitle2['und'][0]['value'];
					}?></div>			
<!--				<div class="section-text">			
					<?php $section5content2 = $node->field_section_5_sub_content_2;
					if (isset($section5content2['und'][0]['value'])) {
					print $section5content2['und'][0]['value'];
					}?>	
-->		<?php $block = module_invoke('webform', 'block_view', 'client-block-691');
print render($block['content']); ?>
					</div>					
				</div>		  	
		  	</div>		  	  	  		 	  	  
  	  </section>    
<section class="" id="section-fb">
	<div class="container">  
		<div class="col-lg-12 col-md-12">
			<h2 class="micro-section-title" id="sectionfb">Recent Facebook Posts</h2>	
		</div> 	  
		<?php
			$view = views_get_view('facebook_feed');
			print $view->execute_display('facebook_block');
		?>
		<div class="section-title text-right"><a href="/facebook" class="text-right">View All Facebook Post <span class="glyphicon glyphicon-chevron-right"></span></a></div>	  	  	   	    	    
	</div>
</section>			
<footer class="footer">
	<div class="container">
		<div id="footer-menu-wrapper" class="row">
			<div class="col-xs-12 col-sm-4 col-md-3 footer-col">
				<?php print render($page['footer_left']); ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 footer-col">
				<?php print render($page['footer_left_center']); ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 footer-col">
				<?php print render($page['footer_right_center']); ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 footer-col grey-logo">
				<?php print render($page['footer_right']); ?>
			</div>		
		</div>
		<div id="" class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 copyright">
				<hr>
				<?php print render($page['footer_bottom']); ?>
			</div>	
		</div>	
	</div>	
	<div id="dark-overlay"></div>
</footer>
<div id="micro-to-top"><span class="glyphicon glyphicon-chevron-up"></span></div>