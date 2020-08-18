<?php

namespace App\Application\Controller;

use App\Infrastructure\Repository\UserRepository;
use App\Domain\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @Route("/register", methods={"POST"})
     */
    public function register(Request $request)
    {
        $user = $this->userService->register(
            $request->get('name'),
            $request->get('email')
        );

        return $this->json($user);
    }

    /**
     * @Route("/login/{id}")
     */
    public function login(int $id, UserRepository $userRepository)
    {
        $user = $userRepository->find($id);

        if ($user === null) {
            return $this->json(['error' => 'User is not found'], Response::HTTP_NOT_FOUND);
        }

        $this->userService->login($user);

        return $this->json($user);
    }
}
