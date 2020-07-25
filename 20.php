<?php
date_default_timezone_set('Asia/denpasar');
include "function2.php";
echo "\n\n\n\n";
echo "\e[7m\e[31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[7m\e[32m▶️ Date&Time    : ".date('[d-m-Y] [H:i:s]')."       \e[0m\n";
echo "\e[7m\e[35m\e[1m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[7m\e[36m\e[1m            MAAF, INI SCRIPT REBUILD           \e[0m\n";
echo "\e[7m\e[35m\e[1m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[7m\e[32m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[7m\e[36m\e[1m                SELAMAT DATANG                 \e[0m\n";
echo "\e[7m\e[32m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[35m\e[1m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[7m\e[31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
echo "\e[7m\e[36m\e[1m▶️ Cara menulis nomor pakai 628xxxxxxx          \e[0m\n";
echo "\e[7m\e[31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo "\e[7m\e[36m\e[1m▶️ Nomor : \e[0m";
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo "\e[7m\e[93m▶️ Kode verifikasi sudah di kirim  \e[0m\n";
        otp:
        echo "\e[7m\e[36m\e[1m▶️ Otp   : \e[0m";
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo "\e[7m\e[32m▶️ Berhasil mendaftar   \e[0m\n";
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\e[7m\e[36m\e[1m▶️ Token : \e[0m".$token."\n\n";
        save("token.txt",$token);
echo "\e[7m\e[31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m";
        echo "\n\e[7m\e[36m\e[1m                 AUTO  REDEEM                  \e[0m\n";
echo "\e[7m\e[31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\e[0m\n";
        echo "\e[7m\e[36m\e[1m▶️ Claim voucher 20+10 \e[0m\n";
        echo  "\e[7m\e[34m\e[2m▶️ Please wait \e[0m";
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo  "\n".("\e[7m\e[32m▶️ ".$message)."\e[0m";
        goto gocar;
        }else{
        gocar:
        echo  "\n"."\e[7m\e[36m\e[1m▶️ Claim Ulang Voucher \e[0m\n";
        echo  "\e[7m\e[34m\e[2m▶️ Please wait \e[0m";
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(5);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo  "\n".("\e[7m\e[32m▶️ ".$message)."\e[0m";
        goto gofood;
        }else{
        gofood:
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
        setpin:
         echo "\n".color("yellow","▶️ SET PIN..!!! BIAR AMAN !!!: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("green","▬▬▬▬▬▬▬▬▬▬▬▬▬▬ PIN MU = 112233 ▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"112233"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }
         }else{
         echo color("red","-] Otp yang anda input salah");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo "\e[7m\e[31m\e[1m!] Silahkan input kembali \e[0m\n";
         goto otp;
         }
         }else{
         echo "\e[7m\e[31m▶️ Nomor salah/terdaftar       \e[0m";
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
         echo "\e[7m\e[31m\e[1m▶️ Silahkan registrasi kembali \e[0m\n";
         goto ulang;
         }
//  }

// echo change()."\n";







