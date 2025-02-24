<?php

namespace Synerise\Sdk\Serialization;

class KeyValuePairSerializer implements Serializer
{
    /**
     * @var string
     */
    private string $delimiter;

    /**
     * @var string
     */
    private string $separator;

    /**
     * @param string $delimiter
     * @param string $separator
     */
    public function __construct(string $delimiter = ':', string $separator = '&')
    {
        $this->delimiter = $delimiter;
        $this->separator = $separator;
    }

    /**
     * @inheritDoc
     */
    public function serialize(array $data): string
    {
        $serialized = [];
        foreach ($data as $key => $value) {
            $encodedKey = urlencode((string) $key);
            $encodedValue = urlencode((string) $value);
            $serialized[] = $encodedKey . $this->getDelimiter() . $encodedValue;
        }
        return implode($this->getSeparator(), $serialized);
    }

    /**
     * @inheritDoc
     */
    public function deserialize(string $string): array
    {
        $items = explode($this->getSeparator(), $string);
        return array_reduce($items, function ($carry, $item) {
            $values = explode($this->getDelimiter(), $item, 2);
            if (isset($values[1])) {
                $carry[$values[0]] = $values[1];
            }
            return $carry;
        }, []);
    }

    /**
     * Get pairs delimiter
     * @return string
     */
    private function getDelimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * Get key-value separator
     * @return string
     */
    private function getSeparator(): string
    {
        return $this->separator;
    }
}