<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../models/livraison/livraison.php';
include '../models/demande/demande.php';
include '../models/unite/unite.php';
include '../models/service/service.php';
include '../models/preparation/preparation.php';
include '../models/ravitaillement/ravitaillement.php';
include '../models/biens/biens.php';
?>
<div class="panel">
    <div class="panel panel-heading">
        <span class="fa fa-cubes" style="color: red; font-size: 30px;margin-right: 5px;"></span>
        <span class="fa fa-share-alt" style="color: red; font-size: 30px;margin-right: 5px;"></span>
        <span class="h3">Livraison</span>
        <span class="glyphicon glyphicon-chevron-right" style="color: black; font-size: 30px;margin-right: 5px;"></span>
        <span class="fa fa-list-ol" style="color: darkgrey; font-size: 30px;margin-right: 5px;"></span>
        <span class="h4">List</span>
    </div>
    <?php
    if ((isset($_GET['reponse']) && ($_GET['reponse'] == sha1("succes_edited")))) {
    ?>
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok" style="font-size: 15px;margin-right: 5px;"></span><span>Success edited</span>
        </div>
    <?php
    }
    ?>
    <?php
    if ((isset($_GET['reponse']) && ($_GET['reponse'] == sha1("succes_deleted")))) {
    ?>
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok" style="font-size: 15px;margin-right: 5px;"></span><span>Success edited</span>
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
    <div class="panel panel-body">
        <div>
            <fieldset>
                <legend>Choose date :</legend>
                <form class="form-inline" method="POST" action="../contollers/livraison/livraisonController.php">
                    <div class="form-group-lg">
                        <input type="date" class="form-control" name="tb_date1" placeholder="First date">
                        <input type="date" class="form-control" name="tb_date2" placeholder="Second date">
                        <select class="form-control select2" name="cb_service">
                            <option value="0">Choisir un service</option>
                            <?php
                            $bdservice = new BdService();
                            $services = $bdservice->getServiceAllDesc();
                            foreach ($services as $service) {
                                if (1) {
                                    if (1) {
                            ?>
                                        <option value="<?= $service['id'] ?>"><?= $service['designation'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <select class="form-control select2" name="cb_biens">
                            <option value="0">Chopse item</option>
                            <?php
                            $bdbiens = new BdBiens();
                            $biens = $bdbiens->getBiensAll();
                            foreach ($biens as $bien) {
                                if (1) {
                                    if (1) {
                            ?>
                                        <option value="<?= $bien['bId'] ?>"><?= $bien['bDesignation'] . " / " . $bien['gDesignation'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <select class="form-control select2" name="cb_typerepas">
                            <option value="0">Choose activity</option>
                            <option value="Input">Input</option>
                            <option value="Diesel">Diesel and Fuel</option>
                            <option value="Lubricant">Lubricant</option>
                            <option value="Fleet">Fleet Maintenance</option>
                            <option value="Plant">Plant Maintenance</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="non-consomable">Non-consomable</option>
                            <option value="Office and kitchen equipment">Office and kitchen equipment</option>
                            <option value="Bar">Bar</option>
                            <option value="Spoilage">Spoilage</option>
                            <option value="Transfer">Transfer to</option>
                            <option value="Staff meal">Staff meal</option>
                            <option value="Back to supplier">Back to supplier</option>
                            <option value="Back charge to client">Back charge to client</option>
                            <option value="Fonction">Fonction</option>
                            <option value="PRO">PRO</option>
                        </select>
                        <button type="submit" class="btn btn-success" name="bt_search_by_date_by_service"><span class="glyphicon glyphicon-search" style="color: white; font-size: 30px;margin-right: 5px;"></span></button>
                    </div>
                </form>
            </fieldset>
            <fieldset>
                <legend style="color: #c9302c; font-size: 20px;">
                    <?php
                    if ((isset($_GET['use_date1'])) && (isset($_GET['use_date2']))) {
                    ?>
                        <?= "Date 1 : " . $_GET['use_date1'] . " " . " / Date 2 :" . $_GET['use_date2'] ?>
                    <?php
                    } else {
                    ?>
                        <p style="color: orange;">Choose interval</p>
                        <?php
                    }
                    if (isset($_GET['use_service'])) {
                        $bdservice = new BdService();
                        $services = $bdservice->getServiceById($_GET['use_service']);
                        foreach ($services as $service) {
                            $designation_service_choosen = $service['designation'];
                        }
                        if (isset($designation_service_choosen)) {
                        ?>
                            <span> | Refectoire : <?= $designation_service_choosen ?> </span>
                        <?php
                        } else {
                        ?>
                            <span> | Refectoire : - </span>
                        <?php
                        }
                    }
                    if (isset($_GET['use_biens'])) {
                        $bdbiens = new BdBiens();
                        $biens = $bdbiens->getBiensById($_GET['use_biens']);
                        foreach ($biens as $bien) {
                            $designation_biens_choosen = $bien['bDesignation'] . " / " . $bien['gDesignation'];
                        }
                        if (isset($designation_biens_choosen)) {
                        ?>
                            <span> | Item : <?= $designation_biens_choosen ?> </span>
                        <?php
                        } else {
                        ?>
                            <span> | Item : - </span>
                        <?php
                        }
                    }
                    if (isset($_GET['use_typerepas'])) {
                        ?>
                        <span> | Activity : <?= $_GET['use_typerepas'] ?> </span>
                    <?php
                    } else {
                    ?>
                        <span> | Activity : All </span>
                    <?php
                    }
                    ?>
                </legend>
            </fieldset>
            <fieldset>

                <legend>

                </legend>
            </fieldset>
            <br>
            <fieldset>
                <?php
                if ((isset($_GET['use_date1']))) {
                ?>
                    <a style="font-size: 20px;" href='../views/logistique/livraison/pdf_livraison_open.php?use_date1=<?= $_GET['use_date1'] . '&use_date2=' . $_GET['use_date2'] . '&use_biens=' . $_GET['use_biens'] . '&use_service=' . $_GET['use_service'] . '&use_typerepas=' . $_GET['use_typerepas'] ?>' class="btn btn-primary pull-left">Print in PDF</a>
                <?php
                }
                ?>
            </fieldset>
            <br>
            <fieldset>
                <legend>Sales</legend>
                <table class="table table-bordered table-responsive-lg">
                    <thead>
                        <th>
                            #
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Requisition
                        </th>
                        <th>
                            Activity
                        </th>
                        <th>
                            Qty
                        </th>
                        <th>
                            Unit price
                        </th>
                        <th>
                            Cost
                        </th>
                        <th>
                            Resp.
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        $bdlivraison = new BdLivraison();
                        if ((isset($_GET['use_typerepas'])) && ($_GET['use_typerepas'] != "0")) {
                            if ((isset($_GET['use_biens'])) && ($_GET['use_biens'] != 0)) {
                                if ((isset($_GET['use_date1']))) {
                                    if ((isset($_GET['use_service'])) && ($_GET['use_service'] != 0)) {
                                        $livraisons = $bdlivraison->getLivraisonDescByIdServiceBetween2DatesByTyperepasByIdBiens($_GET['use_service'], $_GET['use_date1'], $_GET['use_date2'], $_GET['use_typerepas'], $_GET['use_biens']);
                                    } else {
                                        $livraisons = $bdlivraison->getLivraisonAllBetween2DatesByTyperepasByIdBiens($_GET['use_date1'], $_GET['use_date2'], $_GET['use_typerepas'], $_GET['use_biens']);
                                    }
                                } else {
                                    $livraisons = $bdlivraison->getLivraisonById(0);
                                }
                            } else {
                                if ((isset($_GET['use_date1']))) {
                                    if ((isset($_GET['use_service'])) && ($_GET['use_service'] != 0)) {
                                        $livraisons = $bdlivraison->getLivraisonDescByIdServiceBetween2DatesByTyperepas($_GET['use_service'], $_GET['use_date1'], $_GET['use_date2'], $_GET['use_typerepas']);
                                    } else {
                                        $livraisons = $bdlivraison->getLivraisonAllBetween2DatesByTyperepas($_GET['use_date1'], $_GET['use_date2'], $_GET['use_typerepas']);
                                    }
                                } else {
                                    $livraisons = $bdlivraison->getLivraisonById(0);
                                }
                            }
                        } else {
                            if ((isset($_GET['use_biens'])) && ($_GET['use_biens'] != 0)) {
                                if ((isset($_GET['use_date1']))) {
                                    if ((isset($_GET['use_service'])) && ($_GET['use_service'] != 0)) {
                                        $livraisons = $bdlivraison->getLivraisonDescByIdServiceBetween2DatesByIdBiens($_GET['use_service'], $_GET['use_date1'], $_GET['use_date2'], $_GET['use_biens']);
                                    } else {
                                        $livraisons = $bdlivraison->getLivraisonAllBetween2DatesByIdBiens($_GET['use_date1'], $_GET['use_date2'], $_GET['use_biens']);
                                    }
                                } else {
                                    $livraisons = $bdlivraison->getLivraisonById(0);
                                }
                            } else {
                                if ((isset($_GET['use_date1']))) {
                                    if ((isset($_GET['use_service'])) && ($_GET['use_service'] != 0)) {
                                        $livraisons = $bdlivraison->getLivraisonDescByIdServiceBetween2Dates($_GET['use_service'], $_GET['use_date1'], $_GET['use_date2']);
                                    } else {
                                        $livraisons = $bdlivraison->getLivraisonAllBetween2Dates($_GET['use_date1'], $_GET['use_date2']);
                                    }
                                } else {
                                    $livraisons = $bdlivraison->getLivraisonById(0);
                                }
                            }
                        }


                        if ((isset($_GET['use_typerepas'])) && ($_GET['use_typerepas'] != "0")) {
                            $list_type_repas = [$_GET['use_typerepas']];
                        } else {
                            $list_type_repas = ['Input', 'Diesel', 'Lubricant', 'Fleet', 'Plant', 'cleaning', 'non-consomable', 'Office and kitchen equipment', 'Bar', 'Spoilage', 'Transfer', 'Staff meal', 'Back to supplier', 'Back charge to client', 'Fonction', 'PRO'];
                        }

                        $cumul_total_value = 0;
                        foreach ($list_type_repas as $type_repas) {
                        ?>
                            <tr style="background-color: whitesmoke;">
                                <td style="color: forestgreen; font-size: 25px; font-weight: bold;"><?= $type_repas ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            $cumul_value_typerepas = 0;
                            $cumul_total = 0;
                            foreach ($livraisons as $livraison) {
                                $value_sale = 0;
                                $cumul_prix = 0;
                                $bdpreparation = new BdPreparation();
                                $preparations = $bdpreparation->getPreparationById($livraison['preparation_id']);
                                foreach ($preparations as $preparation) {
                                    $type_repas_livraison = $preparation['typerepas'];
                                }
                                if ($type_repas_livraison == $type_repas) {
                                    $chaine_part_ravitaillement = "";
                                    $n++;
                            ?>
                                    <tr>
                                        <td><?= $livraison['lId'] ?></td>
                                        <td>
                                            <form class="form-horizontal" method="post" action="../contollers/livraison/livraisonController.php">
                                                <input type="hidden" name="tb_typerepas" value="<?= $_GET['use_typerepas'] ?>">
                                                <input type="hidden" name="tb_date1" value="<?= $_GET['use_date1'] ?>">
                                                <input type="hidden" name="tb_date2" value="<?= $_GET['use_date2'] ?>">
                                                <input type="hidden" name="tb_idbiens" value="<?= $_GET['use_biens'] ?>">
                                                <input type="hidden" name="tb_idservice" value="<?= $_GET['use_service'] ?>">
                                                <input type="hidden" name="tb_idlivraison" value="<?= $livraison['lId'] ?>">
                                                <table>
                                                    <tr>
                                                        <td><input type="date" class="form-control" name="tb_newdate" value="<?= $livraison['lDate'] ?>"></td>
                                                        <td><button style="margin-left: 5px;" type="submit" class="btn btn-primary" name="bt_update_date"><span class="fa fa-pencil"></span></button></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </td>
                                        <td><?= $livraison['dId'] ?> . <?= $livraison['date'] . " / " . $livraison['bDesignation'] . " / " . $livraison['gDesignation'] . " pour " . $livraison['nom'] . " " . $livraison['postnom'] . " " . $livraison['prenom'] . " : " . $livraison['sDesignation'] . " / quantité : " . $livraison['dQuantite'] ?></td>
                                        <td style="color: green;font-weight: bold;">
                                            <?php
                                            $bdpreparation = new BdPreparation();
                                            $preparations = $bdpreparation->getPreparationById($livraison['preparation_id']);
                                            foreach ($preparations as $preparation) {
                                                echo $preparation['typerepas'] . " / " . $preparation['dateHeure'];
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            //                                      $chaine_part_ravitaillement;
                                            $somme_prix_biens = 0;
                                            $s = 0;
                                            $bdravitaillement = new BdRavitaillement();
                                            $ravitaillements = $bdravitaillement->getRavitaillementByIdBiens($livraison['bId']);
                                            foreach ($ravitaillements as $ravitaillement) {
                                                $s++;
                                                $somme_prix_biens = $somme_prix_biens + $ravitaillement['prix'];
                                            }
                                            $average_price = ($somme_prix_biens / $s);

                                            $value_sale = ($livraison['lQuantite'] * $average_price);

                                            $cumul_quantite_liv = 0;
                                            $cumul_quantite_rav = 0;

                                            $born_quant1=0;
                                            $born_quant2=0;

                                            $livraisons_second = $bdlivraison->getLivraisonAllAscByIdBiensInferieurEgaleDate1($livraison['bId'], $livraison['lDate']);
                                            foreach ($livraisons_second as $livraison_second) {
                                                if ($livraison['lId']==$livraison_second['lId']) {
                                                    $born_quant1=$cumul_quantite_liv;
                                                    $born_quant2=$cumul_quantite_liv + $livraison_second['lQuantite'];
                                                }
                                                $cumul_quantite_liv = $cumul_quantite_liv + $livraison_second['lQuantite'];
                                            }


                                            $rav_id_array = [];
                                            $my_rav = 0;
                                            $my_cumul_rav = 0;
                                            $ravitaillements = $bdravitaillement->getRavitaillementByIdBiens($livraison['bId']);


                                            $last_rav = "";
                                            $k = 0;
                                            foreach ($ravitaillements as $ravitaillement) {
                                                $k++;
                                                $cumul_quantite_rav = $cumul_quantite_rav + $ravitaillement['quantite'];
                                                if ($cumul_quantite_rav)
                                                if ($cumul_quantite_liv <= $cumul_quantite_rav) {
                                                    if ($my_cumul_rav == 0) {
                                                        $my_rav = $ravitaillement['id'];
                                                        $my_cumul_rav = $cumul_quantite_rav;
                                                    }

                                                    // $my_rav_pos = $k;
                                                    // $my_cumul_rav_prec = $cumul_quantite_rav;
                                                }
                                                // } else {

                                                //     $my_rav = $ravitaillement['id'];
                                                //     $my_cumul_rav = $cumul_quantite_rav;
                                                // }
                                                $last_rav = $ravitaillement['id'];
                                            }

                                            //

                                            // $my_rav=$ravitaillements[$my_rav_pos+1]['id'];
                                            // $my_cumul_rav = $my_cumul_rav_prec+$ravitaillements[$my_rav_pos+1]['quantite'];

                                            //



                                            $ecartLS = $my_cumul_rav - $cumul_quantite_liv;
                                            $cumul_interv_inf = 0;
                                            $ravitaillements = $bdravitaillement->getRavitaillementByIdBiensInferieurRavId($livraison['bId'], $my_rav);
                                            foreach ($ravitaillements as $ravitaillement) {
                                                $cumul_interv_inf = $cumul_interv_inf + ($ravitaillement['prix'] * $ravitaillement['quantite']);
                                                echo $ravitaillement['quantite'] . " at " . $ravitaillement['prix'] . "USD : " .  ($ravitaillement['quantite'] * $ravitaillement['prix']) . " USD";
                                            }

                                            $reste_interv = 0;
                                            $cumul_interv_reste = 0;
                                            $reste_interv_quant = 0;
                                            $ravitaillements = $bdravitaillement->getRavitaillementById($my_rav);
                                            foreach ($ravitaillements as $ravitaillement) {
                                                $reste_interv_quant = ($ravitaillement['quantite']) - $ecartLS;
                                                $cumul_interv_reste = $cumul_interv_reste + ($reste_interv_quant * $ravitaillement['prix']);
                                                echo $reste_interv_quant . " at " . $ravitaillement['prix'] . "USD : " . ($reste_interv_quant * $ravitaillement['prix']) . " USD";
                                            }

                                            ?>



                                        </td>

                                        <td><?= $livraison['lQuantite'] ?></td>
                                        <td><?= $average_price ?> USD </td>
                                        <td style="font-weight: bold; color: dodgerblue;"><?= ($livraison['lQuantite'] * $average_price) . " USD " ?></td>
                                        <td><?= $livraison['lNom'] . " " . $livraison['lPostnom'] . " " . $livraison['lPrenom'] ?></td>
                                        <td>
                                            <form method="post" action="../contollers/recuperation_logistique/recuperationController.php">
                                                <input type="hidden" name="tb_typerepas" value="<?= $_GET['use_typerepas'] ?>">
                                                <input type="hidden" name="tb_date1" value="<?= $_GET['use_date1'] ?>">
                                                <input type="hidden" name="tb_date2" value="<?= $_GET['use_date2'] ?>">
                                                <input type="hidden" name="tb_idbiens" value="<?= $_GET['use_biens'] ?>">
                                                <input type="hidden" name="tb_idservice" value="<?= $_GET['use_service'] ?>">
                                                <input type="hidden" name="tb_idlivraison" value="<?= $livraison['lId'] ?>">
                                                <button type="submit" class="btn btn-primary" name="bt_recuperer"><span class="fa fa-recycle" style="font-size: 25px;margin-right: 5px;"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                    $cumul_value_typerepas = $cumul_value_typerepas + $value_sale;
                                }
                            }
                            $cumul_total_value = $cumul_total_value + $cumul_value_typerepas;
                            ?>
                            <tr style="background-color: whitesmoke;">
                                <td style="color: dodgerblue; font-weight: bold;"><?= "Cost activity : " . $cumul_value_typerepas . " USD" ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php
                        }
                        $cumul_total = 0;
                        ?>
                    </tbody>
                    <tfoot>
                        <td style="font-size: 20px;">
                            <span>Nber:</span><span><?= $n ?></span>
                        </td>
                        <td style="font-size: 20px; font-weight: bold; color: red;">
                            <span>Grand total : </span><span><?= $cumul_total_value . " USD" ?></span>
                        </td>
                    </tfoot>
                </table>
            </fieldset>
        </div>
    </div>
</div>