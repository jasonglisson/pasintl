<?php
dsm($bean);		

$url = file_create_url($bean->field_block_icon['und'][0]['uri']);
$url = parse_url($url);
$path = $url['path'];

?>	

<div class="product-services-block block-<?php print $bean->bid; ?>">
	<a href="<?php print $bean->field_block_link['und'][0]['value']; ?>">
		<img src="<?php print $path; ?>">	
		<h2><?php print $bean->label; ?></h2>
		<span class="description"><?php print $bean->field_block_description['und'][0]['value']; ?></span>
	</a>
</div>	