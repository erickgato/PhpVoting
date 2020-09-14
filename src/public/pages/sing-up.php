<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="src/public/css/styles.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="loginPanel">
        <div id="left-flex">
            <span class="spot">
                Bem vindo(a) !
            </span>
            <p>
                Esta é uma aplicação feita com<code> PHP </code> puro<br />
                e {<code id="js"> JS </code>}
                Utilizando Design patterns e boas práticas do <code> PHP7.4 </code>

            </p>
        </div>
        <form id="right-flex" method="post">
            <span>Cadastre-se</span>
            <label>
                Nome de usuário
                <input placeholder="Crie um nome de usuário" type="text" name="user[name]" autofocus required />
            </label>
            <label>
                Email
                <input placeholder="Email" type="email" name="user[email]" required />
            </label>
            <label>
                Senha
                <input id="password" placeholder="Senha" type="password" name="user[password]" />
            </label>
            <label>
                Repetir senha
                <input placeholder="Digite sua nova senha novamente" type="password" id="keyrepeat" />
            </label>
            <div id="options">
                <button onclick="ChangePage('login')" id="a-link" type="submit"> Login </button>
                <button> Cadastrar-se </button>

            </div>
        </form>
        <span class="credits">Made with<span class="red"> ❤ </span>by <span class="mauve">ErickGato</span> </span>
    </div>
    <script src="src/public/js/utils.js"></script>
    <script>
        window.addEventListener('load', function() {
            const Target = document.getElementById('password');
            const VerifyInput = document.getElementById('keyrepeat')
            const Form = document.querySelector('form');

            VerifyInput.addEventListener('keyup', (e) => {


                if (e.target.value == Target.value) {
                    e.target.classList.remove('red')

                } else
                    e.target.classList.add('red')
            })
            Form.addEventListener('submit', function(e) {
                if (Target.value == VerifyInput.value)
                    this.submit();
                else {
                    e.preventDefault();
                }

            })

        })
    </script>
</body>

</html>