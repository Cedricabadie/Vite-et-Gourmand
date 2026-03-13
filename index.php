<?php
// PHP : on démarre la session (pour gérer la connexion utilisateur plus tard)
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<!-- lang="fr" : indique au navigateur que la page est en français (accessibilité RGAA) -->
<html lang="fr">
<head>
    <!-- charset UTF-8 : permet d'afficher les accents et caractères spéciaux -->
    <meta charset="UTF-8">
    <!-- viewport : rend la page responsive (s'adapte aux mobiles) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- description : résumé pour les moteurs de recherche (SEO) -->
    <meta name="description" content="Vite & Gourmand, traiteur à Bordeaux depuis 25 ans. Découvrez nos menus et commandez en ligne.">
    <title>Vite &amp; Gourmand – Traiteur à Bordeaux</title>
    <!-- On lie notre feuille de style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- HEADER : barre de navigation en haut de chaque page -->
    <!-- Le PHP include permet d'écrire le header une seule fois et de le réutiliser partout -->
    <?php include 'includes/header.php'; ?>

    <!-- MAIN : contenu principal de la page (une seule balise <main> par page - RGAA) -->
    <main>

        <!-- =============================================
             SECTION HERO
             La grande image d'accroche en haut de page.
             "Hero" = terme utilisé par les développeurs
             pour désigner ce bandeau d'introduction.
        ============================================= -->
        <section class="hero" aria-label="Présentation Vite et Gourmand">
            <div class="hero__contenu">
                <!-- h1 : titre principal de la page. Il ne doit y en avoir qu'UN seul par page -->
                <h1>Vite <span class="hero__esperluette">&amp;</span> Gourmand</h1>
                <p class="hero__accroche">Traiteur à Bordeaux depuis 25 ans</p>
                <p class="hero__description">
                    Julie et José vous proposent des menus raffinés pour tous vos événements,
                    de Noël aux repas de famille, en passant par vos événements d'entreprise.
                </p>
                <!-- Les liens d'action principaux (Call To Action = CTA) -->
                <div class="hero__actions">
                    <a href="pages/menus.php" class="btn btn--principal">
                        Découvrir nos menus
                    </a>
                    <a href="pages/contact.php" class="btn btn--secondaire">
                        Nous contacter
                    </a>
                </div>
            </div>
        </section>

        <!-- =============================================
             SECTION PRÉSENTATION
             Qui sont Julie et José ? L'histoire de l'entreprise.
        ============================================= -->
        <section class="presentation" id="presentation">
            <!-- h2 : titre de section. La hiérarchie doit être h1 > h2 > h3... -->
            <h2 class="section__titre">Notre histoire</h2>
            <p class="section__sous-titre">25 ans de passion culinaire au cœur de Bordeaux</p>

            <div class="presentation__contenu">
                <!-- article : bloc de contenu autonome (une "carte" d'information) -->
                <article class="carte-presentation">
                    <!-- aria-hidden="true" : l'icône est décorative, on la cache aux lecteurs d'écran -->
                    <span class="carte-presentation__icone" aria-hidden="true">👨‍🍳</span>
                    <h3>José, le Chef</h3>
                    <p>
                        Fort de 25 ans d'expérience, José maîtrise l'art de composer des menus
                        qui mêlent tradition bordelaise et créativité. Chaque plat est préparé
                        avec des produits frais et locaux.
                    </p>
                </article>

                <article class="carte-presentation">
                    <span class="carte-presentation__icone" aria-hidden="true">👩‍💼</span>
                    <h3>Julie, la Coordinatrice</h3>
                    <p>
                        Julie gère l'organisation et la logistique avec rigueur et sourire.
                        De la prise de commande à la livraison, elle s'assure que chaque
                        prestation se déroule parfaitement.
                    </p>
                </article>

                <article class="carte-presentation">
                    <span class="carte-presentation__icone" aria-hidden="true">🍽️</span>
                    <h3>Notre engagement</h3>
                    <p>
                        Produits frais, menus personnalisables, livraison à Bordeaux et
                        dans sa région. Nous adaptons chaque prestation à vos besoins,
                        qu'il s'agisse d'un repas de 10 ou de 200 convives.
                    </p>
                </article>
            </div>
        </section>

        <!-- =============================================
             SECTION CHIFFRES CLÉS
             Quelques chiffres pour inspirer confiance.
        ============================================= -->
        <section class="chiffres" aria-label="Chiffres clés">
            <h2 class="sr-only">Chiffres clés</h2>
            <!-- sr-only = "screen reader only" : visible par les lecteurs d'écran, caché visuellement -->

            <ul class="chiffres__liste">
                <li class="chiffres__item">
                    <!-- strong : met en valeur sémantiquement (important) -->
                    <strong class="chiffres__nombre">25</strong>
                    <span class="chiffres__label">ans d'expérience</span>
                </li>
                <li class="chiffres__item">
                    <strong class="chiffres__nombre">500+</strong>
                    <span class="chiffres__label">événements réalisés</span>
                </li>
                <li class="chiffres__item">
                    <strong class="chiffres__nombre">100%</strong>
                    <span class="chiffres__label">produits frais</span>
                </li>
                <li class="chiffres__item">
                    <strong class="chiffres__nombre">4.9/5</strong>
                    <span class="chiffres__label">note moyenne</span>
                </li>
            </ul>
        </section>

        <!-- =============================================
             SECTION AVIS CLIENTS
             Pour l'instant : données en dur (HTML statique).
             Plus tard, on les chargera depuis la base de données.
        ============================================= -->
        <section class="avis" id="avis">
            <h2 class="section__titre">Ce que disent nos clients</h2>
            <p class="section__sous-titre">Avis vérifiés et validés par notre équipe</p>

            <div class="avis__liste">

                <!-- Chaque avis est un article indépendant -->
                <article class="carte-avis">
                    <!-- Les étoiles : aria-label explique aux lecteurs d'écran ce que ça signifie -->
                    <div class="carte-avis__etoiles" aria-label="Note : 5 étoiles sur 5">
                        <span aria-hidden="true">★★★★★</span>
                    </div>
                    <!-- blockquote : balise sémantique pour une citation -->
                    <blockquote class="carte-avis__commentaire">
                        <p>Prestations impeccables pour notre mariage. Les invités ont adoré
                        les plats, et la livraison était parfaite à l'heure. Je recommande
                        vivement Vite &amp; Gourmand !</p>
                    </blockquote>
                    <footer class="carte-avis__auteur">
                        <!-- cite : balise sémantique pour un nom d'auteur dans un blockquote -->
                        <cite>Sophie M. – Mariage, juin 2024</cite>
                    </footer>
                </article>

                <article class="carte-avis">
                    <div class="carte-avis__etoiles" aria-label="Note : 5 étoiles sur 5">
                        <span aria-hidden="true">★★★★★</span>
                    </div>
                    <blockquote class="carte-avis__commentaire">
                        <p>Menu de Noël exceptionnel. La qualité des produits était au
                        rendez-vous, et José a su s'adapter à nos contraintes alimentaires.
                        Merci pour cette belle soirée !</p>
                    </blockquote>
                    <footer class="carte-avis__auteur">
                        <cite>Marc &amp; Claire D. – Repas de Noël, décembre 2024</cite>
                    </footer>
                </article>

                <article class="carte-avis">
                    <div class="carte-avis__etoiles" aria-label="Note : 4 étoiles sur 5">
                        <span aria-hidden="true">★★★★☆</span>
                    </div>
                    <blockquote class="carte-avis__commentaire">
                        <p>Très bon rapport qualité-prix pour notre séminaire d'entreprise.
                        L'équipe est professionnelle et réactive. On refera appel à eux
                        sans hésiter.</p>
                    </blockquote>
                    <footer class="carte-avis__auteur">
                        <cite>Isabelle T. – Séminaire d'entreprise, mars 2024</cite>
                    </footer>
                </article>

            </div>
        </section>

        <!-- =============================================
             SECTION CALL TO ACTION FINALE
             Incitation à commander avant le footer.
        ============================================= -->
        <section class="cta-finale" aria-label="Commander un menu">
            <h2>Prêt à régaler vos convives ?</h2>
            <p>Consultez nos menus et passez commande en quelques minutes.</p>
            <a href="pages/menus.php" class="btn btn--principal btn--grand">
                Voir tous nos menus
            </a>
        </section>

    </main>

    <!-- FOOTER : pied de page commun à toutes les pages -->
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/main.js"></script>
</body>
</html>
