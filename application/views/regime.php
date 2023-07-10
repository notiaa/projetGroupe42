<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <title>Document</title>
    <style>
        .image-container {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 30px;
           
        }
        .image-container img {
            width: 100%;
            max-width: 200px;
        }
        .image-container label {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="./assets/img/icon.png" class="img-fluid" alt="...">
                    <div>
                        <span class="ti-timer"><span style="margin-top:20px;font-family:sans-serif"> Données de l'image 1</span></span></p>
                        <span class="ti-apple"><span style="margin-top:20px;font-family:sans-serif"> Données de l'image 1</span></span></p>
                    </div>
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="./assets/img/icon.png" class="img-fluid" alt="...">
                    <div>
                        <span class="ti-basketball"><span style="margin-top:20px;font-family:sans-serif"> Données de l'image 1</span></span></p>
                        <span class="ti-timer"><span style="margin-top:20px;font-family:sans-serif"> Données de l'image 1</span></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn " href="<?php echo site_url('Regime/pdf');?>" style="background-color:#666699;color:white;font-family:sans-serif;margin-left:1100px;margin-top:200px">Exporter</a>
    
</body>
</html>
