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
		$resultado = $this->calculadora->hacerResta(100,3);
		$this->assertEquals($resultado, 97);
	}

	public function testRestaConNegativos()
	{
		$resultado = $this->calculadora->hacerResta(3,5);
		$this->assertEquals($resultado, -2);
	}

	public function testMultiplica()
	{
		$resultado = $this->calculadora->hacerMultiplica(50,3);
		$this->assertEquals($resultado, 150);
	}

	public function testDivide()
	{
		$resultado = $this->calculadora->hacerDivide(4,2);
		$this->assertEquals($resultado, 2);
		$resultado = $this->calculadora->hacerDivide(3,2);
		$this->assertEquals($resultado, 1.5);
	}

	

	public function testComprobarLimites()
	{
		$this->assertEquals($this->calculadora->getMaximo(), 100);
		$this->assertEquals($this->calculadora->getMinimo(), -100);
	}

	public function testComprobarRangosOperandos()
	{
		$resultado = $this->calculadora->comprobarRangosOperandos(200,5);
		$this->assertEquals($resultado, false);
		$resultado = $this->calculadora->comprobarRangosOperandos(5,-200);
		$this->assertEquals($resultado, false);
		$resultado = $this->calculadora->comprobarRangosOperandos(5,-5);
		$this->assertEquals($resultado, true);
	}

	public function testComprobarRangoResultado()
	{
		$resultado = $this->calculadora->comprobarRangoResultado(110);
		$this->assertEquals($resultado, false);
	}

	public function testSepararCadena()
	{
		$cadena = $this->calculadora->separarCadena("2 + 2 - 6");
		$this->assertCount(5, $cadena);
	    $this->assertEquals($cadena[0],"2");
	    $this->assertEquals($cadena[1],"+");
	    $this->assertEquals($cadena[2],"2");
	    $this->assertEquals($cadena[3],"-");
	    $this->assertEquals($cadena[4],"6");
	}

	public function testValidarOperacion()
	{
		$cadena = $this->calculadora->validarOperacion("-2 + 2 - 65656");
		$this->assertEquals($cadena, true);
		$cadena = $this->calculadora->validarOperacion("**2 + 5");
		$this->assertEquals($cadena, false);
	}

	public function testRealizarOperacion()
	{
		$cadena = array("1", "+", "2", "-", "3", "*", "7");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, 0);

		$cadena = array("1", "-", "2", "-", "3", "*", "7");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, -28);

		$cadena = array("1", "*", "2", "*", "3", "*", "7");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, 42);

		$cadena = array("1", "-", "2", "+", "3", "*", "7");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, 14);

		$cadena = array("5", "+", "4", "*", "2");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, 18);

		$cadena = array("5", "+", "4", "*", "2", "/", "4");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, 4.5);

		$cadena = array("-2", "+", "2");
		$operacion = $this->calculadora->realizarOperacion($cadena);
		$this->assertEquals($operacion, 0);
	}

	public function testIdentificarOperacion()
	{
		$operacion = $this->calculadora->identificarOperacion('1', '3', '-');
		$this->assertEquals($operacion, -2);
		$operacion = $this->calculadora->identificarOperacion('5', '8', '+');
		$this->assertEquals($operacion, 13);
		$operacion = $this->calculadora->identificarOperacion('4', '3', '*');
		$this->assertEquals($operacion, 12);
	}

	public function testEsOperador()
	{
		$operacion = $this->calculadora->esOperador("+");
		$this->assertEquals($operacion, true);
		$operacion = $this->calculadora->esOperador("*");
		$this->assertEquals($operacion, true);
		$operacion = $this->calculadora->esOperador("-");
		$this->assertEquals($operacion, true);
		$operacion = $this->calculadora->esOperador("/");
		$this->assertEquals($operacion, true);
	}


}
