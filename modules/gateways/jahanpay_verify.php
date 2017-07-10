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
$id = $_SESSION["ids"];
$amount = $_SESSION["amounts"]; 
$au = $_SESSION["au"];
$resnum = $_SESSION["resnum"];
$batch = $au;

$order_id = $_SESSION["user_ids"];
$upgrade = $_SESSION["upgrades"];
$upgrade_id = $_SESSION["upgrade_ids"];
$today = TIMENOW;
$resnumok=$m_api.$amount;
if (isset($_REQUEST['do'])&&$_REQUEST['do']=='verify')
{

$client = new SoapClient("http://www.jpws.me/directservice?wsdl");
$res = $client->verification($m_api , $amount/10 , $au , $resnum, $_POST + $_GET );

if (!empty($res['result']) AND $res['result']==1){

		$customer = $resnum;

		if (is_numeric($upgrade_id)) {
	        include GATEWAYS . "process_upgrade.php";
	        header("location:" . $settings['site_url'] . "index.php?view=account&page=thankyou&type=upgrade");
                exit();
		}
		
                else {		
		include GATEWAYS . "process_deposit.php";
	        header("location:" . $settings['site_url'] . "index.php?view=account&page=thankyou&type=funds");
                exit();
                }
}

else {

if (is_numeric($upgrade_id)) {
header("location:" . $settings['site_url'] . "index.php?view=account&page=upgrade");
exit();} 

else  {
header("location: " . $settings['site_url'] . "index.php?view=account&page=addfunds");
exit();}

}
}
else {
if (is_numeric($upgrade_id)) {
header("location:" . $settings['site_url'] . "index.php?view=account&page=upgrade");
exit();} 

else  {
header("location: " . $settings['site_url'] . "index.php?view=account&page=addfunds");
exit();}
}
?>