<?php
namespace clonelin\library;
/**
 * 字符串工具
 * Class String
 * @package clonelin\library
 */
class Strings {
    // 隐藏身份证号
    public static function hiddenIDCard($idCardNumber){
        // 证件号长度
        $idCardNumberLength = strlen($idCardNumber);
        if ($idCardNumberLength >= 7 && $idCardNumberLength < 15) {
            $start = 3;
            $length = 4;
        } elseif($idCardNumberLength < 7 ) {
            $start = 3;
            $length = 3;
        }else{
            $start = 14;
            $length = 4;
        }
        return self::strReplace($idCardNumber,$start,$length);
    }
    // 字符串替换
    public static function strReplace($str, $start, $len, $symbol='*'){
        $end = $start + $len;
        // 截取头保留的字符
        $str1 = mb_substr($str, 0, $start);
        // 截取尾保留的字符
        $str2 = mb_substr($str, $end);
        //  生产要替换的字符
        $symbol_num = '';
        for ($i = 0; $i < $len; $i++) {
            $symbol_num .= $symbol;
        }
        return $str1 . $symbol_num . $str2;
    }
    // 隐藏手机号
    public static function hiddenMobile($mobileNumber){
        return self::strReplace($mobileNumber,3,4);
    }
    // 隐藏邮箱
    public static function hiddenEmail($email){
        $length = strlen($email);
        if($length>2){
            $index = strpos($email,'@');
            $email = self::strReplace($email,3,$index-3);
        }
        return $email;
    }
    // 获取证件号上的生日
    public static function getIDCardBirthday($idCard){
        $num = substr($idCard, 6, 8);
        $time = strtotime($num);
        return date("Y-m-d", $time);
    }
    // 分割地址
    public static function addressSplit($string,$char = '/'){
        $address =  explode($char,$string);
        if(count($address)!=3){
            return false;
        }
        return $address;
    }
}