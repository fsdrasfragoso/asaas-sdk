<?php

namespace App\Notifications;

class Notification
{
    private $id;
    private $enabled;
    private $emailEnabledForProvider;
    private $smsEnabledForProvider;
    private $emailEnabledForCustomer;
    private $smsEnabledForCustomer;
    private $phoneCallEnabledForCustomer;
    private $whatsappEnabledForCustomer;
    private $scheduleOffset;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    public function isEmailEnabledForProvider()
    {
        return $this->emailEnabledForProvider;
    }

    public function setEmailEnabledForProvider($emailEnabledForProvider)
    {
        $this->emailEnabledForProvider = $emailEnabledForProvider;
    }

    public function isSmsEnabledForProvider()
    {
        return $this->smsEnabledForProvider;
    }

    public function setSmsEnabledForProvider($smsEnabledForProvider)
    {
        $this->smsEnabledForProvider = $smsEnabledForProvider;
    }

    public function isEmailEnabledForCustomer()
    {
        return $this->emailEnabledForCustomer;
    }

    public function setEmailEnabledForCustomer($emailEnabledForCustomer)
    {
        $this->emailEnabledForCustomer = $emailEnabledForCustomer;
    }

    public function isSmsEnabledForCustomer()
    {
        return $this->smsEnabledForCustomer;
    }

    public function setSmsEnabledForCustomer($smsEnabledForCustomer)
    {
        $this->smsEnabledForCustomer = $smsEnabledForCustomer;
    }

    public function isPhoneCallEnabledForCustomer()
    {
        return $this->phoneCallEnabledForCustomer;
    }

    public function setPhoneCallEnabledForCustomer($phoneCallEnabledForCustomer)
    {
        $this->phoneCallEnabledForCustomer = $phoneCallEnabledForCustomer;
    }

    public function isWhatsappEnabledForCustomer()
    {
        return $this->whatsappEnabledForCustomer;
    }

    public function setWhatsappEnabledForCustomer($whatsappEnabledForCustomer)
    {
        $this->whatsappEnabledForCustomer = $whatsappEnabledForCustomer;
    }

    public function getScheduleOffset()
    {
        return $this->scheduleOffset;
    }

    public function setScheduleOffset($scheduleOffset)
    {
        $this->scheduleOffset = $scheduleOffset;
    }
}
