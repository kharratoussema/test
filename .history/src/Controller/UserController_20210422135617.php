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
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('user/index.html.twig', [            
            "users" => $users,
        ]);
    }

     /**
     * @Route("/add-user", name="add-user")
     */
    public function addUser(Request $request): Response
    {
        
        $user = new User();
        $form = $this->createForm(UserFormType::class,$user);        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->render("User/form.html.twig", [
            "form_title" => "Ajouter un utilisateur",
            "form_user" => $form->createView(),
        ]);
    }

    /**
 * @Route("/user/{id}", name="user")
 */
public function user(int $id): Response
{
    $user = $this->getDoctrine()->getRepository(User::class)->find($id);

    return $this->render("user/edit.html.twig", [
        "user" => $user,
    ]);
}

}
