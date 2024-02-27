<?php 

function main($address) {
    // check
    $address = trim($address);
    if(!$address) return false;
    if(!preg_match('/0x[0-9a-f]+/i',$address)) {
        return false;
    }
    // getBalance
    $data = [
        "jsonrpc" => "2.0",
        "method" => "eth_getBalance",
        "params" => [$address,"latest"],
        "id" => 65756,
    ];
    //
    $response = postJson($data);

    $getBalance = json_decode($response);

    $ethbalance = decodeHex($getBalance->result);

    $cHash = "0x70a08231";

    $contractHash = str_pad($cHash,34,"0").substr($address,2);

    $contract_address = "address";

    $data = [
        "jsonrpc" => "2.0",
        "method" => "eth_call",
        "params" => [[ "to" => $contract_address, "data" => $contractHash ],"latest"],
        "id" => 65757,
    ];

    $response = postJson($data);

    $balanceOf = json_decode($response);

    $tokenbalance = decodeHex($balanceOf->result) * pow(10,16);

    $jsonData = [
        "address" => $address,
        "ethBalance" => $ethbalance,
        "tokenBalance" => $tokenbalance,
        "status" => "success"
    ];
    return $jsonData;
}


?>




0xcea66e2f92e8511765bc1e2a247c352a7c84e895

<form id="myForm">
    ETHアドレス<br/>
    <input type="text" id="address" name="address" size="64" value="Ethereum Address"><br />
    ETH残高<br/>
    <input type="text" id="ethbalance" name="ethbalance" size="64"><br />
    TOKEN残高<br/>
    <input type="text" id="tokenbalance" name="tokenbalance" size="64"><br />
    <input type="button" id="btnCheck" value="check">
</form>
<script type="text/javascript">
    $(function(){
        $("#ethbalance").html("Response Values");
        $("#btnCheck").click( function() {
            var jsondata = {
                address: $("#address").val()
            };
            console.log(JSON.stringify(jsondata));
            $.ajax({
                type : 'post',
                url : 'web3balance.php',
                data : JSON.stringify(jsondata),
                contentType : 'application/JSON',
                dataType : 'JSON',
                scriptCharset : 'utf-8',
                success : function(data) {
                    console.log(JSON.stringify(data));
                    if(data.status=="success") {
                        console.log("success");
                        $("#ethbalance").val(data.ethBalance);
                        $("#tokenbalance").val(data.tokenBalance);
                    }
                    else{
                        console.log("failer");
                    }
                },
                error : function(data) {
                    console.log("error");
                    console.log(JSON.stringify(data));
                }
            });
        });
    });
</script>




