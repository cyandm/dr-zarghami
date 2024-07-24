<?php
require(get_stylesheet_directory() . '/inc/lib/plugin-update-checker/plugin-update-checker.php');

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cyandm/dr-zarghami', //github theme
	get_stylesheet_directory(),
	'dr-zarghami' //theme slug
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication( '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' );
