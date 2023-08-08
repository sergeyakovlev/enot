<?php

declare(strict_types=1);

namespace App\Settings;

use App\Messenger\MessengerType;
use App\Settings\Exception\SettingsServiceException;
use App\User\UserInterface;
use App\VerificationCode\VerificationCodeGeneratorInterface;
use App\VerificationCode\VerificationCodeInterface;
use App\VerificationCode\VerificationCodeRepositoryInterface;
use App\VerificationCode\VerificationCodeSenderInterface;
use Throwable;

final readonly class SettingsService implements SettingsServiceInterface
{
    public function __construct(
        private VerificationCodeSenderInterface $verificationCodeSenderInterface,
        private SettingsRepositoryInterface $settingsRepository,
        private VerificationCodeGeneratorInterface $verificationCodeGenerator,
        private VerificationCodeRepositoryInterface $verificationCodeRepository,
    ) {
    }

    /**
     * @throws SettingsServiceException
     */
    public function sendVerificationCode(UserInterface $user, MessengerType $messengerType): void
    {
        try {
            $verificationCode = $this->verificationCodeGenerator->generate();
            $this->verificationCodeRepository->save($user, $verificationCode);
            $this->verificationCodeSenderInterface->send($user, $messengerType, $verificationCode);
        } catch (Throwable $exception) {
            throw new SettingsServiceException($exception->getMessage(), (int) $exception->getCode(), $exception);
        }
    }

    /**
     * @throws SettingsServiceException
     */
    public function doChangeSetting(
        SettingInterface $setting,
        VerificationCodeInterface $verificationCode,
    ): void
    {
        $savedVerificationCode = $this->verificationCodeRepository->findByUser($setting->getUser());

        if ($savedVerificationCode !== $verificationCode) {
            throw new SettingsServiceException('The verification code does not match.');
        }

        try {
            $this->settingsRepository->save($setting);
        } catch (Throwable $exception) {
            throw new SettingsServiceException($exception->getMessage(), (int) $exception->getCode(), $exception);
        }
    }
}
