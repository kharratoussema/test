<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Request;
class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

     /**
     * @Route("/add-user", name="add-user")
     */
    public function addUser(Request $request): Response
    {
        
        $user = new User();
        $form = $this->createForm(UserFormType::class,$user);
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // ... do something
        }
        return $this->render("User/form.html.twig", [
            "form_title" => "Ajouter un utilisateur",
            "form_user" => $form->createView(),
        ]);
    }

}
