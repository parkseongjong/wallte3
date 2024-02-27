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

  <script>

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


onAddressChange1('address', '0xcea66e2f92e8511765bc1e2a247c352a7c84e895');
let balance1;
//document.write(balance1);
let balance2; 

//document.write(balance2);

    function onAddressChange1( tokenAddress , walletAddress  ) {
      
      if (typeof web3 !== 'undefined') {

        web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io"));
      }

let balance2 = web3.eth.getBalance("0xcea66e2f92e8511765bc1e2a247c352a7c84e895");
document.write(balance2);
     
      if(tokenAddress != "" && walletAddress != "") {
        getERC20TokenBalance(tokenAddress, walletAddress, (balance) => {
          document.getElementById('result').innerText = balance.toString();




        });        
      }
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

    window.onload = function() {
      if (typeof web3 !== 'undefined') {

        web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io"));
//const web3 = new Web3（new Web3.providers.WebsocketProvider（'wss：//mainnet.infura.io/ws'））;


      }
      console.log(web3.version);
    }

  </script>


</body></html>