<?php

namespace Calculadora\OperacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Calculadora\OperacionBundle\Util\Calculadora;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	//$calc = $this->container->get('mi.calculadora')->hacerSuma();
    	$c = $this->container->get('mi.calculadora');
    	$calc =  $c->hacerResta(5,6);
    	return $this->render('OperacionBundle:Default:index.html.twig', array('result' => $calc));
    }
}
