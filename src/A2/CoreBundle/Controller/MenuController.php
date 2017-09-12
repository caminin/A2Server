<?php

namespace A2\CoreBundle\Controller;


use A2\CoreBundle\Entity\Menus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class MenuController extends Controller

{

    public function createByList($list){
        $list_string=explode("/",$list);
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Menus')
        ;
        foreach($list_string as $string){
            $menu_element=$repository->findOneBy(
                array('menusLabel' => $string) // Critere
            );
            if($menu_element!=null){
                $list_menu[]=$menu_element;
            }

        }
        return $list_menu;
    }
    public function indexAction()

    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Parameters')
        ;

        $menus_string = $repository->findOneBy(
            array('parametersLabel' => 'Menus') // Critere
        );

        $menus=$this->createByList($menus_string->getParametersValue());

        $content = $this->get('templating')->render('A2CoreBundle:Layout:menu_layout.html.twig', array(
            'content' => $menus
        ));

        return new Response($content);
    }


    public function insert(){
        $menus = new Menus();

        $menus->setMenusName("Paramètres");
        $menus->setMenusLabel("Par");
        $menus->setMenusIcon("fa-files-o");
        $menus->setMenusPath("a2_core_settings");
        $menus->setMenusParent("");

        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Étape 1 : On « persiste » l'entité
        $em->persist($menus);

        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
    }

}
