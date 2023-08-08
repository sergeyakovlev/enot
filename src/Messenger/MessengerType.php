<?php

declare(strict_types=1);

namespace App\Messenger;

enum MessengerType
{
    case EMAIL;
    case SMS;
    case TELEGRAM;
}
