<?php $this->layout = false; ?>
<div>
<?php foreach ($etat as $p): ?>
                <div class="price-box col-md-3 col-sm-12 col-xs-12 col-lg-3 ">
                     
                    
                    <ul class="list-group features">
                        <li class="list-group-item " style="text-align: center;"><strong><?php echo $p['Projet']['name']; ?></strong></li>
                        
                        <li class="list-group-item select">
                            <a class="btn btn-block btn-success text-white btn-lg " href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'tasks_nestable', $p['Projet']['id'])); ?>">Tâches</a>
                        </li>
                         
                    </ul>
                   
                </div>
                <?php endforeach; ?>       
</div>
