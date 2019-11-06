<?php
require_once './view/viewindex.class.php';
require_once './ado/indexado.class.php';
class IndexController{
    private $indexView = null;
    private $indexAdo = null;
    private $caminho_logo = null;
    private $nome = null;


    public function __construct() {
        
        $this->indexAdo = new IndexAdo();
        $this->buscaNomeImg();
        $this->indexView = new IndexView("BitCompany", $this->caminho_logo, $this->nome);
        
        $this->indexView->montaCorpo();
        $this->indexView->displayInterface();
        
    }
    public function buscaNomeImg(){
        $busca = $this->indexAdo->BuscaCabecalho();
        if($busca){
            $this->caminho_logo = $busca->caminho_logomarca;
            $this->nome = $busca->nome;
        }else{
            $this->indexView->adicionaNasMensagens("Não foi possivel buscar determinados dados do usuario");
            $this->indexView->adicionaNasMensagens($this->indexAdo->getMensagem());
        }
                
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

