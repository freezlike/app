<?php

$this->layout = 'pdf';

//App::import('Vendor', 'html2pdf/html2pdf');
$tva = ($facture['Facture']['ht'] * 12 )/ 100;
$content = '
<div style="height: 650px;border: solid #000 1px; margin-top: -50px; " class="alignCenter">
    <div class="" style="margin-left: 10px;">
        <address>
            Sté Largestinfo Tunisie<br>
            3, Rue J.J Rousseau - Bloc A - 1002 Montplaisir<br>
            Tél : +216 24 59 46 29<br>
            MF : 1253869 K/A/M/000<br>  
        </address>
        <img src="http://localhost/emplois/img/Largest-info.png" class="alignRight" style="max-width:250px;margin-top:-100px;" alt="">
        <blockquote>
            <p>Client:</p>
            <small>'.$facture["User"]["display_name"].'</small>
        </blockquote>
        <blockquote class="pull-right">
            <h3>Facture</h3>
            <b style="font-size: 12px;">Facture N° : </b><i style="font-size: 12px;">'.$facture["Facture"]["id"].'</i><br>
            <b style="font-size: 12px;">Date de facturation : </b><i style="font-size: 12px;">'.$facture["Facture"]["created"].'</i><br>
            <b style="font-size: 12px;">Date d\"Échéance : </b><i style="font-size: 12px;">'.$facture["Facture"]["limit_date"].'</i><br>
        </blockquote>
        <table class="table table-bordered table-hover">
            <thead>
            <th>Désignation</th>
            <th>Prix Unitaire</th>
            <th>Montant</th>
            </thead>
            <tbody>
                <tr>
                    <td>'.$facture["Designation"]["name"].' x '.$facture["Facture"]["count"].'</td>
                    <td>'.$facture["Facture"]["ht"] / $facture["Facture"]["count"] .'</td>
                    <td>'.$facture["Facture"]["ht"].'</td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px"></td>
                    <td>Total HT</td>
                    <td>'.$facture["Facture"]["ht"].'</td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                    <td>TVA 12%</td>
                    <td>'.$tva.'</td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                    <td>Montant timbe</td>
                    <td>0.400</td>
                </tr>
                <tr>
                    <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                    <td>Total</td>
                    <td>'.$facture["Facture"]["ttc"].'</td>
                </tr>
            </tbody>
        </table>
        <div class="" style="width: 22%;border: solid #DDDDDD 1px;border-radius: 5px; ">
            <p style="margin-left: 3px;margin-top: 2px;">
                Accompte : '.$facture["Facture"]["accompte"].' <br>
            Type de Payement : '.$facture["Devise"]["name"].'<br>
            Devise : '.$facture["Payment"]["name"].'<br>
            </p>
        </div>
    </div>
</div>';


//$pdf = new HTML2PDF('P', 'A4', 'fr');
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
?>
