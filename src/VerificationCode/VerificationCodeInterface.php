<?php

declare(strict_types=1);

namespace App\VerificationCode;

interface VerificationCodeInterface
{
    public function getValue(): string;

    public function __toString(): string;
}
