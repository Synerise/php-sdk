<?php

namespace Tests\Synerise\Sdk\Api\RequestBody\Models;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DiscountAmount;
use Synerise\Api\V4\Models\DiscountPrice;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\PaymentInfo;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\RegularPrice;
use Synerise\Api\V4\Models\Revenue;
use Synerise\Api\V4\Models\Transaction;
use Synerise\Api\V4\Models\TransactionMeta;
use Synerise\Api\V4\Models\Value;
use Synerise\Sdk\Api\RequestBody\Models\TransactionBuilder;

class TransactionBuilderTest extends TestCase
{
    private TransactionBuilder $transactionBuilder;

    protected function setUp(): void
    {
        $this->transactionBuilder = TransactionBuilder::initialize();
    }

    public function testBuildWithWrongClientUuidThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('UUID format invalid (INVALID_UUID)');

        $client = new Client();
        $client->setUuid('INVALID_UUID');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->build();
    }

    public function testAddAndRemoveProduct(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue);

        // products
        $product1 = new Product();
        $product1->setName('Product1');
        $product1->setQuantity(1);
        $product1->setSku('1');

        $product2 = new Product();
        $product2->setName('Product2');
        $product2->setQuantity(1);
        $product2->setSku('2');

        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $regularPrice->setAmount(130);
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(120);
        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('USD');
        $discountPrice->setAmount(10);

        $product1->setRegularPrice($regularPrice);
        $product1->setFinalUnitPrice($finalUnitPrice);
        $product1->setDiscountPrice($discountPrice);

        $product2->setRegularPrice($regularPrice);
        $product2->setFinalUnitPrice($finalUnitPrice);
        $product2->setDiscountPrice($discountPrice);

        // Act
        $transaction = $this->transactionBuilder
            ->addProduct($product1)
            ->addProduct($product2)
            ->build();

        $this->assertCount(2, $transaction->getProducts());
        $this->assertEquals(
            $product1->getSku(),
            $transaction->getProducts()[0]->getSku()
        );
        $this->assertEquals(
            $product2->getSku(),
            $transaction->getProducts()[1]->getSku()
        );

        $transaction = $this->transactionBuilder
            ->removeProduct($product1)
            ->build();


        $this->assertCount(1, $transaction->getProducts());
        $this->assertEquals(
            $product2->getSku(),
            $transaction->getProducts()[0]->getSku()
        );

        $transaction = $this->transactionBuilder
        ->removeProduct($product2)
        ->build();

        $this->assertEmpty($transaction->getProducts());
    }

    public function testSetProducts(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $product1 = new Product();
        $product1->setName('Product1');
        $product1->setQuantity(1);
        $product1->setSku('1');

        $product2 = new Product();
        $product2->setName('Product2');
        $product2->setQuantity(1);
        $product2->setSku('2');

        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $regularPrice->setAmount(130);
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(120);
        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('USD');
        $discountPrice->setAmount(10);

        $product1->setRegularPrice($regularPrice);
        $product1->setFinalUnitPrice($finalUnitPrice);
        $product1->setDiscountPrice($discountPrice);

        $product2->setRegularPrice($regularPrice);
        $product2->setFinalUnitPrice($finalUnitPrice);
        $product2->setDiscountPrice($discountPrice);

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setProducts([$product1, $product2])
            ->build();

        $this->assertCount(2, $transaction->getProducts());
        $this->assertEquals('1', $transaction->getProducts()[0]->getSku());
        $this->assertEquals('Product2', $transaction->getProducts()[1]->getName());
        $this->assertEquals(1, $transaction->getProducts()[0]->getQuantity());
        $this->assertEquals(120, $transaction->getProducts()[1]->getFinalUnitPrice()->getAmount());
        $this->assertEquals('USD', $transaction->getProducts()[0]->getRegularPrice()->getCurrency());
        $this->assertEquals('USD', $transaction->getProducts()[1]->getDiscountPrice()->getCurrency());
    }

    public function testSetDiscountAmount(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $discountAmount = new DiscountAmount();
        $discountAmount->setAmount(9.99);
        $discountAmount->setCurrency('USD');

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setDiscountAmount($discountAmount)
            ->build();

        $this->assertEquals(9.99, $transaction->getDiscountAmount()->getAmount());
        $this->assertEquals('USD', $transaction->getDiscountAmount()->getCurrency());
    }

    public function testSetEventSalt(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setEventSalt('event_salt')
            ->build();

        $this->assertEquals('event_salt', $transaction->getEventSalt());
    }

    public function testSetMetadata(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $metadata = new TransactionMeta();
        $metadata->setAdditionalData([
            'status' => 'STATUS',
            'discountCode' => 'CODE'
        ]);

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setMetadata($metadata)
            ->build();

        $this->assertEquals('STATUS', $transaction->getMetadata()->getAdditionalData()['status']);
        $this->assertEquals('CODE', $transaction->getMetadata()->getAdditionalData()['discountCode']);
    }

    public function testSetOrderId(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setOrderId('order_id')
            ->build();

        $this->assertEquals('order_id', $transaction->getOrderId());
    }

    public function testSetPaymentInfo(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $paymentInfo = new PaymentInfo();
        $paymentInfo->setMethod('payment_method');

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setPaymentInfo($paymentInfo)
            ->build();

        $this->assertEquals('payment_method', $transaction->getPaymentInfo()->getMethod());
    }

    public function testRecordedAt(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setRecordedAt('2022-10-14T12:02:06Z')
            ->build();

        $this->assertEquals('2022-10-14T12:02:06Z', $transaction->getRecordedAt());
    }

    public function testSetSource(): void
    {
        // required
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $source = new EventSource(EventSource::D_E_S_K_T_O_P);

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->setSource($source)
            ->build();

        $this->assertEquals($source, $transaction->getSource());
    }

    public function testBuildWithoutValidation(): void
    {
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $transaction = $this->transactionBuilder
            ->setClient($client)
            ->setValue($value)
            ->setRevenue($revenue)
            ->build(false);

        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}
