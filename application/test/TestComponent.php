<?php

namespace test;

use PHPUnit_Framework_TestCase;

class TestComponent extends PHPUnit_Framework_TestCase {

      /**
     * @dataProvider listaDeValores
     */
    public function testVerificaNumeroDeComponentes($valor, $esperado)
    {
        $this->assertEquals($esperado, $valor);
    }

    public function listaDeValores()
    {
        return array(
          array(10, 10),
          array(100, 500)
        );
    }
}