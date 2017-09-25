<?php

namespace A2\CoreBundle\Controller;

use A2\CoreBundle\Entity\ContentRestaurant;
use A2\CoreBundle\Entity\Home4Columns;
use A2\CoreBundle\Form\Type\Theme\ContentRestaurantType;
use A2\CoreBundle\Form\Type\Theme\Home4ColumnsType;
use A2\CoreBundle\Form\Type\Theme\ListCategoryType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class ThemeController extends Controller

{

    public function Home4ColumnsAction(Request $request){
        $home4columns = new Home4Columns();

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

        $formBuilder = $this->get('form.factory')->createBuilder(Home4ColumnsType::class, $home4columns)
            ->add('categoryLeft', EntityType::class, array(
                'class' => 'A2\CoreBundle\Entity\Categories',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.categoriesIdParent IS NULL");
                },
                'choice_label' => 'categoriesName',
            ))
            ->add('categoryLeftCenter', EntityType::class, array(
                'class' => 'A2\CoreBundle\Entity\Categories',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.categoriesIdParent IS NULL");
                },
                'choice_label' => 'categoriesName',
            ))
            ->add('categoryRightCenter', EntityType::class, array(
                'class' => 'A2\CoreBundle\Entity\Categories',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.categoriesIdParent IS NULL");
                },
                'choice_label' => 'categoriesName',
            ))
            ->add('categoryRight', EntityType::class, array(
                'class' => 'A2\CoreBundle\Entity\Categories',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.categoriesIdParent IS NULL");
                },
                'choice_label' => 'categoriesName',
            ))
            ->add('save',      SubmitType::class);

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($home4columns);
                $em->flush();
                return $this->redirect($this->generateUrl('tmp_a2_core_borne'));
            }
        }

        return $this->render('@A2Core/Form/theme_form_view.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function ContentRestaurantAction(Request $request){
        $contentrestaurant=new ContentRestaurant();

        $formBuilder = $this->get('form.factory')->createBuilder(ContentRestaurantType::class, $contentrestaurant)
            ->add('save',      SubmitType::class);

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($contentrestaurant);
                $em->flush();
                return $this->redirect($this->generateUrl('tmp_a2_core_borne'));
            }
        }

        return $this->render('@A2Core/Form/theme_form_view.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
