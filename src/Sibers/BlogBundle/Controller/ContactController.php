<?php
/**
 * Created by PhpStorm.
 * User: valeria
 * Date: 4/17/18
 * Time: 8:40 PM
 */

namespace Sibers\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sibers\BlogBundle\Entity\Enquiry;
use Sibers\BlogBundle\Form\EnquiryType;


class ContactController extends Controller
{
    public function contactAction(Request $request)
    {
//        return $this->render('main/contact.html.twig');

        $enquiry = new Enquiry();

        $form = $this->createForm(EnquiryType::class, $enquiry);

        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('enquiries@symblog.co.uk')
                    ->setTo($this->container->getParameter('sibers_blog.emails.contact_email'))
                    ->setBody($this->renderView('main/contactEmail.txt.twig', array('enquiry' => $enquiry)));


                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->add('sibers-notice', 'Your contact enquiry was successfully sent. Thank you!');
                return $this->redirectToRoute('SibersBlogBundle_contact');
            }
        }

        return $this->render('main/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}