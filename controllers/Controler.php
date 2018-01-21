<?php

require_once 'utils/alert.php';

require 'models/Translator.php';

class Controller
{

    private static $mainUser;


    public static function getLangueInAnyContext(){
        $langue = NULL;
        if(!is_null(self::$mainUser)) {
             $langue = self::$mainUser->getPrefLangue();
             var_dump($langue);
             $langue = Translator::getLanguages()[$langue];
           
         }    
        else { 
            $langue = $_COOKIE['lang']; 
         }         
        return $langue;

    }
    public static function getMainUser(){
        self::$mainUser = $_SESSION['account'];
        return self::$mainUser;
    }

    public function checkIfValidURL()
    {

        $action = filter_input(INPUT_GET, 'action');
        if (is_null($action) || $action = '') Alerte::printAlert(Alerte::INFO, 'Aucune action connue !');

    }

    public function defineDefaultLanguage(){
        if(is_null(self::$mainUser)){
            createCookie('lang', 'Francais', 168);
        }
    }


}