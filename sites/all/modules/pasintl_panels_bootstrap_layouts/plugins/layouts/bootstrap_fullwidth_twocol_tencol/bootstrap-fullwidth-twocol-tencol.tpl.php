<div class="<?php print $classes ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php print $content['12_col']; ?>
      </div>
    </div>
  </div>


  <div class="full-width">
    <?php print $content['full_width']; ?>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-2">

        <?php print $content['2_col']; ?>
      </div>
      <div class="col-lg-10">
        <?php print $content['10_col']; ?>
      </div>
    </div>
</div>
</div>
