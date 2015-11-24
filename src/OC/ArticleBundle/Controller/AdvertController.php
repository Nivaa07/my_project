<?php
    
    namespace OC\ArticleBundle\Controller;
    
    use OC\ArticleBundle\Entity\Advert;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;
   
    class AdvertController extends Controller
    {
        public function afficher2Action($id)
        {
            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OCArticleBundle:Advert')
            ;
            $Article = $repository->find($id);
            
            if($Article === null) {
                throw new NotFoundHttpException("Il n'a d'article".id.".");
            }
            
            
            return $this->render('OCArticleBundle:Advert:afficher2.html.twig',array('article'=> $Article));
        
        }
        
        
        public function afficherAction()
        {
            
            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OCArticleBundle:Advert')
            ;
            $Listarticles = $repository->findAll();
            
            
            /*$content = $this
             ->get('templating')
             ->render('OCArticleBundle:Advert:index.html.twig');*/
          
            return $this->render('OCArticleBundle:Advert:afficher.html.twig',array('ListArticles'=> $Listarticles));
        
        }
        
        
        
        public function accueilAction()
        {
            return $this->render('OCArticleBundle:Advert:accueil.html.twig');
        }

        
        
        
        
        public function modifierAction(Advert $advert)
        {
            
         // On récupère l'EntityManager
            $em = $this->getDoctrine()->getManager();
            
                      // Étape 1 : On « persiste » l'entité
            if(isset($_POST['valider'])) {
                $advert->setTitle($_POST['nom']);
                $advert->setAuthor($_POST['courriel']);
                $advert->setContent($_POST['message']);
                
                $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            
            // Étape 2 : On « flush » tout ce qui a été persisté avant
            $em->flush();
            
          
            
            return $this->redirect($this ->generateUrl('articleafficher2', array ('id' => $advert ->getId())));
            }
            return $this->render('OCArticleBundle:Advert:index2.html.twig',array ('advert' => $advert)) ;
            
            
        }

        
        
        
        public function supprimerAction($id)
        {
            // On récupère l'EntityManager
            $em = $this->getDoctrine()->getManager();
            
            $repository = $em->getRepository('OCArticleBundle:Advert');
            $Article = $repository->find($id);
            
            if($Article === null) {
                throw new NotFoundHttpException("Il n'a d'article".id.".");
            }
            
            // Étape 1 : On « retire » l'entité
            $em->remove($Article);
            
            // Étape 2 : On « flush » tout ce qui a été retiré avant
            $em->flush();
            

            return $this->render('OCArticleBundle:Advert:supprimer.html.twig');
        }
        
       
        public function ajouterAction()
        {
            
            // Création de l'entité
            $advert = new Advert();
            $advert->setTitle($_POST['nom']);
            $advert->setAuthor($_POST['courriel']);
            $advert->setContent($_POST['message']);
            $advert->setimage("test");
            
            
            
            
            // On peut ne pas définir ni la date ni la publication,
            // car ces attributs sont définis automatiquement dans le constructeur
            
            // On récupère l'EntityManager
            $em = $this->getDoctrine()->getManager();
            
            // Étape 1 : On « persiste » l'entité
            $em->persist($advert);
            
            // Étape 2 : On « flush » tout ce qui a été persisté avant
            $em->flush();
            
            // Reste de la méthode qu'on avait déjà écrit
       
            
           return $this->redirect($this ->generateUrl('articleafficher2', array ('id' => $advert ->getId())));
       
           
        
            }
            
         
 

        
        public function afficherformulaireAction()   {
return $this->render('OCArticleBundle:Advert:index.html.twig');
     }
        
        public function modifierformulaireAction()   {
            return $this->render('OCArticleBundle:Advert:index2.html.twig');
        }

        
        public function boxofficeAction()   {
            return $this->render('OCArticleBundle:Advert:boxoffice.html.twig');
        }
        
        public function nousAction()   {
            return $this->render('OCArticleBundle:Advert:nous.html.twig');
        }

            
     }
    
