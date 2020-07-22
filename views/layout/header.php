<!DOCTYPE HTML>

<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title> Mobileshop</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css"/>
    </head>

    <body>

        <div id="container">
            <!-- Cabecera -->

            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/logo.jpg" alt="Mobilelogo"/>
                    <a href="<?=base_url?>">
                        <h1> Mobileshop </h1>
                    </a>
                </div>

            </header>

            <!-- Menu -->
            <?php $categorias = Utils::showcategorias();?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    
                    <?php while($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>

            </nav>

            <div id="content">