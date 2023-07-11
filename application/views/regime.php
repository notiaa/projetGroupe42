<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <title>Document</title>
    <style>
       .content{
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.boite{
    background-color: aqua;
    height: 200px;
    width: 300px;
    margin-top: 200px;
    border-radius: 10px;
    text-align:center;
    box-shadow: 10px 10px 10px rgba(0,0,0,0.2);

}
a{
    text-decoration:none;
    color:black;
    font-size:30px;
    font-family: sans-serif;
}
h4{
    padding: 0;
}
.info{
    text-align: center;
    padding-left: 5px;
    font-size: 12px;
    font-family: sans-serif;
   
    
}
img{
    width: 300px;
    height: 200px;
}


    </style>
</head>
<body>
<div class="content">
    <div class="boite">
            <img src="<?php echo base_url().'assets/img/icon.png'?>" alt="">
            
        </div>
        <div class="info">si vous n'aimez pas trop courir,ou que vous n'avez pas vraiemnt de cardio</div>
        <div class="boite">
        <img src="<?php echo base_url().'assets/img/icon.png'?>" alt="">
            
        </div>
        <div class="info">si vous n'aimez pas trop courir,ou que vous n'avez pas vraiemnt de cardio</div>
        <div class="boite">
        <img src="<?php echo base_url().'assets/img/icon.png'?>" alt="">
           
        </div>
        <div class="info">si vous n'aimez pas trop courir,ou que vous n'avez pas vraiemnt de cardio</div>
    </div>
    <a class="btn " href="<?php echo site_url('Regime/pdf');?>" style="background-color:#666699;color:white;font-family:sans-serif;margin-left:1100px;margin-top:200px">Exporter</a>
    
</body>
</html>
