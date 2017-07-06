<?php
namespace Calculadora\OperacionBundle\Util;

class Calculadora 
{
	private $minimo = -100;
	private $maximo = 100;

	public function hacerSuma($operando1, $operando2)
	{
		return $operando1 + $operando2;
		
	}

	public function hacerResta($operando1, $operando2)
	{
		return $operando1 - $operando2;
	}

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