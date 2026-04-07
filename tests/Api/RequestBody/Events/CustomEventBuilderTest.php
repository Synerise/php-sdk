<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\RequestBody\Events;

use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\SearchedEvent;
use Synerise\Api\V4\Models\SharedEvent;
use Synerise\Sdk\Api\RequestBody\Events\AddedReviewBuilder;
use Synerise\Sdk\Api\RequestBody\Events\CustomBuilder;
use Synerise\Sdk\Api\RequestBody\Events\DeletedBuilder;
use Synerise\Sdk\Api\RequestBody\Events\SearchedBuilder;
use Synerise\Sdk\Api\RequestBody\Events\SharedBuilder;
use Synerise\Sdk\Api\Validation\Events\AddedReviewValidator;
use Synerise\Sdk\Api\Validation\Events\CustomValidator;
use Synerise\Sdk\Api\Validation\Events\DeletedValidator;
use Synerise\Sdk\Api\Validation\Events\SearchedValidator;
use Synerise\Sdk\Api\Validation\Events\SharedValidator;

class CustomEventBuilderTest extends TestCase
{
    // --- CustomBuilder ---

    public function testCustomBuilderInitializeShouldReturnBuilder(): void
    {
        $builder = CustomBuilder::initialize($this->createClient());

        $this->assertInstanceOf(CustomBuilder::class, $builder);
    }

    public function testCustomBuilderSetActionShouldSetAction(): void
    {
        $builder = CustomBuilder::initialize($this->createClient());
        $builder->setAction('my.custom.action')
            ->setLabel('Test')
            ->setSource($this->createSource());

        $event = $builder->build(false);

        $this->assertSame('my.custom.action', $event->getAction());
    }

    public function testCustomBuilderGetValidatorShouldReturnCustomValidator(): void
    {
        $this->assertInstanceOf(CustomValidator::class, CustomBuilder::getValidator());
    }

    // --- AddedReviewBuilder ---

    public function testAddedReviewInitializeShouldReturnBuilder(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());

        $this->assertInstanceOf(AddedReviewBuilder::class, $builder);
    }

    public function testAddedReviewBuildShouldHaveCorrectActionAndLabel(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());

        $event = $builder->build(false);

        $this->assertInstanceOf(CustomEvent::class, $event);
        $this->assertSame('product.addReview', $event->getAction());
        $this->assertSame('Profile reviewed product', $event->getLabel());
    }

    public function testAddedReviewSetSkuShouldStoreInAdditionalData(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());
        $builder->setSku('sku-456');

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame('sku-456', $additionalData['sku']);
    }

    public function testAddedReviewSetRatingShouldStoreInAdditionalData(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());
        $builder->setRating(5);

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame(5, $additionalData['rating']);
    }

    public function testAddedReviewSetNameShouldStoreInAdditionalData(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());
        $builder->setName('John Doe');

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame('John Doe', $additionalData['name']);
    }

    public function testAddedReviewSetUrlShouldStoreInAdditionalData(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());
        $builder->setUrl('https://example.com/product');

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame('https://example.com/product', $additionalData['url']);
    }

    public function testAddedReviewSetCategoryShouldStoreInAdditionalData(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());
        $builder->setCategory('Electronics');

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame('Electronics', $additionalData['category']);
    }

    public function testAddedReviewSetTitleAndCommentShouldStoreInAdditionalData(): void
    {
        $builder = AddedReviewBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());
        $builder->setTitle('Great product');
        $builder->setComment('Highly recommend');

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame('Great product', $additionalData['title']);
        $this->assertSame('Highly recommend', $additionalData['comment']);
    }

    public function testAddedReviewGetValidatorShouldReturnAddedReviewValidator(): void
    {
        $this->assertInstanceOf(AddedReviewValidator::class, AddedReviewBuilder::getValidator());
    }

    // --- DeletedBuilder ---

    public function testDeletedBuilderBuildShouldHaveCorrectAction(): void
    {
        $builder = DeletedBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());

        $event = $builder->build(false);

        $this->assertInstanceOf(CustomEvent::class, $event);
        $this->assertSame('client.deleteAccount', $event->getAction());
    }

    public function testDeletedBuilderGetValidatorShouldReturnDeletedValidator(): void
    {
        $this->assertInstanceOf(DeletedValidator::class, DeletedBuilder::getValidator());
    }

    // --- SharedBuilder ---

    public function testSharedBuilderBuildShouldReturnSharedEvent(): void
    {
        $builder = SharedBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());

        $event = $builder->build(false);

        $this->assertInstanceOf(SharedEvent::class, $event);
        $this->assertSame('Content shared', $event->getLabel());
    }

    public function testSharedBuilderGetValidatorShouldReturnSharedValidator(): void
    {
        $this->assertInstanceOf(SharedValidator::class, SharedBuilder::getValidator());
    }

    // --- SearchedBuilder ---

    public function testSearchedBuilderBuildShouldReturnSearchedEvent(): void
    {
        $builder = SearchedBuilder::initialize($this->createClient());
        $builder->setSource($this->createSource());

        $event = $builder->build(false);

        $this->assertInstanceOf(SearchedEvent::class, $event);
        $this->assertSame('Search requested', $event->getLabel());
    }

    public function testSearchedBuilderGetValidatorShouldReturnSearchedValidator(): void
    {
        $this->assertInstanceOf(SearchedValidator::class, SearchedBuilder::getValidator());
    }

    // --- Helpers ---

    private function createClient(): Client
    {
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        return $client;
    }

    private function createSource(): EventSource
    {
        return new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P);
    }
}
