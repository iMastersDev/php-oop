<?php

/**
 * Classe que ilustra exemplo do ítem
 * 3.1 Membros de Classe e Membros de Instância
 * Exemplo de como utilizar propriedade estática
 * @author Tarcnux
 */
class PessoaStatic {
    private static $nome;
    
    public function __construct($nome) {
        self::$nome = $nome;
    }
    
    public function __destruct() {
        echo "\n<br />Objeto destruído"; 
        self::$nome = null;
    }
    
    public function digaOi() {
        echo "Alo ha, meu nome é ",  self::$nome;
    }       
}

