<?php
    
    namespace OC\ArticleBundle\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;
   
    class AdvertController extends Controller
    {
        public function afficherAction()
        {
        /*$content = $this
            ->get('templating')
            ->render('OCArticleBundle:Advert:index.html.twig');*/
    return new Response("afficher");
        }
        
        public function modifierAction()
        {
            /*$content = $this
            ->get('templating')
            ->render('OCArticleBundle:Advert:modifier.html.twig');*/

            return new Response("modifier");
        }
        public function supprimerAction()
        {
            /*$content = $this
            ->get('templating')
            ->render('OCArticleBundle:Advert:supprimer.html.twig');*/
            return new Response("supprimer");
        }
        public function ajouterAction()
        {
            /*$content = $this
            ->get('templating')
            ->render('OCArticleBundle:Advert:ajouter.html.twig');*/
            return new Response("ajouter");
        }

    }
