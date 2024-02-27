<style>
.page-header {
	display:inline-block;
}
.head-nam-id {
	display:inline-block;
	font-weight: bold;
	margin-top: 46px;
    float: right;
}
.head-nam-id p {
	margin:0px;
}

.panel.panel-primary > .panel-heading {
	color: #000;
	background-color: #ffd602;
	border-color: #ffd602;
}

.panel.panel-green > .panel-heading {
	border-color: #d93233;
	color: white;
	background-color: #d93233;
}

.panel.panel-green {
	border:none;
}

.panel.panel-primary {
	border:none;
}

.panel-footer {
	color: #000;
	background-color: #fff;
}

.box-button { 
	background:#595959;
	padding: 8px 23px;
	font-size: 16px !important;
	color:#fff;
	border-radius: 7px;
 }





</style>


<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
require('includes/web3/vendor/autoload.php');
use Web3\Web3;
use Web3\Contract;



require('vendor/autoload.php');
use EthereumRPC\EthereumRPC;
use ERC20\ERC20;
$geth = new EthereumRPC('127.0.0.1', 8545);
// Instantiate ERC20 lib by passing Instance of EthereumRPC lib as constructor argument
$erc20 = new ERC20($geth);



$getBalance = 0;
$coinBalance = 0;
$EthCoinBalance=0;
/*
$db = getDbInstance();
$db->where("id", $_SESSION['user_id']);
$row = $db->get('admin_accounts');
$walletAddress = $row[0]['wallet_address'];
$email = $row[0]['email'];
$username = $row[0]['name'];
$registerWith = $row[0]['register_with'];
$showHeader = ($registerWith=="email") ? $email : $row[0]['phone'];
*/
$walletAddress= "0xe2ac9631b1426ab753b08e0eea8a3b0b0e29e015";
if(!empty($walletAddress)) {

	$web3 = new Web3('http://127.0.0.1:8545/');
	$eth = $web3->eth;

	$eth->getBalance($walletAddress, function ($err, $balance) use (&$getBalance) {
		
		if ($err !== null) {
			echo 'Error: ' . $err->getMessage();
			return;
		}
		$getBalance = $balance->toString();
		//echo 'Balance: ' . $balance . PHP_EOL;
	});
	
	$functionName = "burnFrom";
	$contract = new Contract($web3->provider, $testAbi);
	$contract->at($contractAddress)->call($functionName, '0x000000000000000000000000000000000000dEaD', '1',function($err, $result) use (&$coinBalance){
		$coinBalance = reset($result)->toString();
	});
	
	echo reset($err)->toString();
	echo reset($result)->toString();

}

?>
<?php include_once('includes/footer.php'); ?>
