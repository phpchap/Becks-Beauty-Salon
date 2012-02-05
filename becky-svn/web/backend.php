<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

if($_SERVER['HTTP_HOST']=="bbs.localdev.com") {
	$env = "dev";
} else {
	$env = "prod";	
}

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', $env, false);
sfContext::createInstance($configuration)->dispatch();
