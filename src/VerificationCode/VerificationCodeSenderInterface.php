<?php

declare(strict_types=1);

namespace App\VerificationCode;

use App\Messenger\MessengerInterface;
use App\Messenger\MessengerType;
use App\User\UserInterface;
use App\VerificationCode\Exception\VerificationCodeSenderException;

interface VerificationCodeSenderInterface
{
    public function addMessenger(MessengerType $messengerType, MessengerInterface $messenger): self;

    /**
     * @throws VerificationCodeSenderException
     */
    public function send(
        UserInterface $user,
        MessengerType $messengerType,
        VerificationCodeInterface $verificationCode,
    ): void;
}
