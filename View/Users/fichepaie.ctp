<?php $this->set('title_for_layout', __("Fiche Employé")); ?>

<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>
<div id="pdft">
    <div class="row noprint">
        <div class="col-mod-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
                <li class="active"><?php echo __("Fiche de Paie de ") . ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?></li>
            </ul>
        </div>
    </div>
    <div class="panel panel-cascade panel-invoice">
        <div class="panel-heading">
            <h3 class="panel-title">
                Bulletin de Paie
                <span class="pull-right noprint">
    <!--              <a href="#" class=" btn btn-warning text-white hidden-print"><i class="fa fa-pencil"></i> Edit</a>-->
                    <a href="#" class=" btn btn-success btn-print text-white hidden-print"><i class="fa fa-print"></i> Print</a>

                </span>
            </h3>
        </div>
        <!--               <head>
                         <link rel="stylesheet" href="print.css" type="text/css" media="print" />
                     </head>          
        <form>
          <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Print" />
        </form>-->
        <div class="panel-body" id="body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="pull-left">
             <!--            Employee: <strong>Largestinfo </strong>-->
                                <img src="/largestrh/img/Largest-info.png" >
                            </div>

                            <ul class="pull-right">
                                <small>

                                    <?php
                                    $date = date("d-m-Y");
                                    echo ($date);
                                    ?>

                                </small>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <blockquote class="pull-left">
                                <ul class="list-unstyled">
                                    <small>
                                        <li><strong> Adresse :</strong> </li>
                                        <li><span> IMM DREAM CENTER 7A-2</span> </li>
                                        <li><span> ANGLE MOHAMED V ET </span> </li>
                                        <li><span>KHAIREDDINE BACHA</span> </li>
                                        <li><span><b> TEL :</b> +216 71 906 030 </span></li>
                                    </small>
                                </ul>
                            </blockquote>
                            <blockquote class="pull-right">
                                <ul class="list-unstyled" style="text-align: left;">
                                    <small>
                                        <li>
                                            <span><b> <?php echo __("Nom & Prénom:  "); ?></b>
                                                <?php echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <b><?php echo __("Matricule:  "); ?></b>
                                                <?php echo ucfirst($user['User']['matricule']); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <b><?php echo __("Fonction:  "); ?></b>
                                                <?php echo $user['Poste']['name']; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <b><?php echo __("N° CNSS:  "); ?></b>
                                                <?php echo ucfirst($user['User']['cnss']); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <b> <?php echo __("N° CIN:  "); ?></b>
                                                <?php echo ucfirst($user['User']['cin']); ?>
                                            </span>
                                        </li>
                                    </small>
                                </ul>
                            </blockquote>

                        </div>
                    </div>
                    <?php $totalFP = $user['Poste']['salaire']; ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Désignation</th><th>Projets</th><th>Salaire & Primes</th><th>Retenues</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Salaire Brut</td><td></td>
                                <td><?php echo ($user['Poste']['salaire']); ?></td>
                                <td></td></tr>
                            <tr><td>Primes / Projet</td><td>
                                    <?php foreach ($user['Projet'] as $k => $p): ?>
                                        <p> <?php echo $p['name']; ?></p>

                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($user['Projet'] as $k => $p): ?>
                                        <?php $totalFP +=$p['ProjetsUser']['extras']; ?>
                                        <p> <?php echo $p['ProjetsUser']['extras']; ?></p>

                                    <?php endforeach; ?>
                                </td>
                                <td></td></tr>
                            <tr><td>Retenue CNSS</td><td></td><td></td><td>0</td></tr>
                            <tr><td>Salaire brut imposable</td><td></td><td>0</td><td></td></tr>
                            <tr><td>Retenue à la source</td><td></td><td></td><td>0</td></tr>



                            <tr class="invoice-total" bgcolor="#f1f1f1"><td colspan="3" align="right"> <strong>Total</strong></td><td><?php echo number_format($totalFP, 3, '.', '.'); ?> TND</td></tr>
                            <tr class="invoice-total" bgcolor="#f1f1f1"><td colspan="3" align="right"> <strong>Net à payer </strong></td><td><?php echo number_format($totalFP, 3, '.', '.'); ?> TND</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row noprint">
                <div class="col-md-12">
                    <a href="#"   onclick="pdf();">
                        Download PDF
                    </a>
               <!--  <strong>Return Policy</strong>
                 <p>The goods once sold will not be taken back for the price. They can be exchanged with the other product or your cash will be credited in our store account for future use.</p>-->
               <!--  <img src="images/barcode.jpg" class="barcode">-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php //echo $this->Html->scriptStart(array('inline' => false)); ?>
<!--function imprimer_page(){
window.print();
}-->
<?php //echo $this->Html->scriptEnd(); ?>

<script>
    function pdf() {
         var doc = new jsPDF('p', 'in');
         var source = $('#pdft').html();
         var specialElementHandlers = {
             '#bypassme': function(element, renderer) {
                 return true;
             }
         };

         doc.fromHTML(
             source, // HTML string or DOM elem ref.
             0.5,    // x coord
             0.5,    // y coord
             {
                 'width': 150, // max width of content on PDF
                 'elementHandlers': specialElementHandlers
             });

        doc.output('save', 'filename.pdf');
    }
</script>
