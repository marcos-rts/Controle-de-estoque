<?php

class Banco{
    private static $dbNome = 'Con-Estoque';
    private static $dbHost = 'localhost';
    private static $dbPort = '3307'; // Defina a porta personalizada aqui
    private static $dbUsuario = 'user.estoque';
    private static $dbSenha = 'root';

    private static $cont = null;

    public function __construct(){
        die('A função Init não é permitido!');
    }

    public static function conectar(){
        if (null == self::$cont) {
            try {
                $dsn = "mysql:host=" . self::$dbHost . ";port=" . self::$dbPort . ";dbname=" . self::$dbNome;
                self::$cont = new PDO($dsn, self::$dbUsuario, self::$dbSenha);
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar(){
        self::$cont = null;
    }
}
?>