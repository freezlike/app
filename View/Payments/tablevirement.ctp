<?php $this->set('title_for_layout', __("ORDRE DE VIREMENT")); ?>

<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>
<?php echo $this->Html->css('custom', array('inline' => false)); ?>

<div class="panel-body virement " id="virement" style="color:#007C30;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="pull-left ">
     <!--            Employee: <strong>Largestinfo </strong>-->

                        <!--                            <div style="width:350px;height:105px;border:1px solid #007C30;"></div>-->
                        <table  style="width:328px;height:105px;" >
                            <tr><td id="td1" width=64px' style="border-right: hidden;" ></td>
                            <td id="td1" width='150px' style="border-top: hidden;position: relative; border-bottom: hidden;"><b style="font-size: 11px;position: absolute;top: -10px;left: 30px;color:#007C30">DONNEUR D'ORDRE</b></td> 
                            <td id="td1" width=64px' style="border-left: hidden;"> </td></tr>
                            <tr style="text-align: center;" VALIGN=top><td id="td1" width=64px' style="border-right: hidden; border-top: hidden"></td><td id="td1" width='150px' style="border-top: hidden;">Largestinfo Tunisie</td><td id="td1" width=64px' style="border-left: hidden; border-top: hidden"></td></tr>
                        </table>
                        <br>

                        <table border='1' style="border-top: hidden;height: 13px;" >
                            <td style="border-bottom: hidden; border-left: hidden"><b style="font-size: 11px"><?php echo(" COMPTE N° "); ?></b></td>
                            <td id="td1" width='20px'></td><td id="td1"width='20px'></td>
                            <td style="border-bottom: hidden" width='20px'> </td>
                            <td id="td1" width='20px'></td><td id="td1" width='20px'></td><td id="td1" width='20px'></td>
                            <td style="border-bottom: hidden" width='20px'> </td>
                            <td id="td1" width='20px'>1</td><td id="td1" width='20px'>0</td><td id="td1" width='20px'>1</td><td id="td1" width='20px'>6</td><td id="td1" width='20px'>4</td><td id="td1" width='20px'>1</td>
                        </table>


                        <br><br>

                    </div>
                    <div class="pull-right text-center vr-bank " >

                        <?php $month = date("F");

                        if($month=='January'){
                                $m='Janvier';
                        }
                                else
                                    if ( $month=='February') {
                                    $m='Février';
                                
                            }
                            else
                                if ( $month=='March') {
                                    $m='Mars';
                                
                            }
                            else
                                if ( $month=='April') {
                                    $m='Avril';
                                
                            }
                            else
                                if ( $month=='May') {
                                    $m='Mai';
                                
                            }
                            else
                                if ( $month=='June') {
                                    $m='Juin';
                                
                            }
                            else
                                if ( $month=='July') {
                                    $m='Juillet';
                                
                            }
                            else
                                if ( $month=='August') {
                                    $m='Aout';
                                
                            }
                            else
                                if ( $month=='September') {
                                    $m='Septembre';
                                
                            }
                            else
                                if ( $month=='October') {
                                    $m='Octobre';
                                
                            }
                            else
                                if ( $month=='November') {
                                    $m='Novembre';
                                
                            }
                            else
                                if ( $month=='December') {
                                    $m='Décembre';
                                
                            }
                        ?>
                        <?php $date = date("d-m-Y"); ?>
                        <small> <b> <?php echo("Tunis, le ") . ' ' . ($date); ?></b></small>

                        <div class="text-center" style="font-size: 15px"> 
                            <b> ORDRE DE VIREMENT</b>
                        </div>
                        <div class="text-center" style="font-size: 14px">
                            <b > AMEN BANK</b>
                        </div>
                        <br>
                        <b style="font-size: 11px"> <?php echo("AGENCE DE Montplaisir"); ?></b>


                    </div>

                </div>

            </div>
            <div style="font-size: 11px">

                <small><?php echo __("Par le débit de mon/notre compte indiqué ci-dessus, veuillez effectuer les virements suivants :"); ?></small>
            </div>
            <table border='1' bordercolor='#007C30' width='100%'style="margin-top: 5px; margin-bottom: 10px;">
                <thead style="font-size: 11px">
                    <tr>
                        <td align=center ROWSPAN=2>
                            Noms et prénoms des bénéficiaires 
                        </td>
                        <td  align=center COLSPAN=2>   
                            Domiciliations
                        </td>
                        <td align=center ROWSPAN=2>
                            Montant
                        </td>
                    </tr>
                    <tr>
                        <td align=center>Banques</td> <td align=center>N° comptes</td> 
                    </tr>
                </thead>
                <tbody>
                    <tr><td  ROWSPAN=2>Riahi Hedi: 07 102 0021121627268 09</td><td ROWSPAN=2>AMEN</td></tr><tr><td align=center></td> <td align=center></td></tr>
                    <tr><td  ROWSPAN=2>Jouini Mohamed Belhassen : 08 086 0250420005870 59</td><td ROWSPAN=2>BIAT</td></tr><tr><td align=center></td> <td align=center></td></tr>
                    <tr><td  ROWSPAN=2>Aissaoui Taha: 17 001 0000001913107 66</td><td  ROWSPAN=2>POSTE</td></tr><tr><td align=center></td> <td align=center></td></tr>
                    <tr><td  ROWSPAN=2>Lazzez Nesrine: 01 903 0461130183012 66</td><td  ROWSPAN=2>ATB</td></tr><tr><td align=center></td> <td align=center></td></tr>
                    <tr><td  ROWSPAN=2>Jouini Mariem : 04 070 1550034789339 02</td><td  ROWSPAN=2>POSTE</td></tr><tr><td align=center></td> <td align=center></td></tr>
                    <tr><td  ROWSPAN=2>Chamli Mariem: 109 105 512551 </td><td ROWSPAN=2>AMEN</td></tr><tr><td align=center></td> <td align=center></td></tr>
            </table>

            <b class="pull-right" style="margin-right: 12px;margin-bottom: 55px;font-size: 12px;"><?php echo __("Signature"); ?></b>
            
            <small><?php echo('Objet du virement :  Paie du mois de ').$m; ?></small>
            <small><?php echo('Montant (en toutes lettres) ............................................................................................................... '); ?></small>

            
            <div class="footer-content">
                <font color="#007C30">
                <footer style="text-align: center;">
                    <HR align=center style=" margin-bottom: 0px;width :98%; border-top: 1px solid #007C30;">
                    <small style="font-size: 7.5px;"><b>S.A. au capital de 122.220.000 de Dinars - R.C. : B176041996 - Avenu Mohamed V 1002 Tunis - Tél. :71 14 80 00 - Fax : 71 83 35 17 - Téléx : 12359/18800 - SWIFT CFCTTNTTXXX</b></small>
                </footer> 
                </font>
            </div>
            <br>
            <a href="#" class=" btn btn-success btn-print text-white hidden-print pull-right"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>