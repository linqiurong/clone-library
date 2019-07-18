<?php
namespace clonelin\library;
/**
 * 日期工具
 * Class DateTime
 * @package clonelin\library
 */
class DateTime {

    public static function getMicroTime(){
        return microtime();
    }

    // 获取当前后多长时间
    public static function getAfterMinutesOfNow($minute){
        $currentTimeStamp = self::getCurrentStamp();
        $afterTimeStamp = $currentTimeStamp + $minute * 60;
        return date("Y-m-d H:i:s",$afterTimeStamp);
    }

    // 获取当前时间戳
    public static function getCurrentStamp(){
        return time();
    }

    // 获取当天日期
    public static function getCurrentDate(){
        return date("Y-m-d");
    }

    // 获取当前时间 时分秒
    public static function getCurrentTime(){
        return date("H:i:s");
    }

    // 获取当前日期时间
    public static function getCurrentDateTime(){
        $timeStamp = self::getCurrentStamp();
        $time = date("Y-m-d H:i:s",$timeStamp);
        return $time;
    }

    // 比较后一个时间与前一个时间相差多少秒
    public static function diffTimeFromTimeStamp($time1,$time2){
        return $time2 - $time1;
    }

    // 比较后一个时间与前一个时间相差多少秒
    public static function diffTimeFromTime($time1,$time2){
        $time1 = strtotime($time1);
        $time2 = strtotime($time2);
        return self::diffTimeFromTimeStamp($time1,$time2);
    }
    // 获取当天开始时间
    public static function getTodayStartTimeStamp(){
        return strtotime(self::getTodayStartTime());
    }
    // 获取当天结束时间
    public static function getTodayEndTimeStamp(){
        return strtotime(self::getTodayEndTime());
    }
    // 获取当天开始时间
    public static function getTodayStartTime(){
        return date("Y-m-d",time());
    }
    // 获取当天结束时间
    public static function getTodayEndTime(){
        return self::getTodayStartTime().' 23:59:59';
    }
}
