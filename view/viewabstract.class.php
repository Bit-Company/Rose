<?php

abstract class ViewAbstract{
    
    protected $html1 = null;
    protected $html2 = null;
    protected $corpo = "<div class='corpo'>";
    protected $mensagens = null;
    protected $titulo = null;
    protected $caminho_logo = null;
    protected $nome_empresa =null;
    
    public function __construct($titulo,$caminho_logo,$nome_empresa) {
        $this->titulo = $titulo;
        $this->caminho_logo = $caminho_logo;
        $this->nome_empresa = $nome_empresa;
        
        
        $this->montaHtml1();
        $this->montaHtml2();
    }
    
    public function displayInterface(){
        echo $this->html1.$this->mensagens.$this->corpo.$this->html2;
    }
    
    public function montaHtml1(){
        $this->html1 = "<html><head>"
                . "<link rel='stylesheet' type='text/css' href='./estilo/estilo.css'>"
                . "<title>{$this->titulo}</title></head><body>{$this->montaCabecalho()}{$this->montaMenu()}\n";
    }
    
    public function montaHtml2(){
        $this->html2 = "</div>{$this->montaRodape()}</body></html>\n";
    }
    
    public function adicionaNoCorpo($item){
        $this->corpo .= $item;
    }
    
    public function montaMenu() {
        $html = "";
        $html  .= "<div class='cinza column'><div class='vertical_menu '><ul>"
                . "<a href='./mantemcompra.php'> <li>Compras</li></a>"
                . "<a href='./mantemfuncionarios.php'> <li>Funcionarios</li></a>"
                . "<a href='./mantemestoque.php'> <li>Estoque</li></a>"
                . "<a href='./mantemproducao.php'> <li>Producão</li></a>"
                . "<a href='./mantemvenda.php'> <li>Vendas</li></a>"
                . "<a href='./mantemrelatorios.php'> <li>Relatórios</li></a>"
                . "<a href='./mantemprodutos.php'> <li>Produtos</li></a>"
                . "<a href='./mantemclientes.php'> <li>Clientes</li></a>"
                . "<a href='./mantemfornecedores.php'> <li>Fornecedores</li></a>"
                . "<a href='./mantemajuda.php'> <li>Ajuda</li></a>"
                . "</ul></div></div>";
        return $html;
    }
    
    public function adicionaNasMensagens($mensagens){
        $this->mensagens = $mensagens;
    }
    
    public function montaCabecalho(){
        
        $html = "";
        $html  .= "<div id= 'cabecalho' class='clearfix'>"
                . "<div class='box' style='background-color:#bbb'><div id = 'circle'><img src='{$this->caminho_logo}'></div></div>"
                . "<div class='box' style='background-color:#ccc'><div id = 'nome'><h1>{$this->nome_empresa}</h1></div></div>"
                . "<div class='box' style='background-color:#ddd'><div id = 'sair'><form action='' method = 'POST'>"
                        . "<button type= 'submit' name ='bt' value='sair'>Sair</button>"
                . "</form></div></div>"
                . "<div id = 'divisoria'><hr></hr></div>"
                . "</div>";
        return $html;       
    }
    
    public function montaRodape(){
        $html = ""
                . "<div id = 'rodape'"
                . "<img src='./imagens/logo_BitCompany.png'>"
                . "<h4>Contato: bitcompany.association@gmail.com</h4>"
                . "</div>";
        return $html;
    }
    
    public function getBt(){
        if (isset($_POST['bt'])){
            return $_POST['bt'];
        }else{
            return null;
        }
    }
    
    abstract public function recebeDados();
}

