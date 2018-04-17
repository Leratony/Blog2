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


class ContactController extends Controller
{
    public function contactAction()
    {
        return $this->render('main/contact.html.twig');
    }
}