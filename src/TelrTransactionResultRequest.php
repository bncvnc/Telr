<?php

namespace payment\telr;

use Illuminate\Contracts\Support\Arrayable;

class TelrTransactionResultRequest extends AbstractTelrRequest implements Arrayable
{
    /**
     * @var \payment\telr\Transaction
     */
    protected $transaction;

    /**
     * TelrTransactionResultRequest constructor.
     *
     * @param \payment\telr\Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->setMethod('check');
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'ivp_method' => $this->getMethod(),
            'ivp_store' => $this->getStoreId(),
            'ivp_authkey' => $this->getAuthkey(),
            'order_ref' => $this->transaction->trx_reference,
        ];
    }
}