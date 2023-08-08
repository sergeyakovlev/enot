<?php

declare(strict_types=1);

namespace App\VerificationCode;

use App\Messenger\MessengerInterface;
use App\Messenger\MessengerType;
use App\User\UserInterface;
use App\VerificationCode\Exception\VerificationCodeSenderException;
use Throwable;

final class VerificationCodeSender implements VerificationCodeSenderInterface
{
    /** @var array<string, MessengerInterface> $messengers */
    private array $messengers = [];

    public function addMessenger(MessengerType $messengerType, MessengerInterface $messenger): self
    {
        $this->messengers[$messengerType->name] = $messenger;

        return $this;
    }

    /**
     * @throws VerificationCodeSenderException
     */
    public function send(
        UserInterface $user,
        MessengerType $messengerType,
        VerificationCodeInterface $verificationCode,
    ): void {
        $messenger = $this->messengers[$messengerType->name] ?? null;

        if (!isset($messenger)) {
            throw new VerificationCodeSenderException('Unknown messenger type.');
        }

        $message = "Verification code: $verificationCode";

        try {
            $messenger->send($user, $message);
        } catch (Throwable $exception) {
            throw new VerificationCodeSenderException(
                $exception->getMessage(),
                (int) $exception->getCode(),
                $exception,
            );
        }
    }
}
