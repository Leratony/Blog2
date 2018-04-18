<?php
/**
 * Created by PhpStorm.
 * User: valeria
 * Date: 4/18/18
 * Time: 2:08 AM
 */

namespace Sibers\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BlogController extends  Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('SibersBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('SibersBlogBundle:Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('blog/show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));
    }
}