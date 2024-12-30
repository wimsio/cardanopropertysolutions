export const scriptForMintingUserSharesToken  = 
`
  minting scriptForMintingUserSharesToken

            enum Redeemer { 
                Mint {
                    txId: ByteArray
                    txIdx: Int
                    qty:Int
                }
            }
            
            const RUN : Bool = true
            
            func jlogByteArray(title:String,variable:ByteArray)->(){
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
            func jlogBool(title:String,variable:Bool)->(){
                if(RUN == true){
                    print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
                    print(">>> Logging : "+title.show());
                    print(">>> "+variable.show());
                    print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
                }
            }
            func jlogPubKeyHash(title:String,variable:PubKeyHash)->(){
                if(RUN == true){
                    print(">>>>>>>>>>>>>>>>>>>>>>>>>>>>");
                    print(">>> Logging : "+title.show());
                    print(">>> "+variable.show());
                    print("<<<<<<<<<<<<<<<<<<<<<<<<<<<<")
                }
            }

            const TN: ByteArray = #

            const ownerPKH: PubKeyHash = PubKeyHash::new(#)

            func main(redeemer: Redeemer, ctx: ScriptContext) -> Bool {

                tx: Tx = ctx.tx;
                
                value_minted: Value = tx.minted;
                
                mph: MintingPolicyHash = ctx.get_current_minting_policy_hash();
                
                jlogByteArray("TN",TN);
                
                jlogPubKeyHash("ownerPKH",ownerPKH);
                
                redeemer.switch {
                
                    red: Mint => {
                    
                    if(red.qty >= 1)
                    {
                    
                        jlogInt("red qty",red.qty);
                        
                        assetclass: AssetClass = AssetClass::new(mph, TN);
                        
                        jlogAssetClass("assetclass",assetclass);
                        
                        jlogValue("value_minted",value_minted);
                        
                        jlogValue("Value::new(assetclass, red.qty)",Value::new(assetclass, red.qty));
                        
                        jlogBool("value_minted == Value::new(assetclass, red.qty)",value_minted == Value::new(assetclass, red.qty));
                        
                        jlogBool("tx.is_signed_by(ownerPKH)",tx.is_signed_by(ownerPKH) );
                        
                        (value_minted == Value::new(assetclass, red.qty)) 
                        
                        &&
                        
                        tx.is_signed_by(ownerPKH) 
                  
                    }
                    else
                    {
                        tx.minted.get_policy(mph).all( (_, amount: Int) -> Bool { amount == -1})
                       
                    }
                        
                    }
                } 
            }

`