<?php
/*
* Author:       Khawaib Ahmed
* @package:     KA Facebook Fanbox
* @link       	http://www.khawaib.co.uk
* @copyright:   http://www.khawaib.co.uk
* @license:     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
$fanboxhtml = modFacebookFanboxHelper::getFanbox( $params );
require( JModuleHelper::getLayoutPath( 'mod_fbfanbox' ) );
?>