<?php

namespace Calculadora\OperacionBundle\Tests\Controller;


use PHPUnit_Framework_ExpectationFailedException as PHPUnitException;
use Calculadora\OperacionBundle\Util\Calculadora;

class CalculadoraTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->calculadora = new Calculadora();
	}

    public function testSumaDosOperandos()
    {
    	$resultado = $this->calculadora->hacerSuma(2,2);
 		$this->assertEquals($resultado, 4);
	}

	public function testSumaDosOperandosPorParametro()
	{
		$resultado = $this->calculadora->hacerSuma(5,4);
 		$this->assertEquals($resultado, 9);
	}

	public function testResta()
	{
		$resultado = $this->calculadora->hacerResta(5,3);
		$this->assertEquals($resultado, 2);
	}

	public function testRestaConNegativos()
	{
		$resultado = $this->calculadora->hacerResta(3,5);
		$this->assertEquals($resultado, -2);
	}

	public function testComprobarLimites()
	{
		$calculadora = new Calculadora(-100,100);
		$this->assertEquals($calculadora->getMaximo(), 100);
		$this->assertEquals($calculadora->getMinimo(), -100);
	}
}
