<?php

namespace Synerise\Api\V4\Events\CancelledTransaction;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\V4\Models\DiscountAmount;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\PaymentInfo;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\Revenue;
use Synerise\Api\V4\Models\Value;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
*/
class CancelledTransactionPostRequestBody_params implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DiscountAmount|null $discountAmount How much the total cost decreased
    */
    private ?DiscountAmount $discountAmount = null;
    
    /**
     * @var string|null $discountCode Discount code
    */
    private ?string $discountCode = null;
    
    /**
     * @var float|null $discountPercent Discount as a percentage
    */
    private ?float $discountPercent = null;
    
    /**
     * @var string|null $orderId ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
    */
    private ?string $orderId = null;
    
    /**
     * @var string|null $orderStatus Status of the order
    */
    private ?string $orderStatus = null;
    
    /**
     * @var PaymentInfo|null $paymentInfo Payment details
    */
    private ?PaymentInfo $paymentInfo = null;
    
    /**
     * @var array<Product>|null $products A list of items in the transaction
    */
    private ?array $products = null;
    
    /**
     * @var Revenue|null $revenue Transaction revenue (`net + taxes - discounts`). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
    */
    private ?Revenue $revenue = null;
    
    /**
     * @var EventSource|null $source Source of the event. 
    */
    private ?EventSource $source = null;
    
    /**
     * @var Value|null $value If you want to display the price without tax, use this object. If you only want to display the total price of the transaction, set the values to the same as in `revenue`.
    */
    private ?Value $value = null;
    
    /**
     * Instantiates a new CancelledTransactionPostRequestBody_params and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CancelledTransactionPostRequestBody_params
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CancelledTransactionPostRequestBody_params {
        return new CancelledTransactionPostRequestBody_params();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the discountAmount property value. How much the total cost decreased
     * @return DiscountAmount|null
    */
    public function getDiscountAmount(): ?DiscountAmount {
        return $this->discountAmount;
    }

    /**
     * Gets the discountCode property value. Discount code
     * @return string|null
    */
    public function getDiscountCode(): ?string {
        return $this->discountCode;
    }

    /**
     * Gets the discountPercent property value. Discount as a percentage
     * @return float|null
    */
    public function getDiscountPercent(): ?float {
        return $this->discountPercent;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'discountAmount' => fn(ParseNode $n) => $o->setDiscountAmount($n->getObjectValue([DiscountAmount::class, 'createFromDiscriminatorValue'])),
            'discountCode' => fn(ParseNode $n) => $o->setDiscountCode($n->getStringValue()),
            'discountPercent' => fn(ParseNode $n) => $o->setDiscountPercent($n->getFloatValue()),
            'orderId' => fn(ParseNode $n) => $o->setOrderId($n->getStringValue()),
            'orderStatus' => fn(ParseNode $n) => $o->setOrderStatus($n->getStringValue()),
            'paymentInfo' => fn(ParseNode $n) => $o->setPaymentInfo($n->getObjectValue([PaymentInfo::class, 'createFromDiscriminatorValue'])),
            'products' => fn(ParseNode $n) => $o->setProducts($n->getCollectionOfObjectValues([Product::class, 'createFromDiscriminatorValue'])),
            'revenue' => fn(ParseNode $n) => $o->setRevenue($n->getObjectValue([Revenue::class, 'createFromDiscriminatorValue'])),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(EventSource::class)),
            'value' => fn(ParseNode $n) => $o->setValue($n->getObjectValue([Value::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the orderId property value. ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
     * @return string|null
    */
    public function getOrderId(): ?string {
        return $this->orderId;
    }

    /**
     * Gets the orderStatus property value. Status of the order
     * @return string|null
    */
    public function getOrderStatus(): ?string {
        return $this->orderStatus;
    }

    /**
     * Gets the paymentInfo property value. Payment details
     * @return PaymentInfo|null
    */
    public function getPaymentInfo(): ?PaymentInfo {
        return $this->paymentInfo;
    }

    /**
     * Gets the products property value. A list of items in the transaction
     * @return array<Product>|null
    */
    public function getProducts(): ?array {
        return $this->products;
    }

    /**
     * Gets the revenue property value. Transaction revenue (`net + taxes - discounts`). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
     * @return Revenue|null
    */
    public function getRevenue(): ?Revenue {
        return $this->revenue;
    }

    /**
     * Gets the source property value. Source of the event. 
     * @return EventSource|null
    */
    public function getSource(): ?EventSource {
        return $this->source;
    }

    /**
     * Gets the value property value. If you want to display the price without tax, use this object. If you only want to display the total price of the transaction, set the values to the same as in `revenue`.
     * @return Value|null
    */
    public function getValue(): ?Value {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('discountAmount', $this->getDiscountAmount());
        $writer->writeStringValue('discountCode', $this->getDiscountCode());
        $writer->writeFloatValue('discountPercent', $this->getDiscountPercent());
        $writer->writeStringValue('orderId', $this->getOrderId());
        $writer->writeStringValue('orderStatus', $this->getOrderStatus());
        $writer->writeObjectValue('paymentInfo', $this->getPaymentInfo());
        $writer->writeCollectionOfObjectValues('products', $this->getProducts());
        $writer->writeObjectValue('revenue', $this->getRevenue());
        $writer->writeEnumValue('source', $this->getSource());
        $writer->writeObjectValue('value', $this->getValue());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the discountAmount property value. How much the total cost decreased
     * @param DiscountAmount|null $value Value to set for the discountAmount property.
    */
    public function setDiscountAmount(?DiscountAmount $value): void {
        $this->discountAmount = $value;
    }

    /**
     * Sets the discountCode property value. Discount code
     * @param string|null $value Value to set for the discountCode property.
    */
    public function setDiscountCode(?string $value): void {
        $this->discountCode = $value;
    }

    /**
     * Sets the discountPercent property value. Discount as a percentage
     * @param float|null $value Value to set for the discountPercent property.
    */
    public function setDiscountPercent(?float $value): void {
        $this->discountPercent = $value;
    }

    /**
     * Sets the orderId property value. ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
     * @param string|null $value Value to set for the orderId property.
    */
    public function setOrderId(?string $value): void {
        $this->orderId = $value;
    }

    /**
     * Sets the orderStatus property value. Status of the order
     * @param string|null $value Value to set for the orderStatus property.
    */
    public function setOrderStatus(?string $value): void {
        $this->orderStatus = $value;
    }

    /**
     * Sets the paymentInfo property value. Payment details
     * @param PaymentInfo|null $value Value to set for the paymentInfo property.
    */
    public function setPaymentInfo(?PaymentInfo $value): void {
        $this->paymentInfo = $value;
    }

    /**
     * Sets the products property value. A list of items in the transaction
     * @param array<Product>|null $value Value to set for the products property.
    */
    public function setProducts(?array $value): void {
        $this->products = $value;
    }

    /**
     * Sets the revenue property value. Transaction revenue (`net + taxes - discounts`). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
     * @param Revenue|null $value Value to set for the revenue property.
    */
    public function setRevenue(?Revenue $value): void {
        $this->revenue = $value;
    }

    /**
     * Sets the source property value. Source of the event. 
     * @param EventSource|null $value Value to set for the source property.
    */
    public function setSource(?EventSource $value): void {
        $this->source = $value;
    }

    /**
     * Sets the value property value. If you want to display the price without tax, use this object. If you only want to display the total price of the transaction, set the values to the same as in `revenue`.
     * @param Value|null $value Value to set for the value property.
    */
    public function setValue(?Value $value): void {
        $this->value = $value;
    }

}
