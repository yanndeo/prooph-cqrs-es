<?php

/**
 * This file is part of prooph/event-store.
 * (c) 2014-2023 prooph software GmbH <contact@prooph.de>
 * (c) 2015-2023 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\Exception;

class ConfigurationException extends RuntimeException implements EventStoreException
{
    public static function configurationError(string $msg): ConfigurationException
    {
        return new self('[Configuration Error] ' . $msg . "\n");
    }
}
