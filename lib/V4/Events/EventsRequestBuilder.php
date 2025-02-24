<?php

namespace Synerise\Api\V4\Events;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Events\AddedToCart\AddedToCartRequestBuilder;
use Synerise\Api\V4\Events\AddedToFavorites\AddedToFavoritesRequestBuilder;
use Synerise\Api\V4\Events\AiCompat\AiCompatRequestBuilder;
use Synerise\Api\V4\Events\AppearedInLocation\AppearedInLocationRequestBuilder;
use Synerise\Api\V4\Events\ApplicationStarted\ApplicationStartedRequestBuilder;
use Synerise\Api\V4\Events\AssignedToCompany\AssignedToCompanyRequestBuilder;
use Synerise\Api\V4\Events\Batch\BatchRequestBuilder;
use Synerise\Api\V4\Events\CancelledTransaction\CancelledTransactionRequestBuilder;
use Synerise\Api\V4\Events\Custom\CustomRequestBuilder;
use Synerise\Api\V4\Events\HitTimer\HitTimerRequestBuilder;
use Synerise\Api\V4\Events\ItemSearchClick\ItemSearchClickRequestBuilder;
use Synerise\Api\V4\Events\LoggedIn\LoggedInRequestBuilder;
use Synerise\Api\V4\Events\LoggedOut\LoggedOutRequestBuilder;
use Synerise\Api\V4\Events\ProductView\ProductViewRequestBuilder;
use Synerise\Api\V4\Events\Push\PushRequestBuilder;
use Synerise\Api\V4\Events\Registered\RegisteredRequestBuilder;
use Synerise\Api\V4\Events\RemovedFromCart\RemovedFromCartRequestBuilder;
use Synerise\Api\V4\Events\Searched\SearchedRequestBuilder;
use Synerise\Api\V4\Events\Shared\SharedRequestBuilder;
use Synerise\Api\V4\Events\VisitedScreen\VisitedScreenRequestBuilder;

/**
 * Builds and executes requests for operations under /events
*/
class EventsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The addedToCart property
    */
    public function addedToCart(): AddedToCartRequestBuilder {
        return new AddedToCartRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The addedToFavorites property
    */
    public function addedToFavorites(): AddedToFavoritesRequestBuilder {
        return new AddedToFavoritesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The aiCompat property
    */
    public function aiCompat(): AiCompatRequestBuilder {
        return new AiCompatRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The appearedInLocation property
    */
    public function appearedInLocation(): AppearedInLocationRequestBuilder {
        return new AppearedInLocationRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The applicationStarted property
    */
    public function applicationStarted(): ApplicationStartedRequestBuilder {
        return new ApplicationStartedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The assignedToCompany property
    */
    public function assignedToCompany(): AssignedToCompanyRequestBuilder {
        return new AssignedToCompanyRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The batch property
    */
    public function batch(): BatchRequestBuilder {
        return new BatchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The cancelledTransaction property
    */
    public function cancelledTransaction(): CancelledTransactionRequestBuilder {
        return new CancelledTransactionRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The custom property
    */
    public function custom(): CustomRequestBuilder {
        return new CustomRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The hitTimer property
    */
    public function hitTimer(): HitTimerRequestBuilder {
        return new HitTimerRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The itemSearchClick property
    */
    public function itemSearchClick(): ItemSearchClickRequestBuilder {
        return new ItemSearchClickRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The loggedIn property
    */
    public function loggedIn(): LoggedInRequestBuilder {
        return new LoggedInRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The loggedOut property
    */
    public function loggedOut(): LoggedOutRequestBuilder {
        return new LoggedOutRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The productView property
    */
    public function productView(): ProductViewRequestBuilder {
        return new ProductViewRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The push property
    */
    public function push(): PushRequestBuilder {
        return new PushRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The registered property
    */
    public function registered(): RegisteredRequestBuilder {
        return new RegisteredRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The removedFromCart property
    */
    public function removedFromCart(): RemovedFromCartRequestBuilder {
        return new RemovedFromCartRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The searched property
    */
    public function searched(): SearchedRequestBuilder {
        return new SearchedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The shared property
    */
    public function shared(): SharedRequestBuilder {
        return new SharedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The visitedScreen property
    */
    public function visitedScreen(): VisitedScreenRequestBuilder {
        return new VisitedScreenRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new EventsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/events');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
