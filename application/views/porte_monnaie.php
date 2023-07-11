<body>
    <div class="content">
        <?php 
            if(isset($response)){
                $_POST = array();
            ?>
            <p><?php echo $response ?></p>
        <?php  
            }
        ?>
        <div class="form-div">
            <form class="form-content" action="<?php echo site_url('Transaction/faire_demande')?>" method="post">
                <h4>Entrer votre code de credit</h4>
                <p>Code :<input name="code" type="text" placeholder="Votre code à 10 lettres"></p>
                <button>Valider</button>
            </form>
        </div>
        <div class="code-list">
            <div class="valide">
                <h3>Codes valides:</h3> 
                <ul>
                    <?php
                    for ($i=0; $i < count($codes); $i++) { 
                        ?>
                        <li><?php echo $codes[$i] ?></li>
                    <?php }
                    ?>
                </ul>
            </div>
            <div class="valide">
            <h3>Codes non valides:</h3>
                <ul>
                    <?php
                    for ($i=0; $i < count($used); $i++) { 
                        ?>
                        <li><?php echo $used[$i] ?></li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>