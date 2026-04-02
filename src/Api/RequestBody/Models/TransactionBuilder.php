<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Models;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DiscountAmount;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\PaymentInfo;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\Revenue;
use Synerise\Api\V4\Models\Transaction;
use Synerise\Api\V4\Models\TransactionMeta;
use Synerise\Api\V4\Models\Value;
use Synerise\Sdk\Api\Validation\Models\TransactionValidator;

class TransactionBuilder
{
    private Transaction $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction();
    }

    public static function initialize(): self
    {
        return new TransactionBuilder();
    }

    public function build(bool $validate = true): Transaction
    {
        if ($validate) {
            TransactionValidator::validate($this->transaction);
        }

        return $this->transaction;
    }

    public function addProduct(Product $value): self
    {
        $products = $this->transaction->getProducts() ?? [];
        $products[] = $value;
        $this->transaction->setProducts($products);

        return $this;
    }

    public function removeProduct(Product $value): self
    {
        $products = $this->transaction->getProducts() ?? [];
        foreach ($products as $i => $product) {
            if ($product->getSku() === $value->getSku()) {
                array_splice($products, $i, 1);
                break;
            }
        }
        $this->transaction->setProducts($products);

        return $this;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     *
     * @param array<string,mixed> $value value to set for the AdditionalData property
     */
    public function setAdditionalData(?array $value): self
    {
        $this->transaction->setAdditionalData($value);

        return $this;
    }

    /**
     * Sets the client property value. You must provide at least one of those profile identifiers.
     *
     * @param Client|null $value value to set for the client property
     */
    public function setClient(?Client $value): self
    {
        $this->transaction->setClient($value);

        return $this;
    }

    /**
     * Sets the discountAmount property value. How much the total cost decreased.
     *
     * @param DiscountAmount|null $value value to set for the discountAmount property
     */
    public function setDiscountAmount(?DiscountAmount $value): self
    {
        $this->transaction->setDiscountAmount($value);

        return $this;
    }

    /**
     * Sets the eventSalt property value. When an event has an `eventSalt`, it can be overwritten by sending another event.`eventSalt` must be unique in a workspace. An example of creating a salt is by generating a UUID or concatenating the profile ID, event's name, and timestamp, including milliseconds. This creates a value whose possibility of being duplicated is practically zero.To overwrite an event with another one, the new event MUST:- have the same `eventSalt` as the original event- have the same date and time as the original event (If the date and time don't match the original event, event salt doesn't have any effect.)- belong to the same `clientId` as the original event- have the same action (event name) as the original event------**IMPORTANT**:  - DO NOT send the same `eventSalt` to different profiles!- DO NOT send the same `eventSalt` with a different action!- Pay attention to timezones - more details in the description of the `time` property (in v4/transactions events, it's called `recordedAt`).- If you send a future time in an event, it is rejected and the current time is assigned automatically. This means it's impossible to use event salt with future times.- Overwriting an event by using the event salt doesn't trigger automations.- An event without an `eventSalt` can't be overwritten. The parameter cannot be added to an event at a later time.- The parameter can't be retrieved later. You must keep track of the values that you send.
     *
     * @param string|null $value value to set for the eventSalt property
     */
    public function setEventSalt(?string $value): self
    {
        $this->transaction->setEventSalt($value);

        return $this;
    }

    /**
     * Sets the metadata property value. Any custom parameters.
     *
     * @param TransactionMeta|null $value value to set for the metadata property
     */
    public function setMetadata(?TransactionMeta $value): self
    {
        $this->transaction->setMetadata($value);

        return $this;
    }

    /**
     * Sets the orderId property value. ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
     *
     * @param string|null $value value to set for the orderId property
     */
    public function setOrderId(?string $value): self
    {
        $this->transaction->setOrderId($value);

        return $this;
    }

    /**
     * Sets the paymentInfo property value. Payment details.
     *
     * @param PaymentInfo|null $value value to set for the paymentInfo property
     */
    public function setPaymentInfo(?PaymentInfo $value): self
    {
        $this->transaction->setPaymentInfo($value);

        return $this;
    }

    /**
     * Sets the products property value. A list of items in the transaction.Each item creates a `product.buy` event. The UUID of that event is generated from a combination of:  - the UUID of the `transaction.charge` event created by the transaction  - the position of the item in this array. This has an effect on updating transaction events. This means that when you update a transaction (a transaction can only be updated if it has an `eventSalt` and the same timestamp as the original), you must keep the original order of items in the array. Otherwise, you may accidentally overwrite a `product.buy` event with another item's event. The system does NOT recognize the item by SKU in this case.**Example**:  1. You create a transaction with items A, B, and C (in that order).  2. You update the transaction and the items are now A, B, D, and C (in that order).  3. Because item D took the position of C in the event, it has the same UUID as C had earlier. The event of D overwrites the event of C, and C is generated as a new event.Additionally, because events can't be deleted from the database, cancelled items remain as events in a Profile's history. You can use a custom free-form property to tag items as cancelled. This way, you can keep cancelled items in `products` when updating a transaction without breaking the order of items. You can also use the property to filter cancelled items out in Analytics.
     *
     * @param array<Product>|null $value value to set for the products property
     */
    public function setProducts(?array $value): self
    {
        $this->transaction->setProducts($value);

        return $this;
    }

    /**
     * Sets the recordedAt property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     *
     * @param string|null $value value to set for the recordedAt property
     */
    public function setRecordedAt(?string $value): self
    {
        $this->transaction->setRecordedAt($value);

        return $this;
    }

    /**
     * Sets the revenue property value. Transaction revenue (`net + taxes - discounts`). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
     *
     * @param Revenue|null $value value to set for the revenue property
     */
    public function setRevenue(?Revenue $value): self
    {
        $this->transaction->setRevenue($value);

        return $this;
    }

    /**
     * Sets the source property value. Source of the event.
     *
     * @param EventSource|null $value value to set for the source property
     */
    public function setSource(?EventSource $value): self
    {
        $this->transaction->setSource($value);

        return $this;
    }

    /**
     * Sets the value property value. If you want to display the price without tax, use this object. If you only want to display the total price of the transaction, set the values to the same as in `revenue`.
     *
     * @param Value|null $value value to set for the value property
     */
    public function setValue(?Value $value): self
    {
        $this->transaction->setValue($value);

        return $this;
    }
}
