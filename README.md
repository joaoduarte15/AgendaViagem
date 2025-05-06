# Agenda de viagens

# Nosso projeto vem para ajudar o usuário á se organizar melhor.

# Tecnologias Utilizadas: PHP, MySQL, CSS, Html.

# Autores: João Vitor, Lucas Ryan, Romulo Guilherme, "Lucas Meireles".

#

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
 git clone https://github.com/usuario/projeto.git
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

### **Usuários (users)** 
- `id` (INT, PK, AUTO_INCREMENT) 
- `nome` (VARCHAR) 
- `email` (VARCHAR, UNIQUE) 
- `senha` (VARCHAR) 


### **Posts (posts)** 
- `id` (INT, PK, AUTO_INCREMENT) 
- `titulo` (VARCHAR) 
- `conteudo` (TEXT) 
- `usuario_id` (FK -> users.id)
