


<?php

session_start();
require_once './config/config.php';
require('includes/web3/vendor/autoload.php');
use Web3\Web3;
use Web3\Contract;

$web3 = new Web3('http://127.0.0.1:8545/');
$eth = $web3->eth;
	$personal = $web3->personal;

	
require_once(__DIR__ . '/messente_api/vendor/autoload.php');

use \Messente\Omnichannel\Api\OmnimessageApi;
use \Messente\Omnichannel\Configuration;
use \Messente\Omnichannel\Model\Omnimessage;
use \Messente\Omnichannel\Model\SMS;




//error_reporting(E_ALL);
if(empty($_SESSION['lang'])) {
	$_SESSION['lang'] = "ko";
}
$langFolderPath = file_get_contents("lang/".$_SESSION['lang']."/index.json");
$langArr = json_decode($langFolderPath,true);

//If User has already logged in, redirect to dashboard page.
//serve POST method, After successful insert, redirect to customers.php page.




//회사주소
	$adminAccountWalletAddress = "0xcea66e2f92e8511765bc1e2a247c352a7c84e895";
	$adminAccountWalletPassword = "michael@cybertronchain.comZUMBAE54R2507c16VipAjaCyber34Tron66CoinImmuAM";

/*
	$adminAccountWalletAddress = '0x9cdb4eaad0c85c0df2ad0f8ff6904b7f72f8177e';
	$adminAccountWalletPassword = '+821082947633'.'ZUMBAE54R2507c16VipAjaCyber34Tron66CoinImmuAM';
*/


	// unlock account

	$personal = $web3->personal;
	$personal->unlockAccount($adminAccountWalletAddress, $adminAccountWalletPassword, function ($err, $unlocked) {
		if ($err !== null) {
			echo 'Error: ' . $err->getMessage();
			return;
		}
		if ($unlocked) {
//			echo 'New account is unlocked!' . PHP_EOL;
		} else {
//			echo 'New account isn\'t unlocked' . PHP_EOL;
		}
	});
	
	
	$fromAccount = $adminAccountWalletAddress;

	//$amountToSendInteger = 30;
//	$amountToSendInteger = 500000;
//	$amountToSend = $amountToSendInteger*1000000000000000000;



//	$amountToSend = dec2hex($amountToSend);
	$gas = '0x9088';
	$transactionId = '';



	$contract = new Contract($web3->provider, $tokenPayAbi);


$tp3list = array
  (


array("0x4cff0aac70391ab03b92a3f4434b6aebbb800743", "10000"),
array("0x1b94409afeabfbc95819b6433a9e980323f18895", "10000"),
array("0x5f4c5a181c413c64620323c47de0e30f354769ad", "10000"),
array("0x9b6d12fb41d5f223fd634d24a80f17d6e45750b3", "10000"),
array("0x9ba9614d2a1f764d0beebe86b1cb81a308c086a7", "10000"),
array("0xcb564ccd04edde5cfd2a78e99f05b8d0b4efe5ea", "10000"),
array("0x42e521b0d5ffa987fd19ca0b50c3ca82945c6e9f", "10000"),
array("0xa32d5fc1969d3701e8432a8f9a04f84deef3e6d6", "10000"),
array("0x598d1992babcfa2777b28e0351e315947cfae641", "10000"),
array("0x62af4aa64ef7005385f338467e3cf6cff3ee07bf", "10000"),
array("0xf8314038b29b3a77a27d9501c99b6532b49cf4cf", "10000"),
array("0x80ce5251f5cb7be34f541ecda8d524923652be22", "10000"),
array("0xa1c5eb6782407f50f015934e61a18a7aa8734ad2", "10000"),
array("0xa6133884070818708b051f717bcd2d910ffa60b2", "10000"),
array("0xed5f37dfeca0ecd37de9d4f73e2784ddd43a8a32", "10000"),
array("0xe8d5fb48ff712ed9a80edd0add36b8b540af8352", "10000"),
array("0xedcbba4871b4c6323fc7d900e4aee05f3b50580b", "10000"),
array("0x31d4a7f61f3d701514aeebe6c24bbbaa7f7e80b6", "10000"),
array("0x148c0d8ff6ff72d080af92b2452789d9536833d1", "10000"),
array("0x70a11fc9e946ef72176a4be910871185f8538d5c", "10000"),
array("0xf7165fd557efd3b606ed481a408388050b9fe96d", "10000"),
array("0xd8b9e7616792068d3afc22c3191eb09281c815bc", "10000"),
array("0x48c9b5d85dda2298dee5a8ac529cf47eaa04d00a", "10000")



  );
	
/*
tp3 전송
*/
return;
exit;


$arrlength=count($tp3list);

for($x=0;$x<$arrlength;$x++)
  {

	$toAddress = $tp3list[$x][0];
	echo $toAddress;
	echo "<br>";

	$toAmount = $tp3list[$x][1];
//	echo $toAmount;
//	echo "<br>";

	$amountToSendInteger = $toAmount;
//	$amountToSend = $amountToSendInteger*1000000000000000000;
//	$amountToSend = bcmul ($amountToSendInteger, 1000000000000000000);
	$amountToSend = bcmul ($amountToSendInteger, 1000000);

	$amountToSend1 = dec2hex($amountToSend);
	
	$amountToSend = '0x';
	$amountToSend .= $amountToSend1;


/*
09C40 40000
C350 50000
11170 70000
13880 80000
186A0 100000


*/

	$contract->at($marketCoinContractAddress)->send('transfer', $toAddress, $amountToSend, [
		'from' => $fromAccount,
		'gas' => '0x186A0',   //100000
		'gasprice' =>'0x1DCD65000'    //30000000000 // 30 gwei
		//'gas' => '0xD2F0'
	], function ($err, $result) use ($contract, $fromAccount, $toAddress,$transactionId,$amountToSendInteger) {
		 if ($err !== null) {
			throw $err;
		} 
		 if ($result) {

//			$msg = $langArr['transaction_has_made'].":) id: <a href=https://etherscan.io/tx/".$result.">" . $result . "</a>";
//			$_SESSION['success'] = $msg;



		} 

	}); 
	
/*
	echo $amountToSend;
	echo "<br>";
	echo $amountToSend1;


	echo "<br>";
	echo $amountToSendInteger;
	echo $transactionId;
	echo "<br>";
*/
  }
	
		


function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function dec2hex($number)
{
    $hexvalues = array('0','1','2','3','4','5','6','7',
               '8','9','A','B','C','D','E','F');
    $hexval = '';
     while($number != '0')
     {
        $hexval = $hexvalues[bcmod($number,'16')].$hexval;
        $number = bcdiv($number,'16',0);
    }
    return $hexval;
}
?>





<?php
/*

$tp3list = array
  (
  array("0xfd2a9cee4ac79bc0370f27d2628245282a2d9ba1", '14805154'),
  array("0xd8fb6cc81e2090f7376ab9b8b24cbbb88c9b719a", '11446758'),
  array("0x479896f340ec5a0eb980106fe885f8321da2a1bb", '10178572'),
  array("0x2186c3331d93ee586a71edeb8002ea3e8ade776c", '7922180')
  );


$arrlength=count($tp3list);

for($x=0;$x<$arrlength;$x++)
  {
	$toAddress = $tp3list[$x][0];
	echo $toAddress;
	echo "<br>";

	$toAccount = $tp3list[$x][1];
	echo $toAccount;
	echo "<br>";

  }

*/

?>





