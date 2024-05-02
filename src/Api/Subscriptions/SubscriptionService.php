<?php

namespace Asaas\Api\Subscriptions;

use Asaas\Api\AsaasClient;

class SubscriptionService extends AsaasClient 
{
    private $defaultEndpoint = 'v3/subscriptions';
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
     * Creates a new subscription.
     *
     * @param array $subscriptionData The data needed to create the subscription.
     * @return mixed
     */
    public function createSubscription(array $subscriptionData) 
    {
        return $this->post($this->defaultEndpoint, $subscriptionData);
    }

     /**
     * List all subscriptions with optional filtering and pagination.
     *
     * @param array $params Parameters for filtering and pagination
     * @return mixed
     */
    public function listSubscriptions(array $params = [])
    {
        return $this->get($this->defaultEndpoint, $params);
    }

     /**
     * Creates a new subscription with a credit card.
     *
     * @param array $subscriptionData The data needed to create the subscription, including credit card information.
     * @return mixed
     */
    public function createSubscriptionWithCreditCard(array $subscriptionData) 
    {
        return $this->post($this->defaultEndpoint, $subscriptionData);
    }


    public function getSubscription($id) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id);

        return $this->get($this->getEndpoint());
    }

     /**
     * Updates an existing subscription.
     *
     * @param string $id Unique identifier for the subscription to be updated.
     * @param array $subscriptionData Data for updating the subscription.
     * @return mixed
     */
    public function updateSubscription($id, array $subscriptionData) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id);
        return $this->put($this->getEndpoint(), $subscriptionData);
    }

     /**
     * Removes a subscription by its ID.
     *
     * @param string $id Unique identifier for the subscription to be removed.
     * @return mixed
     */
    public function removeSubscription($id) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id);
        return $this->delete($this->getEndpoint());
    }

     /**
     * Lists all payments for a specific subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @param array $filters Optional filters for the payment list such as status.
     * @return mixed
     */
    public function listSubscriptionPayments($id, array $filters = [])
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/payments');
        return $this->get($this->getEndpoint(), $filters);
    }

     /**
     * Generates a payment book for a specific subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @param int $month Month final for the generation of the payment book.
     * @param int $year Year final for the generation of the payment book.
     * @param string $sort Optional. Column name to sort by.
     * @param string $order Optional. Order of sort (asc or desc).
     * @return mixed
     */
    public function generatePaymentBook($id, $month, $year, $sort = null, $order = null)
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/paymentBook');
        $queryParams = [
            'month' => $month,
            'year' => $year,
            'sort' => $sort,
            'order' => $order
        ];
        // Filter out null values
        $queryParams = array_filter($queryParams, function($value) { return !is_null($value); });

        return $this->get($this->getEndpoint(), $queryParams);
    }

    /**
     * Creates invoice settings for a subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @param array $invoiceSettings Data for configuring the invoice settings.
     * @return mixed
     */
    public function createInvoiceSettings($id, array $invoiceSettings) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/invoiceSettings');
        return $this->post($this->getEndpoint(), $invoiceSettings);
    }

     /**
     * Retrieves invoice settings for a specific subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @return mixed
     */
    public function getInvoiceSettings($id) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/invoiceSettings');
        return $this->get($this->getEndpoint());
    }

     /**
     * Removes invoice settings for a specific subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @return mixed
     */
    public function removeInvoiceSettings($id) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/invoiceSettings');
        return $this->delete($this->getEndpoint());
    }

    /**
     * Updates invoice settings for a specific subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @param array $invoiceSettings Data for updating the invoice settings.
     * @return mixed
     */
    public function updateInvoiceSettings($id, array $invoiceSettings) 
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/invoiceSettings');
        return $this->put($this->getEndpoint(), $invoiceSettings);
    }

        /**
     * Lists all invoices from charges of a specific subscription.
     *
     * @param string $id Unique identifier for the subscription.
     * @param array $params Query parameters for filtering the invoice list.
     * @return mixed
     */
    public function listSubscriptionInvoices($id, array $params = [])
    {
        $this->setEndpoint($this->defaultEndpoint . '/' . $id . '/invoices');
        return $this->get($this->getEndpoint(), $params);
    }







    
}
