<?php
declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Entity\User;

class UserService
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function register(string $name, string $email): User
    {
        $user = new User($name, $email);

        $this->userManager->save($user);

        // Send email
        // Other logic

        return $user;
    }

    public function login(User $user)
    {
        $user->incrementLoginCount();

        $this->userManager->save($user);
    }
}
