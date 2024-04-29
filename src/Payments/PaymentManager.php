<?php

namespace Asaas\Payments;

use Asaas\Api\Payments\PaymentService;

class PaymentManager implements PaymentInterface
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function create($data)
    {
        if ($data instanceof Payment) {
            // Se os dados são um objeto Payment, converte para array associativo
            $data = $this->paymentToArray($data);
        }

        return $this->paymentService->createPayment($data);
    }

    public function retrieve($id)
    {
        return $this->paymentService->getPayment($id);
    }

    public function update($id, $data)
    {
        if ($data instanceof Payment) {
            // Se os dados são um objeto Payment, converte para array associativo
            $data = $this->paymentToArray($data);
        }

        return $this->paymentService->updatePayment($id, $data);
    }

    public function delete($id)
    {
        return $this->paymentService->deletePayment($id);
    }

    // Método para converter um objeto Payment em um array associativo
    protected function paymentToArray(Payment $payment)
    {
        $paymentArray = (array) $payment;

        // Se necessário, realizar outras transformações ou validações aqui

        return $paymentArray;
    }

    public function list(array $filters = [])
    {
        return $this->paymentService->listPayments($filters);
    }

    public function tokenizeCreditCard(array $creditCardData)
    {
        return $this->paymentService->tokenizeCreditCard($creditCardData);
    }

    public function payWithCreditCard($paymentId, array $creditCardData)
    {
        return $this->paymentService->payWithCreditCard($paymentId, $creditCardData);
    }

    public function restore($id)
    {
        return $this->paymentService->restorePayment($id);
    }

    public function getStatus($id)
    {
        return $this->paymentService->getPaymentStatus($id);
    }

    public function refund($id, $value = null, $description = null)
    {
        return $this->paymentService->refundPayment($id, $value, $description);
    }

    public function getBoletoDigitableLine($id)
    {
        return $this->paymentService->getBoletoDigitableLine($id);
    }

    public function getPixQRCode($id)
    {
        return $this->paymentService->getPixQRCode($id);
    }

    public function receiveInCash($id, $paymentDate, $value, $notifyCustomer)
    {
        return $this->paymentService->receivePaymentInCash($id, $paymentDate, $value, $notifyCustomer);
    }

    public function undoReceivedInCash($id)
    {
        return $this->paymentService->undoReceivedInCash($id);
    }

    public function uploadDocument($id, $filePath, $fileType, $availableAfterPayment)
    {
        return $this->paymentService->uploadDocumentForPayment($id, $filePath, $fileType, $availableAfterPayment);
    }

    public function updateDocument($paymentId, $documentId, array $data)
    {
        return $this->paymentService->updatePaymentDocument($paymentId, $documentId, $data);
    }

    public function getDocument($paymentId, $documentId)
    {
        return $this->paymentService->getPaymentDocument($paymentId, $documentId);
    }

    public function deleteDocument($paymentId, $documentId)
    {
        return $this->paymentService->deletePaymentDocument($paymentId, $documentId);
    }

    public function getLimits()
    {
        return $this->paymentService->getPaymentLimits();
    }

    public function simulateSale($value, $installmentCount, $billingTypes)
    {
        return $this->paymentService->simulateSale($value, $installmentCount, $billingTypes);
    }
}
