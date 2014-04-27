<?php
/*------------------------------------------------------------------------
 # YT News Basic - Version 1.0
 # ------------------------------------------------------------------------
 # Copyright (C) 2009-2010 The YouTech Company. All Rights Reserved.
 # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Author: The YouTech Company
 # Websites: http://addon.ytcvn.com
 -------------------------------------------------------------------------*/
 

require_once (JPATH_SITE . '/components/com_content/helpers/route.php');

if (! class_exists("YTNewsContent") ) {
class YTNewsContent {
	var $items = array();
	var $is_frontpage = 0;	// 0 - without frontpage, 1 - only frontpage - 2 both
	var $type = 0;
	var $cat_or_sec_ids = array();
	var $limit = 5;
	var $article_ids = array();
	var $is_cat_or_sec = 1;		
	var $sort_order_field = 'created';
	var $type_order = 'ASC';	
	var $thumb_width = '40';
	var $thumb_height = '40';
	var $web_url = '';	
	var $cropresizeimage = 0;
	var $max_title = 0;
	var $max_description = 0;
	var $resize_folder = '';
	var $url_to_resize = '';
	var $url_to_module = '';	
	
	function Content() {
		
	}
		
	function getList() {
			global $mainframe;			
			$items = array();
			
			$db = & JFactory::getDBO ();
			$user = & JFactory::getUser ();
			$aid = $user->get ( 'aid', 0 );
			
			$contentConfig = &JComponentHelper::getParams ( 'com_content' );
			$noauth = ! $contentConfig->get ( 'shownoauth' );
			
			jimport ( 'joomla.utilities.date' );
			$date = new JDate ( );
			$now = $date->toMySQL ();
			
			$nullDate = $db->getNullDate ();
			
			$orderby = " ORDER BY {$this->sort_order_field} {$this->type_order}";
			$limit = " LIMIT {$this->limit}";
            
            if (is_array($this->cat_or_sec_ids)){
                $ary = " in (" . implode("," , $this->cat_or_sec_ids) . ")";   
            } else { 
                $ary = " = ". ( int ) $this->cat_or_sec_ids;     
            }
		
			// query to determine article count
			$query = 'SELECT a.*,u.name as creater,cc.description as catdesc, cc.title as cattitle,s.description as secdesc, s.title as sectitle,' . ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,' . ' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug,' . ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as secslug' . ' FROM #__content AS a' . ' INNER JOIN #__categories AS cc ON cc.id = a.catid' . ' INNER JOIN #__sections AS s ON s.id = a.sectionid' . ' left JOIN #__users AS u ON a.created_by = u.id';          
			
             $query .= ' WHERE a.state = 1 ' . ($noauth ? ' AND a.access <= ' . ( int ) $aid . ' AND cc.access <= ' . ( int ) $aid . ' AND s.access <= ' . ( int ) $aid : '') . ' AND (a.publish_up = ' . $db->Quote ( $nullDate ) . ' OR a.publish_up <= ' . $db->Quote ( $now ) . ' ) ' . ' AND (a.publish_down = ' . $db->Quote ( $nullDate ) . ' OR a.publish_down >= ' . $db->Quote ( $now ) . ' )' . (($this->is_cat_or_sec) ? "\n AND cc.id". $ary : 'AND s.id'. $ary) . ' AND cc.section = s.id' . ' AND cc.published = 1' . ' AND s.published = 1';
            
			if ($this->is_frontpage == 0) {
				$query .= ' AND a.id not in (SELECT content_id FROM #__content_frontpage )';
			} else if ($this->is_frontpage == 1) {
				$query .= ' AND a.id in (SELECT content_id FROM #__content_frontpage )';
			}

			$query .= $orderby . $limit;            

			$db->setQuery ( $query );			
						
			$rows = $db->loadObjectList ();
			
			global $mainframe;
			JPluginHelper::importPlugin ( 'content' );
			$dispatcher = & JDispatcher::getInstance ();
			$params = & $mainframe->getParams ( 'com_content' );
			
			$limitstart = $this->limit;
			
			for($i = 0; $i < count ( $rows ); $i ++) {
				$rows [$i]->text = $rows [$i]->introtext;
				$results = $dispatcher->trigger ( 'onPrepareContent', array (& $rows [$i], & $params, $limitstart ) );
				$rows [$i]->introtext = $rows [$i]->text;
				$items[$i]['id'] = $rows [$i]->id;
				$items[$i]['img'] = $this->getImage($rows [$i]->text);
				$items[$i]['title'] = $rows[$i]->title;
				$items[$i]['cattitle'] = $rows[$i]->cattitle;
				$items[$i]['content'] = $this->removeImage($rows [$i]->text);
				$items[$i]['date'] = $this->removeImage($rows [$i]->created);
				$link   = JRoute::_(ContentHelperRoute::getArticleRoute($rows [$i]->slug, $rows [$i]->catslug, $rows [$i]->sectionid));				
				$items[$i]['link'] = $link;
			}
			
			$items = $this->update($items);
			
			/*   Process Images*/
			
			return $items;
		}		
	
	
	function getImage($str){
			
    		$regex = "/\<img.+src\s*=\s*\"([^\"]*)\"[^\>]*\>/";
    		$matches = array();
			preg_match ( $regex, $str , $matches );    
			$images = (count($matches)) ? $matches : array ();
			$image = count($images) > 1 ? $images[1] : '';
						
			return $image;
	}
	
	function getItemid($sectionid) {
		$contentConfig = &JComponentHelper::getParams ( 'com_content' );
		$noauth = ! $contentConfig->get ( 'shownoauth' );
		$user = & JFactory::getUser ();
		$aid = $user->get ( 'aid', 0 );
		$db = & JFactory::getDBO ();
		$query = "SELECT id FROM #__menu WHERE `link` like '%option=com_content%view=section%id=$sectionid%'" . ' AND published = 1' . ($noauth ? ' AND access <= ' . ( int ) $aid : '');
		
		$db->setQuery ( $query );
		return $db->loadResult ();
	}
	
	function removeImage($str) {
		$regex1 = "/\<img[^\>]*>/";
		$str = preg_replace ( $regex1, '', $str );
		$regex1 = "/<div class=\"mosimage\".*<\/div>/";
		$str = preg_replace ( $regex1, '', $str );
		$str = trim ( $str );
		
		return $str;
	}
		
	
	function update($items) {		
		$tmp = array();
		
		foreach ($items as $key => $item) {
			if (!isset($item['sub_title'])) {
				$item['sub_title'] = $this->cutStr($item['title'], $this->max_title);
			}
			if (!isset($item['sub_content'])) {
				$item['sub_content'] = $this->cutStr($item['content'], $this->max_description);
			}
			
			if (!isset($item['thumb']) && $item['img'] != '') {
				$item['thumb'] = $this->processImage($item['img'], $this->thumb_width, $this->thumb_height);
			} else {
				$item['thumb'] = '';
			}		
			
					
			$tmp[] = $item;
			
		}
		
		return $tmp;				
	}
	
	function processImage($img, $width, $height) {
				
		if ($this->cropresizeimage == 0) {
			return $this->resizeImage($img, $width, $height);
		} else {
			return $this->cropImage($img, $width, $height);
		}
	}
		
	function resizeImage($imagePath, $width, $height) {
		global $module;
				
		$folderPath = $this->resize_folder;
		 
		 if(!JFolder::exists($folderPath)){
		 		JFolder::create($folderPath);	 
		 }
		 
		 $nameImg = str_replace('/','',strrchr($imagePath,"/"));
			
		 $ext = substr($nameImg, strrpos($nameImg, '.'));
		
		 $file_name = substr($nameImg, 0,  strrpos($nameImg, '.'));
		
		 $nameImg = $file_name . "_" . $width . "_" . $height .  $ext;
		 
		 
		 if(!JFile::exists($folderPath.DS.$nameImg)){
			 $image = new SimpleImage();
	  		 $image->load($imagePath);
	  		 $image->resize($width,$height);
	   		 $image->save($folderPath.DS.$nameImg);
		 }else{
		 		 list($info_width, $info_height) = @getimagesize($folderPath.DS.$nameImg);
		 		 if($width!=$info_width||$height!=$info_height){
		 		 	 $image = new SimpleImage();
	  				 $image->load($imagePath);
	  				 $image->resize($width,$height);
	   				 $image->save($folderPath.DS.$nameImg);
		 		 }
		 }
   		 return $this->url_to_resize . $nameImg;
	}
	
	function cropImage($imagePath, $width, $height) {
		global $module;
		
		$folderPath = $this->resize_folder;
		 
		if(!JFolder::exists($folderPath)){
		 		JFolder::create($folderPath);	 
		}
		 
		$nameImg = str_replace('/','',strrchr($imagePath,"/"));		 
		 
		 if(!JFile::exists($folderPath.DS.$nameImg)){
			 $image = new SimpleImage();
	  		 $image->load($imagePath);
	  		 $image->crop($width,$height);
	   		 $image->save($folderPath.DS.$nameImg);
		 }else{
		 		 list($info_width, $info_height) = @getimagesize($folderPath.DS.$nameImg);
		 		 if($width!=$info_width||$height!=$info_height){
		 		 	 $image = new SimpleImage();
	  				 $image->load($imagePath);
	  				 $image->crop($width,$height);
	   				 $image->save($folderPath.DS.$nameImg);
		 		 }
		 }
		 
   		 return $this->url_to_resize . $nameImg;
	}
	
	/*Cut string*/
	function cutStr( $str, $number){
		//If length of string less than $number
		$str = strip_tags($str);
		if(strlen($str) <= $number){
			return $str;
		}
		$str = substr($str,0,$number);
	
		$pos = strrpos($str,' ');
	
		return substr($str,0,$pos).'...';
	}
	
}
}
if (! class_exists("SimpleImage") ) {
class SimpleImage {
   var $image;
   var $image_type;
 
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
     	 
		 
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
   			
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }   
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }   
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100; 
      $this->resize($width,$height);
   }
   function resize($width,$height) {
   	  $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image	, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image; 
   }    
   function getbeginWidth($width){
   $k = $this->getWidth();
   $x1 = ($k - $width)/2;
   return $x1;
   }
   function getbeginHeight($height){
   $k = $this->getHeight();
   $y1 = ($k - $height)/2;
   return $y1;
   }
   function crop($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, $this->getbeginWidth($width), $this->getbeginHeight($height),  $width, $height, $width, $height);
      $this->image = $new_image;   
   }   
}
}

?>
