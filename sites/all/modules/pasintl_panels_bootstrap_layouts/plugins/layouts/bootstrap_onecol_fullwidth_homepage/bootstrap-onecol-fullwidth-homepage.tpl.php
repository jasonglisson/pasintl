<div class="<?php print $classes ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="full-width">
    <?php print $content['first']; ?>
  </div>
  <div class="container">
	  <div class="row">
	    <?php print $content['second']; ?>
	  </div>  
  </div>
  <div class="full-width">
    <?php print $content['third']; ?>
  </div>
  <div class="container accordion-section">
	  <div class="row">
    	<?php print $content['fourth']; ?>
	  </div>
  </div>
  <div class="full-width">
    <?php print $content['fifth']; ?>
  </div>    
  <div class="container accordion-section">
	  <div class="row">	  
    	<?php print $content['sixth']; ?>
	  </div>
  </div>  
  <div class="full-width">
    <?php print $content['seventh']; ?>
  </div>    
  <div class="container accordion-section">
	  <div class="row">	  
    	<?php print $content['eighth']; ?>
	  </div>
  </div>    
</div>
