<?php

namespace App\Library;

class Helper {

    public static function test() {
        return "test";
    }

    public static function searchForKey($keyy, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$keyy] == $value) {
                return TRUE;
            }
        }
        return FALSE;
    }

}

?>