<?php
require_once 'viewabstract.class.php';

class IndexView extends ViewAbstract {
    public function montaCorpo(){
        $html = "<div classe = 'content column'>"
                . "<h4>"
                . "Bem Vindo ao BitCompany"
                . "</h4>"
                . "</div>";
    
        $this->adicionaNoCorpo($html);
    }
    public function recebeDados() {
        
    }
}
?>