<?php
require_once 'conexaopdo.class.php';

abstract class adoabstract {
    protected $conexaoPdo = null;
    protected $pdoStatement = null;
    private $mensagem = null;

    public function __construct() {
        try {
            $this->conexaoPdo = ConexaoPdo::open("localhost", "ROSEBD", "root", "");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    protected function executaInstrucao($instrucao) {
        $preparou = false;
        try {
            $preparou = $this->pdoStatement = $this->conexaoPdo->prepare($instrucao);
            if ($preparou) {
                //continua
            } else {
                $mens = $this->conexaoPdo->errorInfo();
                $this->setMensagem("Ocorreu um preparação da instrução sql: " . $mens[2]);
                return false;
            }
        } catch (PDOException $e) {
            $this->setMensagem("Erro na preparação da instrução sql: " . $e->getMessage());
            return false;
        }

        $executou = false;
        try {
            $executou = $this->pdoStatement->execute();
            if ($executou) {
                //continua
            } else {
                $mens = $this->pdoStatement->errorInfo();
                $this->setMensagem("Ocorreu um execução da instrução sql: " . $mens[2]);
                return false;
            }
        } catch (PDOException $e) {
            $this->setMensagem("<br>Erro na execução: " . $e->getMessage());
            return false;
        }
        return true;
    }
    
    public function getMensagem() {
        return $this->mensagem;
    }
    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }
    public function BuscaCabecalho() {
        echo "Passei";
        $instrucao = "select caminho_logomarca,nome from Usuario where cnpj = 666666";
        $executou = parent::executaInstrucao($instrucao);
        echo "Foi1";
        if ($executou) {
            echo "Foi 2";
            if ($this->pdoStatement->rowCount() === 0) {
                return 0;
            }
        } else {
            return false;
        }

        $obj = $this->pdoStatement->fetch(PDO::FETCH_OBJ);
        echo $obj->nome;
        return $obj;
    }
}
