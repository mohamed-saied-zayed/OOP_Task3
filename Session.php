<?php

class Session {

    public static function has($key){
        return isset($_SESSION[$key]);
    }
    public static function get($key){
        return Session::has($key) ? $_SESSION[$key] : null;
    }
    public static function set($key, $value){
        return $_SESSION[$key] = $value;
    }
    public static function remove($key){
        if(Session::has($key)){
            unset($_SESSION[$key]);
        }
    }
    public static function removeAll(){
        session_destroy();
    }
    public static function getAll(){
        return $_SESSION;
    }
    public static function flash($key){
        if(Session::has($key)){
            $value = Session::get($key);
            Session::remove($key);
            return $value;
        }
        return null;
    }
    public static function print($key){
        foreach($key as $value){
            return $value ;
        }
    }
    
}