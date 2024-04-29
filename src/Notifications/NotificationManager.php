<?php

namespace App\Notifications;

use Asaas\Api\Notifications\NotificationService;

class NotificationManager
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Atualiza uma notificação existente.
     *
     * @param mixed $notificationData Dados da notificação a serem atualizados.
     * @param string $notificationId Identificador único da notificação.
     * @return mixed
     */
    public function updateNotification($notificationId, $notificationData)
    {
        if ($notificationData instanceof Notification) {
            // Se $notificationData é uma instância de Notification, converte para array
            $notificationData = [
                'enabled' => $notificationData->isEnabled(),
                'emailEnabledForProvider' => $notificationData->isEmailEnabledForProvider(),
                'smsEnabledForProvider' => $notificationData->isSmsEnabledForProvider(),
                'emailEnabledForCustomer' => $notificationData->isEmailEnabledForCustomer(),
                'smsEnabledForCustomer' => $notificationData->isSmsEnabledForCustomer(),
                'phoneCallEnabledForCustomer' => $notificationData->isPhoneCallEnabledForCustomer(),
                'whatsappEnabledForCustomer' => $notificationData->isWhatsappEnabledForCustomer(),
                'scheduleOffset' => $notificationData->getScheduleOffset()
            ];
        }
        // Assume que $notificationData já está em formato de array se não for uma instância de Notification
        return $this->notificationService->updateNotification($notificationId, $notificationData);
    }

    /**
     * Atualiza múltiplas notificações em lote.
     *
     * @param string $customerId Identificador único do cliente.
     * @param array $notifications Lista de notificações a serem atualizadas.
     * @return mixed
     */
    public function updateNotificationsInBatch($customerId, array $notifications)
    {
        // Converta objetos Notification para array se necessário
        foreach ($notifications as $index => $notification) {
            if ($notification instanceof Notification) {
                $notifications[$index] = [
                    'enabled' => $notification->isEnabled(),
                    'emailEnabledForProvider' => $notification->isEmailEnabledForProvider(),
                    'smsEnabledForProvider' => $notification->isSmsEnabledForProvider(),
                    'emailEnabledForCustomer' => $notification->isEmailEnabledForCustomer(),
                    'smsEnabledForCustomer' => $notification->isSmsEnabledForCustomer(),
                    'phoneCallEnabledForCustomer' => $notification->isPhoneCallEnabledForCustomer(),
                    'whatsappEnabledForCustomer' => $notification->isWhatsappEnabledForCustomer(),
                    'scheduleOffset' => $notification->getScheduleOffset()
                ];
            }
        }
        return $this->notificationService->updateNotificationsInBatch($customerId, $notifications);
    }
}
