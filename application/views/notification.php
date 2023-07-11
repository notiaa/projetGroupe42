<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/bootstrap.min.css'?>">
    <title>Document</title>
</head>
<body>

<center>
    <center><h4>Liste d'Attente de Credit</h4></center>
    <table class="table table-success table-striped" style="width: 1000px;">
    <th>Nom</th>
    <th>Code</th>
    <th>Validation</th>
            <?php for ($i=0; $i <count($objet) ; $i++) { ?>
                <tr>
                <td><?php echo  $objet[$i]['nom'] ?></td>
                <td><?php echo  $objet[$i]['code'] ?></td>
                <td><a class="btn btn-success btn-sm" href="<?php echo site_url('Transaction/validation') ?>?idAccount=<?php echo $objet[$i]['idAccount']?>&&code=<?php echo $objet[$i]['code']?>">valider</a></td>
             </tr>
           <?php } ?>
    </table>
</center>
</body>