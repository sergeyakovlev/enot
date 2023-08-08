<?php

declare(strict_types=1);

namespace App\User;

interface UserInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getEmail(): string;

    public function getPhone(): string;

    public function getTelegram(): string;
}
