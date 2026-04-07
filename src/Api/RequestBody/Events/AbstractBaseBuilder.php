<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use DateTime;
use DateTimeInterface;
use InvalidArgumentException;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Sdk\Api\Validation\Events\Validator;
use Synerise\Sdk\Tracking\EventSourceProvider;
use TypeError;

/**
 * @template T of EventBase
 */
abstract class AbstractBaseBuilder
{
    /**
     * Action describing event.
     * Optional, except for custom.
     * Suggested format: <string>.<string>
     * @var string|null
     */
    protected ?string $action = null;

    /**
     * Event unique identifier. Assures deduplication, allows modification of existing event.
     * Optional. Default format: <time>_<action>_<uuid>
     * @var string|null
     */
    protected ?string $eventSalt = null;

    /**
     * Human-readable label describing event.
     * Optional, except for custom.
     * @var string|null
     */
    protected ?string $label = null;

    /**
     * Event source
     * @var EventSource|null
     */
    protected ?EventSource $source = null;

    /**
     * DateTime representing the moment an event occurred.
     * Optional.
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $time = null;

    /**
     * Provides EventSource enum value
     * @var EventSourceProvider|null
     */
    protected ?EventSourceProvider $sourceProvider;

    /**
     * Set of params additional data not specified by OAS.
     * @var array<string, mixed>
     */
    protected array $additionalData = [];

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    abstract protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null);

    /**
     * Returns a request body object with provided data.
     * @param bool $validate Determines if validation should be done on building.
     * @throws InvalidArgumentException
     * @return T
     */
    public function build(bool $validate = true): EventBase
    {
        $requestBody = $this->getRequestBody();
        $client = $requestBody->getClient();

        if ($client === null) {
            throw new InvalidArgumentException('Client is required.');
        }

        $identifier = $client->getId()
            ?? $client->getUuid()
            ?? $client->getCustomId()
            ?? $client->getEmail();

        if (!$identifier) {
            throw new InvalidArgumentException('You must provide at least one of profile identifier.');
        }

        $time = $this->time ?? new DateTime();
        $this->time = $time;

        $this->setParam('source', $this->determineSource());

        $requestBody->setLabel($this->label);
        $requestBody->setTime($time->format(DateTimeInterface::ATOM));
        $requestBody->setEventSalt($this->eventSalt ?: $time->getTimestamp() . "_{$this->action}_$identifier");
        if (method_exists($requestBody, 'setAction')) {
            $requestBody->setAction($this->action);
        }

        if (!empty($this->additionalData)) {
            $this->getParams()->setAdditionalData($this->additionalData);
        }

        if ($validate) {
            static::getValidator()::validate($requestBody);
        }

        return $requestBody;
    }

    /**
     * Initialize a new builder instance.
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     * @return static
     */
    public static function initialize(Client $client, ?EventSourceProvider $sourceProvider = null): static
    {
        return new static($client, $sourceProvider);
    }

    /**
     * Provides a validator for a built object.
     * Ensures required properties are set and all properties are in valid format.
     * @return Validator
     */
    abstract public static function getValidator(): Validator;

    /**
     * Set event salt.
     * Optional. Default format: <time>_<action>_<uuid>
     * @param string $eventSalt
     * @return $this
     */
    public function setEventSalt(string $eventSalt): static
    {
        $this->eventSalt = $eventSalt;
        return $this;
    }

    /**
     * Set event source.
     * @param EventSource $source
     * @return $this
     */
    public function setSource(EventSource $source): static
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Set event time
     * Optional.
     * @param DateTimeInterface $time
     * @return $this
     */
    public function setTime(DateTimeInterface $time): static
    {
        $this->time = $time;
        return $this;
    }

    /**
     * Set event label
     * Optional, except for custom.
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Set a single params value with setter or as additional data.
     * @param string $key
     * @param mixed $value
     * @throws InvalidArgumentException
     * @return $this
     */
    public function setParam(string $key, $value): static
    {
        $setter = 'set' . ucfirst($key);
        if (method_exists($this->getParams(), $setter)) {
            try {
                $this->getParams()->$setter($value);
            } catch (TypeError $e) {
                throw new InvalidArgumentException($e->getMessage(), $e->getCode());
            }
        } else {
            $this->additionalData[$key] = $value;
        }

        return $this;
    }

    /**
     * Set params properties from an array using setters or as additional data.
     * @param array<string, mixed> $data
     * @throws InvalidArgumentException
     * @return $this
     */
    public function setParams(array $data = []): static
    {
        foreach ($data as $key => $value) {
            $this->setParam($key, $value);
        }

        return $this;
    }

    /**
     * Set snrsParams. Params set by url query.
     * Optional.
     * @param array<string, mixed>|null $params
     * @return $this
     */
    public function setSnrsParams(?array $params): static
    {
        if ($params) {
            $this->additionalData['snrsParams'] = $params;
        }

        return $this;
    }

    /**
     * Determine source. Return directly set value or use source provider.
     * @throws InvalidArgumentException
     * @return EventSource|null
     */
    protected function determineSource(): ?EventSource
    {
        if ($this->source) {
            return $this->source;
        }

        if (!$this->sourceProvider) {
            return null;
        }

        try {
            return $this->sourceProvider->getEventSource();
        } catch (RuntimeException $e) {
            throw new InvalidArgumentException('Failed to determine source', 0, $e);
        }
    }

    /**
     * Returns event object being built
     * @return T
     */
    protected function getRequestBody(): EventBase
    {
        return $this->requestBody;
    }

    /**
     * Returns event object's params being built
     * @return AdditionalDataHolder
     */
    abstract protected function getParams(): AdditionalDataHolder;
}
