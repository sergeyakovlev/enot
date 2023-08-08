<?php

declare(strict_types=1);

namespace App\VerificationCode;

use App\User\UserInterface;
use App\VerificationCode\Exception\VerificationCodeRepositoryException;

final class VerificationCodeRepository implements VerificationCodeRepositoryInterface
{
    public function findByUser(UserInterface $user): ?VerificationCodeInterface
    {
        // ...
        return null;
    }

    /**
     * @throws VerificationCodeRepositoryException
     */
    public function save(UserInterface $user, VerificationCodeInterface $code): void
    {
        // ...
    }
}
