<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SearchType;
//use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @Route("/", name="ShowAllBooks")
     */
    public function showAllBooksAction(Request $request)
    {
        // replace this example code with whatever you need
        /*return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));*/
        
        $em = $this->getDoctrine()->getManager();
        $booksRep = $em->getRepository('AppBundle:Book');
        //$booksQuery=$booksRep->getQueryfindAllOrderedByTitle();
        $booksQuery=null;
        
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $searchFieldArr=$request->request->get('search');
            //searchField
            $searchField=$searchFieldArr['searchField'];
            //echo "</br>*** searchField = $searchField ***</br>";
            /*echo "</pre>";
            print_r($_POST);
            echo "</pre>";*/
            //findBooksByTitle
            $booksQuery=$booksRep->findBooksByTitle($searchField);
        }else{
            $booksQuery=$booksRep->getQueryfindAllOrderedByTitle();
        }
        
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $booksQuery, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        	
        return $this->render('book/showAllBooks.html.twig',
            array(
                'pagination' => $pagination,
                'form' => $form->createView(),
            )
        );
    }
    
    /**
     * @Route("/ShowBookDetail/{id}", requirements={"id": "[1-9]\d*"}, name="ShowBookDetail")
     */
    public function showBookDetailAction($id)
    {
        $request = $this->get('request');
        //echo "id = ".$id;
        
        $em = $this->getDoctrine()->getManager();
        $resultBook = $em->getRepository('AppBundle:Book')
        ->findBookById($id);
        
        $resultAuthors = $em->getRepository('AppBundle:Author')
        ->findAuthorsByArrayIds($resultBook[0]->getAuthors());
        
        //echo var_dump($result[0]);
        //echo var_dump($resultAuthors[0]);
        
        return $this->render('book/showBookDetail.html.twig',
            array(
                'book' => $resultBook[0],
                'authors' => $resultAuthors,
            )            
        );

        /*if (!is_int($id)) {
            echo "id is not valid";
            exit();

        }*/
    }
}
