<?php
date_default_timezone_set('Asia/Jakarta');
include "function15.php";
        echo "\n\e[7m\e[31m                 AUTO  REDEEM                  \e[0m\n";
echo "\e[7m\e[36m\e[1m▶️ Token : \e[0m";
$token = trim(fgets(STDIN));
 echo "\e[7m\e[36m▶️ Claim voucher 10+15 \e[0m\n";
        echo  "\e[7m\e[34m\e[2m▶️Please wait \e[0m";
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(10);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo  "\n".("\e[7m\e[32m▶️ ".$message)."\e[0m";
        goto gocar;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        gocar:
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        echo "\n".color("yellow","▶️ Total voucher ".$total." : ");
        echo "\n".color("blue"," 1. ".$voucher1);
        echo "\n".color("blue"," 2. ".$voucher2);
        echo "\n".color("blue"," 3. ".$voucher3);
        echo "\n".color("blue"," 4. ".$voucher4);
        echo "\n".color("blue"," 5. ".$voucher5);
        echo "\n".color("blue"," 6. ".$voucher6);
        echo "\n".color("blue"," 7. ".$voucher7);
        echo "\n".color("blue"," 8. ".$voucher8);
        echo "\n".color("blue"," 9. ".$voucher9);
        echo "\n".color("blue","10. ".$voucher10);
        echo "\n".color("blue","11. ".$voucher11);
        echo "\n".color("blue","12. ".$voucher12);
        echo "\n".color("blue","13. ".$voucher13);
        echo"\n";
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
        $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
        $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');
         }
