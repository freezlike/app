<?php //debug($facture); die();?>
<div class="page-header noprint">
    <h4>Facture Client : </h4><?php echo $facture['User']['full_name']; ?>
    <h4>Nom Commerciale : </h4><?php echo strtoupper($facture['Commercial']['full_name']); ?>
</div>
<div class="row printfact">
    <div style="/*width: 70%;height: auto;*/border: solid #000 1px;" class="span9 offset1">
        <div class="" style="margin-left: 10px;">
            <address>
                Largestinfo Tunisie s.a<br>
                IMM. DREAM CENTER 7A-2 - 1002 Montplaisir<br>
                Tél Mobile : +216 24 59 46 29 , +216 92 35 40 95<br>
                Tél Fixe : 71 90 60 35<br>
                MF : 1359806/B/A/M/000<br>  
            </address>
            <?php echo $this->Html->image('Largest-info.png', array('class' => 'alignRight', 'style' => 'max-width:250px;margin-top:-100px;')); ?>
            <blockquote>
                <p>Client:</p>
                <small>Raison Sociale : <?php echo $facture['User']['full_name']; ?></small>
                <small>Adresse : <?php echo $facture['User']['Societe']['adresse']; ?></small>
                <small>Tel. Mobile : <?php echo $facture['User']['Societe']['telephone']; ?> | <?php echo $facture['User']['Societe']['tel_mob2']; ?></small>
                <small>Tel. Fixe / Fax : <?php echo $facture['User']['Societe']['tel_fix']; ?> | <?php echo $facture['User']['Societe']['tel_fax']; ?></small>
                <small>Matricule Fiscale : <?php echo $facture['User']['Societe']['mf']; ?></small>
            </blockquote>
            <blockquote class="pull-right">
                <h3>Facture</h3><?php ?>
                <b style="font-size: 12px;">Code Facture : </b><i style="font-size: 12px;"><?php echo $facture['Facture']['code_facture']; ?></i><br>
                <b style="font-size: 12px;">Date Contrat : </b><i style="font-size: 12px;"><?php echo $facture['Facture']['date_contrat']; ?></i><br>
                <b style="font-size: 12px;">Date de facturation : </b><i style="font-size: 12px;"><?php echo $facture['Facture']['created']; ?></i><br>
                <b style="font-size: 12px;">Date d'Échéance : </b><i style="font-size: 12px;"><?php echo $facture['Facture']['limit_date']; ?></i><br>
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
                            <td><?php echo $d['name']; ?> x <?php echo $d['DesignationsFacture']['qte']; ?></td>
                            <td><?php echo number_format($d['DesignationsFacture']['last_unit_price'], 3, '.', ''); ?></td>
                            <td style="text-align: right">
                                <?php
                                // $pttc = $d['price'] * $d['DesignationsFacture']['qte'];
                                $pttc = $d['DesignationsFacture']['last_unit_price'] * $d['DesignationsFacture']['qte'];
                                echo number_format($pttc, 3, '.', '');
                                ?>
                            </td>
                        </tr>
                        <?php $priceht += $pttc; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td style="border-bottom: solid #fff 1px"></td>
                        <td>Total HT</td>
                        <td style="text-align: right"><?php echo number_format($priceht, 3, '.', ''); ?></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                        <td>TVA 18%</td>
                        <td style="text-align: right">
                            <?php
                            $tva = ($priceht * 18) / 100;
                            echo number_format($tva, 3, '.', '');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                        <td>Timbre Fiscal</td>
                        <td style="text-align: right">0.500</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                        <td>Total TTC</td>
                        <td style="text-align: right">
                            <?php
                            $pricettc = $priceht + $tva + 0.5;
                            echo number_format($pricettc, 3, '.', '');
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="" style="width: 30%;border: solid #DDDDDD 1px;border-radius: 5px;">
                <p style="margin-left: 3px;margin-top: 2px;">
                    Accompte : <?php echo ($facture["Facture"]["accompte"] == 0) ? 'Sans accompte' : $facture["Facture"]["accompte"]; ?>  <br>
                    Type de Payement : <?php echo $facture['Payment']['name']; ?><br>
                    Devise : <?php echo $facture['Devise']['name']; ?><br>
                </p>
            </div>
            <div>
            <?php echo $this->Html->image('caché.png', array('class' => 'cache', 'style' => 'float: right;max-width: 180px;margin-right: 10px;')); ?>
            <br><br>
            </div>
            <div class="cb noprint"></div><br>
        </div> 
    </div>
</div>
<div class="cb noprint"></div><br>
<!--<button class="alignCenter btn btn-warning" onclick="window.open('<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'viewP', $facture['Facture']['id'], 'admin' => true)) ?>', '_newtab');" value="Print">Print&nbsp;<i class="icon-print"></i></button>-->
<button class="alignCenter btn btn-warning noprint" onclick="window.print();" value="Print">Print&nbsp;<i class="glyphicon glyphicon-print"></i></button>
