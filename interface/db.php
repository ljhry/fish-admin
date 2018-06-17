<?php
//单例模式
class Db{
    static private $_instance;
    static private $_connectSource;
    private function _construct(){
    }
    static public function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function connect(){
        if(!self::$_connectSource){
            self::$_connectSource = mysqli_connect("localhost","root","12345678","myfishtank");
            if(!self::$_connectSource){
                die('mysql-connect-error'.mysql_error());
            }
            mysqli_set_charset(self::$_connectSource, "utf8");
        } 
        return self::$_connectSource;
    }
}
