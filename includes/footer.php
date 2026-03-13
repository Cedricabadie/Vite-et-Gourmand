<footer class="site-footer" role="contentinfo">
    <div class="footer-horaires">
        <h2>Nos horaires</h2>
        <?php
        // Horaires chargés depuis la BDD (table horaire)
        // TODO: remplacer par appel BDD
        $horaires = [
            'Lundi'    => '09h00 – 18h00',
            'Mardi'    => '09h00 – 18h00',
            'Mercredi' => '09h00 – 18h00',
            'Jeudi'    => '09h00 – 18h00',
            'Vendredi' => '09h00 – 18h00',
            'Samedi'   => '10h00 – 16h00',
            'Dimanche' => 'Fermé',
        ];
        ?>
        <ul>
            <?php foreach ($horaires as $jour => $heure): ?>
                <li><strong><?= e($jour) ?></strong> : <?= e($heure) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="footer-links">
        <a href="<?= BASE_URL ?>/pages/mentions-legales.php">Mentions légales</a>
        <a href="<?= BASE_URL ?>/pages/cgv.php">Conditions générales de vente</a>
    </div>
</footer>
