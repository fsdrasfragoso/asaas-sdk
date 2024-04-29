<?php

namespace App\Notifications;

interface NotificationInterface
{
    /**
     * Atualiza uma notificação existente.
     *
     * @param string $notificationId Identificador único da notificação.
     * @param array $notificationData Dados da notificação a serem atualizados.
     * @return mixed Resposta da API.
     */
    public function updateNotification($notificationId, array $notificationData);

    /**
     * Atualiza múltiplas notificações em lote.
     *
     * @param string $customerId Identificador único do cliente no Asaas.
     * @param array $notifications Lista de notificações a serem atualizadas.
     * @return mixed Resposta da API.
     */
    public function updateNotificationsInBatch($customerId, array $notifications);
}
