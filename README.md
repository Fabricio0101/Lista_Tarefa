# Lista_Tarefa

# Descrição

Esse projeto, trata-se de uma lista de atividades, onde você pode criar novas atividades, editá-las, excluir e visualizar.

Outras funções dessa lista são os status, a atividade pode estar concluida, porém pode ser reaberta caso queira.

# Como Usar

Além de baixar o repositório, será preciso criar o banco de dados para que as informações sejam armazenadas.

1 - Baixar os arquivos SQL "Lista e Tarefas" e executar (respectivamente).

2 - Recomendo criar o primeiro banco de dados com o nome "tarefas" e o segundo com o nome "cadastro", pois vai evitar modificações no código para o pareamento com o banco de dados.

3 - Após criar o banco de dados, ir nos arquivos "config.php" e "bdconfig.php" e modificar algumas informações, tais como:
    
    Em config.php ("BD_HOST", "BD_PORT", "BD_USER", "BD_PASS", "BD_NAME").
    
    Em bdconfig.php ("dbHost", "dbUsername", "bdPassword", "dbName"). 
    
4 - Deverão ser inseridas os dados do seu banco de dados nos respectivos campos das variáveis, que irão se conectar ao banco de dados.

5 - Será necessário utilizar o Apache para abrir um servidor local, recomendo utilizar o XAMPP.

6 - Será necessário baixar um gerenciador de dependências "Composer", link para download + documentação: "https://getcomposer.org/".

# Capturas

TELA DE LOGIN
![login](https://user-images.githubusercontent.com/94193822/221573823-bd7f187e-65cb-4c94-8e5f-3ae218219a63.png)

TELA DE CADASTRO
![cadastro](https://user-images.githubusercontent.com/94193822/221573841-610fcdb0-a2e5-4927-b717-befcd70a3c2a.png)

HOME 
![home](https://user-images.githubusercontent.com/94193822/221573843-0932c701-43aa-4ea0-9ed2-cee0f17569d3.png)
