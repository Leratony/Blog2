<?php
/**
 * Created by PhpStorm.
 * User: valeria
 * Date: 4/17/18
 * Time: 8:39 PM
 */

namespace Sibers\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AboutController extends Controller
{
    public function aboutAction()
    {
        return $this->render("main/about.html.twig");
    }
}