<?php

namespace A2\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends Controller

{

    public function indexAction()

    {
        $content = $this->get('templating')->render('A2CoreBundle:Pages:home.html.twig');

        return new Response($content);
    }

}
