<?php

namespace Asaas\Installments;

interface InstallmentsInterface
{
    /**
     * Retrieve a single installment by its ID.
     *
     * @param string $installmentId
     * @return mixed
     */
    public function getInstallment($installmentId);

    /**
     * Remove an installment by its ID.
     *
     * @param string $installmentId
     * @return mixed
     */
    public function removeInstallment($installmentId);

    /**
     * List all installments.
     *
     * @return mixed
     */
    public function listInstallments();

    /**
     * List all payments for a specific installment.
     *
     * @param string $installmentId
     * @return mixed
     */
    public function listInstallmentPayments($installmentId);

    /**
     * Generate a payment book for a specific installment.
     *
     * @param string $installmentId
     * @return mixed
     */
    public function generatePaymentBook($installmentId);

    /**
     * Refund an installment.
     *
     * @param string $installmentId
     * @return mixed
     */
    public function refundInstallment($installmentId);

    /**
     * Update split details of an installment.
     *
     * @param string $installmentId
     * @param array $splits
     * @return mixed
     */
    public function updateInstallmentSplits($installmentId, $splits);

}
