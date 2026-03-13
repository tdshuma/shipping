<?php

declare(strict_types=1);

namespace Fastway\Core\Model;

enum Environment: string
{
    case DEV = 'dev';
    case TEST = 'test';
    case PRE = 'pre';
    case PROD = 'prod';
}
