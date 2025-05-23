# Lista de Tarefas

Um simples sistema web de lista de tarefas (To-Do List) feito em PHP e MySQL, utilizando Bootstrap para o frontend. Ideal para organizar suas tarefas diárias de forma rápida e prática.

## Funcionalidades

- Cadastro e login de usuários
- Adição de novas tarefas
- Edição e exclusão de tarefas
- Busca de tarefas por título ou descrição
- Mensagens de sucesso e erro para feedback ao usuário
- Interface responsiva com Bootstrap 5

## Tecnologias Utilizadas

- **Backend:** PHP
- **Banco de Dados:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript (jQuery)
- **Outros:** AJAX para busca dinâmica

## Instalação e Uso

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/andersonvasques/lista_tarefas.git
    ```

2. **Configure o banco de dados:**
    - Crie um banco de dados MySQL.
    - Importe o arquivo `database.sql` que está no repositório para criar as tabelas.
    - Edite o arquivo `connection.php` com os dados do seu banco (host, usuário, senha, nome do banco).

3. **Configure o ambiente:**
    - Certifique-se de ter o PHP e o MySQL rodando na sua máquina.
    - Coloque os arquivos do projeto em um servidor local (como XAMPP, WAMP, MAMP ou similar).

4. **Acesse via navegador:**
    ```
    http://localhost/lista_tarefas/
    ```

5. **Cadastro e login:**
    - Crie uma conta para começar a usar o sistema.

## Estrutura do Projeto

```
lista_tarefas/
│
├── assets/           # CSS, JS e imagens
├── auth/             # Autenticação de usuários
├── actions/          # Ações como adicionar, editar e excluir tarefas
├── connection.php    # Conexão com o banco de dados
├── dashboard.php     # Tela principal (lista de tarefas)
├── add_task.php      # Tela para adicionar tarefa
├── edit_task.php     # Tela para editar tarefa
├── logout.php        # Logout do usuário
├── index.php         # Tela de login
└── README.md
```

## Telas

- **Login e Cadastro:** Acesso seguro por usuário individual.
- **Dashboard:** Visualização, busca, edição e exclusão das tarefas.

Desenvolvido por [Anderson Vasques](https://github.com/andersonvasques)