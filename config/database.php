<?php

// Definição da classe Banco
class Banco {
    // Declaração das propriedades estáticas privadas para armazenar informações de conexão ao banco de dados
    private static $dbNome = 'Con-Estoque'; // Nome do banco de dados
    private static $dbHost = 'localhost'; // Endereço do host (servidor) do banco de dados
    private static $dbPort = '3307'; // Porta personalizada para conexão com o banco de dados
    private static $dbUsuario = 'user.estoque'; // Nome do usuário do banco de dados
    private static $dbSenha = 'root'; // Senha do usuário do banco de dados

    // Declaração de uma variável estática privada para armazenar a conexão com o banco de dados
    private static $cont = null;

    // Construtor privado para evitar a instância da classe diretamente
    public function __construct() {
        // Se alguém tentar instanciar esta classe, a execução é interrompida com a mensagem abaixo
        die('A função Init não é permitido!');
    }

    // Método estático para conectar ao banco de dados
    public static function conectar() {
        // Verifica se a conexão ainda não foi estabelecida
        if (null == self::$cont) {
            try {
                // Monta a string de conexão (DSN) usando as informações de host, porta e nome do banco de dados
                $dsn = "mysql:host=" . self::$dbHost . ";port=" . self::$dbPort . ";dbname=" . self::$dbNome;
                // Cria uma nova instância de PDO para conexão com o banco de dados
                self::$cont = new PDO($dsn, self::$dbUsuario, self::$dbSenha);
            } catch (PDOException $exception) {
                // Em caso de erro na conexão, exibe a mensagem de erro e interrompe a execução
                die($exception->getMessage());
            }
        }
        // Retorna a conexão estabelecida
        return self::$cont;
    }

    // Método estático para desconectar do banco de dados
    public static function desconectar() {
        // Define a variável de conexão como null, encerrando a conexão com o banco de dados
        self::$cont = null;
    }
}
?>