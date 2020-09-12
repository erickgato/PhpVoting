<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/public/css/styles.css">
    <title>Browse</title>
</head>

<body>
    <div class="loginPanel">
        <div id="left-flex">
            <span class="spot">
                Olá
            </span> 
            <p>
                Esta é uma aplicação feita com<code> PHP </code> puro<br/>
                e {<code id="js"> JS </code>}
                Utilizando Design patterns e boas práticas do <code> PHP7.4 </code>

            </p>
        </div>
        <form id="right-flex" action="" method="post">
            <span>Login</span>
            <label>
                Email
                <input placeholder="Email" type="email" name="user[email]" autofocus required />
            </label>
            <label>
                Senha
                <input placeholder="Senha" type="password" name="user[password]" />
            </label>
            <div id="options">
                <button type="submit"> Login </button>
                <button id="a-link" >  Cadastrar-se  </button>
                
            </div>   
        </form>
        <span class="credits">Made with<span class="red"> ❤ </span>by <span class="mauve">ErickGato</span> </span>
    </div>
</body>

</html>