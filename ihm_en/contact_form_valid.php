<?php
	$ourmail = 'info@escapadefrancaise.com';

	//-> erreurs
	$error = $envoye = 0;
	if (!isset($cbon)) $cbon = 0;

	//-> id_name
	if (!empty($_POST['id_name'])) {
		$id_nameval = strip_tags($_POST['id_name']);
		$id_namecls = '';
	} else {
		$error++;
		$id_nameval = '';
		$id_namecls = ' rederror';
	}

	//-> id_email
	if (!empty($_POST['id_email'])) {
		$id_emailval = strip_tags($_POST['id_email']);
		$id_emailcls = '';
	} else {
		$error++;
		$id_emailval = '';
		$id_emailcls = ' rederror';
	}

	//-> id_number
	if (!empty($_POST['id_number'])) {
		$id_numberval = strip_tags($_POST['id_number']);
		$id_numbercls = '';
	} else {
		$error++;
		$id_numberval = '';
		$id_numbercls = ' rederror';
	}

	//-> id_subject
	if (!empty($_POST['id_subject'])) {
		$id_subjectval = strip_tags($_POST['id_subject']);
		$id_subjectcls = '';
	} else {
		$error++;
		$id_subjectval = '';
		$id_subjectcls = ' rederror';
	}

	//-> id_message
	if (!empty($_POST['id_message'])) {
		$id_messageval = strip_tags($_POST['id_message']);
		$id_messagecls = '';
	} else {
		$error++;
		$id_messageval = '';
		$id_messagecls = ' rederror';
	}

	if (!empty($_POST) && $error==0) {
	//-> envoi du mail
		$subject = strip_tags($_POST['aics_obj']);
		require('class.phpmailer.php');

		$mail = new PHPMailer;
		$mail->From = strip_tags($_POST['id_subject']);
		$mail->FromName = utf8_decode(strip_tags($_POST['id_name']));
		$mail->addAddress($ourmail);
		$mail->addReplyTo($ourmail);
		$mail->isHTML(true);
		$maim = new PHPMailer;
		$maim->From = strip_tags($_POST['id_email']);
		$maim->FromName = utf8_decode('Escapade Francaise: Accusé de reception');
		$maim->addAddress(strip_tags($_POST['id_email']));
		$maim->addCC(strip_tags($_POST['id_email']));
		$maim->isHTML(true);

		//---------------
		$message = '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="initial-scale=1.0" /><meta name="format-detection" content="telephone=no" /><title></title><style type="text/css">body {width: 100%;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;}@media only screen and (max-width: 600px) {table[class="table-row"] {float: none !important;width: 98% !important;padding-left: 20px !important;padding-right: 20px !important;}table[class="table-row-fixed"] {float: none !important;width: 98% !important;}table[class="table-col"], table[class="table-col-border"] {float: none !important;width: 100% !important;padding-left: 0 !important;padding-right: 0 !important;table-layout: fixed;}td[class="table-col-td"] {width: 100% !important;}table[class="table-col-border"] + table[class="table-col-border"] {padding-top: 12px;margin-top: 12px;border-top: 1px solid #E8E8E8;}table[class="table-col"] + table[class="table-col"] {margin-top: 15px;}td[class="table-row-td"] {padding-left: 0 !important;padding-right: 0 !important;}table[class="navbar-row"] , td[class="navbar-row-td"] {width: 100% !important;}img {max-width: 100% !important;display: inline !important;}img[class="pull-right"] {float: right;margin-left: 11px;max-width: 125px !important;padding-bottom: 0 !important;}img[class="pull-left"] {float: left;margin-right: 11px;max-width: 125px !important;padding-bottom: 0 !important;}table[class="table-space"], table[class="header-row"] {float: none !important;width: 98% !important;}td[class="header-row-td"] {width: 100% !important;}}@media only screen and (max-width: 480px) {table[class="table-row"] {padding-left: 16px !important;padding-right: 16px !important;}}@media only screen and (max-width: 320px) {table[class="table-row"] {padding-left: 12px !important;padding-right: 12px !important;}}@media only screen and (max-width: 458px) {td[class="table-td-wrap"] {width: 100% !important;}}</style></head><body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0"><table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;"><table><tr><td class="table-td-wrap" align="center" width="458"><table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="18" style="height: 18px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left"><table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left"><table class="header-row" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">'.$id_subjectval.'</td></tr></tbody></table><div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;"><b style="color: #777777;">Nom: '.$id_nameclsval.'</b><br><b style="color: #777777;">Numéro de téléphone: '.$id_numberval.'</b><br><b style="color: #777777;">Adresse mail: '.$id_emailval.'</b><br>'.$id_messageval.'</div></td></tr></tbody></table></td></tr></tbody></table><table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="1" style="height: 1px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="36" style="height: 36px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table></td></tr></table></body></html>';
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = utf8_decode(strip_tags($_POST['id_message']));
		$envoye = 1;

		if($mail->send()) {
			$id_nameval=$id_namecls=$id_emailval=$id_emailcls=$id_numberval=$id_numbercls=$id_subjectval=$id_subjectcls=$id_messageval=$id_messagecls='';
			$error = 0;
			$envoye = 1;
			$cbon = 1;

			$message = '<html><head><meta charset="utf-8" /><style>*{font-family: sans-serif;}</style><meta charset="utf-8"></head><body>';
			$message .= '<div style="font-size:30px;margin:30px 5px 15px;font-weight:bolder;color:#0032A0;">Candia: Accusé de reception</div>';
			$message .= '<div style="margin:20px 15px;text-align:justify;">Votre e-mail a bien été transmis</div>';
			$message .= '</body></html>';
			$maim->Subject = utf8_decode('Escapade Francaise: Accusé de reception');
			$maim->Body    = utf8_decode($message);
			$maim->AltBody = utf8_decode('Votre e-mail a bien été transmis');
			$maim->send();

		}
	} else {
		if (empty($_POST)) {
			$id_nameval=$id_namecls=$id_emailval=$id_emailcls=$id_numberval=$id_numbercls=$id_subjectval=$id_subjectcls=$id_messageval=$id_messagecls='';
			$error = $envoye = 0;
		}
	}
?>