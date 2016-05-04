<?php

namespace Potogan\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Potogan\TestBundle\Entity\Conference;
use Potogan\TestBundle\Form\ConferenceType;

/**
 * Index controller
 */
class IndexController extends Controller
{
    /**
     * Index page
     *
     * @Route("/")
     * @Method({"GET"})
     * @Template
     */
    public function indexAction()
    {
        // On crée un objet Conference 
        $conference = new Conference();

        // On ajoute les champs de l'entité que l'on veut à notre formulaire 
        $form = $this->createForm(new ConferenceType(), $conference);

        // On récupère la requête 
        $request = $this->get('request');

        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> formulaire
            // A partir de maintenant , la variable $conference contient
            // les valeurs entrées dans le formulaire par le visiteur 
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes 
            if ($form->isValid()) {
                // On l'enregistre notre objet $conference dans la base de données 
                $em = $this->getDoctrine()->getManager();
                $em->persist($conference);
                $em->flush();
                return new Response("Formulaire Validé");
            }
        }

        // A ce stade :
        // - Soit la requête est de type GET, donc le visiteur
        // vient d'arriver sur la page et veut voir le formulaire 
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, 
        // donc on l'affichede nouveau 

        // On passe la méthode createView() du formulaire à la vue afin 
        // qu'elle puisse afficher le formulaire toute seule
        return $this->render('PotoganTestBundle:Index:index.html.twig',
            array(
                'form' => $form->createView(),
        ));
    }
}
