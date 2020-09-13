<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/public/css/styles.css" type="text/css" />
    <title>Explore</title>
</head>

<body>
    <section class="explorePanel">
        <header>
            <!--  Menu -->
            <? include 'src/public/pages/components/menu.php' ?>
        </header>
        <main>
            <div class="title-header">
                <span>Enquetes</span>
                <p>Veja quais são as enquetes postadas pela comunidade</p>
            </div>
            <?php foreach ($surveys as $survey) : ?>
                <div class="item">
                    <div class="header">
                        <a href="<? echo $survey['sur_id'] ?>">
                            <?  echo $survey['sur_name']; ?></a>
                    </div>
                    <div class="footer">
                        Status: <span class="green active"><?php echo $survey['ss_name'] ?></span>
                        <span class="white"> Por:
                            <? echo $survey['usr_name']?> </span>
                    </div>

                </div>
            <?php endforeach; ?>


        </main>
        <?php if ((isset($join)) && (isset($options))) : ?>
            <div class="modal">
                <button onclick="HideModal()" class="exit">
                    X
                </button>
                <div class="title">
                    <span>
                        <?= $join[0]['name'] ?>
                    </span>
                </div>
                <div class="options">
                    <?php foreach ($options as $option) : ?>
                        <div>
                            <button> <?= $option['dat']; ?> </button> <?= $option['votes'] ?>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="date">
                    <?php foreach ($join as $_survey) : ?>

                        <span> <?= $_survey['start_date']; ?> - <?= $_survey['final_date']; ?> </span> 
                        <span> <?= $_survey['status']?></span>
                    <?php endforeach; ?>
                </div>

            </div>


        <?php endif; ?>
    </section>
    <script>
        function HideModal() {
            const Modal = document.querySelector(".modal");
            Modal.classList.add('closed');         
        }
    </script>
</body>

</html>