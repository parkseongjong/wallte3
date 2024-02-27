<?php
require_once './config/config.php';

require_once(__DIR__ . '/messente_api/vendor/autoload.php');



	
$wallet_array = array(



"0xb5c132dcab38fa828fcd499565f8f187b426c7eb",
"0xe7291cf97300c2b53b48fe08202e8b5ba3ff51a6",
"0xc711082e6814615ffc55aac70d3ab15ef22f8052",
"0x4613f16fc559e62eee4d110162ea682cc28125db",
"0x42fe97736250c80fe30df8cf4b9d35ff24c10ef7",
"0x4879c8d85439cc8bce188f1928c9376c196779fc",
"0x48b7b4569ff09d6b4cabff4eb54c841535750d54",
"0x9e4fa70a458ae5c84d2c4a9141ce349aa63f3361",
"0xe709ca363aa41b80d6e678b4d2d90336c91eefc6",
"0x495210c629e4d52ce04132705094bdfae099bf44",
"0xbd6c08825eddf0fb4ab5401fedde3ffdbe7f24a0",
"0xb39d5682ca01a98554dcf7b7c37437d3365738b4",
"0xa1b23cfa51d40e06a4389f8925aec702d2a73f98",
"0x079563699bb198a96b4d4c1cc81bb37b1810a41a",
"0x40914ac1acdf3f251d2e2309bf8070d3d041cdc9",
"0x3e66314cb42b012fbecd71b9d2b4569b67d2b8f3",
"0xdb1136fe5dc659544854b812df4de96712adf7fc",
"0xd090b1f243ae7e280e0cf3d37c5ee3716d55bdfa",
"0xffde8d258777bfa2c71f32a824215445217386e2",
"0xe9b3d10c9a771f748cba3b492df182076b15b1a2",
"0xa382b2a2d6ff0e9f558818f01206271ac4dbd119",
"0x3f6a3352aa77e9bcbb069604cc129cb4fbf44aec",
"0xd04c6a0be79b799a0a729bc61947618969b2ab04",
"0x1709554bb7c7cc82d26ee0f337f1bb04d0f7e5d2",
"0xab1301b52b38b377354eec578c2ba0e07b18cf2c",
"0x5f6939da07598cf818891d55b2d132bf499a6d53",
"0xe00974a8943f5c3d5d34aa8671f82d426460d3b5",
"0xe6fd8eafe751600c7fb5ee6beea5aabca6fb7fc0",
"0xf614aaea9a53d06dd6089380687a65ef1e1c007c",
"0xa016a7ae8d7db7987bd37f4a13faf30c82b0f823",
"0xcb0dcf2a89382996690b0c95cfea40027aeabf62",
"0x0a253617c54d46ab4d0c1000279e632b69e3247b",
"0x5628a959bf39a09acf2e71d89f9df25d97bc5e15",
"0x33274f445c2abfcb964bca36b8730a2c3a4d67e3",
"0x22496ee7821364eed5f65ca953fde8a2dbe8af16",
"0x24e9fe2240003a3a92feaf6b1dc03fe15d174b4f",
"0xebc56fb319ccbf6eaae120b68e5150eec020ef1a",
"0x17c3d0cfe848bc7a4794c4bb5889a989029c8a84",
"0x938a9987b3ae9cfd156e618f67e06200222293e5",
"0x54a1aef144fe227863c379e60e29b87c0699d5eb",
"0xae9175e9615acdbadffcbf4a615b17d35f38fc5c",
"0x0dbcee2c7bc8d759176281e59dae3462c11bf553",
"0x22722b13e9517f578c28ede63a5c75bc428ee004",
"0x3408b1009ae559021dfae88e436a77dc50f288b6",
"0xbef7d90ac382f5e6381cce84e79eb6b358aa0c98",
"0x0b1bbf24abeb6dacd5cac223e2a5e23fad5044cb",
"0x746504f27f5ae67a4c34e68a2a473775378424c3"




); 


$arrlength=count($wallet_array);






for($x=0;$x<$arrlength;$x++)
  {
	$Address = $wallet_array[$x];

	$getPvtKey = '';
	if(empty($getPvtKey)){
		$userWalletAddress = $Address;
		$userWalletPass = 'onefamilyhappynewyear2020ONEFAMILYHAPPYNEWYEAR2020';
//		$userWalletPass = "+821076588676ZUMBAE54R2507c16VipAjaCyber34Tron66CoinImmuAM";
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_PORT => "3000",
		 CURLOPT_URL => "http://127.0.0.1:3000/getpvtkey",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\n\t\"address\":\"".$userWalletAddress."\",\n\t\"password\":\"".$userWalletPass."\"\t\n}",
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"postman-token: eb0783a3-f404-9d7c-b9ba-32ebeefe2c65"
		  ),
		));

		$response = curl_exec($curl);
		$decodeResp = json_decode($response,true);
		if(!empty($decodeResp)){
			$getPvtKey = $decodeResp['pvtKey'];
			echo "<br>";

		}
		//$err = curl_error($curl);
	}
	echo $getPvtKey; 
	
	
	
}
?>