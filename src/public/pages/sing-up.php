<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/public/css/styles.css">
    <title>login</title>
</head>
<body>
<div class="loginPanel">
        <div id="left-flex">
            <span class="spot">
                Bem vindo(a) !
            </span> 
            <p>
                Esta é uma aplicação feita com<code> PHP </code> puro<br/>
                e {<code id="js"> JS </code>}
                Utilizando Design patterns e boas práticas do <code> PHP7.4 </code>

            </p>
        </div>
        <form id="right-flex" action="" method="post">
            <span>Cadastre-se</span>
            <label>
                Nome de usuário
                <input placeholder="Crie um nome de usuário" type="text" name="user[name]" autofocus required />
            </label>
            <label>
                Email
                <input placeholder="Email" type="email"  name="user[email]" required />
            </label>
            <label>
                Senha
                <input placeholder="Senha" type="password" name="user[password]" />
            </label>
            <label>
                Repetir senha
                <input placeholder="Digite sua nova senha novamente" type="password" id="keyrepeat"/>
            </label>
            <div id="options">
                <button id="a-link" type="submit"> Login </button>
                <button>  Cadastrar-se  </button>
                
            </div>   
        </form>
        <span class="credits">Made with<span class="red"> ❤ </span>by <span class="mauve">ErickGato</span> </span>
</div>
</body>
</html>