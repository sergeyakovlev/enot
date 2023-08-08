<?php

declare(strict_types=1);

namespace App\Settings;

use App\User\UserInterface;

interface SettingInterface
{
    public function getUser(): UserInterface;

    public function getName(): string;

    public function getValue(): string;
}
