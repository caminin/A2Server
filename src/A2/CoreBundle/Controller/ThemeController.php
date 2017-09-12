<?php

namespace A2\CoreBundle\Controller;

use A2\CoreBundle\Entity\Home_4_Columns;
use A2\CoreBundle\Form\Type\Theme\Home_4_ColumnsType;
use A2\CoreBundle\Form\Type\Theme\ListCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class ThemeController extends Controller

{

    public function indexAction(Request $request){
        $home_4_columns = new Home_4_Columns();

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Categories');

        $listCategories = $repository->findBy(
            array('categoriesIdParent' => null)
        );

        $categories_name=array();

        foreach ($listCategories as $category){
            $categories_array[$category->getCategoriesName()]=$category->getId();
        }

        $formBuilder = $this->get('form.factory')->createBuilder(Home_4_ColumnsType::class, $home_4_columns)
            ->add('categoryLeft', ListCategoryType::class, [
                'choices' => $categories_array,
            ])
            ->add('categoryLeftCenter', ListCategoryType::class, [
                'choices' => $categories_array,
            ])
            ->add('categoryRightCenter', ListCategoryType::class, [
                'choices' => $categories_array,
            ])
            ->add('categoryRight', ListCategoryType::class, [
                'choices' => $categories_array,
            ])
            ->add('save',      SubmitType::class);

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($home_4_columns);
                $em->flush();
                return $this->render('@A2Core/Test/test_categories.html.twig', array(
                    "entity" => $home_4_columns
                ));
            }
        }

        return $this->render('@A2Core/Form/theme_form_view.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
