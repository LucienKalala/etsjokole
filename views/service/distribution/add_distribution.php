<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../models/livraison/livraison.php';
include '../models/affectation-service/affectationService.php';
include '../models/preparation/preparation.php';
include '../models/distribution/distribution.php';
include '../models/demande/demande.php';
include '../models/ventePOS/VentePOS.php';
?>
<div class="panel">
    <div class="panel panel-heading">
        <span class="fa fa-cube" style="color: forestgreen; font-size: 30px;margin-right: 5px;"></span>
        <span class="fa fa-dollar" style="color: forestgreen; font-size: 30px;margin-right: 5px;"></span>
        <span class="h3">Vente</span>
        <span class="glyphicon glyphicon-chevron-right" style="color: black; font-size: 30px;margin-right: 5px;"></span>
        <span class="glyphicon glyphicon-asterisk" style="color: red; font-size: 30px;margin-right: 5px;"></span>
        <span class="h4">Sur stock</span>
    </div>
    <div class="panel panel-body">
        <div>
            <?php
            if ((isset($_GET['reponse']) && ($_GET['reponse'] == sha1("succes")))) {
            ?>
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok" style="font-size: 15px;margin-right: 5px;"></span><span>Enregistrement effectué avec succès</span>
                </div>
            <?php
            }
            ?>
            <?php
            if ((isset($_GET['reponse']) && ($_GET['reponse'] == sha1("traitement_error")))) {
            ?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-ban-circle" style="font-size: 15px;margin-right: 5px;"></span><span>Erreur d'enregistrement</span>
                </div>
            <?php
            }
            ?>
            <?php
            if ((isset($_GET['reponse']) && ($_GET['reponse'] == sha1("remplissage_error")))) {
            ?>
                <div class="alert alert-warning">
                    <span class="glyphicon glyphicon-blackboard" style="font-size: 15px;margin-right: 5px;"></span><span>Erreur de remplissage, Recommencer SVP</span>
                </div>
            <?php
            }
            ?>
            <?php
            if ((isset($_GET['reponse']) && ($_GET['reponse'] == sha1("quantite_error")))) {
            ?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-edit" style="font-size: 15px;margin-right: 5px;"></span><span>Quantity error. Please correct</span>
                </div>
            <?php
            }
            ?>

            <?php
            if (1) {
            ?>
                <fieldset>
                    <legend>
                        Date et client
                    </legend>
                    <form class="form-inline" method="POST" action="../contollers/distribution/distributionController.php">
                        <div class="row">
                            <div class="col-3">
                                <label class="control-label">Date :</label>
                                <input class="form-control" type="date" name="tb_date" value="<?= date('Y-m-d') ?>" >
                            </div>
                            <div class="col-3 mt-4 d-none">
                                <select class="form-control select2" name="cb_typerepas">
                                    <!-- <option value="0">Choose a type</option>
                                    <option value="Input">Input</option>
                                    <option value="Diesel">Diesel and Fuel</option>
                                    <option value="Lubricant">Lubricant</option>
                                    <option value="Fleet">Fleet Maintenance</option>
                                    <option value="Plant">Plant Maintenance</option>
                                    <option value="cleaning">Cleaning</option>
                                    <option value="non-consomable">Non-consomable</option>
                                    <option value="Office and kitchen equipment">Office and kitchen equipment</option>
                                    <option value="Bar">Bar</option>
                                    <option value="Spoilage">Spoilage</option> -->
                                    <option value="Transfer" selected>Transfer to</option>
                                    <!-- <option value="Staff meal">Staff meal</option>
                                    <option value="Back to supplier">Back to supplier</option>
                                    <option value="Back charge to client">Back charge to client</option>
                                    <option value="Fonction">Fonction</option>
                                    <option value="PRO">PRO</option> -->
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="control-label">Identité client :</label>
                                <input class="form-control" type="text" name="tb_identiteClient" required>
                            </div>
                            <div class="col-3 mt-4">
                                <input type="hidden" name="tb_idaffectation" value="<?= $_SESSION['idaffectation'] ?>">
                                <button class="btn btn-success" type="submit" name="bt_select_date_type">
                                    <span class="fa fa-check"></span> Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            <?php
            }
            ?>

            <?php
               if (isset($_GET['use_date'])) {
            ?>
                        <fieldset class="mt-3">
                            <form class="form-horizontal" method="POST" action="../contollers/distribution/distributionController.php">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td>
                                                    <?php
                                                        $recentIdVentePOS=0;
                                                        $bdVentePOS=new BdVentePOS();
                                                        $ventePOSs=$bdVentePOS->getVentePOSRecentId();
                                                        $recentIdVentePOS=$ventePOSs[0]['recentId'];
                                                        if (isset($_GET['use_ventePOS'])) {
                                                            $displayedVentePOSId=$_GET['use_ventePOS'];
                                                        } else {
                                                            $displayedVentePOSId=($recentIdVentePOS+1);
                                                        }
                                                        
                                                    ?>
                                                    <label class="control-label">Numéro vente</label>
                                                    <input type="text" class="form-control" name="tb_venteposId" value="<?= ($displayedVentePOSId) ?>">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="tb_idaffectation" value="<?= $_SESSION['idaffectation'] ?>">
                                                    <input type="hidden" name="tb_use_date" value="<?= $_GET['use_date'] ?>">
                                                    <input type="hidden" name="tb_use_typerepas" value="<?= $_GET['use_typerepas'] ?>">
                                                    <input type="hidden" name="tb_use_identiteClient" value="<?= $_GET['use_identiteClient'] ?>">
                                                    <input class="btn btn-primary w-100 mt-4" type="submit" name="bt_valider_ventePOS" value="Valider">
                                                </td>
                                                <td>
                                                    <?php
                                                        if (isset($_GET['use_ventePOS'])) {
                                                            ?>  
                                                                <a style="font-size: 15px;" href='../views/service/distribution/pdf_facture.php?use_ventePOS=<?= $_GET['use_ventePOS']?>&use_identiteClient=<?= $_GET['use_identiteClient'] ?>' class="btn btn-info pull-left mt-4">Imprimer facture</a>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                            </fieldset>
            <?php
                }
            ?>

            <fieldset>

                <?php
                if ((isset($_GET['use_ventePOS'])) &&( (isset($_GET['use_date'])) && (($_GET['use_date'] != "") && ($_GET['use_typerepas'] != "0") && ($_GET['use_affectation'] != "")))) {
                ?>
                    <legend>
                        <p style="color: orange; font-weight: bold;"><?= "Date : " . $_GET['use_date'] . " / Type : " . $_GET['use_typerepas']. " / Identit. Client : " . $_GET['use_identiteClient'] ?></p>
                    </legend>

                    <form class="form-horizontal" method="POST" action="../contollers/distribution/distributionController.php">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td>
                                    <label id="selectProduct" class="control-label">Produit : </label>
                                    <select class="form-control select2" name="cb_livraison" id="selectItem_SaleStock_up">
                                        <option value="0">Choisir le produit : </option>
                                        <?php
                                        $bdlivraison = new BdLivraison();
                                        $livraisons = $bdlivraison->getLivraisonWithQuantitePositive();
                                        foreach ($livraisons as $livraison) {
                                            $livraison_etat = $livraison['lEtat'];
                                            if ($livraison_etat == 0 && $livraison['quantite_actuelle']>0) {
                                                if ($livraison['sId'] == $_SESSION['idservice']) {
                                        ?>
                                                    <option value="<?= $livraison['lId'] ?>"><?= $livraison['lDate'] . " " . $livraison['bDesignation']. " / code:  " . $livraison['codebarre'] . " / Categ: " . $livraison['gDesignation'] . " / quantité initiale : " . $livraison['lQuantite'] . " / quantité actuelle : " . $livraison['quantite_actuelle']. " / PU vente : " . $livraison['prixunitaire'] ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                
                                <td>
                                    <label class="control-label">Qté :</label>
                                    <input class="form-control" type="text" name="tb_quantite" placeholder="Quantité">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">PU vente :</label>
                                    <input class="form-control" type="text" name="tb_price" placeholder="Unit price (USD)" id="puSaleStock">
                                </td>
                                <td>
                                    <label class="control-label">Type :</label>
                                    <select class="form-control select2" name="cb_type">
                                        <option value="CASH" selected >CASH</option>
                                        <option value="CREDIT">CREDIT</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">% TVA :</label>
                                    <input class="form-control" type="text" name="tb_tva" placeholder="en %" value="0">
                                </td>
                                <td>
                                    <input type="hidden" name="tb_idaffectation" value="<?= $_SESSION['idaffectation'] ?>">
                                    <input type="hidden" name="tb_use_date" value="<?= $_GET['use_date'] ?>">
                                    <input type="hidden" name="tb_use_typerepas" value="<?= $_GET['use_typerepas'] ?>">
                                    <input type="hidden" name="tb_use_identiteClient" value="<?= $_GET['use_identiteClient'] ?>">
                                    <input type="hidden" name="tb_use_ventePOS" value="<?= $_GET['use_ventePOS'] ?>">
                                    <input class="btn btn-success mt-4" type="submit" name="bt_enregistrer" value="Enregister">
                                </td>
                            </tr>
                        </table>
                    </form>

                <?php
                }
                ?>

            </fieldset>
            
            <fieldset>

                <legend>

                </legend>
                <?php
                if ((isset($_GET['use_date'])) && (($_GET['use_date'] != "") && ($_GET['use_typerepas'] != "0") && ($_GET['use_affectation'] != ""))) {
                    include 'liste_distribution_hot.php';
                }
                ?>

            </fieldset>

        </div>

    </div>

</div>