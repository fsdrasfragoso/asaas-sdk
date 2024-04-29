# SDK para PHP do Asaas

Este SDK permite integrar facilmente a API do Asaas em projetos PHP para automatizar processos de cobrança, recebimento e pagamento.

## Instalação

Para instalar o SDK, siga estes passos:

1. Certifique-se de ter o Composer instalado em seu ambiente de desenvolvimento.

2. Crie um novo projeto ou vá para um projeto existente onde deseja integrar o SDK.

3. Abra o terminal e navegue até o diretório do seu projeto.

4. Execute o seguinte comando para instalar o SDK via Composer:

```bash
composer require fsdrasfragoso/asaas-sdk
```

## Utilização

Após instalar o SDK, você pode utilizá-lo em seu projeto da seguinte maneira:

```php
require_once 'vendor/autoload.php';

use Asaas\Api\Customers\CustomerService;
use Asaas\Customers\CustomerManager;
use Asaas\Api\Payments\PaymentService;
use Asaas\Payments\PaymentManager;

$apiKey = 'sua-chave-de-api';

$customerService = new CustomerService($apiKey);
$customerManager = new CustomerManager($customerService);

$customerData = [
    'name' => 'João Silva',
    'cpfCnpj' => '000.000.000-00',
    'email' => 'joao.silva@email.com',
    'phone' => '4730280400',
    'mobilePhone' => '47991234444',
    'address' => 'Rua Exemplo, 123',
    'postalCode' => '89223000'
];

$customer = $customerManager->createCustomer($customerData);

echo "Cliente criado com sucesso. ID: " . $customer->id;
$paymentService = new PaymentService($apiKey);
$paymentManager = new PaymentManager($paymentService);

$paymentData = [
    'customer' => $customer->id,
    'billingType' => 'BOLETO',
    'value' => 100.00,
    'dueDate' => '2024-05-05',
    'description' => 'Descrição da cobrança'
];

$payment = $paymentManager->create($paymentData);

echo "Cobrança criada com sucesso. ID: " . $payment->id;
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