<?php

namespace WCS\MarmiwildBundle\Controller;

use WCS\MarmiwildBundle\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Recette controller.
 *
 */
class RecetteController extends Controller
{
    /**
     * Lists all recette entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recettes = $em->getRepository('WCSMarmiwildBundle:Recette')->findAll();

        return $this->render('WCSMarmiwildBundle:recette:index.html.twig', array(
            'recettes' => $recettes,
        ));
    }

    /**
     * Creates a new recette entity.
     *
     */
    public function newAction(Request $request)
    {
        $recette = new Recette();
        $form = $this->createForm('WCS\MarmiwildBundle\Form\RecetteType', $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recette);
            $em->flush();

            return $this->redirectToRoute('recette_index');
        }

        return $this->render('WCSMarmiwildBundle:recette:new.html.twig', array(
            'recette' => $recette,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recette entity.
     *
     */
    public function showAction(Recette $recette)
    {

        return $this->render('WCSMarmiwildBundle:recette:show.html.twig', array(
            'recette' => $recette,

        ));
    }

    /**
     * Displays a form to edit an existing recette entity.
     *
     */
    public function editAction(Request $request, Recette $recette)
    {
        $editForm = $this->createForm('WCS\MarmiwildBundle\Form\RecetteType', $recette);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recette_index');
        }

        return $this->render('WCSMarmiwildBundle:recette:edit.html.twig', array(
            'recette' => $recette,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a recette entity.
     *
     */
    public function deleteAction(Request $request, Recette $recette)
    {
        if($recette !== null) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($recette);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'La recette a bien été supprimée.');
        }

        return $this->redirectToRoute('recette_index');
    }

    public function searchAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $keyword = $request->get('keyword');

        $recettes = $em->getRepository(Recette::class)->findRecetteByNom($keyword);

        return $this->render('WCSMarmiwildBundle:recette:index.html.twig', array(
            'recettes'=>$recettes,
        ));
    }


    public function recetteTypeAction(Request $request, $type){

        $em = $this->getDoctrine()->getManager();
        $recettes = $em->getRepository(Recette::class)->findRecetteByType($type);

        return $this->render('WCSMarmiwildBundle:recette:index.html.twig', array(
            'recettes'=>$recettes,
        ));
    }


    public function recetteNbrepersonneAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $personnes = $request->get('personnes');
        $recettes = $em->getRepository(Recette::class)->findRecetteByNbrePerson($personnes);

        return $this->render('WCSMarmiwildBundle:recette:index.html.twig', array(
           'recettes'=>$recettes,
        ));

    }
}
