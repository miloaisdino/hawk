<?php

namespace Dragooon\Hawk\Client;

use Dragooon\Hawk\Credentials\CredentialsInterface;
use Dragooon\Hawk\Header\Header;

interface ClientInterface
{
    /**
     * @param CredentialsInterface $credentials
     * @param string $uri
     * @param string $method
     * @param array $options
     * @return Request
     * @throws \InvalidArgumentException
     */
    public function createRequest(CredentialsInterface $credentials, $uri, $method, array $options = []);

    /**
     * @param CredentialsInterface $credentials
     * @param Request $request
     * @param Header|string $headerObjectOrString Response header
     * @param array $options
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function authenticate(
        CredentialsInterface $credentials,
        Request $request,
        $headerObjectOrString,
        array $options = []
    );

    /**
     * @param CredentialsInterface $credentials
     * @param string $uri
     * @param int $ttlSec
     * @param array $options
     * @return string
     */
    public function createBewit(CredentialsInterface $credentials, $uri, $ttlSec, array $options = []);


    /**
     * Generate an authorization string for a message
     *
     * @param CredentialsInterface $credentials
     * @param string $host
     * @param int $port
     * @param string $message
     * @param array $options
     * @return \Dragooon\Hawk\Message\Message
     * @throws \InvalidArgumentException
     */
    public function createMessage(CredentialsInterface $credentials, $host, $port, $message, array $options = []);

}
