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


# Configuração do Ambiente

###**Requisitos**

- Servidor Apache
- Visual Studio [1.72]
- PHP [8.2] 
- MySQL [8.0.32] 
- Composer instalado 

### **Instalação** 
1. Baixe o arquivo zip.(lembrando que o projeto está na branch dev)

2. Extraia-o para a pasta: C:\seuusuario\XAMPP\htdocs

3. Abra o mySql.

4. Inicie o banco de dados.

5. Abra o site no seu navegador que preferir usando o comando:
 
    localhost/AgendaViagem-main/Agenda_Viagem/pages/index.php


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
