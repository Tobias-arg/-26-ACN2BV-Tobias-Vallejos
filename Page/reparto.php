    <?php
    $reparto = [
        [
        "nombre"  => "Swan",
        "actor"  => "Michael Beck",
        "imagen" => "../Reparto/Michael Beck.jpg",
        "descripcion" => "Poco después protagonizó Xanadu (un musical que fracasó en taquilla y frenó su carrera en el cine). Pasó a trabajar en series de televisión y hoy en día es un reconocido y exitoso narrador de audiolibros.",
        "protagonista" => true
        ],
        [
        "nombre" => "Ajax",
        "actor" => "James Remar",
        "imagen" => "../Reparto/Ajax - The Warriors.jpg",
        "descripcion" => "Fue el que más triunfó en Hollywood. Lo viste seguro como el fantasma del padre en la serie Dexter, en Sex and the City o en películas como Django Unchained. Sigue súper activo.",
        "protagonista" => false
        ],
        [
        "nombre" => "Cleon",
        "actor" => "Dorsey Wright",
        "imagen" => "../Reparto/Cine.jpg",
        "descripcion" => "Tuvo un papel en la película musical Hair (1979), pero al poco tiempo se cansó de los castings. Se retiró de la actuación y trabajó durante décadas para la empresa de subtes de Nueva York (la MTA).",
        "protagonista" => false
        ],
        [
        "nombre" => "Rembrant",
        "actor" => "Marcelino Sanchez",
        "imagen" => "../Reparto/descarga (4).jpg",
        "descripcion" => "El grafitero del grupo siguió actuando en algunas series de televisión. Lamentablemente, falleció muy joven en 1986, a los 28 años, a causa de un cáncer terminal.",
        "protagonista" => false
        ],
        [
        "nombre" => "Cochise",
        "actor" => "David Harris",
        "imagen" => "../Reparto/Snow.jpg",
        "descripcion" => "Tuvo una carrera muy respetable apareciendo como invitado en series policiales legendarias como Miami Vice, NYPD Blue y Law & Order. Falleció recientemente, a finales de 2024.",
        "protagonista" => false
        ],
        [
        "nombre" => "Snow",
        "actor" => "Brian Tyler",
        "imagen" => "../Reparto/The Warriors _snow_.jpg",
        "descripcion" => "Prácticamente desapareció del mapa cinematográfico después de esta película. Decidió alejarse por completo de la actuación en Hollywood para dedicarse a la música y a su vida privada.",
        "protagonista" => false
        ],
        [
        "nombre" => "Cowboy",
        "actor" => "Tom McKitterick",
        "imagen" => "../Reparto/descarga (2).jpg",
        "descripcion" => "The Warriors fue su debut y despedida del cine comercial. Hizo un poco de teatro en Nueva York, dejó la actuación definitivamente y se convirtió en periodista y escritor profesional.",
        "protagonista" => false
        ],
        [
        "nombre" => "Vermin",
        "actor" => "Terry Michos",
        "imagen" => "../Reparto/descarga (3).jpg",
        "descripcion" => "Hizo algunos papeles menores en televisión durante los años 80 y luego cambió de rumbo por completo. Se dedicó a ser conductor de noticias en televisión local, locutor de radio y profesor de oratoria.",
        "protagonista" => false
        ],
        [
        "nombre" => "Mercy",
        "actor" => "Deborah Van Valkenburgh",
        "imagen" => "../Reparto/Mercy- The Lost Boys.jpg",
        "descripcion" => "Le fue muy bien. Se convirtió en una cara muy famosa en Estados Unidos gracias a la serie de comedia Too Close for Comfort en los 80, y siguió trabajando en cine y TV hasta el día de hoy.",
        "protagonista" => false
        ],
        [
        "nombre" => "Luther",
        "actor" => "David Patrick Kelly",
        "imagen" => "../Reparto/1979 The Warriors.jpg",
        "descripcion" => "¡El gran villano de la película! El inolvidable loco que chocaba las botellas se convirtió en un actor de culto espectacular. Trabajó en Twin Peaks, El Cuervo, John Wick y la clásica Commando junto a Arnold Schwarzenegger.",
        "protagonista" => false
        ]

    ];
    ?>

    <?php require_once '../componentes/header.php'; ?>
<p>
    <h1>Reparto Principal</h1>
</p>

<body  id="arriba" class="reparto"> 
<section class="tarjetas">
        
<section class="tarjetas">
    <?php foreach ($reparto as $actor): ?>

        <article class="actores <?php echo ($actor["protagonista"]) ? "protagonista-destacado" : ""; ?>">
            <figure>
                <img src="<?php echo $actor["imagen"]; ?>" alt="<?php echo $actor["nombre"]; ?>">
                
                <figcaption>
                   <h2>"<?php echo $actor["nombre"]; ?>" Interpretado por: <?php echo $actor["actor"]; ?></h2>
                    <?php if ($actor["protagonista"]): ?>
                        <span class="protagonista">PROTAGONISTA</span>
                    <?php endif; ?>
                    <p><?php echo $actor["descripcion"]; ?></p>
                </figcaption>
            </figure>
        </article>

    <?php endforeach; ?>
</section>
 <?php require_once '../componentes/footer.php'; ?>