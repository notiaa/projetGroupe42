<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/accueil.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/completion.css'?>">
    <title>Navbar</title>
</head>
<body>
    <main>
    <form method='post' action="<?php echo base_url('Menu/plat')?>" enctype="multipart/form">
    
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nom Plat</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nom" value="" required/>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-6">
            <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Unite</label>
        <div class="col-sm-6">
        <select name="unite" class="form-control" id="">
            <option value="">Unite</option>
            <?php
                foreach($unite as $unit){ ?>
                <option value="<?php echo $unit['idUnite']?>"><?php echo $unit['value']?></option>    
            <?php }
            ?>
        </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Photo plat</label>
        <div class="col-sm-6">
            <input type="file" class="form-control" name="photo" value="" required/>
        </div>
    </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

    </main>
</body>
</html>
