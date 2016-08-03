<?php

namespace RaceAlertBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RaceAlertBundle\Entity\TrackConfiguration;
use RaceAlertBundle\Form\TrackConfigurationType;

/**
 * TrackConfiguration controller.
 *
 * @Route("/trackconfiguration")
 */
class TrackConfigurationController extends Controller
{
    /**
     * Lists all TrackConfiguration entities.
     *
     * @Route("/", name="trackconfiguration_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trackConfigurations = $em->getRepository('RaceAlertBundle:TrackConfiguration')->findAll();

        return $this->render('trackconfiguration/index.html.twig', array(
            'trackConfigurations' => $trackConfigurations,
        ));
    }

    /**
     * Creates a new TrackConfiguration entity.
     *
     * @Route("/new", name="trackconfiguration_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $trackConfiguration = new TrackConfiguration();
        $form = $this->createForm('RaceAlertBundle\Form\TrackConfigurationType', $trackConfiguration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trackConfiguration);
            $em->flush();

            return $this->redirectToRoute('trackconfiguration_show', array('id' => $trackConfiguration->getId()));
        }

        return $this->render('trackconfiguration/new.html.twig', array(
            'trackConfiguration' => $trackConfiguration,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TrackConfiguration entity.
     *
     * @Route("/{id}", name="trackconfiguration_show")
     * @Method("GET")
     */
    public function showAction(TrackConfiguration $trackConfiguration)
    {
        $deleteForm = $this->createDeleteForm($trackConfiguration);

        return $this->render('trackconfiguration/show.html.twig', array(
            'trackConfiguration' => $trackConfiguration,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TrackConfiguration entity.
     *
     * @Route("/{id}/edit", name="trackconfiguration_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TrackConfiguration $trackConfiguration)
    {
        $deleteForm = $this->createDeleteForm($trackConfiguration);
        $editForm = $this->createForm('RaceAlertBundle\Form\TrackConfigurationType', $trackConfiguration);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trackConfiguration);
            $em->flush();

            return $this->redirectToRoute('trackconfiguration_edit', array('id' => $trackConfiguration->getId()));
        }

        return $this->render('trackconfiguration/edit.html.twig', array(
            'trackConfiguration' => $trackConfiguration,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TrackConfiguration entity.
     *
     * @Route("/{id}", name="trackconfiguration_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TrackConfiguration $trackConfiguration)
    {
        $form = $this->createDeleteForm($trackConfiguration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trackConfiguration);
            $em->flush();
        }

        return $this->redirectToRoute('trackconfiguration_index');
    }

    /**
     * Creates a form to delete a TrackConfiguration entity.
     *
     * @param TrackConfiguration $trackConfiguration The TrackConfiguration entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TrackConfiguration $trackConfiguration)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trackconfiguration_delete', array('id' => $trackConfiguration->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
