<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <form method="GET" action="<?php echo base_url('Menu/code1')?>">
    <main>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Montant</label>
        <div class="col-sm-6">
            <input type="nombre" class="form-control" name="montant" value="" required/>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </main>
    </form>
</body>
</html>