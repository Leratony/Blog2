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


class mainPageController extends Controller
{


    public function indexAction()
    {
        return $this->render("main/index.html.twig");
    }


    public function aboutAction()
    {
        return $this->render("main/about.html.twig");
    }
}