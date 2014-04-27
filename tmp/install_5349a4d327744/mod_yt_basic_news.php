<?php
/*------------------------------------------------------------------------
 # YT News Basic - Version 1.0
 # ------------------------------------------------------------------------
 # Copyright (C) 2009-2010 The YouTech Company. All Rights Reserved.
 # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Author: The YouTech Company
 # Websites: http://addon.ytcvn.com
 -------------------------------------------------------------------------*/


defined( '_JEXEC' ) or die( 'Restricted access' );

require_once (dirname(__FILE__).DS.'helper.php');

jimport("joomla.filesystem.folder");
jimport("joomla.filesystem.file");

/*-- Process---*/

$thumb_height 					= $params->get('thumb_height', "40");
$thumb_width 					= $params->get('thumb_width', "40");		
$show_date                      = $params->get('show_date', 1);
$show_image                     = $params->get('show_image', 1); 
$show_desc                      = $params->get('show_desc', 1);
$show_cattitle                  = $params->get('show_cattitle', 1);
$theme							= $params->get('theme', "");
$showline						= $params->get('showline', 0);
if($theme!=""){
	$theme = "_".$theme;
}
if (!defined ('YTNEWSBASIC')) {
	define ('YTNEWSBASIC', 1);
	
	/* Add css*/	
	if (is_file(JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.$module->module.DS."style.css")){
		JHTML::stylesheet("style.css", 'templates/'.$mainframe->getTemplate().'/html/'.$module->module.'/');
	}else{
		JHTML::stylesheet('style.css', JURI::base() . '/modules/'.$module->module.'/assets/');
	}
}

$items = modYTNewsBasicHelper::process($params, $module);



$path = JModuleHelper::getLayoutPath( 'mod_yt_basic_news', 'default'.$theme );
if (file_exists($path)) {
	require($path);
}
?>
