# PhpVoting
Sistema para fazer votações/ enquetes em php sem utilizar frameworks
### Capacidade do sistema
1. Usuário pode criar uma enquete
2. Nas enquetes usuário pode cadastrar opções( No minimo 3 )
3. Explorar de enquetes ( mostrando: data de inicio, término,  status   ) : todas enquetes cadastradas
4. Na tela de enquete unica mostrar opções de votação( ao lado de cada opção mostrar a quantidade de votos )
5. Verificar o horário de data de incio/fim e caso não esteja ativo não posibilitar voto
6. Os resultados dos votos devem ser mostrados em tempo real

### Instalação
#### Este sistema precisa do php em sua versão 7.4 pois ele utiliza recursos novos da linguagem
<p>
    Para rodar o sistema seu ambiente deve possuir o <code>composer</code> e um servidor apache de sua preferência com suporte a mysql
</p>
1. Entre com o terminal no diretório root do projeto e execute <code> composer install </code><br/>
2. Importe o arquivo SQL no mysql<br/>
3. Configure seu ambiente no arquivo <code>{Root}/config/env.php</code><br/>
4. Ainda no diretório root do projeto em seu terminal execute <code>php socket-server.php</code><br/>



