<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
include './meta/menu_admin.php';
?>
<div class="row" style="padding: 10px;">
    <div class="col-md-12" style="background-color: whitesmoke;border-radius: 5px; height: 90vh;">
        <div class="container-fluid">
            <div class="row">
                <div id="menu-gauche" class="col-lg-3">
                    <ul class="list-menu list-unstyled" style="font-size: 20px;">
                        <li class="list-inline-item"><span style="color: red;font-size: 20px;" class="glyphicon glyphicon-asterisk"></span><a href="/views/home.php?link=<?= sha1("admin_affectation_service_add")?>&link_up=<?= sha1("home_admin_affectation_service")?>">Nouvelle affectation</a></li>
                        <li class="list-inline-item"><span style="color: forestgreen;font-size: 20px;" class="glyphicon glyphicon-adjust"></span><a href="/views/home.php?link=<?= sha1("admin_affectation_service_update_affectation_service_all")?>&link_up=<?= sha1("home_admin_affectation_service")?>">Mise à jour</a></li>
                        <li class="list-inline-item"><span style="color: darkslategrey;font-size: 20px;" class="glyphicon glyphicon-check"></span><a href="/views/home.php?link=<?= sha1("admin_affectation_service_active_affectation_service_all")?>&link_up=<?= sha1("home_admin_affectation_service")?>">Activation des affectations</a></li>
                        <li class="list-inline-item"><span style="color: orange;font-size: 20px;" class="glyphicon glyphicon-list"></span><a href="/views/home.php?link=<?= sha1("admin_affectation_service_liste_affectation_service_all")?>&link_up=<?= sha1("home_admin_affectation_service")?>">Liste des affectations</a></li>
                        <li class="list-inline-item"><span style="color: tomato;font-size: 20px;" class="glyphicon glyphicon-edit"></span><a href="/views/home.php?link=<?= sha1("admin_affectation_service_fiche_affectation_service_all")?>&link_up=<?= sha1("home_admin_affectation_service")?>">Fiche d'affectation par service</a></li>
                    </ul>
                </div>
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
                </style>
                <div class="col-lg-9" style="padding: 10px;height: 80vh;overflow: auto;">
                    <?php
                    if (isset($_GET['link'])) {
                        if ($_GET['link']== sha1("admin_affectation_service_add")) {
                            include 'administrator/affectation-Service/add_affectation_service.php';
                        } else if ($_GET['link']== sha1("admin_affectation_service_liste_affectation_service_all")) {
                            include 'administrator/affectation-Service/liste_affectation_service_all.php';
                        } else if ($_GET['link']== sha1("admin_affectation_service_update_affectation_service_all")) {
                            include 'administrator/affectation-Service/update_affectation_service_all.php';
                        } else if ($_GET['link']== sha1("admin_affectation_service_active_affectation_service_all")) {
                            include 'administrator/affectation-Service/active_affectation_service_all.php';
                        } else if ($_GET['link']== sha1("admin_affectation_service_fiche_affectation_service_all")) {
                            include 'administrator/affectation-Service/fiche_affectation_service_all.php';
                        }  else if ($_GET['link']== sha1("admin_affectation_service_fiche_affectation_service_self")) {
                            include 'administrator/affectation-Service/fiche_affectation_service_self.php';
                        }
                    } else {
                        include 'administrator/affectation-Service/add_affectation_service.php';
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <style>
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
</div>

