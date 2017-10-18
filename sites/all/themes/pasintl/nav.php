<?php 
$searchform = drupal_get_form('search_block_form'); ?>
<nav id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<div class="navbar-header">
			  <?php if ($logo): ?>
			  <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
			    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			  </a>
			  <?php endif; ?>
			
			  <?php if (!empty($site_name)): ?>
			  <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
			  <?php endif; ?>
			
			  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			</div>
			
			<?php if (!empty($primary_nav) || !empty($page['navigation'])): ?>
			  <div class="navbar-collapse collapse">
			    <nav role="navigation">
			      <?php if (!empty($page['navigation'])): ?>
			        <?php print render($page['navigation']); ?>
			      <?php endif; ?>
			    </nav>
			    <div id="right-side-nav" class="hidden-md hidden-xs">
				    <div id="cart-lg" class="well well-sm">
				    	<a href="/cart">
					    <span class="glyphicon glyphicon-shopping-cart"></span>
						<?php
						  $items = 0;
						  if(module_exists('uc_cart')){
  						  foreach (uc_cart_get_contents() as $item) {
  						    $items += $item->qty;
  						  }
						  }
						print $items;
						?>
				    	</a>
				    </div>
				  	<div id="search-form" class="search hidden-sm hidden-xs"><?php print render($searchform); ?></div> 
			    </div> 	
			  </div>
			<?php endif; ?>
			</div>
		</div>
	</div>	
</nav>	