<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\AddedToFavorites\AddedToFavoritesPostRequestBody;
use Synerise\Api\V4\Events\HitTimer\HitTimerPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\HitTimerValidator;

class HitTimerBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.hitTimer';

    /**
     * Default event labels
     */
    public const LABEL = 'Timer hit';

    /**
     * HitTimerPostRequestBody being built
     * @var HitTimerPostRequestBody
     */
    protected HitTimerPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new HitTimerPostRequestBody();
        $this->requestBody->setClient($client);
    }

    /**
     * @inheritDoc
     * @return HitTimerPostRequestBody
     */
    public function build(bool $validate = true): HitTimerPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return HitTimerValidator
     */
    public static function getValidator(): HitTimerValidator
    {
        return new HitTimerValidator();
    }

    /**
     * @inheritDoc
     * @return HitTimerPostRequestBody
     */
    protected function getRequestBody(): HitTimerPostRequestBody
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        if (!$this->getRequestBody()->getParams()) {
            $this->requestBody->setParams(new DefaultParamSource());
        }
        return $this->getRequestBody()->getParams();
    }
}