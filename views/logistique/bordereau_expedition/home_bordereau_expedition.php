<?php
include './meta/menu_logistique.php';
?>
<style>
        #menu-gauche {
            border-right-style: solid;
            border-right-color: black;
        }

        #menu-gauche ul li {
            padding: 8px;
        }

        #menu-gauche ul li a {
            text-decoration: none;
        }

        #menu-gauche ul li span {
            margin-right: 5px;
        }
        #entete1-logo a {
            text-decoration: none;
            color: white;
            display: inline-block;
        }

        body {
            margin: 0;
        }

        #entete1-button {
            padding: 15px;
            padding-left: 5px;
        }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 text-start mt-3 mb-3">
            <h4 class="text-primary fw-bolder">BORDEREAU D'EXPEDITION</h4>
        </div>
        <div class="col-md-10 mt-3 mb-3">
            <form action="" method="post" id="FilterForm">
                <div class="row">
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="text" name="mBordereau" id="mBordereau" placeholder="N° Bordereau">
                    </div>
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="text" name="Expediteur" id="Expediteur" placeholder="Expediteur">
                    </div>
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="text" name="Destinateur" id="Destinateur" placeholder="Destinateur">
                    </div>
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="text" name="Conductuer" id="Conductuer" placeholder="Conductuer">
                    </div>
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="date" name="filterDate_start" id="filterDate_start">
                    </div>
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="date" name="filterDate_end" id="filterDate_end">
                    </div>
                    <div class="col-md-2 mt-1">
                        <input type="hidden" name="FilterFormBordereau" id="FilterFormBordereau">
                        <button class="btn btn-primary w-100 mt-2 text-white" type="submit"> <i class="fa fa-search"></i> Rechercher</button>
                    </div>
                    <div class="col-md-2 text-end">
                        <button class="btn btn-primary w-100 mt-2 text-white" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa fa-book"></i> OPERATION
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        
        <!-- <div class="row" id="list_bordereau"></div> -->

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="caisse_list_sortie" class="table display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="small">DATE& N° BORDEREAU</th>
                            <th class="small">EXPEDITEUR& DESTINATAIRE</th>
                            <th class="small">TRANSPORTEUR& N° PLAQUE& TELEPHONE</th>
                            <th class="small">N° COLIS& NATURE EMBALLAGE& CONTENU</th>
                            <th class="small">PoidsU KG& PoidsT TONE</th>
                            <th class="small">PrixU TONE&PrixT TONE</th>
                            <th class="small">MANQUE& QTE ARRIVEE</th>
                            <th class="small">AVANCE& RESTE</th>
                            <th class="small">PAYEMENT& SOLDE</th>
                            <th class="small">PLUS</th>
                        </tr>
                    </thead>
                    <tbody id="list_bordereau"></tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">BORDEREAU D'EXPEDITION</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="" method="post" id="bordereau_expedition_form">
                    <tbody id="list_bordereau_page">
                        <tr>
                            <th class="small">DATE</th>
                            <td><input class="form-control" type="date" name="date" id="date" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">NUMERO BORDEREAU</th>
                            <td><input class="form-control" type="number" name="n_bordereau" id="n_bordereau" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">EXPEDITEUR</th>
                            <td><input class="form-control" type="text" name="expediteur" id="expediteur" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">DESTINATAIRE</th>
                            <td><input class="form-control" type="text" name="destinateur" id="destinateur" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">TRANSPORTEUR</th>
                            <td><input class="form-control" type="text" name="transporteur" id="transporteur" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">TELEPHONE</th>
                            <td><input class="form-control" type="tel" name="telephone" id="telephone" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">N° PLAQUE</th>
                            <td><input class="form-control" type="text" name="n_plaque" id="n_plaque" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">N° COLIS</th>
                            <td><input class="form-control" type="text" name="n_colis" id="n_colis" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">NATURE EMBALLAGE</th>
                            <td>
                                <select class="form-control" name="nature_emballage" id="nature_emballage" required>
                                    <option value="">Selectionner</option>
                                    <option value="Sacs">Sacs</option>
                                    <option value="Bidons">Bidons</option>
                                    <option value="Cartons">Cartons</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="small">CONTENU</th>
                            <td><input class="form-control" type="text" name="contenu" id="contenu" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">PDS UN KG</th>
                            <td><input class="form-control" type="text" name="pds_un_kg" id="pds_un_kg" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">PDS TOT TONE</th>
                            <td><input class="form-control" type="text" name="pds_tot_tone" id="pds_tot_tone" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">PU TONE</th>
                            <td><input class="form-control" type="text" name="pu_tone" id="pu_tone" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">PT TONE</th>
                            <td><input class="form-control" type="text" name="pt_tone" id="pt_tone" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">MANQUE</th>
                            <td><input class="form-control" type="text" name="manque" id="manque" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">QTE ARRIVEE</th>
                            <td><input class="form-control" type="text" name="qte_arrive" id="qte_arrive" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">AVANCE/DEPENSE</th>
                            <td><input class="form-control" type="text" name="charge" id="charge" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">RESTE PAYER</th>
                            <td><input class="form-control" type="text" name="reste_payer" id="reste_payer" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">PAYEMENT</th>
                            <td><input class="form-control" type="text" name="payement" id="payement" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <th class="small">SOLDE</th>
                            <td><input class="form-control" type="text" name="solde" id="solde" placeholder="" value="" required></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="bordereau_expedition_btn" id="bordereau_expedition_btn">
                                <button class="btn btn-primary mt-1 text-white w-100" id="bordereau_add" type="submit">ENREGISTRER</button>
                            </td>
                        </tr>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FERMER</button>
        </div>
    </div>
  </div>
</div>