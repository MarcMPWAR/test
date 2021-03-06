<?php
namespace Development;

class Money
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function negate()
    {
        return new Money(-1 * $this->amount);
    }

    public function notCoveredMethod( $value )
    {
        if ( !empty( $value ) )
        {
            $this->amount = $value;
        }
        else
        {
            $this->amount = 0;
        }
    }
}