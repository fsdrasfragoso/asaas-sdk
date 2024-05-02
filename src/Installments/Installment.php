<?php

namespace Asaas\Installments;

class Installment
{
    private $walletId;
    private $fixedValue;
    private $percentualValue;
    private $totalFixedValue;

    /**
     * Constructor for Installment object.
     *
     * @param string $walletId
     * @param float|null $fixedValue
     * @param float|null $percentualValue
     * @param float|null $totalFixedValue
     */
    public function __construct($walletId = null, $fixedValue = null, $percentualValue = null, $totalFixedValue = null)
    {
        $this->walletId = $walletId;
        $this->fixedValue = $fixedValue;
        $this->percentualValue = $percentualValue;
        $this->totalFixedValue = $totalFixedValue;
    }

    /**
     * Get the wallet ID.
     *
     * @return string
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * Set the wallet ID.
     *
     * @param string $walletId
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;
    }

    /**
     * Get the fixed value.
     *
     * @return float|null
     */
    public function getFixedValue()
    {
        return $this->fixedValue;
    }

    /**
     * Set the fixed value.
     *
     * @param float|null $fixedValue
     */
    public function setFixedValue($fixedValue)
    {
        $this->fixedValue = $fixedValue;
    }

    /**
     * Get the percentual value.
     *
     * @return float|null
     */
    public function getPercentualValue()
    {
        return $this->percentualValue;
    }

    /**
     * Set the percentual value.
     *
     * @param float|null $percentualValue
     */
    public function setPercentualValue($percentualValue)
    {
        $this->percentualValue = $percentualValue;
    }

    /**
     * Get the total fixed value.
     *
     * @return float|null
     */
    public function getTotalFixedValue()
    {
        return $this->totalFixedValue;
    }

    /**
     * Set the total fixed value.
     *
     * @param float|null $totalFixedValue
     */
    public function setTotalFixedValue($totalFixedValue)
    {
        $this->totalFixedValue = $totalFixedValue;
    }
}
