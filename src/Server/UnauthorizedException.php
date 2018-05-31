<?php

namespace Dragooon\Hawk\Server;

use Dragooon\Hawk\Header\HeaderFactory;

class UnauthorizedException extends \Exception
{
    private $attributes;
    private $header;

    /**
     * @param string $message
     * @param array $attributes
     */
    public function __construct($message = null, array $attributes = [])
    {
        parent::__construct($message);
    }

    /**
     * @return \Dragooon\Hawk\Header\Header
     */
    public function getHeader()
    {
        if (null !== $this->header) {
            return $this->header;
        }

        $attributes = $this->attributes;
        if ($this->getMessage()) {
            $attributes['error'] = $this->getMessage();
        }

        return $this->header = HeaderFactory::create('WWW-Authenticate', $attributes);
    }
}
