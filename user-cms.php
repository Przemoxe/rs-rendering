<?php 
function hide_personal_options(){
	echo "\n" . '<script type="text/javascript">jQuery(document).ready(function($) { $(\'form#your-profile > h2:first\').hide(); $(\'form#your-profile > table:first\').hide(); $(\'form#your-profile\').show();$(\'.user-description-wrap\').hide();$(\'.user-profile-picture\').hide(); $(\'h2\').eq(3).hide(); });</script>' . "\n";
}




?>