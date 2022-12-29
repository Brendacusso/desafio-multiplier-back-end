
## Documentação da API

#### Instalação do projeto

Após clonar o repositório para sua máquina: 

```
    composer install
    
    npm install

```
verifique a conexão com o banco de dados no arquivo .env

No terminal insira o seguinte comando para iniciar as migrations:

```
    php artisan migrate
```
Para gerar dados fake:

```
    php artisan db:seed
```

Para iniciar a API

```
    php artisan serve
```

## Rotas e parâmetros

#### Login de um funcionário do restaurante

```
    POST /api/login/
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório**. Email do funcionário |
| `password`  | `string` | **Obrigatório**. Senha |
| `role`  | `string` | **Obrigatório**. Descrição da função no restaurante (waiter or cooker) |

### Exemplo JSON

```
{
    "email" : "usuario@restaurant.com",
    "password" : "123456@",
    "role" : "waiter"
}
```

#### Cadastrar dados de um funcionário do restaurante

```
    POST /api/register/user
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório**. Email do funcionário |
| `password`  | `string` | **Obrigatório**. Senha |
| `role`  | `string` | **Obrigatório**. Descrição da função no restaurante (waiter or cooker) |

### Exemplo JSON

```
{
    "email" : "usuario@teste.com",
    "password" : "a@fs4fj",
    "role" : "cooker"
}
```

#### Registrar um novo cliente do restaurante

```
    POST /api/register/
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `name` | `string` | **Obrigatório**. Nome do cliente |
| `CPF`  | `string` | **Obrigatório**. Chave CPF do cliente |

### Exemplo JSON

```
{
    "name" : "Aila",
    "CPF" : "000.000.000-00"
}
```

#### Cadastrar número da mesa do restaurante

```
    POST /api/register/table/
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `description` | `string` | **Obrigatório**. Descrição da mesa|

### Exemplo JSON

```
{
    "description" : "Mesa 12"
}
```

#### Registrar um novo item no cárdapio do restaurante

```
    POST /api/register/menu/
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `name` | `string` | **Obrigatório**. Nome do prato |

### Exemplo JSON

```
{
    "name" : "Pizza Doce"
}
```

#### Registrar um novo pedido

```
    POST /api/register/order/
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `table` | `integer` | **Obrigatório**. Id da mesa |
| `customer` | `integer` | **Obrigatório**. Id do cliente |
| `waiter` | `integer` | **Obrigatório**. Id do garçom (users Id quando role = waiter) |
| `items` | `string` | **Obrigatório**. Id dos itens do menu |


### Exemplo JSON

```
{
    "table" : 2,
    "customer" : 1,
    "waiter" : 1,
    "items" : [1,2,3]
}
```

#### Listar pedidos em andamento do garçom

```
    GET /api/orders/waiter/{waiter}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `waiter` | `integer` | **Obrigatório**. Id do garçom |

### Exemplo

```
http://127.0.0.1:8000/api/orders/waiter/1
```


#### Listar pedidos a fazer e em andamento para cozinheiro

```
    GET /api/orders/cooker/
```


#### Listar pedidos com filtros

```
    GET /api/orders/filters?day=12&month=2&table=1&customer=1
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `day` | `integer` | **Opcional**. Dia do mês entre 1 e 31 |
| `month` | `integer` | **Opcional**. Mês entre 1 e 12 |
| `table` | `integer` | **Opcional**. Id da mesa |
| `customer` | `integer` | **Opcional**. Id do cliente |

### Exemplos

```
http://127.0.0.1:8000/api/orders/filter?day=16

http://127.0.0.1:8000/api/orders/filter?day=11&month=1

http://127.0.0.1:8000/api/orders/filter?table=2
```

#### Listar Maior, primeiro e último pedido do cliente

```
    GET /api/orders/customer/{customer}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `customer` | `integer` | **Obrigatório**. Id do cliente |

### Exemplos

```
http://127.0.0.1:8000/api/orders/customer/1

```
