<?php

namespace Zorbus\SymfonyBootstrapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zorbus\SymfonyBootstrapBundle\Form\BootstrapType;
use Zorbus\SymfonyBootstrapBundle\Entity\Project;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $form = $this->createForm(new BootstrapType(), new Project());

        if ($request->isMethod('POST'))
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $project = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($project);
                $em->flush();

                $this->get('session')->getFlashBag()->set('submit', array($project));

                return $this->redirect($this->generateUrl('zorbus_symfony_bootstrap_homepage'));
            }
        }
        return $this->render('ZorbusSymfonyBootstrapBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
    public function downloadAction(Request $request, $token)
    {
        try {
            $project = $this->getDoctrine()->getRepository('ZorbusSymfonyBootstrapBundle:Project')->findOneBy(array('token' => $token));

            if (!file_exists($this->get('kernel')->getRootDir().'/../web/bootstrap/'.$project->getName().'.tgz')){
                throw new \Exception('File does not exist');
            }
        }catch(\Exception $e)
        {
            $project = null;
        }


        return $this->render('ZorbusSymfonyBootstrapBundle:Default:download.html.twig', array('project' => $project));
    }

}
