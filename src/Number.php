<?php
namespace clonelin\library;

/**
 * 数字工具
 * Class Number
 * @package clonelin\library
 */
class Number {
    // 随机几位数据如果
    public static function zeroFillOfNumber($length,$number){
        $length = $length > count_chars($number) ? $length : count_chars($number);
        $number = sprintf("%0{$length}d", $number);
        return $number;
    }

    // 业务号
    public static function businessNumber($prefix = '',$subfix=''){
        $number = date("YmdHis",time());
        return $prefix.$number.$subfix;
    }
}
