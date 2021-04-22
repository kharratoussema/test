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
        $form = $this->createForm(UserFormType::class);

        return $this->render("User/form.html.twig", [
            "form_title" => "Ajouter un utilisateur",
            "form_user" => $form->createView(),
        ]);
    }

}
