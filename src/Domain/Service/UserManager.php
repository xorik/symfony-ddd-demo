<?php
declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Entity\User;

interface UserManager
{
    public function save(User $user): void;
}
