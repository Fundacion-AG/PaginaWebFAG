<?php 
if($_POST){
	$mainframe = JFactory::getApplication();
	$sc = $_COOKIE['security_code_contact'];
	$message = ''; 
		if ($_POST['verif_box'] == $sc || $is_captcha == 0){
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
				$message .=	'Name : '.$_POST['name'];
				$message .= "<br />";
			}
			if (isset($_POST['email'])) {
				$email = $_POST['email'];
				$message .= 'Email : '.$_POST['email'];
				$message .= "<br />";
			}
			if (isset($_POST['message'])) {
				$message .= 'message : '.$_POST['message'];
				$message .= "<br />";
			}
			if (isset($_POST['subject'])) {
				$subject = $subject_prefix . $subjectspacer . $_POST['subject'];
			}
			if (isset($_POST['verif_box'])) {
				$verif_box = (md5($_POST["verif_box"]).'a4xn');
			}
			$exclude_check = "valid";
			// Detects mail headers to prevent spammers.
				if (isset($_POST['name'])) {
					if ($name != "" && $name != " ") {
					   $from = urldecode($email);
					   $message2 = "1".$message;
					   if (strrpos($message2,$ex1) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex2) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex3) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex4) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex5) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex6) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex7) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex8) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex9) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex10) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex11) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex12) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex13) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex14) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex15) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex16) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex17) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex18) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex19) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex20) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex21) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex22) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex23) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex24) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex25) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex26) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex27) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex28) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex29) > 0) {
							$exclude_check = "invalid";
					   }
					   if (strrpos($message2,$ex30) > 0) {
							$exclude_check = "invalid";
					   }
					   if ($exclude_check == "valid") {
								$mainframe->setUserState('name','');
								$mainframe->setUserState('email','');
								$mainframe->setUserState('subject','');
								$mainframe->setUserState('message','');
								$mainframe->setUserState('captcha_error',0);
								$mail = JFactory::getMailer();
								$mail->sendMail($_POST['name'],$_POST['email'],base64_decode($_POST['email_address']), $subject, $message,$mode = true);
//								mail(base64_decode($_POST['email_address']), $subject, $message, "From: $name <$email>");
								$mainframe->redirect($_POST['returnurl']);
						}
					}
				}
	}
	else{
								$mainframe->setUserState('name',$_POST['name']);
								$mainframe->setUserState('email',base64_encode($_POST['email']));
								$mainframe->setUserState('subject',$_POST['subject']);
								$mainframe->setUserState('message',$_POST['message']);
								$mainframe->setUserState('captcha_error',1);
								$mainframe->redirect($_POST['returnurl']);
		}
	
}
?>

<?php
$document = &JFactory::getDocument();  
$url = JURI::root().'modules/mod_s5_quick_contact/';
/**
@version 2.0: mod_s5_quick contact
Author: Shape 5 - Professional Template Community
Available for download at www.shape5.com
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div id="s5_quick_contact_wrap">

<?php if ($pretext_s5_qc != "") { ?>
<?php echo $pretext_s5_qc ?>
<br /><br />
<?php } ?>

<form name="s5_quick_contact" method="post" action="" id="s5_quick_contact">

<?php 
$mainframe = JFactory::getApplication();
?>
<input class="inputbox" id="namebox" onclick="s5_qc_clearname()" onfocus="s5_qc_clearname()" style="width:<?php echo $width_s5_qc ?>;padding:<?php echo $padding_s5_qc ?>;text-transform:none !important;"
 type="text" value="<?php echo ($mainframe->getUserState('name')!='') ? $mainframe->getUserState('name') : $nametext_s5_qc ;?>" name="name"></input><br />
<input class="inputbox" id="emailbox" onclick="s5_qc_clearemail()" onfocus="s5_qc_clearemail()" style="  width:<?php echo $width_s5_qc ?>;padding:<?php echo $padding_s5_qc ?>;text-transform:none !important;" type="text" value="<?php echo $emailtext_s5_qc; ?>" name="email"></input><br />
<input class="inputbox" id="subjectbox" onclick="s5_qc_clearsubject()" onfocus="s5_qc_clearsubject()" style="width:<?php echo $width_s5_qc ?>;padding:<?php echo $padding_s5_qc ?>;text-transform:none !important;" type="text" value="<?php echo ($mainframe->getUserState('subject')!='')?$mainframe->getUserState('subject') : $subjecttext_s5_qc; ?>" name="subject"></input><br />
<textarea id="messagebox" rows="" cols="" class="inputbox textarea" onclick="s5_qc_clearbody()" onfocus="s5_qc_clearbody()" style="overflow:auto;width:<?php echo $width_s5_qc ?>;padding:<?php echo $padding_s5_qc ?>;height:<?php echo $height_s5_qc ?>;text-transform:none !important;" name="message"><?php echo ($mainframe->getUserState('message')!='')?$mainframe->getUserState('message') : $bodytext_s5_qc ;?></textarea><br />
<?php if($is_captcha == 1){?>
    <input class="inputbox" id="spambox" onclick="s5_qc_clearspam()" value="<?php echo $spamtext_s5_qc;?>" onfocus="s5_qc_clearspam()" style="width:<?php echo $width_s5_qc ?>;padding:<?php echo $padding_s5_qc ?>;text-transform:none !important;" type="text" name="verif_box"></input><br />

		<?php 
        $mainframe = JFactory::getApplication();
        $captcha_error = $mainframe->getUserState('captcha_error',0);
        if($captcha_error==1){
            $mainframe->setUserState('captcha_error','');
            ?>
            <div style="padding-top:10px;padding-bottom:10px;color:#F71010;"><?php echo $captcha_error_text;?></div>
        <?php 	}
        ?>
	<img id="s5_qc_security_img" src="<?php echo $url.'captcha/CaptchaSecurityImages.php'; ?>?width=90&height=30&characters=5" />
	<input id="captcha_val" type="hidden" value="1" name="captcha_val"></input>
<?php } ?>
<input id="returnurl" type="hidden" value="<?php echo JURI::current();?>" name="returnurl"></input>
<br />

<input id="email_address" type="hidden" value="" name="email_address"></input>

<input class="button" type="button"  id="s5_qc_submitbutton" onclick="s5_qc_submit()" value="<?php echo $sendtext_s5_qc ?>" ></input>
</form>

</div>

<?php setcookie("s5_qc",(md5($ran_num).'a4xn')) ?>

<script language="javascript" type="text/javascript">

<?php if($is_captcha == 1){?>
var s5_qc_spam_text = document.getElementById("spambox").value;
<?php }?>
function s5_qc_clearbody() {
if (document.getElementById("messagebox").value == "<?php echo $bodytext_s5_qc ?>") {
document.getElementById("messagebox").value="";
}
if (document.getElementById("namebox").value.length < 1) {
document.getElementById("namebox").value = "<?php echo $nametext_s5_qc ?>";
}
if (document.getElementById("emailbox").value.length < 1) {
document.getElementById("emailbox").value = "<?php echo $emailtext_s5_qc ?>";
}
if (document.getElementById("subjectbox").value.length < 1) {
document.getElementById("subjectbox").value = "<?php echo $subjecttext_s5_qc ?>";
}
<?php if($is_captcha == 1){?>
if (document.getElementById("spambox").value.length < 1) {
document.getElementById("spambox").value = s5_qc_spam_text;
}
<?php }?>
}

function s5_qc_clearname() {
if (document.getElementById("namebox").value == "<?php echo $nametext_s5_qc ?>") {
document.getElementById("namebox").value="";
}
if (document.getElementById("messagebox").value.length < 1) {
document.getElementById("messagebox").value = "<?php echo $bodytext_s5_qc ?>";
}
if (document.getElementById("emailbox").value.length < 1) {
document.getElementById("emailbox").value = "<?php echo $emailtext_s5_qc ?>";
}
if (document.getElementById("subjectbox").value.length < 1) {
document.getElementById("subjectbox").value = "<?php echo $subjecttext_s5_qc ?>";
}
<?php if($is_captcha == 1){?>
if (document.getElementById("spambox").value.length < 1) {
document.getElementById("spambox").value = s5_qc_spam_text;
}
<?php }?>
}

function s5_qc_clearemail() {
if (document.getElementById("emailbox").value == "<?php echo $emailtext_s5_qc ?>") {
document.getElementById("emailbox").value="";
}
if (document.getElementById("namebox").value.length < 1) {
document.getElementById("namebox").value = "<?php echo $nametext_s5_qc ?>";
}
if (document.getElementById("messagebox").value.length < 1) {
document.getElementById("messagebox").value = "<?php echo $bodytext_s5_qc ?>";
}
if (document.getElementById("subjectbox").value.length < 1) {
document.getElementById("subjectbox").value = "<?php echo $subjecttext_s5_qc ?>";
}
<?php if($is_captcha == 1){?>
if (document.getElementById("spambox").value.length < 1) {
document.getElementById("spambox").value = s5_qc_spam_text;
}
<?php }?>
}

function s5_qc_clearsubject() {
if (document.getElementById("subjectbox").value == "<?php echo $subjecttext_s5_qc ?>") {
document.getElementById("subjectbox").value="";
}
if (document.getElementById("namebox").value.length < 1) {
document.getElementById("namebox").value = "<?php echo $nametext_s5_qc ?>";
}
if (document.getElementById("emailbox").value.length < 1) {
document.getElementById("emailbox").value = "<?php echo $emailtext_s5_qc ?>";
}
if (document.getElementById("messagebox").value.length < 1) {
document.getElementById("messagebox").value = "<?php echo $bodytext_s5_qc ?>";
}
<?php if($is_captcha == 1){?>
if (document.getElementById("spambox").value.length < 1) {
document.getElementById("spambox").value = s5_qc_spam_text;
}
<?php }?>
}

function s5_qc_clearspam() {
<?php if($is_captcha == 1){?>
if (document.getElementById("spambox").value == s5_qc_spam_text) {
document.getElementById("spambox").value="";
}
<?php }?>
if (document.getElementById("namebox").value.length < 1) {
document.getElementById("namebox").value = "<?php echo $nametext_s5_qc ?>";
}
if (document.getElementById("emailbox").value.length < 1) {
document.getElementById("emailbox").value = "<?php echo $emailtext_s5_qc ?>";
}
if (document.getElementById("messagebox").value.length < 1) {
document.getElementById("messagebox").value = "<?php echo $bodytext_s5_qc ?>";
}
if (document.getElementById("subjectbox").value.length < 1) {
document.getElementById("subjectbox").value = "<?php echo $subjecttext_s5_qc ?>";
}
}


function s5_qc_isValidEmail(str_email) {
   if (str_email.indexOf("@") > 0) {
   alert('<?php echo $thankyou_s5_qc ?>');
   document.s5_quick_contact.submit();
   }
   else {
   alert('<?php echo $emailerror_s5_qc ?>');
   }
}

function s5_qc_submit() {

if (document.getElementById("subjectbox").value == "<?php echo $subjecttext_s5_qc ?>" || document.getElementById("namebox").value == "<?php echo $nametext_s5_qc ?>" || document.getElementById("emailbox").value == "<?php echo $emailtext_s5_qc ?>" || document.getElementById("messagebox").value == "<?php echo $bodytext_s5_qc ?>") {
alert('<?php echo $notcomplete_s5_qc ?>');
return false;
}

var s5_message_holder = document.getElementById("messagebox").value;
var s5_first_message_char = s5_message_holder.charAt(0);
var s5_second_message_char = s5_message_holder.charAt(1);
var s5_third_message_char = s5_message_holder.charAt(2);
var s5_fourth_message_char = s5_message_holder.charAt(3);

if (s5_first_message_char == "<") {
return false;
}

if (s5_first_message_char == "w" && s5_second_message_char == "w" && s5_third_message_char == "w") {
return false;
}

if (s5_first_message_char == "h" && s5_second_message_char == "t" && s5_third_message_char == "t") {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex1 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex2 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex3 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex4 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex4 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex5 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex6 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex7 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex8 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex9 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex10 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex11 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex12 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex13 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex14 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex15 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex16 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex17 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex18 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex19 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex20 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex21 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex22 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex23 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex24 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex25 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex26 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex27 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex28 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex29 ?>") >= 0) {
return false;
}

if (s5_message_holder.indexOf("<?php echo $ex30 ?>") >= 0) {
return false;
}

else {
document.getElementById("email_address").value = "<?php echo base64_encode($email_address); ?>";
var email_str = document.getElementById("emailbox").value;
s5_qc_isValidEmail(email_str);
}
}


</script>
