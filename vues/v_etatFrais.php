<h3>Fiche de frais du mois <?= $numMois . "-" . $numAnnee ?> :
</h3>

<button class="ui-button">
    Export PDF
</button>
<div class="encadre">
    <p>
        Etat : <?= $libEtat ?> depuis le <?= $dateModif ?> <br> Montant validé : <?= $montantValide ?>


    </p>
    <table class="listeLegere">
        <caption>Eléments forfaitisés</caption>
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $libelle = $unFraisForfait['libelle'];
                ?>
                <th> <?= $libelle ?></th>
                <?php
            }
            ?>
            <th>Voiture fiscale</th>
        </tr>
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $quantite = $unFraisForfait['quantite'];
                ?>
                <td class="qteForfait"><?= $quantite[0] ?> </td>
                <?php
            }
            ?>

            <td class="qteForfait">
                <?= $nom_voiture[0]['Type_Vehiculecol'];  ?>
            </td>


        </tr>
    </table>
    <table class="listeLegere">
        <caption>Descriptif des éléments hors forfait -<?= $nbJustificatifs ?> justificatifs reçus -
        </caption>
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = $unFraisHorsForfait['libelle'];
            $montant = $unFraisHorsForfait['montant'];
            ?>
            <tr>
                <td><?= $date ?></td>
                <td><?= $libelle ?></td>
                <td><?= $montant ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</div>
<script>
    // Default export is a4 paper, portrait, using milimeters for units

    var doc = new jsPDF();

    doc.canvas.height = window.innerHeight;
    doc.canvas.width = window.innerWidth;
    html2pdf(document.body, doc, function(doc){
        var iframe = document.createElement('iframe');
        iframe.setAttribute('style','right:0; top:0; bottom:0; height:100%; width:500px');
        document.body.appendChild(iframe);
        iframe.src = doc.output('datauristring');
    });

    doc.save('a4.pdf')
</script>
<!--<script>
    var fs = require('fs');
    var pdf = require('html-pdf');
    var html = fs.readFileSync('./test/business.html', 'utf8');
    var options = { format: 'Letter' };

    pdf.create(html, options).toFile('./businesscard.pdf', function(err, res) {
        if (err) return console.log(err);
        console.log(res); // { filename: '/app/businesscard.pdf' }
    });
</script>
-->
