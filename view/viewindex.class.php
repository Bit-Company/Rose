<?php
require_once 'viewabstract.class.php';

class IndexView extends ViewAbstract {
    public function montaCorpo(){
        $html = "<center><div classe = 'content column'>"
                . "<h4>"
                . "Bem Vindo ao sistema criado e mantido por BitCompany!"
                . "</h4>"
                . "</div><hr></center>";
    
        $this->adicionaNoCorpo($html);
    }
    public function recebeDados() {
        
    }
}
?>