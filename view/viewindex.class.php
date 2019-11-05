<?php
require_once 'viewabstract.class.php';

class IndexView extends ViewAbstract {
    public function montaCorpo(){
        $html = "<p>"
                . "<h2>"
                . "Bem Vindo ao BirCompany"
                . "</h2>"
                . "</p>";
    
        $this->adicionaNoCorpo($html);
    }
    public function recebeDados() {
        
    }
}
?>