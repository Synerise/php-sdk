<?php

namespace Synerise\Sdk\Helper;

interface UuidGenerator
{
    /**
     * Generate UUID5 from string
     * @param string $string
     * @return string
     */
    public function uuid5(string $string): string;
}