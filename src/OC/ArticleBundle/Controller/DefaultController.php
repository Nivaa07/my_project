<?php

namespace OC\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OCArticleBundle:Default:index.html.twig', array('name' => $name));
    }
}
