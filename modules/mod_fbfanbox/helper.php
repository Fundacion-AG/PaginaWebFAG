<?php
/*
* Author:       Khawaib Ahmed
* @package:     KA Facebook Fanbox
* @link       	http://www.khawaib.co.uk
* @copyright:   http://www.khawaib.co.uk
* @license:     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
class modFacebookFanboxHelper {
    function getFanbox( $params ) {
        if ( !empty( $_SERVER['HTTPS']) ) {
            $scriptCall = 'https://connect.facebook.net/en_US/all.js#xfbml=1';
        } else {
            $scriptCall = 'http://connect.facebook.net/en_US/all.js#xfbml=1';
        }
        $fanboxhtml = '';
        $fanboxhtml .= '<div id="kafbfanbox" class="kafbfanbox '. $params->get('moduleclass_sfx') .'">';
            if (trim( $params->get( 'connect_script_call' ) )) {
                $fanboxhtml .= '<script src="'.$scriptCall.'"></script>';
            }
            $fanboxhtml .= '<fb:like-box href="'.trim( $params->get( 'page_url' ) ).'" width="'.trim( $params->get( 'boxwidth' ) ).'" height="'.trim($params->get( 'boxheight' )).'"';
            if ($params->get('show_faces')) {
                $fanboxhtml .= ' show_faces="true"';
            } else {
                $fanboxhtml .= ' show_faces="false"';
            }
            if ($params->get('show_stream')) {
                $fanboxhtml .= ' stream="true"';
            } else {
                $fanboxhtml .= ' stream="false"';
            }
            if ($params->get('show_header')) {
                $fanboxhtml .= ' header="true"';
            } else {
                $fanboxhtml .= ' header="false"';
            }
            if ($params->get('force_wall')) {
                $fanboxhtml .= ' force_wall="true"';
            }
            $fanboxhtml .= '" ></fb:like-box>';

            $fanboxhtml .= '<div style="clear:left"><small><a href="http://www.khawaib.co.uk/joomla/downloads/item/12-facebook-fanbox.html">KA Facebook Fanbox 1.1</a></small></div>';
            $fanboxhtml .= '<noscript>JavaScript must be enabled in order to use KA Facebook Fanbox. <a href=\"\">Refresh Page.</a></noscript>';
        $fanboxhtml .= '</div>';
        
        return $fanboxhtml;
    }
}
?>