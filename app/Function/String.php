<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 11/15/2018
 * Time: 10:36 AM
 */

function cutString($str, $num){
    if($num < strlen($str)){
        $i = $num;
        while($str[$i] != ' '){
            $i--;
            if($i <= 0) return substr($str, 0, $num);
        }
        $subs = substr($str, 0, $i);
        return $subs .'...';
    }

    return $str ;
}