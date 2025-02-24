<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\Custom\CustomPostRequestBody;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\Product;
use Synerise\Sdk\Api\Validation\Models\ProductValidator;

class CartStatusValidator implements Validator
{
    /**
     * Validate cart.status CustomPostRequestBody.
     * @var CustomPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);

        if (empty($event->getAction())) {
            $invalid[] = 'Action is required';
        }

        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        } else {
            $additionalData = $params->getAdditionalData();
            if (!isset($additionalData['source'])) {
                $invalid[] = 'Event source is required';
            }

            if (!isset($additionalData['total_amount'])) {
                $invalid[] = 'Total amount is required';
            } elseif (!is_float($additionalData['total_amount'])) {
                $invalid[] = 'Total amount must be a float';
            }
            if (!isset($additionalData['total_quantity'])) {
                $invalid[] = 'Total quantity is required';
            } elseif (!is_float($additionalData['total_quantity'])) {
                $invalid[] = 'Total quantity must be a float';
            }
            if (!isset($additionalData['products'])) {
                $invalid[] = 'Products required';
            } elseif (!is_array($additionalData['products'])) {
                $invalid[] = 'Products must be an array';
            } else {
                foreach ($additionalData['products'] as $product) {
                    if (!is_a($product, Product::class)) {
                        $invalid[] = 'Product type invalid';
                        break;
                    }
                    ProductValidator::validate($product);
                }
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'cart.status CustomPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}
