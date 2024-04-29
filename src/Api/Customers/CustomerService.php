<?php

namespace Asaas\Api\Customers;

use Asaas\Api\AsaasClient;

class CustomerService extends AsaasClient 
{
    
    private $defaultEndpoint = 'v3/customers';
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

    public function createCustomer(array $customerData) 
    {
        return $this->post($this->getEndpoint(), $customerData);
    }

    public function listCustomers(array $filters = []) 
    {
        $this->setEndpoint('v3/customers');
        return $this->get($this->getEndpoint(), $filters);
    }

    public function getCustomer($customerId) 
    {
        $this->setEndpoint("v3/customers/{$customerId}");
        return $this->get($this->getEndpoint());
    }

    public function updateCustomer($customerId, array $customerData) 
    {
        $this->setEndpoint("v3/customers/{$customerId}");
        return $this->put($this->getEndpoint(), $customerData);
    }

    public function deleteCustomer($customerId) 
    {
        $this->setEndpoint("v3/customers/{$customerId}");
        return $this->delete($this->getEndpoint());
    }

    public function restoreCustomer($customerId) 
    {
        $this->setEndpoint("v3/customers/{$customerId}/restore");
        return $this->post($this->getEndpoint(), []);
    }

    public function getCustomerNotifications($customerId) 
    {
        $this->setEndpoint("v3/customers/{$customerId}/notifications");
        return $this->get($this->getEndpoint());
    }

    







    





   

}

