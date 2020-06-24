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

    /**
     * @OA\Post(
     *      path="/wallets",
     *      operationId="createWallet",
     *      tags={"Wallets"},
     *      summary="Create new wallet",
     *      description="Returns wallet data",
     *      @OA\RequestBody(
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Wallet")
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Error"
     *      )
     * )
     */
    public function createWallet()
    {
        $wallet = $this->api->createAccount();

        return response()->json(Wallet::create([
            'address' => $wallet['address'],
            'secret' => $wallet['privateKey'],
        ]), 201);
    }

    /**
     * @OA\Get(
     *      path="/wallets/balance/{wallet:address}",
     *      operationId="getWalletBalance",
     *      tags={"Wallets"},
     *      summary="Get wallet balance",
     *      description="Returns wallet balance",
     *      @OA\Parameter(
     *          name="wallet:address",
     *          description="Wallet address",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="balance",
     *                  title="Balance",
     *                  description="Wallet balance",
     *                  format="int64",
     *                  example=29887074430
     *              )
     *          )
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Wallet not found",
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Error"
     *      )
     * )
     */
    public function getWalletBalance(Wallet $wallet)
    {
        $balance = $this->api->getBalance($wallet->address);

        return response()->json([
            'balance' => $balance,
        ]);
    }
}
