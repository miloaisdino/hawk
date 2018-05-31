<?php

namespace Dragooon\Hawk\Nonce;

class CallbackNonceValidator implements NonceValidatorInterface
{
    private $callback;

    /**
     * @param callback $callback
     */
    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritDoc}
     */
    public function validateNonce($key, $nonce, $timestamp)
    {
        return call_user_func_array($this->callback, [$key, $nonce, $timestamp]);
    }
}
