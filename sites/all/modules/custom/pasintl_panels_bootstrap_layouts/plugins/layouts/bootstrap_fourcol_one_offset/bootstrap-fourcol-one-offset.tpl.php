<div class="<?php print $classes ?> row custom-panel" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <?php if ($content['left'] || $content['middle_left'] || $content['middle_right'] || $content['right']): ?>
  	<div class="col-lg-1 col-md-1 hidden-sm hidden-xs spacer">&nbsp;</div>
  	<div class="col-4-equal">
      <?php print $content['left']; ?>
  	</div>  
  	<div class="col-4-equal">    	
      <?php print $content['middle_left']; ?>
  	</div>  
  	<div class="col-4-equal">    	
      <?php print $content['middle_right']; ?>
  	</div>    	
  	<div class="col-4-equal">    	    	
      <?php print $content['right']; ?>
  	</div>  
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs spacer">&nbsp;</div> 	      
  <?php endif ?> 
</div>