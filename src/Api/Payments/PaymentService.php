<?php

namespace Asaas\Api\Payments;

use Asaas\Api\AsaasClient;

class PaymentService extends AsaasClient 
{
    
    private $defaultEndpoint = 'v3/payments';
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

    public function createPayment(array $paymentData) 
    {
        return $this->post($this->getEndpoint(), $paymentData);
    }

    public function listPayments(array $filters = []) 
    {
        return $this->get($this->getEndpoint(), $filters);
    }

    public function tokenizeCreditCard(array $creditCardData) 
    {       
        $this->setEndpoint('v3/creditCard/tokenize');
        $response = $this->post($this->getEndpoint(), $creditCardData);
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function payWithCreditCard($paymentId, array $creditCardData) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/payWithCreditCard");
        $response = $this->post($this->getEndpoint(), $creditCardData);
        $this->setEndpoint($this->defaultEndpoint); // Restore to default endpoint after the operation
        return $response;
    }

    public function getPayment($paymentId) 
    {
        $currentEndpoint = $this->getEndpoint(); // Store current endpoint
        $this->setEndpoint("v3/payments/{$paymentId}");
        $response = $this->get($this->getEndpoint());
        $this->setEndpoint($currentEndpoint); // Restore previous endpoint
        return $response;
    }

    public function updatePayment($paymentId, array $paymentData) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}");
        $response = $this->put($this->getEndpoint(), $paymentData);
        $this->setEndpoint($this->defaultEndpoint); // Store current endpoint
        return $response;
    }

    public function deletePayment($paymentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}");
        $response = $this->delete($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function restorePayment($paymentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/restore");
        $response = $this->post($this->getEndpoint(), []);
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function getPaymentStatus($paymentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/status");
        $response = $this->get($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function refundPayment($paymentId, $value = null, $description = null) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/refund");
        $postData = [];
        if ($value !== null) 
        {
            $postData['value'] = $value;
        }
        if ($description !== null) {
            $postData['description'] = $description;
        }
        $response = $this->post($this->getEndpoint(), $postData);
        $this->setEndpoint($this->defaultEndpoint);// Restore previous endpoint
        return $response;
    }

    public function getBoletoDigitableLine($paymentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/identificationField");
        $response = $this->get($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function getPixQRCode($paymentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/pixQrCode");
        $response = $this->get($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function receivePaymentInCash($paymentId, $paymentDate, $value, $notifyCustomer) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/receiveInCash");
        $postData = [
            'paymentDate' => $paymentDate,
            'value' => $value,
            'notifyCustomer' => $notifyCustomer
        ];
        $response = $this->post($this->getEndpoint(), $postData);
        $this->setEndpoint($this->defaultEndpoint); // Restore previous endpoint
        return $response;
    }

    public function undoReceivedInCash($paymentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/undoReceivedInCash");
        $response = $this->post($this->getEndpoint(), []);
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }

    public function uploadDocumentForPayment($paymentId, $filePath, $fileType, $availableAfterPayment) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/documents");

        // Prepare multipart data
        $multipartData = [
            'file' => [
                'file' => $filePath,
                'filename' => basename($filePath)
            ],
            'type' => [
                'contents' => $fileType
            ],
            'availableAfterPayment' => [
                'contents' => $availableAfterPayment ? 'true' : 'false'
            ]
        ];

        // Call the postMultipart method from AsaasClient
        $response = $this->postMultipart($this->getEndpoint(), $multipartData);
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }

    public function updatePaymentDocument($paymentId, $documentId, array $data) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/documents/{$documentId}");
        $response = $this->putMultipart($this->getEndpoint(), $data);
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }

    public function getPaymentDocument($paymentId, $documentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/documents/{$documentId}");
        $response = $this->get($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }

    public function deletePaymentDocument($paymentId, $documentId) 
    {
        $this->setEndpoint("v3/payments/{$paymentId}/documents/{$documentId}");
        $response = $this->delete($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }

    public function getPaymentLimits() 
    {
        $this->setEndpoint("v3/payments/limits");
        $response = $this->get($this->getEndpoint());
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }

    public function simulateSale($value, $installmentCount, $billingTypes) 
    {
        $this->setEndpoint("v3/payments/simulate");
        $body = [
            'value' => $value,
            'installmentCount' => $installmentCount,
            'billingTypes' => $billingTypes
        ];
        $response = $this->post($this->getEndpoint(), $body);
        $this->setEndpoint($this->defaultEndpoint); // Restore the default endpoint after the operation
        return $response;
    }





    
}



