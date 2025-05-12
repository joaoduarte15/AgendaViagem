# Agenda de viagens

# Nosso projeto vem para ajudar o usuário á se organizar melhor.

# Tecnologias Utilizadas: PHP, MySQL, CSS, Html.

# Autores: João Vitor, Lucas Ryan, Romulo Guilherme, "Lucas Meireles".

# Observaçao: Decidimos refazer o projeto do zero pois o antigo estava mal feito, faltando partes, muito complexo
# Estava sem os seguintes items:
# Banco de dados: Nao havia um banco de dados funcional.
# Documentaçao de teste: Nao havia uma documentaçao de teste.

## Estrutura do projeto

│── /Agenda_Viagem
││── ── /config
││── ── /includes
││── ── /pages
││── ── /public
│── README.md

# Configuração do Ambiente

###**Requisitos**

- Servidor Apache
- Visual Studio [1.72]
- PHP [8.2] 
- MySQL [8.0.32] 
- Composer instalado 

### **Instalação** 
1. Clone o repositório: 
 bash
 git clone [https://github.com/usuario/projeto.git](https://github.com/joaoduarte15/AgendaViagem)
 cd projeto
 

2. Instale as dependências: 
 bash
 composer install
 

3. Configure o banco de dados: 
 - Crie o banco no MySQL 
 - Execute o script SQL: 
 sql
 source database/schema.sql;

 
 - Configure as credenciais no `.env` 
4. Inicie o servidor: 
bash
 php -S localhost:8000 -t public


## 4 Estrutura do Banco de Dados 

### **Usuários (usuarios)** 
- `id` (INT, PK, AUTO_INCREMENT, NN, UQ, UN, ) 
- `nome` (VARCHAR(60),NN) 
- `senha` (VARCHAR(20), NN) 


### **Eventos (eventos)** 
- `id` (INT, PK, AUTO_INCREMENT, NN, UQ, UN, ) 
- `titulo` (VARCHAR(80), NN) 
- `data_fim`(DATE, NN)
- `data_inicio`(DATE, NN)
- `usuario_id`(INT, NN, UN, FK)
