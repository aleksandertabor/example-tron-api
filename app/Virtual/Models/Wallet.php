<?php
/**
 * @OA\Schema(
 *     title="Wallet",
 *     description="Wallet model",
 *     @OA\Xml(
 *         name="Wallet"
 *     )
 * )
 */
class Wallet
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Address",
     *      description="Address of the new wallet",
     *      format="base58",
     *      example="TUhpmQ4z8cb9rYgGQyEqSdW2ntaQysbBL8"
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *      title="Secret",
     *      description="Secret (private key) of the new wallet",
     *    example="dd3ddf3e320321c806cf054f096ded50075fdfef1f99f9d06c2ed5ca9cca7ae5"
     * )
     *
     * @var string
     */
    public $secret;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-06-24 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-06-24 19:20:09",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
