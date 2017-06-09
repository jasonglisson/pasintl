<div class="<?php print $classes ?> row custom-panel" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <?php if ($content['left_col_1'] || $content['left_col_2'] || $content['middle_col_3'] || $content['middle_col_4'] || $content['right_col_5'] || $content['right_col_6']): ?>
  	<div class="col-lg-2 col-sm-12">
      <?php print $content['left_col_1']; ?>
  	</div>  
  	<div class="col-lg-2 col-sm-12">    	
      <?php print $content['left_col_2']; ?>
  	</div>  
  	<div class="col-lg-2 col-sm-12">    	
      <?php print $content['middle_col_3']; ?>
  	</div>    	
  	<div class="col-lg-2 col-sm-12">    	
      <?php print $content['middle_col_4']; ?>
  	</div>    	
  	<div class="col-lg-2 col-sm-12">    	    	
      <?php print $content['right_col_5']; ?>
  	</div>  
  	<div class="col-lg-2 col-sm-12">    	    	
      <?php print $content['right_col_6']; ?>
  	</div>    		      
  <?php endif ?> 
</div>