<?php
$this->layout = 'pdf';

//App::import('Vendor', 'html2pdf/html2pdf');
?>
<div style="height: auto;border: solid #000 1px; margin-top: -50px; " class="alignCenter">
    <div class="" style="margin-left: 10px;">
        <address>
            Largestinfo Tunisie s.a<br>
            IMM. DREAM CENTER 7A-2 - 1002 Montplaisir<br>
            Tél : +216 24 59 46 29 , +216 92 35 40 95<br>
            Tél Fixe : 71 90 60 35<br>
            MF : 1359806\B<br>  
        </address>
        <img src="http://localhost/emplois/img/Largest-info.png" class="alignRight" style="max-width:250px;margin-top:-100px;" alt="">
        <blockquote>
            <p>Client:</p>
            <small><?php echo $facture["User"]["display_name"]; ?></small>
        </blockquote>
        <blockquote class="pull-right">
            <h3>Facture</h3>
            <b style="font-size: 12px;">Facture N° : </b><i style="font-size: 12px;">00<?php echo $facture["Facture"]["id"]; ?></i><br>
            <b style="font-size: 12px;">Date de facturation : </b><i style="font-size: 12px;"><?php echo $facture["Facture"]["created"]; ?></i><br>
            <b style="font-size: 12px;">Date d'Échéance : </b><i style="font-size: 12px;"><?php echo $facture["Facture"]["limit_date"]; ?></i><br>
        </blockquote>
        <table class="table table-bordered table-hover">
            <thead>
            <th>Désignation</th>
            <th>Prix Unitaire</th>
            <th>Montant</th>
            </thead>
            <tbody>
                <?php $priceht = 0; ?>
                <?php $pricettc = 0; ?>
                <?php foreach ($facture['Designation'] as $d): ?>
                    <tr>
                        <td><?php echo $d['name']; ?> x <?php echo $d['DesignationsFacture']['qte'] ?></td>
                        <td><?php echo $d['price']; ?></td>
                        <td>
                            <?php
                            $pttc = $d['price'] * $d['DesignationsFacture']['qte'];
                            echo $pttc;
                            ?>
                        </td>
                    </tr>
                    <?php $priceht += $d['price']; ?>
                <?php endforeach; ?>
                <tr>
                    <td style="border-bottom: solid #fff 1px"></td>
                    <td>Total HT</td>
                    <td><?php echo $priceht; ?></td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                    <td>TVA 18%</td>
                    <td>
                        <?php
                        $tva = ($priceht * 18) / 100;
                        echo $tva;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                    <td>Montant timbe</td>
                    <td>0.400</td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                    <td>Total</td>
                    <td>
                        <?php
                        $pricettc = $priceht + $tva + 0.4;
                        echo $pricettc;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="" style="width: 27%;border: solid #DDDDDD 1px;border-radius: 5px; ">
            <p style="margin-left: 3px;margin-top: 2px;">
                Accompte : <?php echo ($facture["Facture"]["accompte"] == null) ? 'Sans accompte' : $facture["Facture"]["accompte"]; ?>  <br>
                Type de Payement : <?php echo $facture["Payment"]["name"]; ?><br>
                Devise : <?php echo $facture["Devise"]["name"]; ?><br>
            </p>
        </div>
        <br>
    </div>
</div>

<!--//$pdf = new HTML2PDF('P', 'A4', 'fr');
/*try {
    $pdf = new HTML2PDF('P', 'A4', 'fr');
    //$contents = array($content,$css);
    $css = $this->Html->css('bootstrap');
    $pdf->writeHTML($css);
    $pdf->writeHTML($content);
    $pdf->Output('fichier.pdf','D');
} catch (HTML2PDF_exception $e) {
    die($e);
}*/

echo $content;
?>-->
