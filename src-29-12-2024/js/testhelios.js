<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("./config/config.php");	
							
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="shortcut icon" href="images/favicon.ico">

<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<title>Cardano Property Solutions</title>

<script type="module">

    import {Assets as Asst,Assets, Address,ConstrData, HeliosData,AssetClass, Cip30Wallet,
      HInt, ByteArrayData, hexToBytes, WalletHelper, NetworkParams, Value,
    TxOutput,Tx, MintingPolicyHash,BlockfrostV0, 
    Token} from "https://helios.hyperion-bt.org/0.16.6/helios.js";
    
    import {opt,j,jtrics,gRValues} from './js/jimba.js';
    
    opt._R = 0;           //run all
    
    opt._O = 1;           //run o() function calls
    opt._M = 0;           //show stack frames for objects
    
    opt._F = 0;           //run functions
    
    opt._T = 1;           //jtest, jj, jescribe i.e. tests
    opt._FailsOnly = 0;   //run only failing tests
    opt._Ob = 0;          //show stack frames

    const checkWallet = async () => { 
    const w = window;  jjj("connectWallet","window is true",w,true);
    const wCardano = window.cardano;  jjj("connectWallet","wCardano is true",wCardano,true);
    const nami = window.cardano.nami;  jjj("connectWallet","wCardano",nami,'object()');
    const namiEnabled = window.cardano.nami; jjj("connectWallet","nami found",namiEnabled,true)
    const walletHandleNami = await window.cardano.nami.enable(); jjj("connectWallet","nami enabled in the browser extension",walletHandleNami,true)
    
    if (typeof window.cardano == 'undefined' || typeof window.cardano.nami == 'undefined') {
        return;
    }
      //const walletHandleNami: Cip30Handle = await window.cardano.nami.enable(); console.log({walletHandleNami})
      //setWalletHandleNami(walletHandleNami);
      const networkType_ = await walletHandleNami.getNetworkId(); console.log({networkType_})
      console.log(networkType_)

      if (networkType_ == 1) {
          alert("Sorry this dApp is for testing. Change network to preprod. Open Nami wallet, then click the icon, select settings, then chose network and finally select preprod")
          return
      } else {
          //
      }
      const walletAPI = await new Cip30Wallet(walletHandleNami); console.log({walletAPI});
      const walletHelper = new WalletHelper(walletAPI); console.log({walletHelper});
      console.log({walletHelper}); 
      console.log({walletAPI});

      const utxos = await walletHelper.pickUtxos(new Value(BigInt(10_000_000)));  console.log({utxos}); 
      const utxosZeroElement = utxos[0];  console.log({utxosZeroElement});
      const txId = utxos[0][0].txId.hex; console.log({txId});
      let utxoInWallet = "";
      let utxoCounter = 1;

    //   const newUtxo = await utxos[0].map((v)=>{
    //     const assetsFromUtxo  = new Assets(new Assets(v.value.assets.dump()).assets).dump(); console.log({assetsFromUtxo});
    //     utxoInWallet += "UTXO "+ utxoCounter + "\r\n\r\n";
    //     utxoInWallet += "UTXO txId(hashed Id) \t" + v.txId.dump() +"\r\n" +
    //     "UTXO utxoIdx(Index) \t" + v.utxoIdx.toString() +"\r\n" +
    //     "UTXO value lovelace \t" + v.value.lovelace.toLocaleString()  +"\r\n" +
    //     "UTXO value assets  \r\n" + assetsDisplayString(assetsFromUtxo);
    //     utxoInWallet += "\r\n\r\n ====================================== \r\n\r\n";
    //     utxoCounter++;console.log({utxoCounter})
    //   })

      console.log({utxoInWallet});console.log(utxoInWallet)
      const allAddresses = await walletHelper.allAddresses;  console.log({allAddresses});
      const unusedAddresses = await walletAPI.unusedAddresses; console.log({unusedAddresses}) ;
      //getUnusedAddresses(unusedAddresses[0]?.dump());
      const baseAddress = (await walletHelper.baseAddress).toBech32(); console.log({baseAddress});
      console.log({baseAddress});      
      const balanceLovelace = (await walletHelper.calcBalance()).lovelace; console.log({balanceLovelace});
      const balanceAda = (await walletHelper.calcBalance()).lovelace/BigInt(1000000); console.log({balanceAda});
      console.log({balanceAda});
      const collateralAda = (await walletHelper.pickCollateral()).value.lovelace/BigInt(1000000); console.log({collateralAda}) ;
      console.log({collateralAda});
      const mintingPolicyId = utxos[0][0].value.assets.mintingPolicies[0].hex; console.log({mintingPolicyId}) ; 
    //   const assetsAsString = JSON.stringify(new Assets(new Assets(utxos[0][0].value.assets.dump()).assets).dump()); console.log({assetsAsString}) ;
    //   const assetsAsStringArray = assetsAsString.split('},'); console.log({assetsAsStringArray}) ;
    //   let hReadableAssests = '';
    //   const totalAssets = assetsAsStringArray.length ; console.log({totalAssets}) ;
    //   console.log({totalAssets})

    //  for(let i = 0; i < totalAssets; i ++)
    //   {
    //     const data = assetsAsStringArray[i].replace(/{/g,'').replace(/}/g,'').replace('','').split(":"); 
    //     const tokenNameLength = data[1].length;;
    //     if(tokenNameLength > 24)
    //     {
    //       const tempName = "NFT Name : \t\t" + data[3].split(",")[0] + "\r\nQty : \t\t\t" + data[4] + 
    //       "\r\nPolicyId : \t\t" + data[0] + "\r\nAsset Name Encoded : \t" + data[1];
    //       const tempName_ = tempName.replace(/"/g,'');
    //       hReadableAssests += "\r\n\r\n"+tempName_
    //     }
    //     else
    //     {
    //       const tempName = "Token Name : \t\t" + data[3].split(",")[0] + "\r\nQty : \t\t\t" + data[4] + 
    //       "\r\nPolicyId : \t\t" + data[0] + "\r\nAsset Name Encoded : \t" + data[1];
    //       const tempName_ = tempName.replace(/"/g,'');
    //       hReadableAssests += "\r\n\r\n"+tempName_;
    //     }  
    //   };      
    //   console.log({hReadableAssests}); 
    //   const mph = MintingPolicyHash.fromHex(mintingPolicyId); console.log({mph}); 

    //   //tests
    //   jtest("address",address.length,108);
    //   jtest("ada",ada.length,9);
    //   const temp = await walletAPI.utxos; ({temp})
    //   jtest("walletAPI",temp[0].txId.hex,'b49258f836a82c98bf16af444da88e11a40a9eb623345a053d87a885aa8a3008');
    //   const temp2 = await walletHelper.allAddresses;
    //   jtest("walletHelper",temp2[0].toBech32(),'addr_test1qz0hzxlrw5lwspvc9gpqll3ujpxyjmd5uylwqe8xdlt5d82ktxgu9qsyjahc67r53404t42p44vxv8hwhpdscw9l58jqktkm74');
    //   //const temp3:Cip30Wallet = new Cip30Wallet(walletHandleNami);
    //   //jtest("walletHandleNami",temp3,walletAPI);
    //   //test results
      jtrics()
    }
    //addEventListener("DOMContentLoaded", (event) => {
    checkWallet(); 
    //});
 
    
</script>
</head>
<body>

