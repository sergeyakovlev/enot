<?php

declare(strict_types=1);

namespace App\Settings;

use App\Messenger\MessengerType;
use App\Settings\Exception\SettingsServiceException;
use App\User\UserInterface;
use App\VerificationCode\VerificationCodeInterface;

interface SettingsServiceInterface
{
    /**
     * @throws SettingsServiceException
     */
    public function sendVerificationCode(UserInterface $user, MessengerType $messengerType): void;

    /**
     * @throws SettingsServiceException
     */
    public function doChangeSetting(
        SettingInterface $setting,
        VerificationCodeInterface $verificationCode,
    ): void;
}
