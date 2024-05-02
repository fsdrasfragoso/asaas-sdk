<?php

namespace Asaas\Api\Installments;

use Asaas\Api\AsaasClient;

class InstallmentService extends AsaasClient 
{
    private $defaultEndpoint = 'v3/installments';
    private $endpoint;

    public function __construct($apiKey, $baseUri = 'https://sandbox.asaas.com/api/') 
    {
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

    /**
     * Retrieves the payment book for a particular installment.
     *
     * @param string $installmentId Unique identifier for the installment.
     * @param string|null $sort Optional. Column name to sort by.
     * @param string|null $order Optional. Order of sort (asc or desc).
     * @return mixed
     */
    public function getPaymentBook($installmentId, $sort = null, $order = null)
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $installmentId . '/paymentBook');
        
        // Setup query parameters
        $queryParams = [];
        if (!empty($sort)) {
            $queryParams['sort'] = $sort;
        }
        if (!empty($order)) {
            $queryParams['order'] = $order;
        }

        return $this->get($this->getEndpoint(), $queryParams);
    }

    /**
     * Refunds an installment payment made via credit card.
     *
     * @param string $installmentId Unique identifier for the installment to be refunded.
     * @return mixed
     */
    public function refundInstallment($installmentId)
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $installmentId . '/refund');
        return $this->post($this->getEndpoint(),[]);
    }

    /**
     * Updates the split payment details for an installment.
     *
     * @param string $installmentId Unique identifier for the installment.
     * @param array $splits Array of objects containing split details.
     * @return mixed
     */
    public function updateInstallmentSplits($installmentId, array $splits)
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $installmentId . '/splits');
        return $this->put($this->getEndpoint(), ['splits' => $splits]);
    }

    public function listInstallments($offset = null, $limit = null)
    {
        $this->setEndpoint($this->defaultEndpoint);
        $params = [];
        if (!is_null($offset)) {
            $params['offset'] = $offset;
        }
        if (!is_null($limit)) {
            $params['limit'] = $limit;
        }

        return $this->get($this->getEndpoint(), $params);
    }
}











