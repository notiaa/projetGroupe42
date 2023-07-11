<body>
    <main>
        <section>
            <div class="container">
                <div class="center">
                    <form action="<?php echo site_url('Regime/IMC') ?>" method="get">
                        <p><input type="number" class="" name="weight" id=""></p>
                        <p><input type="number" class="" name="height" id=""></p>
                        <button>Calculer</button>
                    </form>
                </div>
                <?php 
                    if (isset($message)) { ?>
                        <span><?php echo $message?></span>
                <?php }
                ?>
            </div>
        </section>
    </main>
</body>