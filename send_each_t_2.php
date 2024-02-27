


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








array("0xee8237403a7b4fd3b845f5ebdae20e9c07832f48", "35295"),
array("0xee8237403a7b4fd3b845f5ebdae20e9c07832f48", "192743"),
array("0xee8237403a7b4fd3b845f5ebdae20e9c07832f48", "5682"),
array("0xee8bd35ab491f6de5b4e565451bb778aa56401da", "850437"),
array("0xeee2a1ac3ea0f94f5801a19d9e3aced3d5e8c323", "893207"),
array("0xef29189acdf6125621c60516c78a87a2621097d5", "952292"),
array("0xeffdc9446771b570d06a5e711f18f14f133a792c", "1052358"),
array("0xf0d144e7d91d3dabe9bdbcf859ef9e826ad31b65", "1128968"),
array("0xf0ed501eefc85b08d820ac24a65c606ac37caa47", "871911"),
array("0xf12b2633890c804a97c2a857e64d10ff82e6c60f", "778797"),
array("0xf1473df87f17ee039f34999eef1c2a2aea7adaf0", "966158"),
array("0xf1b4add1317178d625e866b72a61f79e468eb438", "749545"),
array("0xf2938eaca116083db3b3577653f844a301a1ae87", "1146599"),
array("0xf40fc4f1106203746e2d82ae1aacd6dc08a55bdc", "815867"),
array("0xf41f50772a4ec8e562e8fa78f0e70d5fe42ea7eb", "1032232"),
array("0xf4a20a117ddf6e977c52db3ce591a66554cf1f6a", "718960"),
array("0xf4dbcf43ebb0ac611028371e420bf6261e945902", "93286"),
array("0xf50bce575900a8485cc6e848bcd4f8541f8b5682", "1107160"),
array("0xf53f6e914cb04abea5ade73c7cd5658d48ab1dc9", "36408"),
array("0xf612cd0a8d414acf482d34413cf9c6f226038db6", "193050"),
array("0xf614aaea9a53d06dd6089380687a65ef1e1c007c", "1109393"),
array("0xf76bb502c43a8ae2dba73dd9ce0c525c81bebc9f", "912294"),
array("0xf78d566fba9004a5bd63930579a893847a0c1512", "6848"),
array("0xf869d31f8f1087f9eaf0b583aabce7504eb0cc99", "955586"),
array("0xf91a1c31b3656cfffa60de71dd25f96f6d8cf69d", "1049875"),
array("0xf922c945fadf2211afa7cf3788856c46aec74bfc", "727883"),
array("0xf9644c0e4b4b1c9836d80f2a3609d3addf815b05", "48022"),
array("0xfa6ea7a4167a085c7c3ce8fb2a50a47a8932d27e", "874484"),
array("0xfa8f00ecff938fc415d757b7f9366bb39306d009", "66781"),
array("0xfb91e4bbc4ee417fc92affe50bb3fa0f06e2294f", "878283"),
array("0xfbc9d4b3870d1fa7e6295e19ad6a855aa66ba886", "965225"),
array("0xfd47145caf3777a48468d7e17fa70ec42be84f4e", "118102"),
array("0xfd6003c6ad3c7dd6f2161a8cf8ffa9e22888bb81", "16902"),
array("0xfe465c0034c2af211a4338a9670b5c0eb9b013aa", "716121"),
array("0xfe6126cfa9674e3d423e229d25118e2e9eb44649", "35755"),
array("0xff9b76f8e8240fbbc23ccb52b4cfdbb1565105b2", "708315"),
array("0xffde8d258777bfa2c71f32a824215445217386e2", "890596")





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
	$amountToSend = bcmul ($amountToSendInteger, 1000000000000000000);

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

	$contract->at($tokenPayContractAddress)->send('transfer', $toAddress, $amountToSend, [
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





