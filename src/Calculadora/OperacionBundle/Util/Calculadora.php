<?php
namespace Calculadora\OperacionBundle\Util;

class Calculadora 
{
	private $minimo = -100;
	private $maximo = 100;

	public function validarOperacion($cadena)
	{
		$patron = "/^-{0,1}\d+((\s+)[+\/*-](\s+)-{0,1}\d+)+$/";
		if(preg_match($patron, $cadena))return true;
	}

	public function hacerSuma($operando1, $operando2)
	{
		$resultado = $operando1 - $operando2;
		$valida = $this->comprobarRangosOperandos($operando1, $operando2);
		if($valida) return $operando1 + $operando2;
	}

	public function hacerResta($operando1, $operando2)
	{
		$resultado = $operando1 - $operando2;
		$valida = $this->comprobarRangosOperandos($operando1, $operando2);
		if($valida) return $operando1 - $operando2;
	}

	public function comprobarRangosOperandos($operando1, $operando2){
		if($operando1 < $this->getMinimo() || $operando1 > $this->getMaximo() || $operando2 < $this->getMinimo() || $operando2 > $this->getMaximo()) return false;
		return true;
	}

	public function comprobarRangoResultado($resultado){
		if($resultado < $this->getMinimo() || $resultado > $this->getMaximo()) return false;
		throw new Exception("Error Processing Request", 1);
		
		return true;
	}

	public function separarCadena($cadena)
	{
		$tokens = explode(" ", $cadena);
		return $tokens;
	}

	/*public function realizarOperacion($cadena)
	{
		$operacion = 0;
		for ($i=1; $i < count($cadena)-1; $i = $i + 2) { 
			$op = $this->hacerSuma($cadena[$i-1],$cadena[$i+1]);
			$operacion += $op;
			
		}
		return $operacion;
	}*/

	/**
     * @return mixed
     */
    public function getMinimo()
    {
        return $this->minimo;
    }

    /**
     * @param mixed $minimo
     *
     * @return self
     */
    public function setMinimo($minimo)
    {
        $this->minimo = $minimo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaximo()
    {
        return $this->maximo;
    }

    /**
     * @param mixed $maximo
     *
     * @return self
     */
    public function setMaximo($maximo)
    {
        $this->maximo = $maximo;

        return $this;
    }
}