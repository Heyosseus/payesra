<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paysera\Client\TransfersClient\ClientFactory;
use Paysera\Client\TransfersClient\Entity\Money;
use Paysera\Client\TransfersClient\Entity as Entities;

class TransferController extends Controller
{

    protected $clientFactory;

    public function __construct(ClientFactory $clientFactory)
    {
        $this->clientFactory = $clientFactory;
    }

    public function index(Request $request)
    {
        $transferInput = new Entities\TransferInput();
        $amountData = [
            'amount' => $request->input('amount.amount'),
            'currency' => $request->input('amount.currency')
        ];
        $amount = new Money($amountData);


        $transferInput
            ->setAmount($amount);

        $transfersClient = $this->clientFactory->getTransfersClient();
        $result = $transfersClient->createTransfer($transferInput);

        return response()->json($result);
    }

}
