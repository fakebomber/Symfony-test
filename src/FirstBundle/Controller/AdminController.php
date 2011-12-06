<?php
  namespace FirstBundle\Controller ;
  
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use FirstBundle\Entity\Product;
  use Symfony\Component\HttpFoundation\Response;
  
  class AdminController extends Controller
  {
    public function indexAction()
    {
      return $this->render('::base.html.twig');      
    }
    
    public function addAction() {
      
      $product = new Product();
      $product->setName('A Foo Bar');
      $product->setPrice('19.99');
      $product->setDescription('Lorem ipsum dolor');
      
      $em = $this->getDoctrine()->getEntityManager();
      $em->persist($product);
      $em->flush();      
      
      return new Response('Created product id '.$product->getId());
    }
    
    public function showAction($id) {
      
        $product = $this->getDoctrine()->getRepository('FirstBundle:Product')->find($id);
      
        if( !$product) {
          throw $this->createNotFoundException( 'No product found for id '.$id );
        }
        else {
          return new Response($product->getName()) ;
        }
    }
    
    public function taskAction( $param )
    {
      return new Response ( 'task action: '.$param );    
    }
    
    public function listAction ($page)
    {
      return new Response( 'list page: '.$page );  
    }

    public function usersAction ($var, $_format)
    {           
      return new Response($_format.' users');      
    }
  }