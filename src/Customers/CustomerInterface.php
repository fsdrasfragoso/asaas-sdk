<?php

namespace App\Customers;

interface CustomerInterface
{
    /**
     * Creates a new customer.
     *
     * @param mixed $customerData Data needed to create a customer, can be an array or a Customer object.
     * @return mixed
     */
    public function createCustomer($customerData);

    /**
     * Retrieves a list of customers based on filters.
     *
     * @param array $filters Criteria to filter the list of customers.
     * @return mixed
     */
    public function listCustomers(array $filters = []);

    /**
     * Retrieves a single customer by ID.
     *
     * @param string $customerId The unique identifier of the customer.
     * @return mixed
     */
    public function getCustomer($customerId);

    /**
     * Updates the information of an existing customer.
     *
     * @param string $customerId The unique identifier of the customer.
     * @param mixed $customerData New data for the customer, can be an array or a Customer object.
     * @return mixed
     */
    public function updateCustomer($customerId, $customerData);

    /**
     * Deletes a customer by ID.
     *
     * @param string $customerId The unique identifier of the customer.
     * @return mixed
     */
    public function deleteCustomer($customerId);

    /**
     * Restores a previously deleted customer.
     *
     * @param string $customerId The unique identifier of the customer.
     * @return mixed
     */
    public function restoreCustomer($customerId);

    /**
     * Retrieves notifications settings for a specific customer.
     *
     * @param string $customerId The unique identifier of the customer.
     * @return mixed
     */
    public function getCustomerNotifications($customerId);
}
