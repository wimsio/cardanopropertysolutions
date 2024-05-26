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
    
        //   const newUtxo = await utxos[0].map((v)=>{
        //     const assetsFromUtxo  = new Assets(new Assets(v.value.assets.dump()).assets).dump(); j.log({assetsFromUtxo});
        //     utxoInWallet += "UTXO "+ utxoCounter + "\r\n\r\n";
        //     utxoInWallet += "UTXO txId(hashed Id) \t" + v.txId.dump() +"\r\n" +
        //     "UTXO utxoIdx(Index) \t" + v.utxoIdx.toString() +"\r\n" +
        //     "UTXO value lovelace \t" + v.value.lovelace.toLocaleString()  +"\r\n" +
        //     "UTXO value assets  \r\n" + assetsDisplayString(assetsFromUtxo);
        //     utxoInWallet += "\r\n\r\n ====================================== \r\n\r\n";
        //     utxoCounter++;j.log({utxoCounter})
        //   })
    
          j.log({utxoInWallet});
          
          const allAddresses = await walletHelper.allAddresses;  j.log({allAddresses});
          
          const unusedAddresses = await walletAPI.unusedAddresses; j.log({unusedAddresses}) ;
          
          //getUnusedAddresses(unusedAddresses[0]?.dump());
          
          const baseAddress = (await walletHelper.baseAddress).toBech32(); j.log({baseAddress});
               
          const balanceLovelace = (await walletHelper.calcBalance()).lovelace; console.log({balanceLovelace});
          
          const balanceAda = (await walletHelper.calcBalance()).lovelace/BigInt(1000000); j.log({balanceAda});
          
           
          const collateralAda = (await walletHelper.pickCollateral()).value.lovelace/BigInt(1000000); j.log({collateralAda}) ;
         
          //const mintingPolicyId = utxos[0][0].value.assets.mintingPolicies[0].hex; j.log({mintingPolicyId}) ;
          
          const shortAddress = baseAddress.slice(0,10) +"..."+ baseAddress.substr(baseAddress.length - 5);
          
          document.getElementById("cardanoInformation").innerHTML = "<span style='color:lightgreen'>Wallet : </span>"+ wallet + ", <span style='color:lightgreen'>Balance :</span> " + balanceAda.toString() + 
          " tADA <br> <span style='color:lightgreen'>Address : </span> "+ shortAddress + " <span style='color:lightgreen'>Network</span> : "+network;
      }
      else
      {
         document.getElementById("cardanoInformation").innerHTML = "<span style='color:red;'>Cardano wallet was not found on this browser. "+
         "Add Nami/Eternl/Lace to this browser, enable it and set it to Preprod network. Thank you.</span>"; 
      }
      
    
        //   const assetsAsString = JSON.stringify(new Assets(new Assets(utxos[0][0].value.assets.dump()).assets).dump()); j.log({assetsAsString}) ;
        //   const assetsAsStringArray = assetsAsString.split('},'); j.log({assetsAsStringArray}) ;
        //   let hReadableAssests = '';
        //   const totalAssets = assetsAsStringArray.length ; j.log({totalAssets}) ;
        //   j.log({totalAssets})
    
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
        //   j.log({hReadableAssests}); 
        //   const mph = MintingPolicyHash.fromHex(mintingPolicyId); j.log({mph}); 
    
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

 addEventListener("DOMContentLoaded", (event) => {
      checkWallet(); 
 });
    
