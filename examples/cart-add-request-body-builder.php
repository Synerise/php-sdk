<?php

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Sdk\Api\RequestBody\Events\AddedToCartBuilder;

$finalUnitPrice = new FinalUnitPrice();
$finalUnitPrice->setCurrency('USD');
$finalUnitPrice->setAmount(10);

/** @var Client $client */
$requestBody = AddedToCartBuilder::initialize($client)
    ->setSku('test-sku1')
    ->setName('Test Product')
    ->setQuantity(1.0)
    ->setFinalUnitPrice($finalUnitPrice)
    ->setParams([
        'param1' => 1,
        'param2' => '2'
    ])
    ->build();