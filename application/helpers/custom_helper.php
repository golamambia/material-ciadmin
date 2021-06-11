<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
define('EMAIL', 'zouq777@gmail.com');
define('SITE_TITLE', 'Zouq');

if (!function_exists('formData')) {
	function formData($table, $request) {

		// get main CodeIgniter object
		$ci = &get_instance();

		// //load databse library
		$ci->load->database();

		$field_list = $ci->db->list_fields($table);
		foreach ($request as $key => $value) {
			foreach ($field_list as $field => $name) {
				if (strtolower(trim($key)) == strtolower(trim($name))) {
					$data[$key] = $value;
					break;
				}
			}
		}
		return $data;

		//return $field_list;
	}
}

function message($var = "", $mode = "") {
	switch ($mode) {
	case 1:
		$var = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    ' . $var . '
  </div>'; //Success
		break;
	case 2:
		$var = '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    ' . $var . '
  </div>';
		//Error
		break;
	case 3:

		$var = '<div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    ' . $var . '
  </div>';
		//infoMsg
		break;
	case 4:
		$var = '<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    ' . $var . '
  </div>'; //warningMsg
		break;
	default:
		$var = '<div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    ' . $var . '
  </div>'; //Message
		break;
	}
	return $var;
}

function db_date_time() {
	return date("Y-m-d H:i:s");
}

function worldpay_payment($token, $name, $amount, $order_code) {
	$ci = &get_instance();
	$fields = array(
		'token' => $token,
		'amount' => round($amount),
		'currencyCode' => 'USD',
		'name' => $name,
		//'billingAddress' => $billing_address,
		'orderDescription' => 'Order description',
		'customerOrderCode' => $order_code,
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	curl_setopt($ch, CURLOPT_URL, 'https://api.worldpay.com/v1/orders');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	$headers = array();
	$headers[] = 'Authorization: ' . $ci->config->item('Worldpay_serviceKey');
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);

	return $response = json_decode($response, true);
	if (isset($response['paymentStatus']) && $response['paymentStatus'] === 'SUCCESS') {
		echo $worldpayOrderCode = $response['orderCode'];
		$response['token'];
	} else {
		echo $response['description'];
		//echo print_r($response, true) ;
	}
}

function db_date_format($date) {
	$blank = '';
	if ($date != '') {
		$string = str_replace(' ', '', $date); // Replaces all spaces.

		$date = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);

		return date('Y-m-d', strtotime($date));
	} else {
		return $blank;
	}
}

function customSmtpMailSend($to, $subject, $message, $bcc = '', $paths = array(), $from = '', $cc = '') {

	$config['smtp_crypto'] = 'ssl'; // or html

/*	$config['protocol'] = 'smtp';
$config['smtp_crypto'] = 'tls';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'testing@gmail.com';
$config['smtp_pass'] = 'kolkata123#';*/

	$config['wordwrap'] = TRUE;

	$config['charset'] = 'utf-8';
	$config['newline'] = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not
	$CI = &get_instance();
	$CI->load->library('email');
	$CI->load->helper('path');
//$CI->email->clear();
	$CI->email->initialize($config);
	$CI->email->clear(TRUE);
	if ($from == '') {
		$CI->email->from(EMAIL, SITE_TITLE);
	} else {
		$CI->email->from($from, SITE_TITLE);
	}
//$CI->email->from(EMAIL, SITE_TITLE);
	$CI->email->to($to);
//echo "12";
	// echo $bcc;
	if (isset($bcc) && $bcc != "") {
//echo "15";
		$CI->email->bcc($bcc);
	}
	if (isset($cc) && $cc != "") {
//echo "15";
		$CI->email->cc($cc);
	}
	$CI->email->subject($subject);
	$CI->email->message(setEmailTemplate($message));
	if ($paths != '' && count($paths) > 0) {

		foreach ($paths as $file) {
//echo $file;
			//$path = set_realpath('assets/your_folder/');
			//$this->email->attach($path . 'yourfile.pdf');
			$CI->email->attach($file);
		}
	}
	if ($CI->email->send()) {
		return TRUE;
	} else {
		echo $CI->email->print_debugger();
		return FALSE;
	}

	echo $CI->email->print_debugger();
}

function price_format($price) {
	return number_format($price, 2);

}

function pr($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

function order_status($status) {
	switch ($status) {
  case '1':
    $order_status='Order received';
    break;
  case '2':
    $order_status='Processing';
    break;
    case '3':
    $order_status='Out for delivery';
    break;
    case '4':
    $order_status='Delivered';
    break;
    case '5':
    $order_status='Canceled';
    break;
    case '6':
    $order_status='Refund';
    break;
  default:
    $order_status='Order received';
    break;
}
return $order_status;
}

function setEmailTemplate($msg) {
	$logo = base_url("assets/images/logo.png");
	$footer_bg_color = '#0d2a47';

	$message_header = '<html><head>
<title>' . SITE_TITLE . '</title>
<style type="text/css">
.tmpltBdy{margin:0; padding:0; background:#ffffff; font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; color:#656363; line-height:18px;}
a{text-decoration:none; color:#faae2c;}
a:hover{text-decoration:none; color:#2f6f82;}
img{border:0; margin:0;}
p{margin:0;}
ul{margin:10px 0; padding:0;}
</style>
</head>
<body class="tmpltBdy" style="margin:0; padding:0; background:#ffffff; font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; color:#656363; line-height:18px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

<tr>
<td style="padding:10px 10px 20px;" class="emailers_table_view">';

	$message_footer = '</td>
</tr>


</table>
</body>
</html>';

	return $message = $message_header . $msg . $message_footer;
}