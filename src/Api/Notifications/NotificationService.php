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

    /**
     * Atualiza múltiplas notificações em lote.
     *
     * @param string $customerId Identificador único do cliente no Asaas.
     * @param array $notifications Lista de notificações a serem atualizadas.
     * @return mixed
     */
    public function updateNotificationsInBatch($customerId, array $notifications)
    {
        $endpoint = $this->defaultEndpoint . '/batch';
        $data = [
            'customer' => $customerId,
            'notifications' => $notifications
        ];
        return $this->put($endpoint, $data);
    }


}
