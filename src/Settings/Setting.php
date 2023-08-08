<?php

declare(strict_types=1);

namespace App\Settings;

use App\User\UserInterface;

final readonly class Setting implements SettingInterface
{
    public function __construct(
        private UserInterface $user,
        private string $name,
        private string $value,
    ) {
    }

    public function getUser(): UserInterface
    {
        return $this->user;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
