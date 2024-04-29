<?php

namespace Asaas\Payments;

interface PaymentInterface
{
    public function create($data);

    public function retrieve($id);

    public function update($id, $data);

    public function delete($id);

    public function list(array $filters = []);

    public function tokenizeCreditCard(array $creditCardData);

    public function payWithCreditCard($paymentId, array $creditCardData);

    public function restore($id);

    public function getStatus($id);

    public function refund($id, $value = null, $description = null);

    public function getBoletoDigitableLine($id);

    public function getPixQRCode($id);

    public function receiveInCash($id, $paymentDate, $value, $notifyCustomer);

    public function undoReceivedInCash($id);

    public function uploadDocument($id, $filePath, $fileType, $availableAfterPayment);

    public function updateDocument($paymentId, $documentId, array $data);

    public function getDocument($paymentId, $documentId);

    public function deleteDocument($paymentId, $documentId);

    public function getLimits();

    public function simulateSale($value, $installmentCount, $billingTypes);
}
