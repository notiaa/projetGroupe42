<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href=<?php echo base_url().'/assets/css/accueil.css'?>>
    <title><?php echo $title ?></title>
</head>
<div class="sidebar">
    <div class="sidebar-header">
        <h3 class="brand">
            <span class="ti-unlink"></span>
            <span>easywire</span>
        </h3>
        <span class="ti-menu-alt"></span>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="<?php echo site_url('Menu/')?>">
                    <span class="ti-book"></span>
                    <span>Menu</span> 
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Menu/porte')?>">
                    <span class="ti-briefcase"></span>
                    <span>Porte Monnaie</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Menu/sport')?>">
                    <span class="ti-book"></span>
                    <span>Ajout Sport</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Menu/plat')?>">
                    <span class="ti-briefcase"></span>
                    <span>Ajout Plat</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('Menu/graphe')?>">
                    <span><i class="fas fa-chart-bar"></i></span>
                    <span>Chart graphique</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('User/')?>">
                    <span><i class="fas fa-chart-bar"></i></span>
                    <span>Test upload</span>
                </a>
            </li>
        </ul>
    </div>
    <div style="background-color:black;width:230.3px;height:50px;border-radius:10px;margin-top:200px;padding-top:10px;padding-left:20px;margin-left:10px;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);">
        <a href=<?php echo site_url('Menu/commencer')?>>
            <span class="ti-time"></span>
            <span>Commencer</span>
        </a>
    </div>
</div>
<div class="main-content">
    <header>
        <div class="search-wrapper">
            <span class="ti-search">
                <input type="search" placeholder="Recherche">
            </span>
        </div>
        <div class="social-icons">
            <div class="bell">
                <span class="ti-bell"></span>
            </div>
            <div class="comment">
                <span class="ti-comment"></span>
            </div>
            <div class="image" style="background-image:url('assets/img/user_pic/<?php echo $user_pic;?>')"></div>
        </div>
    </header>