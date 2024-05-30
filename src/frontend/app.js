/*****
 * Title : Cardano Property Soltuions : Tokenization and Fractionalization
 * Description : This is a web3 Cardano based real estate application based on the most popular php, mysql, html, css, bootstrap, js, jquery. The primary focus is to prototype Cardano integration 
 * with real life use cases and show case endless usage opportunities for developers and ordinary users.
 * Authors : Suraj Kumar Vishwakarma, Bernard Sibanda
 * Github : https://github.com/wimsio/cardanopropertysolutions, https://cardanopropertysolutions.co, https://github.com/suraj25809/Real-Estate-Php
 * Date : 2021 - 2024
 * Licence : MIT
 * Communication Channels : cto@wims.io, admin@cardanopropertysolutions.co
 * Company : Women In Move Solutions
 * Libraries : jimba.js, helios.js
 *****/
let balance = "";
let wallet = "";
let network = "";

import {Assets as Asst,Assets, Address,ConstrData, HeliosData,AssetClass, Cip30Wallet,
    HInt, ByteArrayData, hexToBytes, WalletHelper, NetworkParams, Value,
    TxOutput,Tx, MintingPolicyHash,BlockfrostV0, Token} from "https://helios.hyperion-bt.org/0.16.6/helios.js";
    import {opt,j,gRValue,jtrics} from "./js/jimba.js";
    
    opt._R = 0;           //run all
    opt._O = 1;           //run o() function calls
    opt._M = 0;           //show stack frames for objects
    opt._F = 0;           //run functions
    opt._T = 1;           //jtest, jj, jescribe i.e. tests
    opt._FailsOnly = 0;   //run only failing tests
    opt._Ob = 1;          //show stack frames

    const checkWallet = async () => { 

    let networkType_ = 0;
    
    let walletAPI = null;
   
    if (typeof window.cardano == 'undefined' || typeof window.cardano.nami == 'undefined') {
        
        if (typeof window.cardano == 'undefined' || typeof window.cardano.eternl == 'undefined') {
            
             if (typeof window.cardano == 'undefined' || typeof window.cardano.lace == 'undefined') {
                
            }
            else
            {
                const walletHandleLace= await window.cardano.lace.enable(); 
                
                wallet = "Lace : ";
                
                networkType_ = await walletHandleLace.getNetworkId(); j.log({networkType_});
                
                walletAPI = await new Cip30Wallet(walletHandleLace); console.log({walletAPI});
            }  
        }
        else
        {
            const walletHandleEternl = await window.cardano.eternl.enable(); 
            
            wallet = "Eternl : ";
            
            networkType_ = await walletHandleEternl.getNetworkId(); j.log({networkType_});
            
            walletAPI = await new Cip30Wallet(walletHandleEternl); j.log({walletAPI});
        }
    }
    else
    {
        const walletHandleNami = await window.cardano.nami.enable(); 
        
        wallet = "Nami : ";
        
        networkType_ = await walletHandleNami.getNetworkId(); j.log({networkType_});
        
        walletAPI = await new Cip30Wallet(walletHandleNami); j.log({walletAPI});

    }
      if (networkType_ == 1) {
          alert("Sorry this dApp is for testing. Change network to preprod. Open Nami wallet, then click the icon, select settings, then chose network and finally select preprod")
          
      } else {
          network = "Preprod/Preview";
      }
      
      if(wallet !="")
      {

          const walletHelper = new WalletHelper(walletAPI); j.log({walletHelper});
    
          const utxos = await walletHelper.pickUtxos(new Value(BigInt(10_000_000)));  j.log({utxos}); 
          
          const utxosZeroElement = utxos[0];  j.log({utxosZeroElement});
          
          const txId = utxos[0][0].txId.hex; j.log({txId});
          
          let utxoInWallet = "";
          
          let utxoCounter = 1;

          j.log({utxoInWallet});
          
          const allAddresses = await walletHelper.allAddresses;  j.log({allAddresses});
          
          const unusedAddresses = await walletAPI.unusedAddresses; j.log({unusedAddresses}) ;

          const baseAddress = (await walletHelper.baseAddress).toBech32(); j.log({baseAddress});
               
          const balanceLovelace = (await walletHelper.calcBalance()).lovelace; console.log({balanceLovelace});
          
          const balanceAda = (await walletHelper.calcBalance()).lovelace/BigInt(1000000); j.log({balanceAda});
          
           
          const collateralAda = (await walletHelper.pickCollateral()).value.lovelace/BigInt(1000000); j.log({collateralAda}) ;

          const shortAddress = baseAddress.slice(0,10) +"..."+ baseAddress.substr(baseAddress.length - 5);
          
          document.getElementById("cardanoInformation").innerHTML = "<span style='color:lightgreen'>Wallet : </span>"+ wallet + ", <span style='color:lightgreen'>Balance :</span> " + balanceAda.toString() + 
          " tADA <br> <span style='color:lightgreen'>Address : </span> "+ shortAddress + " <span style='color:lightgreen'>Network</span> : "+network;
      }
      else
      {
         document.getElementById("cardanoInformation").innerHTML = "<span style='color:red;'>Cardano wallet was not found on this browser. "+
         "Add Nami/Eternl/Lace to this browser, enable it and set it to Preprod network. Thank you.</span>"; 
      }
      
      jtrics()
    }

 addEventListener("DOMContentLoaded", (event) => {
      checkWallet(); 
 });
    
