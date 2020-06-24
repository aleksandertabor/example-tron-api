<?php

namespace App\Http\Controllers;

use App\Wallet;
use IEXBase\TronAPI\Exception\TronException;
use IEXBase\TronAPI\Provider\HttpProvider;
use IEXBase\TronAPI\Tron;

class TronController extends Controller
{
    private $api;

    public function __construct()
    {
        $fullNode = new HttpProvider('https://api.trongrid.io');
        $solidityNode = new HttpProvider('https://api.trongrid.io');
        $eventServer = new HttpProvider('https://api.trongrid.io');

        try {
            $this->api = new Tron($fullNode, $solidityNode, $eventServer);
        } catch (TronException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function createWallet()
    {
        $wallet = $this->api->createAccount();

        return response()->json(Wallet::create([
            'address' => $wallet['address'],
            'secret' => $wallet['privateKey'],
        ]), 201);
    }

    public function getWalletBalance(Wallet $wallet)
    {
        $balance = $this->api->getBalance($wallet->address);

        return response()->json([
            'balance' => $balance,
        ]);
    }
}
