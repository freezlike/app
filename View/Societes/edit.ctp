<?php if(empty($this->request->data)): ?>
<?php $this->set('title_for_layout', __("Ajouter Societé")); ?>
<?php else: ?>
<?php $this->set('title_for_layout', __("Editer Societé")); ?>
<?php endif; ?>


<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'index')); ?>"><?php echo __("Gestion Contact"); ?></a></li>
            <?php if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Contact"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Contact"); ?></li>
            <?php endif; ?>

        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php if (!empty($this->request->data)): ?>
                        <?php echo __("Editer Societé"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Societé"); ?>
                    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Societe', array(
                    'class' => 'form-horizontal cascde-forms',
                    'inputDefaults' => array(
                        'div' => false,
                        'label' => false,
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
               
                
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 173px;  margin-left: -175px;"><?php echo __("Raison Sociale"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.raison_social', array('placeholder' => __("Raison Sociale"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-left: -169px; margin-right: 167px;"><?php echo __("Matricule Fiscal"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.matricule_fiscal', array('placeholder' => __("Matricule Fiscal"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 162px;  margin-left: -164px;"><?php echo __("Forme Juridique"); ?></label>
                    <div class="col-md-9">
                        <select class="form-control form-cascade-control input-small" name="data[Societe][forme_juridique]" > 
                            <option value="Tunisie" selected="selected">Entreprise individuelle </option>
                            <option value="Afghanistan">Société à responsabilité limitée (SARL) </option>
                            <option value="Afrique_Centrale">Société unipersonnelle à responsabilité limitée (SUARL) </option>
                            <option value="Afrique_du_sud">Société anonyme (SA) </option> 
                            <option value="Albanie">Société en commandite par actions (SCA) </option>
                        </select>
                        <?php //echo $this->Form->input('Societe.forme_juridique', array('placeholder' => __("Forme Juridique"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 236px;   margin-left: -238px;"><?php echo __("Email"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.mail', array('placeholder' => __("Email"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 212px;  margin-left: -214px;"><?php echo __("Mobile_1"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.telephone', array('placeholder' => __("Mobile_1"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 212px;  margin-left: -214px;"><?php echo __("Mobile_2"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.tel_mob2', array('placeholder' => __("Mobile_2"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 224px;  margin-left: -226px;"><?php echo __("Tél_Fix"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.tel_fix', array('placeholder' => __("Tél_Fix"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 248px;  margin-left: -250px;"><?php echo __("Fax"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.tel_ fax', array('placeholder' => __("Fax"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                
                    <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 216px;  margin-left: -218px;"><?php echo __("Adresse"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.adresse', array('placeholder' => __("Adresse"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 239px;  margin-left: -241px;"><?php echo __("Pays"); ?></label>
                    <div class="col-md-9">
                        <select class="form-control form-cascade-control input-small" name="data[Societe][pays]" > 
                                                <option value="Tunisie" selected="selected">Tunisie </option>
                                                <option value="Afghanistan">Afghanistan </option>
                                                <option value="Afrique_Centrale">Afrique_Centrale </option>
                                                <option value="Afrique_du_sud">Afrique_du_Sud </option> 
                                                <option value="Albanie">Albanie </option>
                                                <option value="Algerie">Algerie </option>
                                                <option value="Allemagne">Allemagne </option>
                                                <option value="Andorre">Andorre </option>
                                                <option value="Angola">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                                <option value="Argentine">Argentine </option>
                                                <option value="Armenie">Armenie </option> 
                                                <option value="Australie">Australie </option>
                                                <option value="Autriche">Autriche </option>
                                                <option value="Azerbaidjan">Azerbaidjan </option>
                                                <option value="Bahamas">Bahamas </option>
                                                <option value="Bangladesh">Bangladesh </option>
                                                <option value="Barbade">Barbade </option>
                                                <option value="Bahrein">Bahrein </option>
                                                <option value="Belgique">Belgique </option>
                                                <option value="Belize">Belize </option>
                                                <option value="Benin">Benin </option>
                                                <option value="Bermudes">Bermudes </option>
                                                <option value="Bielorussie">Bielorussie </option>
                                                <option value="Bolivie">Bolivie </option>
                                                <option value="Botswana">Botswana </option>
                                                <option value="Bhoutan">Bhoutan </option>
                                                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                                <option value="Bresil">Bresil </option>
                                                <option value="Brunei">Brunei </option>
                                                <option value="Bulgarie">Bulgarie </option>
                                                <option value="Burkina_Faso">Burkina_Faso </option>
                                                <option value="Burundi">Burundi </option>
                                                <option value="Caiman">Caiman </option>
                                                <option value="Cambodge">Cambodge </option>
                                                <option value="Cameroun">Cameroun </option>
                                                <option value="Canada">Canada </option>
                                                <option value="Canaries">Canaries </option>
                                                <option value="Cap_vert">Cap_Vert </option>
                                                <option value="Chili">Chili </option>
                                                <option value="Chine">Chine </option> 
                                                <option value="Chypre">Chypre </option> 
                                                <option value="Colombie">Colombie </option>
                                                <option value="Comores">Colombie </option>
                                                <option value="Congo">Congo </option>
                                                <option value="Congo_democratique">Congo_democratique </option>
                                                <option value="Cook">Cook </option>
                                                <option value="Coree_du_Nord">Coree_du_Nord </option>
                                                <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                <option value="Costa_Rica">Costa_Rica </option>
                                                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                                <option value="Croatie">Croatie </option>
                                                <option value="Cuba">Cuba </option>
                                                <option value="Danemark">Danemark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominique">Dominique </option>
                                                <option value="Egypte">Egypte </option> 
                                                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                                <option value="Equateur">Equateur </option>
                                                <option value="Erythree">Erythree </option>
                                                <option value="Espagne">Espagne </option>
                                                <option value="Estonie">Estonie </option>
                                                <option value="Etats_Unis">Etats_Unis </option>
                                                <option value="Ethiopie">Ethiopie </option>
                                                <option value="Falkland">Falkland </option>
                                                <option value="Feroe">Feroe </option>
                                                <option value="Fidji">Fidji </option>
                                                <option value="Finlande">Finlande </option>
                                                <option value="France">France </option>
                                                <option value="Gabon">Gabon </option>
                                                <option value="Gambie">Gambie </option>
                                                <option value="Georgie">Georgie </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Grece">Grece </option>
                                                <option value="Grenade">Grenade </option>
                                                <option value="Groenland">Groenland </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesey">Guernesey </option>
                                                <option value="Guinee">Guinee </option>
                                                <option value="Guinee_Bissau">Guinee_Bissau </option>
                                                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Guyane_Francaise ">Guyane_Francaise </option>
                                                <option value="Haiti">Haiti </option>
                                                <option value="Hawaii">Hawaii </option> 
                                                <option value="Honduras">Honduras </option>
                                                <option value="Hong_Kong">Hong_Kong </option>
                                                <option value="Hongrie">Hongrie </option>
                                                <option value="Inde">Inde </option>
                                                <option value="Indonesie">Indonesie </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Irlande">Irlande </option>
                                                <option value="Islande">Islande </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italie">italie </option>
                                                <option value="Jamaique">Jamaique </option>
                                                <option value="Jan Mayen">Jan Mayen </option>
                                                <option value="Japon">Japon </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordanie">Jordanie </option>
                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kirghizstan">Kirghizistan </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Koweit">Koweit </option>
                                                <option value="Laos">Laos </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Lettonie">Lettonie </option>
                                                <option value="Liban">Liban </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lituanie">Lituanie </option> 
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Lybie">Lybie </option>
                                                <option value="Macao">Macao </option>
                                                <option value="Macedoine">Macedoine </option>
                                                <option value="Madagascar">Madagascar </option>
                                                <option value="Madère">Madère </option>
                                                <option value="Malaisie">Malaisie </option>
                                                <option value="Malawi">Malawi </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malte">Malte </option>
                                                <option value="Man">Man </option>
                                                <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                <option value="Maroc">Maroc </option>
                                                <option value="Marshall">Marshall </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Maurice">Maurice </option>
                                                <option value="Mauritanie">Mauritanie </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexique">Mexique </option>
                                                <option value="Micronesie">Micronesie </option>
                                                <option value="Midway">Midway </option>
                                                <option value="Moldavie">Moldavie </option>
                                                <option value="Monaco">Monaco </option>
                                                <option value="Mongolie">Mongolie </option>
                                                <option value="Montserrat">Montserrat </option>
                                                <option value="Mozambique">Mozambique </option>
                                                <option value="Namibie">Namibie </option>
                                                <option value="Nauru">Nauru </option>
                                                <option value="Nepal">Nepal </option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk">Norfolk </option>
                                                <option value="Norvege">Norvege </option>
                                                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                                                <option value="Oman">Oman </option>
                                                <option value="Ouganda">Ouganda </option>
                                                <option value="Ouzbekistan">Ouzbekistan </option>
                                                <option value="Pakistan">Pakistan </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama </option>
                                                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Pays_Bas">Pays_Bas </option>
                                                <option value="Perou">Perou </option>
                                                <option value="Philippines">Philippines </option> 
                                                <option value="Pologne">Pologne </option>
                                                <option value="Polynesie">Polynesie </option>
                                                <option value="Porto_Rico">Porto_Rico </option>
                                                <option value="Portugal">Portugal </option>
                                                <option value="Qatar">Qatar </option>
                                                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                                <option value="Republique_Tcheque">Republique_Tcheque </option>
                                                <option value="Reunion">Reunion </option>
                                                <option value="Roumanie">Roumanie </option>
                                                <option value="Royaume_Uni">Royaume_Uni </option>
                                                <option value="Russie">Russie </option>
                                                <option value="Rwanda">Rwanda </option>
                                                <option value="Sahara Occidental">Sahara Occidental </option>
                                                <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                <option value="Saint_Marin">Saint_Marin </option>
                                                <option value="Salomon">Salomon </option>
                                                <option value="Salvador">Salvador </option>
                                                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                <option value="Samoa_Americaine">Samoa_Americaine </option>
                                                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option> 
                                                <option value="Senegal">Senegal </option> 
                                                <option value="Seychelles">Seychelles </option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapour">Singapour </option>
                                                <option value="Slovaquie">Slovaquie </option>
                                                <option value="Slovenie">Slovenie</option>
                                                <option value="Somalie">Somalie </option>
                                                <option value="Soudan">Soudan </option> 
                                                <option value="Sri_Lanka">Sri_Lanka </option> 
                                                <option value="Suede">Suede </option>
                                                <option value="Suisse">Suisse </option>
                                                <option value="Surinam">Surinam </option>
                                                <option value="Swaziland">Swaziland </option>
                                                <option value="Syrie">Syrie </option>
                                                <option value="Tadjikistan">Tadjikistan </option>
                                                <option value="Taiwan">Taiwan </option>
                                                <option value="Tonga">Tonga </option>
                                                <option value="Tanzanie">Tanzanie </option>
                                                <option value="Tchad">Tchad </option>
                                                <option value="Thailande">Thailande </option>
                                                <option value="Tibet">Tibet </option>
                                                <option value="Timor_Oriental">Timor_Oriental </option>
                                                <option value="Togo">Togo </option> 
                                                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                                <option value="Tristan da cunha">Tristan de cuncha </option>
                                                <option value="Tunisie">Tunisie </option>
                                                <option value="Turkmenistan">Turmenistan </option> 
                                                <option value="Turquie">Turquie </option>
                                                <option value="Ukraine">Ukraine </option>
                                                <option value="Uruguay">Uruguay </option>
                                                <option value="Vanuatu">Vanuatu </option>
                                                <option value="Vatican">Vatican </option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Vierges_Americaines">Vierges_Americaines </option>
                                                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                                <option value="Vietnam">Vietnam </option>
                                                <option value="Wake">Wake </option>
                                                <option value="Wallis et Futuma">Wallis et Futuma </option>
                                                <option value="Yemen">Yemen </option>
                                                <option value="Yougoslavie">Yougoslavie </option>
                                                <option value="Zambie">Zambie </option>
                                                <option value="Zimbabwe">Zimbabwe </option>
                                                </select>
                        <?php //echo $this->Form->input('Societe.pays', array('placeholder' => __("Pays"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" style="margin-right: 219px;  margin-left: -221px;"><?php echo __("Activité"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Societe.activite', array('placeholder' => __("Activité"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                    
             

                <?php $this->end(); ?>  
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php if (!empty($this->request->data)): ?>
                        <?php echo __("Editer Client"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Client"); ?>
                    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body" style="margin-bottom: 30px;">
                <?php
                echo $this->Form->create('Contact', array(
                    'class' => 'form-horizontal cascde-forms',
                    'inputDefaults' => array(
                        'div' => false,
                        'label' => false,
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
               
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Nom"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Contact.first_name', array('placeholder' => __("Nom"), 'class' => 'form-control form-cascade-control input-small', 'style'=>'margin-bottom:15px;width: 943px;')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Prénom"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Contact.last_name', array('placeholder' => __("Prénom"), 'class' => 'form-control form-cascade-control input-small', 'style'=>'margin-bottom:15px;width: 943px;')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Email"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Contact.e_mail', array('placeholder' => __("Email"), 'class' => 'form-control form-cascade-control input-small' , 'style'=>'margin-bottom:15px;width: 943px;')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Téléphone"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Contact.telephone', array('placeholder' => __("Téléphone"), 'class' => 'form-control form-cascade-control input-small' , 'style'=>'margin-bottom:15px;width: 943px;')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Date de naissance'); ?></label>
                    
                        <?php if (empty($this->request->data)): ?>
                    <div class="col-md-9">
                         <input type="date" class="form-control form-cascade-control input-small" name="data[Contact][born_date]" style="margin-bottom: 15px; width: 943px;" >
                    </div>
                        <?php else: ?>
                    <div class="col-md-9">
                         <input type="date" value='<?php echo $this->request->data['Contact']['born_date'] ?>'class="form-control form-cascade-control input-small" name="data[Contact][born_date]" style="margin-bottom: 15px; width: 943px;">
                    </div>    
                        <?php endif; ?>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Adresse"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('Contact.adresse', array('placeholder' => __("Adresse"), 'class' => 'form-control form-cascade-control input-small' , 'style'=>'margin-bottom:15px;width: 943px;')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Pays"); ?></label>
                    <div class="col-md-9">
                        <select class="form-control form-cascade-control input-small" name="data[Contact][pays]" style="margin-bottom: 15px;width: 943px;" > 
                                                <option value="Tunisie" selected="selected">Tunisie </option>
                                                <option value="Afghanistan">Afghanistan </option>
                                                <option value="Afrique_Centrale">Afrique_Centrale </option>
                                                <option value="Afrique_du_sud">Afrique_du_Sud </option> 
                                                <option value="Albanie">Albanie </option>
                                                <option value="Algerie">Algerie </option>
                                                <option value="Allemagne">Allemagne </option>
                                                <option value="Andorre">Andorre </option>
                                                <option value="Angola">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                                <option value="Argentine">Argentine </option>
                                                <option value="Armenie">Armenie </option> 
                                                <option value="Australie">Australie </option>
                                                <option value="Autriche">Autriche </option>
                                                <option value="Azerbaidjan">Azerbaidjan </option>
                                                <option value="Bahamas">Bahamas </option>
                                                <option value="Bangladesh">Bangladesh </option>
                                                <option value="Barbade">Barbade </option>
                                                <option value="Bahrein">Bahrein </option>
                                                <option value="Belgique">Belgique </option>
                                                <option value="Belize">Belize </option>
                                                <option value="Benin">Benin </option>
                                                <option value="Bermudes">Bermudes </option>
                                                <option value="Bielorussie">Bielorussie </option>
                                                <option value="Bolivie">Bolivie </option>
                                                <option value="Botswana">Botswana </option>
                                                <option value="Bhoutan">Bhoutan </option>
                                                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                                <option value="Bresil">Bresil </option>
                                                <option value="Brunei">Brunei </option>
                                                <option value="Bulgarie">Bulgarie </option>
                                                <option value="Burkina_Faso">Burkina_Faso </option>
                                                <option value="Burundi">Burundi </option>
                                                <option value="Caiman">Caiman </option>
                                                <option value="Cambodge">Cambodge </option>
                                                <option value="Cameroun">Cameroun </option>
                                                <option value="Canada">Canada </option>
                                                <option value="Canaries">Canaries </option>
                                                <option value="Cap_vert">Cap_Vert </option>
                                                <option value="Chili">Chili </option>
                                                <option value="Chine">Chine </option> 
                                                <option value="Chypre">Chypre </option> 
                                                <option value="Colombie">Colombie </option>
                                                <option value="Comores">Colombie </option>
                                                <option value="Congo">Congo </option>
                                                <option value="Congo_democratique">Congo_democratique </option>
                                                <option value="Cook">Cook </option>
                                                <option value="Coree_du_Nord">Coree_du_Nord </option>
                                                <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                <option value="Costa_Rica">Costa_Rica </option>
                                                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                                <option value="Croatie">Croatie </option>
                                                <option value="Cuba">Cuba </option>
                                                <option value="Danemark">Danemark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominique">Dominique </option>
                                                <option value="Egypte">Egypte </option> 
                                                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                                <option value="Equateur">Equateur </option>
                                                <option value="Erythree">Erythree </option>
                                                <option value="Espagne">Espagne </option>
                                                <option value="Estonie">Estonie </option>
                                                <option value="Etats_Unis">Etats_Unis </option>
                                                <option value="Ethiopie">Ethiopie </option>
                                                <option value="Falkland">Falkland </option>
                                                <option value="Feroe">Feroe </option>
                                                <option value="Fidji">Fidji </option>
                                                <option value="Finlande">Finlande </option>
                                                <option value="France">France </option>
                                                <option value="Gabon">Gabon </option>
                                                <option value="Gambie">Gambie </option>
                                                <option value="Georgie">Georgie </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Grece">Grece </option>
                                                <option value="Grenade">Grenade </option>
                                                <option value="Groenland">Groenland </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesey">Guernesey </option>
                                                <option value="Guinee">Guinee </option>
                                                <option value="Guinee_Bissau">Guinee_Bissau </option>
                                                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Guyane_Francaise ">Guyane_Francaise </option>
                                                <option value="Haiti">Haiti </option>
                                                <option value="Hawaii">Hawaii </option> 
                                                <option value="Honduras">Honduras </option>
                                                <option value="Hong_Kong">Hong_Kong </option>
                                                <option value="Hongrie">Hongrie </option>
                                                <option value="Inde">Inde </option>
                                                <option value="Indonesie">Indonesie </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Irlande">Irlande </option>
                                                <option value="Islande">Islande </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italie">italie </option>
                                                <option value="Jamaique">Jamaique </option>
                                                <option value="Jan Mayen">Jan Mayen </option>
                                                <option value="Japon">Japon </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordanie">Jordanie </option>
                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kirghizstan">Kirghizistan </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Koweit">Koweit </option>
                                                <option value="Laos">Laos </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Lettonie">Lettonie </option>
                                                <option value="Liban">Liban </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lituanie">Lituanie </option> 
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Lybie">Lybie </option>
                                                <option value="Macao">Macao </option>
                                                <option value="Macedoine">Macedoine </option>
                                                <option value="Madagascar">Madagascar </option>
                                                <option value="Madère">Madère </option>
                                                <option value="Malaisie">Malaisie </option>
                                                <option value="Malawi">Malawi </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malte">Malte </option>
                                                <option value="Man">Man </option>
                                                <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                <option value="Maroc">Maroc </option>
                                                <option value="Marshall">Marshall </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Maurice">Maurice </option>
                                                <option value="Mauritanie">Mauritanie </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexique">Mexique </option>
                                                <option value="Micronesie">Micronesie </option>
                                                <option value="Midway">Midway </option>
                                                <option value="Moldavie">Moldavie </option>
                                                <option value="Monaco">Monaco </option>
                                                <option value="Mongolie">Mongolie </option>
                                                <option value="Montserrat">Montserrat </option>
                                                <option value="Mozambique">Mozambique </option>
                                                <option value="Namibie">Namibie </option>
                                                <option value="Nauru">Nauru </option>
                                                <option value="Nepal">Nepal </option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk">Norfolk </option>
                                                <option value="Norvege">Norvege </option>
                                                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                                                <option value="Oman">Oman </option>
                                                <option value="Ouganda">Ouganda </option>
                                                <option value="Ouzbekistan">Ouzbekistan </option>
                                                <option value="Pakistan">Pakistan </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama </option>
                                                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Pays_Bas">Pays_Bas </option>
                                                <option value="Perou">Perou </option>
                                                <option value="Philippines">Philippines </option> 
                                                <option value="Pologne">Pologne </option>
                                                <option value="Polynesie">Polynesie </option>
                                                <option value="Porto_Rico">Porto_Rico </option>
                                                <option value="Portugal">Portugal </option>
                                                <option value="Qatar">Qatar </option>
                                                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                                <option value="Republique_Tcheque">Republique_Tcheque </option>
                                                <option value="Reunion">Reunion </option>
                                                <option value="Roumanie">Roumanie </option>
                                                <option value="Royaume_Uni">Royaume_Uni </option>
                                                <option value="Russie">Russie </option>
                                                <option value="Rwanda">Rwanda </option>
                                                <option value="Sahara Occidental">Sahara Occidental </option>
                                                <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                <option value="Saint_Marin">Saint_Marin </option>
                                                <option value="Salomon">Salomon </option>
                                                <option value="Salvador">Salvador </option>
                                                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                <option value="Samoa_Americaine">Samoa_Americaine </option>
                                                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option> 
                                                <option value="Senegal">Senegal </option> 
                                                <option value="Seychelles">Seychelles </option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapour">Singapour </option>
                                                <option value="Slovaquie">Slovaquie </option>
                                                <option value="Slovenie">Slovenie</option>
                                                <option value="Somalie">Somalie </option>
                                                <option value="Soudan">Soudan </option> 
                                                <option value="Sri_Lanka">Sri_Lanka </option> 
                                                <option value="Suede">Suede </option>
                                                <option value="Suisse">Suisse </option>
                                                <option value="Surinam">Surinam </option>
                                                <option value="Swaziland">Swaziland </option>
                                                <option value="Syrie">Syrie </option>
                                                <option value="Tadjikistan">Tadjikistan </option>
                                                <option value="Taiwan">Taiwan </option>
                                                <option value="Tonga">Tonga </option>
                                                <option value="Tanzanie">Tanzanie </option>
                                                <option value="Tchad">Tchad </option>
                                                <option value="Thailande">Thailande </option>
                                                <option value="Tibet">Tibet </option>
                                                <option value="Timor_Oriental">Timor_Oriental </option>
                                                <option value="Togo">Togo </option> 
                                                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                                <option value="Tristan da cunha">Tristan de cuncha </option>
                                                <option value="Tunisie">Tunisie </option>
                                                <option value="Turkmenistan">Turmenistan </option> 
                                                <option value="Turquie">Turquie </option>
                                                <option value="Ukraine">Ukraine </option>
                                                <option value="Uruguay">Uruguay </option>
                                                <option value="Vanuatu">Vanuatu </option>
                                                <option value="Vatican">Vatican </option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Vierges_Americaines">Vierges_Americaines </option>
                                                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                                <option value="Vietnam">Vietnam </option>
                                                <option value="Wake">Wake </option>
                                                <option value="Wallis et Futuma">Wallis et Futuma </option>
                                                <option value="Yemen">Yemen </option>
                                                <option value="Yougoslavie">Yougoslavie </option>
                                                <option value="Zambie">Zambie </option>
                                                <option value="Zimbabwe">Zimbabwe </option>
                                                </select>
                        <?php //echo $this->Form->input('pays', array('placeholder' => __("Pays"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
            </div>     
                <div class="form-group">

                    <div class="col-md-3 col-md-offset-3">
                        <?php if (!empty($this->request->data)): ?>
                            <?php echo $this->Form->submit(__("Modifier"), array('div' => false, 'class' => 'btn bg-primary text-white' , 'style'=>'width: 135px;')) ?>
                        <?php else: ?>
                            <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white' , 'style'=>'width: 135px;')) ?>
                        <button class="btn bg-info x3 text-white" type="reset" style="width: 135px;">Annuler</button>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $this->end(); ?>  
            </div>
        </div>

    </div>

