# Cardano Property Solutions

This is the repository for the dApp prototype. This has the following:

A: Information and links

1. [User Requirement Specifications Document](https://github.com/wimsio/cardanopropertysolutions/blob/main/User%20Requirement%20Specifications%20Document.md)
2. dApp Front End design
3. dApp Back End design
4. Source code developed: Front End of the dApp hosted - `https://github.com/wimsio/cardanopropertysolutions at src/frontend
5. Source code developed: Back End of the dApp hosted - `https://github.com/wimsio/cardanopropertysolutions at src/backend && https://github.com/wimsio/cardanopropertysolutions at src/admin
6. [Integrated fully running web application](https://cardanopropertysolutions.co/)
7. [Video showing a fully running application](https://youtu.be/1iKNEkpJh48)

B: Design, Testing and Feedback Videos

1. [Cardano Property Solutions Presentation Bernard Sibanda2024 12 28 23 00 GMT+2](https://youtu.be/vvZ-j3oYiGA)
2. [Cardano Property Solutions testing Thandi 2024 12 17 10 07 GMT+2](https://youtu.be/JtMCTefjujU)
3. [Cardano Property Solutions Delon Rido and Bernard Testing](https://youtu.be/hzTJ7TR92gM)
4. [2024 12 17 #3 Delon Rido and Bernard Testing Cardano Property Solutions](https://youtu.be/zpnnaR3dc_0)
5. [cardano property testing Delon Rido and Bernard Part 2](https://youtu.be/A13v9pEO2pM)
6. [Feedback from John 2024 12 27 16 26 GMT+2](https://youtu.be/uRkzv_CJnQs)
7. [Cardano Property Solutions Presentation John Agriculture Ghana and Botswana 2024 12 27](https://youtu.be/D5ZwEFAYmhw)
8. [Cardano Property Solutions dApp Testing 2024 12 26 21 19 GMT+2](https://youtu.be/e7KPlEJLB3M)
9. [Cardano Property Solutions Feedback and Demo Session ](https://youtu.be/1iKNEkpJh48)
10. [Property Solutions Cardano Smart Contract Design and Development 2024 12 29 #1](https://youtu.be/FxVzyAzZirk)

C: Smart Contract Design and Source Code sample

![image](https://github.com/user-attachments/assets/568fed18-662e-44f5-b582-16e78f2a0946)
![image](https://github.com/user-attachments/assets/b6be5422-fdd9-4b63-88ce-bef94c14c826)
![image](https://github.com/user-attachments/assets/34894a31-519e-4614-ac63-93c3c0e64030)
![image](https://github.com/user-attachments/assets/13bc6eae-9143-42cb-a8a7-3e1a98219f5c)
![onchain helios market smart contract drawio](https://github.com/user-attachments/assets/efa63e99-ced1-412a-8eae-4c2307921800)

Validator Scripts can be viewed here https://github.com/wimsio/cardanopropertysolutions/tree/main/src-29-12-2024/scripts. Below is a sample of Helios Validator for property market place 

```
export const buySellShareTokensMarket =
`
spending buySellShareTokensMarket
/*
Author: Bernard Sibanda
Date: 17-11-2024
Purpose: The purpose of this onchain demo smart contract is to fractionalize and sell property shares as Cardano Tokens
Email: cto@wims.io
*/

//This datum allows updating unit price in lovelace and quantity of tokens acting as shares for property price
struct Datum {
    seller: PubKeyHash 
    nft:AssetClass
    nftQuantity:Int
    nftId:ByteArray
    nftUnitPriceLovelace:Int
    nftTotalPriceLovelace:Int
    
     func update(self, nftUnitPriceLovelace: Int) -> Datum {
        self.copy(nftUnitPriceLovelace: nftUnitPriceLovelace)
    }
    
}

//The smart contract allows sellings,  buying, cancelling and updating share prices onchain
//Each sale is identified by a unique nftid
enum Redeemer {
    Cancel{
        seller:PubKeyHash
        nftId:ByteArray
    }
    Update{
        seller:PubKeyHash
        nftId:ByteArray
        nftUnitPriceLovelace : Int
    }
    Buy{
        buyer: PubKeyHash
        nftId: ByteArray
        nftQuantity:Int
    }

} 

const RUN :Bool = true //This is a switch to allow logging and displaying logic and errors on the front UI

//At the moment the Helios playground lack flexibility leading to duplicate but very useful logging functions
//They can be turned on for debugging and testing and off for optimization
func jlogBool(title:String,variable:Bool)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>"); 
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
} 

func jlogByteArray(title:String,variable:ByteArray)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>"); 
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
} 
func jlogAssetClass(title:String,variable:AssetClass)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogInt(title:String,variable:Int)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogString(title:String,variable:String)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogValue(title:String,variable:Value)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogPKH(title:String,variable:PubKeyHash)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogPKHList(title:String,variable:[]PubKeyHash)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogValHash(title:String,variable:ValidatorHash)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogDatum(title:String,variable:Datum)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
    }
}
func jlogTxOutput(title:String, variable:[]TxOutput)->(){
    if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> "+variable.head.serialize().show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<") 
    }
}

func jlogTxInput(title:String,variable:[]TxInput)->(){
     if(RUN == true){
        print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
        print(">>> Logging : "+title.show());
        print(">>> length : "+variable.length.show());
        print(">>> First Elem data: "+variable.head.serialize().show());
        print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<") 
    }   
}

func main(datum: Datum, redeemer: Redeemer, ctx: ScriptContext) -> Bool {

    tx: Tx = ctx.tx;

    validator_hash: ValidatorHash = ctx.get_current_validator_hash(); jlogValHash("validator_hash",validator_hash);
  
    redeemer.switch 
    {
        
        c:Cancel=>{ 

            jlogByteArray("c nftId",c.nftId);
            
            jlogPKH("c seller",c.seller);
            
            jlogPKH("datum seller", datum.seller);
            
            c.seller == datum.seller
            
            &&
            
            tx.is_signed_by(c.seller)
            
            &&
            
            datum.nftId == c.nftId
        },
        u:Update=>{
        
            jlogPKH(" seller pkh ",u.seller);
            
            jlogPKH(" datum seller ",datum.seller);
            
            jlogByteArray("u nftId",u.nftId);
            
            jlogByteArray("datum nftId",datum.nftId);
            
            jlogInt("datum.nftUnitPriceLovelace",datum.nftUnitPriceLovelace);
            
            jlogInt("u.nftUnitPriceLovelace",u.nftUnitPriceLovelace);
            
            txOutputsContract : []TxOutput = tx.outputs_locked_by(validator_hash);
            
            jlogTxOutput("txOutputsContract",txOutputsContract);
            
            jlogValue("tx.value_locked_by(validator_hash)",tx.value_locked_by(validator_hash));
            
            datumAssetsValue : Value = Value::new(datum.nft, (datum.nftQuantity));
            
            jlogValue("datumAssetsValue",datumAssetsValue);
            
            jlogBool("(tx.value_locked_by_datum(validator_hash).contains(datumAssetsValue))",(tx.value_locked_by(validator_hash).contains(datumAssetsValue)));
            
            newDatum: Datum = datum.update(u.nftUnitPriceLovelace);
            
            jlogDatum("newDatum",newDatum);
            
            jlogBool("(tx.value_locked_by_datum(validator_hash).contains(newDatum))", tx.value_locked_by_datum(validator_hash,newDatum,true).contains(datumAssetsValue));
            
            jlogBool("datum.nftUnitPriceLovelace != u.nftUnitPriceLovelace",datum.nftUnitPriceLovelace != u.nftUnitPriceLovelace);

           
           (tx.value_locked_by_datum(validator_hash,newDatum,true).contains(datumAssetsValue))
           
           &&
           
           datum.nftUnitPriceLovelace != u.nftUnitPriceLovelace

            &&
            
           u.seller == datum.seller
            
            &&
            
            tx.is_signed_by(u.seller)
            
            &&
            
            datum.nftId == u.nftId
              
        },
        b:Buy=>{

            boughtAssets : Value = Value::new(datum.nft, (b.nftQuantity));
            
            jlogValue("boughtAssets",boughtAssets);
            
            jlogInt("tx.value_sent_to(datum.seller).get_lovelace()",tx.value_sent_to(datum.seller).get_lovelace());
            
            jlogBool("tx.value_sent_to(b.buyer).contains(boughtAssets)",tx.value_sent_to(b.buyer).contains(boughtAssets));
            
            jlogByteArray("b.nftId",b.nftId);
            
            jlogByteArray("datum.nftId",datum.nftId);
            
            jlogBool("tx.is_signed_by(b.buyer)",tx.is_signed_by(b.buyer));
            
            jlogInt("datum.nftUnitPriceLovelace ",datum.nftUnitPriceLovelace );

            (tx.value_sent_to(b.buyer).contains(boughtAssets)) 
            
            &&
            
            (b.nftId == datum.nftId) 
            
            && 
            
            tx.is_signed_by(b.buyer)
            
            &&
            
            (tx.value_sent_to(datum.seller).get_lovelace() >= (datum.nftUnitPriceLovelace * b.nftQuantity))

        }
    }

}

`
```

D: Feedback 

Feedback is an ongoing process and is in live sessions and via form completion. You can view some responses below:

a.![Pasted image](https://github.com/user-attachments/assets/11ae3f5d-88d9-4af1-91ee-756ca666e32f)
b. ![pie developers](https://github.com/user-attachments/assets/5caee569-ecd7-40fd-999d-ccc92123f9d3)
c.![Pasted image (3)](https://github.com/user-attachments/assets/bdb6053d-33d5-4616-829f-32bbcf6e9a23)
d.![Pasted image (4)](https://github.com/user-attachments/assets/fd96d9c8-35e1-4dd0-8131-2e33c5969414)
e.![Pasted image (2)](https://github.com/user-attachments/assets/a133b1dc-dd25-4444-abb3-edbfd9e66f3f)
f.![Pasted image (5)](https://github.com/user-attachments/assets/b7f2cbfe-c0ed-4172-a40b-72aa346b353c)

E: Backend Database Schema
![image](https://github.com/user-attachments/assets/713d55f1-ab72-4f4b-976c-b4e2af632854)

F: Live Assistance 

Coxygen Global runs Mondays to Friday from 10:30 am to 16:30pm SAT timezone and anyone can join to learn about Cardano Smart Contract development. Link is : 

https://www.freeconferencecall.com/wall/coxygen/ 
676767

Telegram link:
https://t.me/wimsolutions

Whatsapp link :
https://chat.whatsapp.com/I6y3xrRLMRfAIXQPb1IuU3

Thank you.
------------------------------------------------------------------------By Bernard Sibada [CTO]--------------------------------------------------------











