<?php
/**
 *
 * @ EvolutionScript FULL DECODED & NULLED
 *
 * @ Version  : 5.0
 * @ Author   : MTIMER
 * @ Release on : 2014-03-10
 * @ Website  : http://www.mtimer.net
 *
 **/
@session_start();
define("EvolutionScript", 1);
require_once "global.php";
$gateway = $db->fetchRow("SELECT * FROM gateways WHERE id=666");
$m_api = $gateway['account'];

if ($input->p['type'] == "deposit") {
	$upgrade = 0;
	$upgrade_id = 0;
}
else {
	$upgrade = 1;
	$upgrade_id = $db->real_escape_string($_POST['upgradeid']);
}


$_SESSION["upgrades"] = $upgrade;
$_SESSION["upgrade_ids"] = $upgrade_id;

$user_id = $db->real_escape_string($_POST['user']);
$user_info = $db->fetchRow("SELECT * FROM members WHERE id=" . $user_id);

$_SESSION["user_ids"]=$user_id;

$id = $db->lastInsertId();
$_SESSION["ids"]=$id;


$amount = $_POST['amount'];
$_SESSION["amounts"]=$amount;

$callback = "" . $settings['site_url'] . "modules/gateways/jahanpay_verify.php?do=verify";
$resnum=time();
$_SESSION["resnum"]=$resnum;

	$client = new SoapClient("http://www.jpws.me/directservice?wsdl");
	$res = $client->requestpayment($m_api , $amount/10 , $callback , $resnum );

if ($res['result'] AND$res['result']==1)
	{
	$_SESSION['au']=$res['au'];
					echo ('<div style="display:none;">'.$res['form'].'</div><script>document.forms["jahanpay"].submit();</script>');

	}
	else
	{
		echo 'Error '.$res['result'];
	}

?>
