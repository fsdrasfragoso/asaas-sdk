<?php

namespace Asaas\Api\Installments;

use Asaas\Api\AsaasClient;

class InstallmentService extends AsaasClient 
{
    private $defaultEndpoint = 'v3/installments';
    private $endpoint;

    public function __construct($apiKey, $baseUri = 'https://sandbox.asaas.com/api/') {
        parent::__construct($apiKey, $baseUri);
        $this->endpoint = $this->defaultEndpoint; // Set initial endpoint
    }

    public function getEndpoint() 
    {
        return $this->endpoint;
    }

    private function setEndpoint($endpoint) 
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Retrieves a single installment by its ID.
     *
     * @param string $installmentId Unique identifier for the installment.
     * @return mixed
     */
    public function getInstallment($installmentId) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $installmentId);
        return $this->get($this->getEndpoint());
    }

    /**
     * Retrieves all payments for a particular installment.
     *
     * @param string $installmentId Unique identifier for the installment.
     * @return mixed
     */
    public function getInstallmentPayments($installmentId) 
    {
        $this->setEndpoint('v3/payments');
        $params = ['installment' => $installmentId];
        return $this->get($this->getEndpoint(), $params);
    }

    public function removeInstallment($installmentId)
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $installmentId);
        return $this->delete($this->getEndpoint());
    }
}
