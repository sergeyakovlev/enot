<?php

declare(strict_types=1);

namespace App\VerificationCode;

use App\VerificationCode\Exception\VerificationCodeGeneratorException;
use Random\Randomizer;

final readonly class VerificationCodeGenerator implements VerificationCodeGeneratorInterface
{
    public function __construct(
        private Randomizer $randomizer,
    ) {
    }

    /**
     * @param positive-int $length
     * @throws VerificationCodeGeneratorException
     */
    public function generate(int $length = 6): VerificationCodeInterface
    {
        if ($length < 1) {
            throw new VerificationCodeGeneratorException(
                'The length of the verification code must be greater than zero.'
            );
        }

        $min = 10 ** ($length - 1);
        $max = 10 ** $length - 1;

        return new VerificationCode((string) $this->randomizer->getInt($min, $max));
    }
}
