<?php

namespace App\Customers;

class Customer
{
    private $name;
    private $cpfCnpj;
    private $email;
    private $phone;
    private $mobilePhone;
    private $address;
    private $addressNumber;
    private $complement;
    private $province;
    private $postalCode;
    private $externalReference;
    private $notificationDisabled = false;
    private $additionalEmails;
    private $municipalInscription;
    private $stateInscription;
    private $observations;
    private $groupName;
    private $company;

    
    public function __construct() {}

    // Getters
    public function getName() { return $this->name; }
    public function getCpfCnpj() { return $this->cpfCnpj; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getMobilePhone() { return $this->mobilePhone; }
    public function getAddress() { return $this->address; }
    public function getAddressNumber() { return $this->addressNumber; }
    public function getComplement() { return $this->complement; }
    public function getProvince() { return $this->province; }
    public function getPostalCode() { return $this->postalCode; }
    public function getExternalReference() { return $this->externalReference; }
    public function getNotificationDisabled() { return $this->notificationDisabled; }
    public function getAdditionalEmails() { return $this->additionalEmails; }
    public function getMunicipalInscription() { return $this->municipalInscription; }
    public function getStateInscription() { return $this->stateInscription; }
    public function getObservations() { return $this->observations; }
    public function getGroupName() { return $this->groupName; }
    public function getCompany() { return $this->company; }

    // Setters
    public function setName($name) { $this->name = $name; }
    public function setCpfCnpj($cpfCnpj) { $this->cpfCnpj = $cpfCnpj; }
    public function setEmail($email) { $this->email = $email; }
    public function setPhone($phone) { $this->phone = $phone; }
    public function setMobilePhone($mobilePhone) { $this->mobilePhone = $mobilePhone; }
    public function setAddress($address) { $this->address = $address; }
    public function setAddressNumber($addressNumber) { $this->addressNumber = $addressNumber; }
    public function setComplement($complement) { $this->complement = $complement; }
    public function setProvince($province) { $this->province = $province; }
    public function setPostalCode($postalCode) { $this->postalCode = $postalCode; }
    public function setExternalReference($externalReference) { $this->externalReference = $externalReference; }
    public function setNotificationDisabled($notificationDisabled) { $this->notificationDisabled = $notificationDisabled; }
    public function setAdditionalEmails($additionalEmails) { $this->additionalEmails = $additionalEmails; }
    public function setMunicipalInscription($municipalInscription) { $this->municipalInscription = $municipalInscription; }
    public function setStateInscription($stateInscription) { $this->stateInscription = $stateInscription; }
    public function setObservations($observations) { $this->observations = $observations; }
    public function setGroupName($groupName) { $this->groupName = $groupName; }
    public function setCompany($company) { $this->company = $company; }
}
