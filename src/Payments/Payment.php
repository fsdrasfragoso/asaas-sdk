<?php

namespace Asaas\Payments;

class Payment
{
    protected $customer;
    protected $billingType;
    protected $value;
    protected $dueDate;
    protected $description;
    protected $daysAfterDueDateToRegistrationCancellation;
    protected $externalReference;
    protected $installmentCount;
    protected $totalValue;
    protected $installmentValue;
    protected $discount;
    protected $interest;
    protected $fine;
    protected $postalService;
    protected $split;
    protected $callback;

    // Getters e setters para $customer
    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    // Getters e setters para $billingType
    public function getBillingType()
    {
        return $this->billingType;
    }

    public function setBillingType($billingType)
    {
        $this->billingType = $billingType;
    }
    
    // Getters e setters para $value
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    // Getters e setters para $dueDate
    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    // Getters e setters para $description
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    // Getters e setters para $daysAfterDueDateToRegistrationCancellation
    public function getDaysAfterDueDateToRegistrationCancellation()
    {
        return $this->daysAfterDueDateToRegistrationCancellation;
    }

    public function setDaysAfterDueDateToRegistrationCancellation($daysAfterDueDateToRegistrationCancellation)
    {
        $this->daysAfterDueDateToRegistrationCancellation = $daysAfterDueDateToRegistrationCancellation;
    }

    // Getters e setters para $externalReference
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;
    }

    // Getters e setters para $installmentCount
    public function getInstallmentCount()
    {
        return $this->installmentCount;
    }

    public function setInstallmentCount($installmentCount)
    {
        $this->installmentCount = $installmentCount;
    }

    // Getters e setters para $totalValue
    public function getTotalValue()
    {
        return $this->totalValue;
    }

    public function setTotalValue($totalValue)
    {
        $this->totalValue = $totalValue;
    }

    // Getters e setters para $installmentValue
    public function getInstallmentValue()
    {
        return $this->installmentValue;
    }

    public function setInstallmentValue($installmentValue)
    {
        $this->installmentValue = $installmentValue;
    }

    // Getters e setters para $discount
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    // Getters e setters para $interest
    public function getInterest()
    {
        return $this->interest;
    }

    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    // Getters e setters para $fine
    public function getFine()
    {
        return $this->fine;
    }

    public function setFine($fine)
    {
        $this->fine = $fine;
    }

    // Getters e setters para $postalService
    public function getPostalService()
    {
        return $this->postalService;
    }

    public function setPostalService($postalService)
    {
        $this->postalService = $postalService;
    }

    // Getters e setters para $split
    public function getSplit()
    {
        return $this->split;
    }

    public function setSplit($split)
    {
        $this->split = $split;
    }

    // Getters e setters para $callback
    public function getCallback()
    {
        return $this->callback;
    }

    public function setCallback($callback)
    {
        $this->callback = $callback;
    }


    
}
