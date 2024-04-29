<?php

namespace Asaas\Customers;

use Asaas\Api\Customers\CustomerService;
use App\Customers\Customer;
use App\Customers\CustomerInterface;

class CustomerManager implements CustomerInterface
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function createCustomer($customerData)
    {
        if ($customerData instanceof Customer) {
            // Converte o objeto Customer para array associativo, se necessário
            $customerData = $this->customerToArray($customerData);
        }

        return $this->customerService->createCustomer($customerData);
    }

    public function listCustomers(array $filters = [])
    {
        return $this->customerService->listCustomers($filters);
    }

    public function getCustomer($customerId)
    {
        return $this->customerService->getCustomer($customerId);
    }

    public function updateCustomer($customerId, $customerData)
    {
        if ($customerData instanceof Customer) {
            // Converte o objeto Customer para array associativo
            $customerData = $this->customerToArray($customerData);
        }

        return $this->customerService->updateCustomer($customerId, $customerData);
    }

    public function deleteCustomer($customerId)
    {
        return $this->customerService->deleteCustomer($customerId);
    }

    public function restoreCustomer($customerId)
    {
        return $this->customerService->restoreCustomer($customerId);
    }

    public function getCustomerNotifications($customerId)
    {
        return $this->customerService->getCustomerNotifications($customerId);
    }

    // Método auxiliar para converter um objeto Customer em um array associativo
    protected function customerToArray(Customer $customer)
    {
        return [
            'name' => $customer->getName(),
            'cpfCnpj' => $customer->getCpfCnpj(),
            'email' => $customer->getEmail(),
            'phone' => $customer->getPhone(),
            'mobilePhone' => $customer->getMobilePhone(),
            'address' => $customer->getAddress(),
            'addressNumber' => $customer->getAddressNumber(),
            'complement' => $customer->getComplement(),
            'province' => $customer->getProvince(),
            'postalCode' => $customer->getPostalCode(),
            'externalReference' => $customer->getExternalReference(),
            'notificationDisabled' => $customer->getNotificationDisabled(),
            'additionalEmails' => $customer->getAdditionalEmails(),
            'municipalInscription' => $customer->getMunicipalInscription(),
            'stateInscription' => $customer->getStateInscription(),
            'observations' => $customer->getObservations(),
            'groupName' => $customer->getGroupName(),
            'company' => $customer->getCompany()
        ];
    }
}
