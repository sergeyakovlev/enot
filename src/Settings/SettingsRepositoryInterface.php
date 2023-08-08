<?php

declare(strict_types=1);

namespace App\Settings;

use App\Settings\Exception\SettingsRepositoryException;

interface SettingsRepositoryInterface
{
    /**
     * @throws SettingsRepositoryException
     */
    public function save(SettingInterface $setting): void;
}
