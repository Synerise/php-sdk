<?php

namespace Synerise\Sdk\Helper;

class HashString
{
    /**
     * Hash string
     *
     * @param string $s
     * @return int
     */
    public static function hashString(string $s): int
    {
        $h = 0;
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $h = self::overflow32(31 * $h + ord($s[$i]));
        }

        return $h;
    }

    /**
     * Overflow 32
     *
     * @param int $v
     * @return int
     */
    private static function overflow32(int $v): int
    {
        $v = $v % 4294967296;
        if ($v > 2147483647) {
            return $v - 4294967296;
        } elseif ($v < -2147483648) {
            return $v + 4294967296;
        } else {
            return $v;
        }
    }
}