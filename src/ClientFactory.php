<?php

namespace Paysera\Client\TransfersClient;

use Paysera\Component\RestClientCommon\Util\ClientFactoryAbstract;
use Paysera\Component\RestClientCommon\Client\ApiClient;

class ClientFactory extends ClientFactoryAbstract
{
    const DEFAULT_BASE_URL = 'https://wallet.paysera.com/transfer/rest/v1/';

    private ApiClient $apiClient;

    public function __construct($options)
    {
        if ($options instanceof ApiClient) {
            $this->apiClient = $options;
            return;
        }

        $defaultUrlParameters = [];

        $options['url_parameters'] = $this->resolveDefaultUrlParameters($defaultUrlParameters, $options);
        $this->apiClient = $this->createApiClient($options);
    }

    public function getTransfersClient()
    {
        return new TransfersClient($this->apiClient);
    }

    private function resolveDefaultUrlParameters(array $defaults, array $options)
    {
        $params = [];
        if (isset($options['url_parameters'])) {
            $params = $options['url_parameters'];
        }

        return $params + $defaults;
    }
}
