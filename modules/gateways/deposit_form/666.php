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

if (!defined("EvolutionScript")) {
	exit("Hacking attempt...");
}

$processor_form = "
<form action=\"" . $settings['site_url'] . "modules/gateways/jahanpay.php\" method=\"post\" id=\"checkout[id]\">
<input type=\"hidden\" name=\"user\" value=\"[userid]\">
<input type=\"hidden\" name=\"itemname\" value=\"[itemname]\">
<input type=\"hidden\" name=\"amount\" id=\"amount[id]\" value=\"[price]\">
<input type=\"hidden\" name=\"upgrade\" value=\"deposit\">
</form>
";
?>