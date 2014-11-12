<?php

/**
 * .less dosyasını scss kurallarına uygun olarak .scss dosyasına çevirir.
 *
 * @param $file
 * @return mixed
 */
function less_to_scss( $file ){

    // değiştirilmeyecek değişken karalistesi
    $blacklist = array(
        '@import',
        '@charsert'
    );

    // değişkenleri değiştir
    $file = preg_replace_callback('/@([0-9a-zA-Z-_]+)/', function($m){
        global $blacklist;
        if ( !in_array($m[0], $blacklist) ){
            $variable = str_replace('@', null, $m[0]);
            return '$' . $variable;
        }
        return $m[0];
    }, $file);

    // tırnak içindeki değişkenleri değiştir
    $file = preg_replace('/("|\')\$([0-9a-zA-Z-_]+)("|\')/', '$1#{\$$2}$3', $file);

    // mixin oluşturucuları değiştir
    $file = preg_replace('/\.([0-9a-zA-Z-_]+)\s+\(/', '@mixin $1(', $file);

    // kullanılan mixinleri değiştir
    $file = preg_replace('/\.([0-9a-zA-Z-_]+)\(/', '@include $1(', $file);

    return $file;

}
