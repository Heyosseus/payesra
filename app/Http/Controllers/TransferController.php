<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paysera\Client\TransfersClient\ClientFactory;
use Paysera\Client\TransfersClient\Entity\Money;
use Paysera\Client\TransfersClient\Entity as Entities;

class TransferController extends Controller
{

    protected ClientFactory $clientFactory;

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
        $clientFactory = new ClientFactory([
            'base_url' => 'https://wallet.paysera.com/transfer/rest/v1/',
            'mac' => [
                'mac_id' => 'mac_id',
                'mac_secret' => 'mac_password',
            ],
        ]);
        $transfersClient = $clientFactory->getTransfersClient();

        $transferInput
            ->setAmount($amount)
            ->setBeneficiary($request->input('beneficiary'))
            ->setPayer($request->input('payer'))
            ->setFinalBeneficiary($request->input('finalBeneficiary'))
            ->setPerformAt($request->input('performAt'))
            ->setChargeType($request->input('chargeType'))
            ->setUrgency($request->input('urgency'))
            ->setNotifications($request->input('notifications'))
            ->setPurpose(   $request->input('purpose'))
            ->setPassword($request->input('password'))
            ->setCancelable($request->input('cancelable'))
            ->setAutoCurrencyConvert($request->input('autoCurrencyConvert'))
            ->setAutoChargeRelatedCard($request->input('autoChargeRelatedCard'))
            ->setAutoProcessToDone($request->input('autoProcessToDone'))
            ->setReserveUntil($request->input('reserveUntil'))
            ->setCallback($request->input('callback'))
        ;

        $result = $transfersClient->createTransfer($transferInput);


        $transfersClient = $this->clientFactory->getTransfersClient();

        $result = $transfersClient->createTransfer($transferInput);

        return response()->json($result);
    }

}
