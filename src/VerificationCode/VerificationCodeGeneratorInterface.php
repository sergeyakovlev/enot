<?php

declare(strict_types=1);

namespace App\VerificationCode;

use App\VerificationCode\Exception\VerificationCodeGeneratorException;

interface VerificationCodeGeneratorInterface
{
    /**
     * @param positive-int $length
     * @throws VerificationCodeGeneratorException
     */
    public function generate(int $length = 6): VerificationCodeInterface;
}
