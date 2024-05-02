<?php

namespace Asaas\Installments;

use Asaas\Api\Installments\InstallmentService;
use Asaas\Installments\InstallmentsInterface;

class InstallmentManage implements InstallmentsInterface
{
    protected $installmentService;

    public function __construct(InstallmentService $installmentService)
    {
        $this->installmentService = $installmentService;
    }

    public function getInstallment($installmentId)
    {
        return $this->installmentService->getInstallment($installmentId);
    }

    public function removeInstallment($installmentId)
    {
        return $this->installmentService->removeInstallment($installmentId);
    }

    public function listInstallments()
    {
        return $this->installmentService->listInstallments();
    }

    public function listInstallmentPayments($installmentId)
    {
        return $this->installmentService->getInstallmentPayments($installmentId);
    }

    public function generatePaymentBook($installmentId, $sort = null, $order = null)
    {
        return $this->installmentService->getPaymentBook($installmentId, $sort, $order);
    }

    public function refundInstallment($installmentId)
    {
        return $this->installmentService->refundInstallment($installmentId);
    }

    public function updateInstallmentSplits($installmentId, $splits)
    {
        // Check if the input is an Installment object and convert it to an array if so
        if ($splits instanceof Installment) {
            $splits = $this->installmentToArray($splits);
        }

        return $this->installmentService->updateInstallmentSplits($installmentId, $splits);
    }

    /**
     * Converts an Installment object into an array format suitable for API submission.
     *
     * @param Installment $installment The installment object to convert.
     * @return array
     */
    protected function installmentToArray(Installment $installment)
    {
        return [
            'walletId' => $installment->getWalletId(),
            'fixedValue' => $installment->getFixedValue(),
            'percentualValue' => $installment->getPercentualValue(),
            'totalFixedValue' => $installment->getTotalFixedValue(),
        ];
    }
}
