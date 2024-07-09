# Teste Backend

## Descrição

O projeto "teste-backend" é uma aplicação desenvolvida para avaliar habilidades em programação lógica e estruturação de código no backend. Esta aplicação foi construída utilizando o framework Laravel e tem como objetivo principal demonstrar a capacidade de criar, conectar e gerenciar uma base de dados, além de implementar funcionalidades de autenticação e CRUD (Create, Read, Update, Delete).

## Funcionalidades

- **Autenticação de Usuário:** Implementação de login e registro com campos personalizados (idUsuario, nomeUsuario, emailUsuario, senhaUsuario, descricaoCargo, industria).
- **CRUD de Produtores:** Criação, leitura, atualização e exclusão de registros de produtores, incluindo campos como idProdutor, registroIndividual, nomeProdutor e status.
- **Gestão de Propriedades:** Relacionamento entre produtores e propriedades, permitindo a associação de propriedades a produtores específicos.
- **Máscara para CPF:** Implementação de máscara para o campo CPF nos formulários.
- **Validação de Dados:** Validação de campos para garantir a integridade dos dados inseridos na base de dados.

## Estrutura do Projeto

O projeto é estruturado em diversos componentes que seguem as melhores práticas de desenvolvimento em Laravel, incluindo:

- **Models:** Representações das tabelas do banco de dados.
- **Controllers:** Gerenciamento das requisições HTTP e lógica de negócios.
- **Migrations:** Gerenciamento da estrutura do banco de dados.
- **Views:** Interface do usuário, utilizando Blade templates.
- **Repositories:** Camada de abstração para interações com o banco de dados.
- **Routes:** Definição das rotas da aplicação.

## Requisitos

- PHP 8.x
- Composer
- Laravel 11.14.0
- MySQL

## Instruções de Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/devmarcosaires/teste-backend.git

## Instruções

### Compilação
- Execute `composer install` para instalar as dependências do Laravel.

### Configuração do Banco de Dados
- Configure as variáveis de ambiente em `.env` com suas credenciais de banco de dados.
  
  Exemplo:  
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=teste-backend
  DB_USERNAME=root
  DB_PASSWORD=

### Migração do Banco de Dados
- Execute `php artisan migrate` para migrar as tabelas do banco de dados.

### Execução dos Testes
- Execute `php artisan test` para executar os testes automatizados.
  
### Instale vite
-  `npm install vite --save-dev`

### Rodando o Projeto
- Execute `php artisan serve` para iniciar o servidor de desenvolvimento.
- Execute `npm run dev` para iniciar o ambiente de desenvolvimento.
  
## Contato
- Email: devmarcosaires@gmail.com
- LinkedIn:https://www.linkedin.com/in/marcos-henrique-aires-98b4261b8/](https://www.linkedin.com/in/marcos-henrique-aires-98b4261b8/)
