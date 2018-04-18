<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/17/18
 * Time: 5:01 PM
 */

namespace Sibers\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


class mainPageController extends Controller
{


    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $blogs = $em->getRepository('SibersBlogBundle:Blog')
            ->getLatestBlogs();


        return $this->render("main/index.html.twig", [
            'blogs' => $blogs
        ]);
    }






}