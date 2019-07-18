<?php
namespace clonelin\library;

/**
 * 正则匹配工具
 * Class Regular
 * @package clonelin\library
 */
class Regular {
    // 校验证件号
    public static function checkIDCard($idCardNumber){
        $reg='/^\d{15}$)|(^\d{17}([0-9]|X)$/isu';
        if(preg_match($reg,$idCardNumber)){
            return true;
        }else{
            return false;
        }
    }

    // 手机号校验
    public static function checkMobile($mobile){
        $pregMobile='/^1[34578]\d{9}$/ims';
        if(preg_match($pregMobile,$mobile)){
            return true;
        }else{
            return false;
        }
    }
    // 邮箱校验
    public static function checkEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}