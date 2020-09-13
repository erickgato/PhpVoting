<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../src/public/css/styles.css" />
    <title>Cadatrar enquete</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="survey-insert">
        <? include 'src/public/pages/components/menu.php' ?>
        <form action="" method="post">
            <span class="title">Cadastrar Enquete</span>
            <label>
                Nome da enquete
                <input type="text" name="sur[name]" autofocus required />
            </label>
            <label>
                Data de inicio
                <input type="datetime-local" name="sur[d_init]" required />
            </label>
            <label>
                Data de fim
                <input type="datetime-local" name="sur[d_end]" required />
            </label>
            <label>
                Opções de respostas
                <div id="options">
                    <input type="text" name="sur[resp_options][0]" required />
                    <input type="text" name="sur[resp_options][1]" required />
                    <input type="text" name="sur[resp_options][2]" required />
                </div>

                <button type="button" id="plus_options"> <i class="fa fa-plus"></i> </button>

            </label>
            <button type="submit"> Enviar </button>
        </form>
    </div>
    <script src="src/public/js/index.js"></script>
    <script>
        window.addEventListener('load', function() {
            const _plusButton = document.getElementById('plus_options');
            const _ButtonArea = document.getElementById('options');
            const _options = [];
            let index = 3;
            _plusButton.addEventListener('click', function(event) {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = `sur[resp_options][${index}]`
                input.required = true;
                _options.push(input);
                index++;
                _options.map(option => {
                    _ButtonArea.appendChild(option);
                })
            });

        })
    </script>
</body>

</html>