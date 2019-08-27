<?php
//FRONT CONTROLLER

require_once dirname(__FILE__) .'/../config/init.php';
require_once LIBS.'/functions.php';
require_once CONFIG.'/routes.php';

new \ishop\App();

