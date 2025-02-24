<?php

namespace Synerise\Sdk\Cookie;

use Synerise\Sdk\Exception\NotFoundException;

interface CookieAdapter
{
    /**
     * Set cookie string value
     * @param string $name
     * @param string $value
     * @throws \RuntimeException|\InvalidArgumentException
     * @return void
     */
    public function setValue(string $name, string $value);
}