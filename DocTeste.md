# Documentação de Teste \- Agenda\_Viagem

Autor: Lucas Ryan  
Data: 06/05/2025

## 1\. Objetivo

Validar as funcionalidades principais do sistema Agenda\_Viagem, garantindo que os fluxos básicos estejam funcionando conforme esperado.

## 2\. Funcionalidades Testadas

* Cadastro de novo usuário  
* Login de usuário  
* Cadastro de viagem  
* Listagem de viagens  
* Exclusão de viagem  
* Logout  
* Proteção de páginas restritas

## 3\. Casos de Teste

## 3.1 Cadastro de Usuário

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | Acessar /pages/cadastro.php | Página de cadastro exibida | PASSOU |
| 2 | Preencher campos com dados válidos e senhas iguais | Usuário cadastrado, redirecionado para login | PASSOU |
| 3 | Tentar cadastrar com nome já existente | Mensagem de erro: "Usuário já cadastrado" | PASSOU |
| 4 | Tentar cadastrar com senhas diferentes | Mensagem de erro: "As senhas não coincidem" | PASSOU |

## 3.2 Login

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | Acessar /pages/index.php | Página de login exibida | PASSOU |
| 2 | Preencher com usuário e senha corretos | Redirecionado para painel de viagens | PASSOU |
| 3 | Preencher com senha errada | Mensagem de erro: "Username ou senha incorretos" | PASSOU |

## 3.3 Cadastro de Viagem

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | Logar e acessar /pages/painel.php | Painel exibido | PASSOU |
| 2 | Preencher título, data início e fim válidos | Viagem cadastrada e exibida na lista | PASSOU |
| 3 | Preencher data fim anterior à início | Mensagem de erro: "A data de fim não pode ser anterior ao início" | PASSOU |
| 4 | Deixar campos em branco | Mensagem de erro: "Datas inválidas" ou campo obrigatório | PASSOU |

## 3.4 Listagem de Viagens

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | Acessar painel após cadastrar viagens | Todas as viagens do usuário listadas corretamente | PASSOU |
| 2 | Dois usuários diferentes cadastram viagens iguais | Cada um vê apenas suas viagens | PASSOU |

## 3.5 Exclusão de Viagem

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | No painel, clicar em "Excluir" em uma viagem | Viagem removida da lista, mensagem de sucesso exibida | PASSOU |
| 2 | Tentar excluir viagem de outro usuário (alterando URL) | Mensagem de erro: "Você não tem permissão para excluí-la" | PASSOU |

## 3.6 Logout

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | Clicar em "Sair" no painel | Usuário deslogado, redirecionado para login | PASSOU |

## 3.7 Proteção de Páginas

| Passo | Ação | Resultado Esperado | Resultado do Teste |
| ----- | ----- | ----- | ----- |
| 1 | Tentar acessar /pages/painel.php sem login | Redirecionado para login | PASSOU |
| 2 | Tentar acessar /pages/logout.php sem login | Redirecionado para login | PASSOU |

## 4\. Observações

* Testado em Google Chrome e Firefox.  
* Limpeza de cache recomendada ao alterar CSS.  
* Testes realizados com dois usuários distintos para garantir isolamento de dados.

Fim da documentação de teste.