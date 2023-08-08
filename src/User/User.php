<?php

declare(strict_types=1);

namespace App\User;

final readonly class User implements UserInterface
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private string $phone,
        private string $telegram,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getTelegram(): string
    {
        return $this->telegram;
    }
}
