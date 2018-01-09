<?php
	$ourmail = 'info@escapadefrancaise.com';

	//-> erreurs
	$error = $envoye = 0;
	if (!isset($cbon)) $cbon = 0;

	//-> title
	if (!empty($_POST['title'])) {
		$titleval = strip_tags($_POST['title']);
		$titlecls = '';
	} else {
		$error++;
		$titleval = '';
		$titlecls = ' rederror';
	}

	//-> first_name
	if (!empty($_POST['first_name'])) {
		$first_nameval = strip_tags($_POST['first_name']);
		$first_namecls = '';
	} else {
		$error++;
		$first_nameval = '';
		$first_namecls = ' rederror';
	}

	//-> last_name
	if (!empty($_POST['last_name'])) {
		$last_nameval = strip_tags($_POST['last_name']);
		$last_namecls = '';
	} else {
		$error++;
		$last_nameval = '';
		$last_namecls = ' rederror';
	}

	//-> email
	if (!empty($_POST['email'])) {
		$emailval = strip_tags($_POST['email']);
		$emailcls = '';
	} else {
		$error++;
		$emailval = '';
		$emailcls = ' rederror';
	}

	//-> phone
	if (!empty($_POST['phone'])) {
		$phoneval = strip_tags($_POST['phone']);
		$phonecls = '';
	} else {
		$error++;
		$phoneval = '';
		$phonecls = ' rederror';
	}

	//-> function
	if (!empty($_POST['function'])) {
		$functionval = strip_tags($_POST['function']);
		$functioncls = '';
	} else {
		$error++;
		$functionval = '';
		$functioncls = ' rederror';
	}

	//-> agency_name
	if (!empty($_POST['agency_name'])) {
		$agency_nameval = strip_tags($_POST['agency_name']);
		$agency_namecls = '';
	} else {
		$error++;
		$agency_nameval = '';
		$agency_namecls = ' rederror';
	}

	//-> company
	if (!empty($_POST['company'])) {
		$companyval = strip_tags($_POST['company']);
		$companycls = '';
	} else {
		$error++;
		$companyval = '';
		$companycls = ' rederror';
	}

	//-> specialization
	if (!empty($_POST['specialization'])) {
		$specializationval = strip_tags($_POST['specialization']);
		$specializationcls = '';
	} else {
		$error++;
		$specializationval = '';
		$specializationcls = ' rederror';
	}

	//-> address
	if (!empty($_POST['address'])) {
		$addressval = strip_tags($_POST['address']);
		$addresscls = '';
	} else {
		$error++;
		$addressval = '';
		$addresscls = ' rederror';
	}

	//-> zip_code
	if (!empty($_POST['zip_code'])) {
		$zip_codeval = strip_tags($_POST['zip_code']);
		$zip_codecls = '';
	} else {
		$error++;
		$zip_codeval = '';
		$zip_codecls = ' rederror';
	}

	//-> city
	if (!empty($_POST['city'])) {
		$cityval = strip_tags($_POST['city']);
		$citycls = '';
	} else {
		$error++;
		$cityval = '';
		$citycls = ' rederror';
	}

	//-> country
	if (!empty($_POST['country'])) {
		$countryval = strip_tags($_POST['country']);
		$countrycls = '';
	} else {
		$error++;
		$countryval = '';
		$countrycls = ' rederror';
	}

	//-> fax
	if (!empty($_POST['fax'])) {
		$faxval = strip_tags($_POST['fax']);
		$faxcls = '';
	} else {
		$error++;
		$faxval = '';
		$faxcls = ' rederror';
	}

	//-> iata
	if (!empty($_POST['iata'])) {
		$iataval = strip_tags($_POST['iata']);
		$iatacls = '';
	} else {
		$error++;
		$iataval = '';
		$iatacls = ' rederror';
	}

	//-> message
	if (!empty($_POST['message'])) {
		$messageval = strip_tags($_POST['message']);
		$messagecls = '';
	} else {
		$error++;
		$messageval = '';
		$messagecls = ' rederror';
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
		$message = '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="initial-scale=1.0" /><meta name="format-detection" content="telephone=no" /><title></title><style type="text/css">body {width: 100%;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;}@media only screen and (max-width: 600px) {table[class="table-row"] {float: none !important;width: 98% !important;padding-left: 20px !important;padding-right: 20px !important;}table[class="table-row-fixed"] {float: none !important;width: 98% !important;}table[class="table-col"], table[class="table-col-border"] {float: none !important;width: 100% !important;padding-left: 0 !important;padding-right: 0 !important;table-layout: fixed;}td[class="table-col-td"] {width: 100% !important;}table[class="table-col-border"] + table[class="table-col-border"] {padding-top: 12px;margin-top: 12px;border-top: 1px solid #E8E8E8;}table[class="table-col"] + table[class="table-col"] {margin-top: 15px;}td[class="table-row-td"] {padding-left: 0 !important;padding-right: 0 !important;}table[class="navbar-row"] , td[class="navbar-row-td"] {width: 100% !important;}img {max-width: 100% !important;display: inline !important;}img[class="pull-right"] {float: right;margin-left: 11px;max-width: 125px !important;padding-bottom: 0 !important;}img[class="pull-left"] {float: left;margin-right: 11px;max-width: 125px !important;padding-bottom: 0 !important;}table[class="table-space"], table[class="header-row"] {float: none !important;width: 98% !important;}td[class="header-row-td"] {width: 100% !important;}}@media only screen and (max-width: 480px) {table[class="table-row"] {padding-left: 16px !important;padding-right: 16px !important;}}@media only screen and (max-width: 320px) {table[class="table-row"] {padding-left: 12px !important;padding-right: 12px !important;}}@media only screen and (max-width: 458px) {td[class="table-td-wrap"] {width: 100% !important;}}</style></head><body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0"><table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;"><table><tr><td class="table-td-wrap" align="center" width="458"><table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="18" style="height: 18px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left"><table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left"><table class="header-row" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">'.$titleval.' '.$first_nameval.' '.$last_nameval.'</td></tr></tbody></table><div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;"><b style="color: #777777;">E-mail: '.$emailval.'</b><br><b style="color: #777777;">Numéro de téléphone: '.$phoneval.'</b><br><b style="color: #777777;">Fax: '.$faxval.'</b><br><b style="color: #777777;">Fonction: '.$functionval.'</b><br><b style="color: #777777;">Nom de l\'agence: '.$agency_nameval.'</b><br><b style="color: #777777;">Companie: '.$companyval.'</b><br><b style="color: #777777;">Specialite: '.$specializationval.'</b><br><b style="color: #777777;">Adresse: '.$addressval.'</b><br><b style="color: #777777;">Code postal: '.$zip_codeval.'</b><br><b style="color: #777777;">Ville: '.$cityval.'</b><br><b style="color: #777777;">Pays: '.$countryval.'</b><br><b style="color: #777777;">N° IATA: '.$iataval.'</b><br>'.$messageval.'</div></td></tr></tbody></table></td></tr></tbody></table><table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="1" style="height: 1px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table><table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="36" style="height: 36px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table></td></tr></table></body></html>';
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = utf8_decode(strip_tags($_POST['id_message']));
		$envoye = 1;

		if($mail->send()) {
			$titleval=$titlecls=$first_nameval=$first_namecls=$last_nameval=$last_namecls=$emailval=$emailcls=$phoneval=$phonecls=$functionval=$functioncls=$agency_nameval=$agency_namecls=$companyval=$companycls=$specializationval=$specializationcls=$addressval=$addresscls=$zip_codeval=$zip_codecls=$cityval=$citycls=$countryval=$countrycls=$faxval=$faxcls=$iataval=$iatacls=$messageval=$messagecls='';
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
			$titleval=$titlecls=$first_nameval=$first_namecls=$last_nameval=$last_namecls=$emailval=$emailcls=$phoneval=$phonecls=$functionval=$functioncls=$agency_nameval=$agency_namecls=$companyval=$companycls=$specializationval=$specializationcls=$addressval=$addresscls=$zip_codeval=$zip_codecls=$cityval=$citycls=$countryval=$countrycls=$faxval=$faxcls=$iataval=$iatacls=$messageval=$messagecls='';
			$error = $envoye = 0;
		}
	}
?>