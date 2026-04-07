<?php

declare(strict_types=1);

namespace Synerise\Sdk\Serialization;

class KeyValuePairSerializer implements Serializer
{
    /**
     * @var non-empty-string
     */
    private string $delimiter;

    /**
     * @var non-empty-string
     */
    private string $separator;

    /**
     * @param non-empty-string $delimiter
     * @param non-empty-string $separator
     */
    public function __construct(string $delimiter = ':', string $separator = '&')
    {
        $this->delimiter = $delimiter;
        $this->separator = $separator;
    }

    /**
     * @inheritDoc
     * @param array<string, string|int|float> $data
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
     * @return array<string, mixed>
     */
    public function deserialize(string $string): array
    {
        $items = explode($this->getSeparator(), $string);
        return array_reduce($items, function (array $carry, string $item): array {
            $values = explode($this->getDelimiter(), $item, 2);
            if (isset($values[1])) {
                $carry[$values[0]] = $values[1];
            }
            return $carry;
        }, []);
    }

    /**
     * Get pairs delimiter
     * @return non-empty-string
     */
    private function getDelimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * Get key-value separator
     * @return non-empty-string
     */
    private function getSeparator(): string
    {
        return $this->separator;
    }
}
