<!DOCTYPE html>
<!-- saved from url=(0067)https://piyolab.github.io/playground/ethereum/getERC20TokenBalance/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <script src="https://piyolab.github.io/playground/ethereum/web3/v0.20.6/web3.min.js"></script>
</head>
<body>

  <h1>Get ERC20 Token Balance</h1>

  <h2>Token Address</h2>
  <input type="text" id="token-address" size="80" oninput="onAddressChange()">
  <p>e.g. 0x2A65D41dbC6E8925bD9253abfAdaFab98eA53E34</p>

  <h2>Wallet Address</h2>
  <input type="text" id="wallet-address" size="80" oninput="onAddressChange()">
  <p>e.g. 0x821e28109872cad442da8d8335be37d317d4f1e7</p>

  <h2>Result</h2>
  <span id="result"></span>
  <span id="result2"></span>
  <script language='javascript'>

    function getERC20TokenBalance(tokenAddress, walletAddress, callback) {

      // ERC20 トークンの残高を取得するための最小限のABI
      let minABI = [
        // balanceOf
        {
          "constant":true,
          "inputs":[{"name":"_owner","type":"address"}],
          "name":"balanceOf",
          "outputs":[{"name":"balance","type":"uint256"}],
          "type":"function"
        },
        // decimals
        {
          "constant":true,
          "inputs":[],
          "name":"decimals",
          "outputs":[{"name":"","type":"uint8"}],
          "type":"function"
        }
      ];

      //  ABI とコントラクト（ERC20トークン）のアドレスから、コントラクトのインスタンスを取得 
      let contract = web3.eth.contract(minABI).at(tokenAddress);
      // 引数にウォレットのアドレスを渡して、balanceOf 関数を呼ぶ
      contract.balanceOf(walletAddress, (error, balance) => {
        // ERC20トークンの decimals を取得
        contract.decimals((error, decimals) => {
          // 残高を計算
          balance = balance.div(10**decimals);
          console.log(balance.toString());
          callback(balance);
        });
      });
    }

    function onAddressChange(e) {
      let tokenAddress = document.getElementById('token-address').value;
      let walletAddress = document.getElementById('wallet-address').value;
      if(tokenAddress != "" && walletAddress != "") {
        getERC20TokenBalance(tokenAddress, walletAddress, (balance) => {
          document.getElementById('result').innerText = balance.toString();
        });        
      }
    }


    function onAddressChange1(tokenAddress, walletAddress ) {
      
 

//let tokenAddress ='address';
//let walletAddress = '0xcea66e2f92e8511765bc1e2a247c352a7c84e895';
     
      if(tokenAddress != "" && walletAddress != "") {
        getERC20TokenBalance(tokenAddress, walletAddress, (balance) => {
          document.getElementById('result').innerText = balance.toString();



        });        
      }
    }


    function onload1() {
      
 
      if (typeof web3 !== 'undefined') {
        web3 = new Web3(web3.currentProvider);
      } else {
  //      web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io"));
 //       web3 = new Web3(new Web3.providers.HttpProvider("wss://mainnet.infura.io/ws/v3/e9bbe05f9dc949838c685503e32c4334"));

// web3 = new Web3(new Web3.providers.WebsocketProvider('wss://mainnet.infura.io/ws/v3/e9bbe05f9dc949838c685503e32c4334'));
   web3 = new Web3(new Web3.providers.WebsocketProvider('wss://mainnet.infura.io/ws'));
      }
 //     console.log(web3.version);
//onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');
//onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');
//onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');


web3.eth.getBalance('0xcea66e2f92e8511765bc1e2a247c352a7c84e895', function(error, balance2) {
     console.log(balance2);
	 document.getElementById('result2').innerText = balance2.toString();
});
//let balance2 = web3.eth.getBalance("0xcea66e2f92e8511765bc1e2a247c352a7c84e895");
//document.write(balance2);


    }



    window.onload = function() {
      if (typeof web3 !== 'undefined') {
 //       web3 = new Web3(web3.currentProvider);
      } else {
  //      web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io"));
 //       web3 = new Web3(new Web3.providers.HttpProvider("wss://mainnet.infura.io/ws/v3/e9bbe05f9dc949838c685503e32c4334"));

// web3 = new Web3(new Web3.providers.WebsocketProvider('wss://mainnet.infura.io/ws/v3/e9bbe05f9dc949838c685503e32c4334'));
//   web3 = new Web3(new Web3.providers.WebsocketProvider('wss://mainnet.infura.io/ws'));
      }
 //     console.log(web3.version);
//onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');
//onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');
//onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');


//web3.eth.getBalance('0xcea66e2f92e8511765bc1e2a247c352a7c84e895', function(error, balance2) {
//     console.log(balance2);
//	 document.getElementById('result2').innerText = balance2.toString();
//});



//let balance2 = web3.eth.getBalance("0xcea66e2f92e8511765bc1e2a247c352a7c84e895");
//document.write(balance2);


    }



  </script>





</body></html>
<?php echo("<script language='javascript'>onload1();</script>"); ?>


<?php echo("<script language='javascript'>onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');</script>"); ?>

<?php 




 ?>


<script type="text/javascript">
window.onload=function() {
   alert("ccc");

	onload1();
	onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');
}

</script>


