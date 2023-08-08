<?php

declare(strict_types=1);

namespace App\Messenger;

use App\Messenger\Exception\MessengerException;
use App\User\UserInterface;

interface MessengerInterface
{
    /**
     * @throws MessengerException
     */
    public function send(UserInterface $user, string $message): void;
}
