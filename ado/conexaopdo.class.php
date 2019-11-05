<?php

final class ConexaoPdo {
    
    private function __construct() {
    }
    
    static function open ($servidor, $bdName, $usuario, $senha, $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) {
        $servidor = "mysql:host={$servidor};dbname={$bdName}; charset=utf8";
        try {
            $conexao = new PDO($servidor, $usuario, $senha, $opcoes);
        } catch (Exception $ex) {
            throw new Exception("Ocorreu um erro na conexão: " . $ex->getMessage());
        }
        
        return $conexao;
    }
    
}
