<?php
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$query = $_POST['message'];
	
	require(dirname(__FILE__) . '/../MadMimi.class.php');
	
	$mailer = new MadMimi('support@nmacentral.com', '06d5c82b9f36ae93b301d0ea4f0ba928');
	$user = array('email' => "$email", 'name' => "$name", 'ReferralSite' => 'nathancbrown.me', 'add_list' => 'NCB Signups');

	$mailer->AddUser($user);
	$options = array(
	       'promotion_name' => 'Nathan C Brown Responder',
	       'subject' => 'Nathan here - got your message!', 
	       'from' => 'Nathan C Brown <howdy@nathancbrown.me>',
		   'bcc' => 'Nathan C Brown <nathan@viralfever.net>',
		   'recipients' => "$name <$email>"
	);
	$body = array('name' => "$name", 'email' => "$email", 'query'=> "$query");
	$mailer->SendMessage($options, $body);
	echo "success";
?>