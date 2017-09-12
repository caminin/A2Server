<?php

namespace A2\CoreBundle\Controller;

use A2\CoreBundle\Entity\DisplayDate;
use A2\CoreBundle\Entity\Files;
use A2\CoreBundle\Form\Type\FilesType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FileController extends Controller

{

    public function addFileAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('A2CoreBundle:Categories');

        $listCategories = $repository->findBy(
            array('categoriesIdParent' => null)
        );

        $count=2;

        $file = new Files();

        $form = $this->get('form.factory')->createBuilder(FilesType::class, $file)
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                //DATE
                $string = str_replace(' ', '', $form["DatePicker"]->getData());
                $array_date = explode("-",$string);

                $file_start_date_php = DateTime::createFromFormat('d#m#Y',$array_date[0]);

                $file_end_date_php = DateTime::createFromFormat('d#m#Y',$array_date[1]);

                $date= new DisplayDate();
                $date->setDateFilesId($file);
                $date->setDateStart($file_start_date_php);
                $date->setDateEnd($file_end_date_php);

                $em = $this->getDoctrine()->getManager();
                $em->persist($date);


                //CATEGORIES
                $repository = $this
                    ->getDoctrine()
                    ->getManager()
                    ->getRepository('A2CoreBundle:Categories');

                $file_category = $repository->find($form["filesCategory"]->getData());

                $file->setFilesCategory($file_category);


                // On enregistre notre objet $advert dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($file);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('a2_core_accueil');
            }

        }

        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau

        return $this->render(
            '@A2Core/Pages/add_files.html.twig',
            array(
                'form' => $form->createView(),
                'categories' => $listCategories,
                'count' => $count
            )
        );
    }

    public function testAction()
    {
        $advert = new Advert;

        $advert->setDate(new \Datetime());  // Champ « date » OK
        $advert->setTitle('abc');           // Champ « title » incorrect : moins de 10 caractères
        //$advert->setContent('blabla');    // Champ « content » incorrect : on ne le définit pas
        $advert->setAuthor('A');            // Champ « author » incorrect : moins de 2 caractères

        // On récupère le service validator
        $validator = $this->get('validator');

        // On déclenche la validation sur notre object
        $listErrors = $validator->validate($advert);

        // Si $listErrors n'est pas vide, on affiche les erreurs
        if (count($listErrors) > 0) {
            // $listErrors est un objet, sa méthode __toString permet de lister joliement les erreurs
            return new Response((string)$listErrors);
        } else {
            return new Response("L'annonce est valide !");
        }

    }
}