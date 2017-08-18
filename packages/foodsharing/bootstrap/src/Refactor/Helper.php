<?php
namespace Foodsharing\Platform\Refactor;

class Helper {

    /*
     * Static function to encrypt user passwords in the old version
     */
    public static function encryptMd5($email,$pass)
    {
        $email = strtolower($email);
        return md5($email.'-lz%&lk4-'.$pass);
    }

    /*
     * in some places we need the nulled date
     */
    public static function dbDate($timestamp = false){
        if($timestamp === false) {
            $timestamp = time();
        }

        return date('Y-m-d H:i:s', $timestamp);
    }


}