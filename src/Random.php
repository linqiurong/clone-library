<?php

namespace clonelin\library;

use clonelin\library\library\RandomTypeEnum;
/**
 * 随机数工具
 * Class Random
 * @package clonelin\library
 */
class Random{
    // 数字与字母 不包括 l L 与 i I
    public static function alphabetAndNumber($length = 8){
        return self::build(RandomTypeEnum::ALPHABET_AND_NUMBER,$length);
    }
    // 字母 不包括 l L 与 i I
    public static function alphabet($length = 8){
        return self::build(RandomTypeEnum::ALPHABET,$length);
    }
    // 数字
    public static function number($length = 8){
        return self::build(RandomTypeEnum::NUMBER,$length);
    }
    // uuid
    public static function uuid(){
        return self::build(RandomTypeEnum::UUID);
    }
    // Unique
    public static function unique(){
        return self::build(RandomTypeEnum::UNIQUE);
    }
    // 生成规则
    private static function build($type,$length = 8,$include = false){
        // 数字 字母 或 数字与字母
        if(in_array($type,[RandomTypeEnum::ALPHABET_AND_NUMBER,RandomTypeEnum::ALPHABET,RandomTypeEnum::NUMBER])){
            switch ($type) {
                case RandomTypeEnum::ALPHABET:{
                    $pool = $include ? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' : 'abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ';
                    break;
                }// 字母
                case RandomTypeEnum::NUMBER:{
                    $pool = '0123456789';
                    break;
                } // 数字
                case RandomTypeEnum::ALPHABET_AND_NUMBER:{
                    $pool =  $include ? '0123456789abcdefgihjklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ': '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ';
                    break;
                }// 数字
            }
            return substr(str_shuffle(str_repeat($pool, ceil($length / strlen($pool)))), 0, $length);
        }else{
            switch ($type){
                case RandomTypeEnum::UNIQUE: {
                    return md5(uniqid(mt_rand()));
                }
                case RandomTypeEnum::UUID:{
                    $charID = strtoupper(md5(uniqid(mt_rand(), true)));
                    $hyphen = chr(45); // "-"
                    $uuid = substr($charID, 6, 2) . substr($charID, 4, 2) .
                        substr($charID, 2, 2) . substr($charID, 0, 2) . $hyphen .
                        substr($charID, 10, 2) . substr($charID, 8, 2) . $hyphen .
                        substr($charID, 14, 2) . substr($charID, 12, 2) . $hyphen .
                        substr($charID, 16, 4) . $hyphen . substr($charID, 20, 12);
                    return $uuid;
                }
            }
        }
    }
}