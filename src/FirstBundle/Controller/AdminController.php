<?php
  namespace FirstBundle\Controller ;
  
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  
  class AdminController extends Controller
  {
    public function indexAction ()
    {
      return $this->render('::base.html.twig');
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