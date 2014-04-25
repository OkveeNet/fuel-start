<?php 
/**
 * The main template file. This file is whole page template with page content placeholder for display controller's view.
 * 
 * @author Vee Winch.
 * @package Fuel Start
 */

// include functions file to get functions for this theme.
//include_once __DIR__ . DS . 'functions.php';

// start Theme class
$theme = \Theme::instance();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo $page_title; ?></title>
		<meta name="viewport" content="width=device-width">
		<?php 
		// render meta
		if (isset($page_meta) && is_array($page_meta)) {
			foreach ($page_meta as $a_page_meta) {
				echo $a_page_meta . "\n";
			}
			unset($a_page_meta);
		}
		?> 

		<?php echo \Asset::css('bootstrap.min.css'); ?>
		<?php echo $theme->asset->css('font-awesome.min.css'); ?>
		<?php echo $theme->asset->css('front.css'); ?>
		<?php 
		// render <link>
		if (isset($page_link) && is_array($page_link)) {
			foreach ($page_link as $a_page_link) {
				echo $a_page_link . "\n";
			}
			unset($a_page_link);
		}
		?> 

		<?php echo \Asset::js('modernizr.min.js'); ?>
		<?php echo \Asset::js('respond/respond.min.js'); ?>
		<?php echo \Asset::js('jquery.min.js'); ?>
		<?php 
		// render <script>
		if (isset($page_script) && is_array($page_script)) {
			foreach ($page_script as $a_page_script) {
				echo $a_page_script . "\n";
			}
			unset($a_page_script);
		}
		?> 
		
		<?php 
		// render assets
		echo \Asset::render('fuelstart');
		// render *theme* assets. (required for render theme's assets)
		echo $theme->asset->render('fuelstart');
		?> 
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo \Lang::get('fs_updater'); ?></h1>

					<?php echo \Extension\Form::openMultipart(array('class' => 'form-horizontal', 'role' => 'form')); ?> 
						<div class="form-status-placeholder">
							<?php if (isset($form_status) && isset($form_status_message)) { ?> 
							<div class="alert alert-<?php echo str_replace('error', 'danger', $form_status); ?>"><?php echo $form_status_message; ?></div>
							<?php } ?> 
						</div>
						<div class="hidden csrf-container">
							<?php echo \Extension\NoCsrf::generate(); ?> 
						</div>

						<?php if (!isset($hide_form) || (isset($hide_form) && $hide_form === false)) { ?> 
						<input type="hidden" name="act" value="update">
						<button type="submit" class="btn btn-primary fs-update-button"><?php echo \Lang::get('fs_update_now'); ?></button>
						<?php } // endif; ?> 
					<?php echo \Form::close(); ?> 
				</div>
			</div>
		</div>
		<script>
			$(function() {
				$('.fs-update-button').click(function() {
					$(this).prepend('<span class="fa fa-spinner fa-spin"></span> ');
				});
			});
		</script>


		<?php echo \Asset::js('bootstrap.min.js'); ?>
		<?php echo $theme->asset->js('main.js'); ?>
	</body>
</html>