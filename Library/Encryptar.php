<?php

class Encryptar {

    private static $Key = "agencialanave725518";

    public static function encrypt($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256
                        , md5(Encryptar::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encryptar
                                        ::$Key))));
        return $output;
    }

    public static function decrypt($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encryptar::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Encryptar::$Key))), "\0");
        return $output;
    }

}
