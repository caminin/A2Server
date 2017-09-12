<?php

namespace A2\CoreBundle\Controller;

use A2\CoreBundle\Entity\Home_4_Columns;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class BorneController extends Controller

{

    public function indexAction(Request $request){
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("A2CoreBundle:Home_4_Columns")
        ;

        $home_4_columns = $repository->findBy(
            array(),
            array('id' => 'DESC'),
            1
        );

        $content = $this->get('templating')->render('A2CoreBundle:Kiosk/Home:4_categories_columns.html.twig', array(
            "entity" => $home_4_columns[0]
        ));

        return new Response($content);

    }

}
