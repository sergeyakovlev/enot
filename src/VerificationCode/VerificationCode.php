<?php

declare(strict_types=1);

namespace App\VerificationCode;

final readonly class VerificationCode implements VerificationCodeInterface
{
    public function __construct(
        private string $value,
    ) {
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
