<?php

/**
 * This file is part of prooph/event-sourcing.
 * (c) 2014-2021 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2015-2021 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventSourcing;

use Prooph\EventSourcing\Aggregate\EventProducerTrait;
use Prooph\EventSourcing\Aggregate\EventSourcedTrait;

abstract class AggregateRoot
{
    use EventProducerTrait;
    use EventSourcedTrait;

    /**
     * We do not allow public access to __construct, this way we make sure that an aggregate root can only
     * be constructed by static factories
     */
    protected function __construct()
    {
    }
}
