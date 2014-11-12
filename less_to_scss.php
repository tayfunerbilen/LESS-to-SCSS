<?php

function blacklist(){
	return Convert::$blacklist;
}

/**
 * less kodlarını scss kodlarına dönüştürür.
 *
 * Class Convert
 */
class Convert {

    /**
     * @var array
     */
    public static $blacklist = array(
        '@import',
        '@charsert'
    );

    /**
     * @param $less_source
     * @return mixed
     */
    public static function less_to_scss($less_source){

        // değişkenleri değiştir
        $less_source = preg_replace_callback('/@([0-9a-zA-Z-_]+)/', function($m){
            if ( !in_array($m[0], blacklist()) ){
                $variable = str_replace('@', null, $m[0]);
                return '$' . $variable;
            }
            return $m[0];
        }, $less_source);

        // tırnak içindeki değişkenleri değiştir
        $less_source = preg_replace('/("|\')\$([0-9a-zA-Z-_]+)("|\')/', '$1#{\$$2}$3', $less_source);
		
        // kullanılan mixinleri değiştir
        $less_source = preg_replace('/\.([0-9a-zA-Z-_]+)\((.*?)\);/', '@include $1($2);', $less_source);

        // mixin oluşturucuları değiştir
        $less_source = preg_replace('/\.([0-9a-zA-Z-_]+)\s?\(/', '@mixin $1(', $less_source);

        return $less_source;

    }

}
