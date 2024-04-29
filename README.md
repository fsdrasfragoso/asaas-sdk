# SDK para PHP do Asaas

Este SDK permite integrar facilmente a API do Asaas em projetos PHP para automatizar processos de cobrança, recebimento e pagamento.

## Instalação

Para instalar o SDK, siga estes passos:

1. Certifique-se de ter o Composer instalado em seu ambiente de desenvolvimento.

2. Crie um novo projeto ou vá para um projeto existente onde deseja integrar o SDK.

3. Abra o terminal e navegue até o diretório do seu projeto.

4. Execute o seguinte comando para instalar o SDK via Composer:

```bash
composer require asaas/asaas-sdk-php
```

## Utilização

Após instalar o SDK, você pode utilizá-lo em seu projeto da seguinte maneira:

```php
require_once 'vendor/autoload.php';

use Asaas\Api\Payments\PaymentService;
use Asaas\Payments\PaymentManager;

// Configure o SDK com sua chave de API
$apiKey = 'sua-chave-de-api';

$paymentService = new PaymentService($apiKey);
$paymentManager = new PaymentManager($paymentService);

// Crie uma nova cobrança
$data = [
    'customer' => 'identificador-do-cliente',
    'billingType' => 'BOLETO', // ou PIX, CARTAO
    'value' => 100.00,
    'dueDate' => '2024-05-05',
    'description' => 'Descrição da cobrança'
];

$payment = $paymentManager->create($data);

if ($payment) {
    echo "Cobrança criada com sucesso. ID: " . $payment->id;
} else {
    echo "Erro ao criar a cobrança.";
}
```

## Documentação

Para mais informações sobre os métodos disponíveis e os parâmetros necessários, consulte a [documentação oficial do Asaas](https://docs.asaas.com/docs/guia-de-cobrancas).

## Estrutura do SDK

Aqui está a estrutura de diretórios e arquivos do SDK:

- `src/`
  - `Api/`
    - `Payments/`
      - `PaymentService.php`: Implementa a lógica de integração com a API de pagamentos do Asaas.
  - `Payments/`
    - `PaymentManager.php`: Gerencia as operações relacionadas a cobranças.
    - `PaymentInterface.php`: Define a interface para a classe PaymentManager.
    - `Payment.php`: Representa uma cobrança do Asaas.

## Contribuindo

Se encontrar algum problema ou quiser contribuir com melhorias, fique à vontade para abrir uma [issue](https://github.com/fsdrasfragoso/asaas-sdk-php/issues) ou enviar um [pull request](https://github.com/fsdrasfragoso/asaas-sdk-php/pulls) no repositório do GitHub.

Espero que isso ajude! Se precisar de mais alguma coisa, estou à disposição.
