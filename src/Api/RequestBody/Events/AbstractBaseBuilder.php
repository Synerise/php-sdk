<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use DateTime;
use InvalidArgumentException;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\Validator;
use TypeError;

abstract class AbstractBaseBuilder
{
    /**
     * Event action describing event.
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
     * Human readable label describing event.
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
     * DateTime representing them moment event occurred.
     * Optional.
     * @var DateTime|null
     */
    protected ?DateTime $time = null;

    /**
     * Provides EventSource enum value
     * @var EventSourceProvider|null
     */
    protected ?EventSourceProvider $sourceProvider;

    /**
     * Set of params additional data not specified by OAS.
     * @var array
     */
    protected array $additionalData;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    abstract protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null);

    /**
     * Returns request body object with provided data.
     * @param bool $validate Determines if validation should be done on building.
     * @return EventBase
     * @throws InvalidArgumentException
     */
    abstract public function build(bool $validate = true): EventBase;

    /**
     * Initialize new builder instance.
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     * @return static
     */
    public static function initialize(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        return new static($client, $sourceProvider);
    }

    /**
     * Provides validator for build object.
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
    public function setEventSalt(string $eventSalt): self
    {
        $this->eventSalt = $eventSalt;
        return $this;
    }

    /**
     * Set event source.
     * @param EventSource $source
     * @return $this
     */
    public function setSource(EventSource $source): self
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Set event time
     * Optional.
     * @param DateTime $time
     * @return $this
     */
    public function setTime(DateTime $time): self
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
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Set single params value with setter or as additional data.
     * @param string $key
     * @param mixed $value
     * @return self
     * @throws InvalidArgumentException
     */
    public function setParam(string $key, $value): self
    {
        $setter = 'set'.ucfirst($key);
        if (method_exists($this->getParams(), $setter)) {
            try {
                $this->getParams()->$setter($value);
            } catch(TypeError $e) {
                throw new InvalidArgumentException($e->getMessage(), $e->getCode());
            }
        } else {
            $this->additionalData[$key] = $value;
        }

        return $this;
    }

    /**
     * Set params properties from array using setters or as additional data.
     * @param array $data
     * @return self
     * @throws InvalidArgumentException
     */
    public function setParams(array $data = []): self
    {
        foreach($data as $key => $value) {
            $this->setParam($key, $value);
        }

        return $this;
    }

    /**
     * Set required base params.
     * @return self
     */
    protected function setBaseProperties(): self
    {
        $time = $this->time ?: new DateTime();

        $requestBody = $this->getRequestBody();
        if (!$uuid = $requestBody->getClient()->getUuid()) {
            throw new InvalidArgumentException('Client uuid not found');
        }

        $this->setParam('source', $this->determineSource());

        $requestBody->setLabel($this->label);
        $requestBody->setTime($time->format(DateTime::ATOM));
        $requestBody->setEventSalt($this->eventSalt ?: time()."_{$this->action}_$uuid");
        if (!empty($this->additionalData)) {
            $this->getParams()->setAdditionalData($this->additionalData);
        }

        return $this;
    }

    /**
     * Determine source. Return directly set value or use source provider.
     * @return EventSource|null
     * @throws InvalidArgumentException
     */
    protected function determineSource(): ?EventSource
    {
        if ($this->source) {
            return $this->source;
        }

        if( !$this->sourceProvider) {
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
     * @return EventBase
     */
    abstract protected function getRequestBody(): EventBase;

    /**
     * Returns event object's params being built
     * @return AdditionalDataHolder
     */
    abstract protected function getParams(): AdditionalDataHolder;
}