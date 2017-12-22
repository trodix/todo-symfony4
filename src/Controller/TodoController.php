<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use App\Entity\Todo;

class TodoController extends Controller{

    /**
     * @Route("/", name="listTodo")
     */
    public function indexAction(){
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findAll();

        return $this->render('pages/index.html.twig', [
            'todos' => $todos
        ]);
    }

    /**
     * @Route("/todo/create", name="createTodo")
     */
    public function createAction(Request $request){
        $todo = new Todo();
        $form = $this->createFormBuilder($todo)
            ->add('description', TextType::class)
            ->add('dateEcheance', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'dd/mm/yyyy - hh:ii',
                'attr' => [
                    'class' => 'form-control input-inline form_datetime',
                    'data-provide' => 'form_datetime',
                    'data-date-format' => 'dd/mm/yyyy - hh:ii'
                ]
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($todo);
            $em->flush();

            return $this->render('pages/create.html.twig', [
                'id' => $todo->getId()
            ]);
        }

        return $this->render('pages/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/todo/edit/{id}", name="editTodo")
     */
    public function editAction(Request $request, $id){
        return $this->render('pages/edit.html.twig');
    }

    /**
     * @Route("/todo/details/{id}", name="detailsTodo")
     */
    public function detailsAction(Request $request, $id){
        return $this->render('pages/details.html.twig');
    }

    /**
     * @Route("/todo/delete/{id}", name="deleteTodo")
     */
    public function deleteAction(Request $request, $id){
        return $this->render('pages/details.html.twig');
    }
}
