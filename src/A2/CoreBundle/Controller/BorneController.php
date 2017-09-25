<?php

namespace A2\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class BorneController extends Controller

{

    public function indexAction(Request $request){
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("A2CoreBundle:Home4Columns")
        ;

        $home4columns = $repository->findBy(
            array(),
            array('id' => 'DESC'),
            1
        );

        $content = $this->get('templating')->render('A2CoreBundle:Kiosk/Home:4_categories_columns.html.twig', array(
            "entity" => $home4columns[0]
        ));

        return new Response($content);

    }


    public function contentAction(Request $request){

        //Récupérer le contenu du thème
        $repository_contentRestaurant = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("A2CoreBundle:ContentRestaurant")
        ;

        $contentrestaurant = $repository_contentRestaurant->findBy(
            array(),
            array('id' => 'DESC'),
            1
        );

        //récupérer le contenu des catégories
        $repository_category = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Categories');

        $listCategories = $repository_category->findBy(
            array('categoriesIdParent' => null)
        );

        $full_list_categories=$repository_category->findAll();

        $activated=$repository_category->find($request->attributes->get("category"));

        //récupérer les fichiers à afficher
        $repository_files = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Files')
        ;

        $childs=array();
        $files=array();

        foreach($listCategories as $category){
            $result=$repository_files->findBy(
                array('filesCategory' => $category->getId()),
                array('id' => 'DESC'),
                1
            );
            if(count($result) > 0){
                $files[$category->getId()]= $result[0];
            }
            $array_childs=array();
            foreach($full_list_categories as $all_category){
                if($all_category->getCategoriesIdParent() == $category){
                    $array_childs[]=$all_category;
                    $result=$repository_files->findBy(
                        array('filesCategory' => $all_category->getId()),
                        array('id' => 'DESC'),
                        1
                    );
                    if(count($result) > 0){
                        $files[$all_category->getId()]= $result[0];
                    }
                }
            }
            if(count($array_childs) === 0 ){
                $array_childs=null;
            }
            $childs[$category->getId()]=$array_childs;
        }

        $content = $this->get('templating')->render('A2CoreBundle:Kiosk/Content:restaurant.html.twig', array(
            "entity" => $contentrestaurant[0],
            "categories" => $listCategories,
            "childs" => $childs,
            "activated" =>$activated,
            "files" => $files,
        ));

        return new Response($content);
    }

}
