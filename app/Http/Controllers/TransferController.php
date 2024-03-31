<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Paysera\Client\TransfersClient\ClientFactory;

class TransferController extends Controller
{
    public function index(Request $request)
    {
        $details = $request->all();

        $clientFactory = new ClientFactory([
            'base_url' => 'https://wallet.paysera.com/transfer/rest/v1/', // optional, in case you need a custom one.
            'basic' => [                                        // use this, it API requires Basic authentication.
                'username' => 'username',
                'password' => 'password',
            ],
            'oauth' => [                                        // use this, it API requires OAuth v2 authentication.
                'token' => [
                    'access_token' => 'my-access-token',
                    'refresh_token' => 'my-refresh-token',
                ],
            ],
            // other configuration options, if needed
        ]);

        $transfersClient = $clientFactory->getTransfersClient();

    }

}
