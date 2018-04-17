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

            if ($form->isValid()) {
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
        }

        return $this->render('main/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}