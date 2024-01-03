<?php

namespace Mollie\Api\Endpoints;

use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\Resources\Chargeback;
use Mollie\Api\Resources\ChargebackCollection;
use Mollie\Api\Resources\LazyCollection;

class ChargebackEndpoint extends CollectionEndpointAbstract
{
    protected string $resourcePath = "chargebacks";

    /**
     * @inheritDoc
     */
    protected function getResourceObject(): Chargeback
    {
        return new Chargeback($this->client);
    }

    /**
     * @inheritDoc
     */
    protected function getResourceCollectionObject(int $count, object $_links): ChargebackCollection
    {
        return new ChargebackCollection($this->client, $count, $_links);
    }

    /**
     * Retrieves a collection of Chargebacks from Mollie.
     *
     * @param string $from The first chargeback ID you want to include in your list.
     * @param int $limit
     * @param array $parameters
     *
     * @return ChargebackCollection
     * @throws ApiException
     */
    public function page(?string $from = null, ?int $limit = null, array $parameters = []): ChargebackCollection
    {
        return $this->rest_list($from, $limit, $parameters);
    }

    /**
     * Create an iterator for iterating over chargeback retrieved from Mollie.
     *
     * @param string $from The first chargevback ID you want to include in your list.
     * @param int $limit
     * @param array $parameters
     * @param bool $iterateBackwards Set to true for reverse order iteration (default is false).
     *
     * @return LazyCollection
     */
    public function iterator(?string $from = null, ?int $limit = null, array $parameters = [], bool $iterateBackwards = false): LazyCollection
    {
        return $this->rest_iterator($from, $limit, $parameters, $iterateBackwards);
    }
}
