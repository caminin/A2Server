<?php

namespace A2\CoreBundle\Controller;

use A2\CoreBundle\Entity\Files;
use A2\CoreBundle\Form\FilesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller

{

    public function getListCategoriesInsideAction(Request $request){
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Categories')
        ;


        $idParent=$request->request->get('category');

        $listCategories = $repository->findBy(
            array('categoriesIdParent' => $idParent)
        );

        return new JsonResponse(array(
            'categories' => $listCategories
            )
        );

    }

}
