<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/porte_monnaie.css' ?>">
    <title><?php echo $title ?></title>
</head>
<header>
<div class="nav">
        <div class="profil">
        </div>
        <ul>
            <li><a href="<?php echo site_url('Transaction/faire_demande') ?>">Crediter</a></li>
            <li><a href="<?php echo site_url('Menu/Account') ?>">Mon compte</a></li>
        </ul>
    </div>
</header>