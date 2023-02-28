<?php
namespace Core;
abstract class Config
{
    protected function configAdm()
    {
        define('URL','http://localhost/pooUDEMY/SISTEMA_ADM/');
        define('URLADM','http://localhost/pooUDEMY/SISTEMA_ADM/');
    
        define('CONTROLLER', 'Login');
        define('METODO', 'Index');
        define('CONTROLLERERRO', 'Erro');

       
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS','');
        define('DBNAME','sistema_adm');
        define('PORT',3306);
        

        define('ADMEMAIL', 'brayanwosch@gmail.com');
        
       
    }
}