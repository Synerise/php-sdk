<?php

declare(strict_types=1);

namespace Synerise\Sdk\Cookie;

use InvalidArgumentException;
use RuntimeException;

interface CookieAdapter
{
    /**
     * Set cookie string value
     * @param string $name
     * @param string $value
     * @throws RuntimeException|InvalidArgumentException
     * @return void
     */
    public function setValue(string $name, string $value);
}
