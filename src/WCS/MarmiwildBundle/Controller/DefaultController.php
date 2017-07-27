<?php

namespace WCS\MarmiwildBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WCSMarmiwildBundle:Default:index.html.twig');
    }
}
