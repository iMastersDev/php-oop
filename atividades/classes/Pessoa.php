<?php
/**
 * Classe que ilustra exemplo do ítem
 * 3.1 Membros de Classe e Membros de Instância
 *
 * @author Tarcnux
 */
class Pessoa {
    private $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function __destruct() {
        echo "\n<br />Objeto destruído"; 
        $this->nome = null;
    }


    public function digaOi() {
        echo "Alo ha, meu nome é ",  $this->nome;
    }       
}
