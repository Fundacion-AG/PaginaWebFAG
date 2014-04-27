<?php
/*------------------------------------------------------------------------
 # YT News Basic - Version 1.0
 # ------------------------------------------------------------------------
 # Copyright (C) 2009-2010 The YouTech Company. All Rights Reserved.
 # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Author: The YouTech Company
 # Websites: http://addon.ytcvn.com
 -------------------------------------------------------------------------*/
?>
<?php
	if (sizeof($items) > 0) :
	$count = 0;
?>

<div class="widget-wrap">
 <?php foreach ($items as $item) { 
 $count++; 
 if($count == sizeof($items)){
	 $iditem = ' last-item';
 }else if($count == 1){
	 $iditem = ' first-item';
 }else{
	 $iditem = '';
 }
 ?>
  <div class="<?php echo $params->get('theme', "");?> post <?php if($showline){ echo 'showlinebottom'.$iditem; } ?>">
        <div class="post-inner">
        <?php if( ($show_cattitle=="1")||($show_date == 1) ){?>
        	<p>
            <?php if($show_cattitle=="1") {?>
            	<span class="cattitle"><?php echo $item['cattitle']; ?> </span>
            <?php } ?>
            <?php if ($show_date == 1):?>
                <span class="basic-date"><?php echo JHTML::_('date', $item['date'], '%m.%d.%Y'); ?> </span>
            <?php endif; ?>
            </p>       	
        <?php } ?>
        
        
        <?php if ($show_image=='1' && $item['thumb'] != ''){?>
        <a class="alignleft" title="<?php echo $item['title']?>" href="<?php echo $item['link']?>"><img  title="<?php echo $item['title']?>" alt="<?php echo $item['title']?>" class="attachment-Mini Square" src="<?php echo $item['thumb']?>"/></a>
        <?php } ?>
        
        <h2><a title="<?php echo $item['title']?>" href="<?php echo $item['link']?>"><?php echo $item['sub_title']?></a></h2>
        
        <?php if ($show_desc == '1' && $item['sub_content'] !=""){?>
            <p class="basicnews-desc"><?php echo $item['sub_content']?></p>
        <?php } ?>
        
        </div>
  </div> 
  <?php } ?>
</div>
<?php endif; ?>
