<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
include './meta/menu_service.php';
?>
<div class="row" style="padding: 10px;">
    <div class="col-md-12" style="background-color: whitesmoke;border-radius: 5px; height: 90vh;">
        <div class="container-fluid">
            <div class="row">

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
                <div class="col-lg-12" style="padding: 10px;height: 80vh;overflow: auto;">
                    <fieldset>
                        <legend></legend>
                        <table>
                            <tr>
                                <td><a class="btn btn-warning text-white" style="font-size: 30px; padding: 50px; margin-right: 90px; margin-left: 180px;" href="/views/home.php?link_up=<?= sha1('home_service_production'); ?>"><span style="font-size: 70px; margin: 20px;" class="fa fa-cube"></span>Production</a></td>
                                <td><a class="btn btn-success text-white" style="font-size: 30px; padding: 50px; margin-right: 90px;" href="/views/home.php?link_up=<?= sha1('home_service_nourriture'); ?>"><span style="font-size: 70px; margin: 20px;" class="fa fa-list-alt"></span>Produit</a></td>
                            </tr>
                        </table>
                    </fieldset>
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

