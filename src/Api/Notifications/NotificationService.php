<?php

namespace Asaas\Api\Notifications;

use Asaas\Api\AsaasClient;

class NotificationService extends AsaasClient 
{
    private $defaultEndpoint = 'v3/notifications';

    public function __construct($apiKey, $baseUri = 'https://sandbox.asaas.com/api/') {
        parent::__construct($apiKey, $baseUri);
    }

    /**
     * Atualiza uma notificação existente.
     *
     * @param string $notificationId Identificador único da notificação.
     * @param array $notificationData Dados da notificação a serem atualizados.
     * @return mixed
     */
    public function updateNotification($notificationId, array $notificationData)
    {
        $endpoint = $this->defaultEndpoint . '/' . $notificationId;
        return $this->put($endpoint, $notificationData);
    }

    
}
