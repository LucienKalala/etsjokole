<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include './views/meta/metatop.php';
        if(isset($_SESSION['idutilisateur'])){
            if ($_SESSION['idutilisateur'] != '') {
                header('Location: contollers/login/loginController.php');
            }
        }
        ?>
        <title>
            Ets JOKOLE DIEU EST GRAND
        </title>
    </head>
    <!-- <body style="background-color: #000e1f;" id="index"> -->
    <body style="background-color: #000e1f;">
        <section id="principalcover">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <?php
                                    if ((isset($_GET['reponse'])) && ($_GET['reponse'] == sha1("nomutilisateur_error"))) {
                                        ?>
                                        <div class="alert alert-danger">
                                            <span class="fa fa-user-times" style="color: darkred;font-size: 20px;"></span>
                                            <span class="h6" style="color: darkred">Nom d'utilisateur ou mot de passe incorrects</span>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <?php
                                if ((isset($_GET['reponse'])) && ($_GET['reponse'] == sha1("motdepasse_error"))) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <span class="fa fa-won" style="color: darkred;font-size: 20px;"></span>
                                        <span class="h6" style="color: darkred">Mot de passe incorrect</span>
                                    </div>
                                <?php
                                    }
                                
                                    if ((isset($_GET['reponse'])) && ($_GET['reponse'] == sha1("remplissage_error"))) {
                                ?>
                                    <div class="alert alert-warning">
                                        <span class="fa fa-pencil-square-o" style="color: darkred;font-size: 20px;"></span>
                                        <span class="h6" style="color: darkred">Erreur de remplissage, Recommencer SVP</span>
                                    </div>
                                <?php
                                    }
                                
                                    if ((isset($_GET['reponse'])) && ($_GET['reponse'] == sha1("logout"))) {
                                ?>
                                    <div class="alert alert-success">
                                        <span class="fa fa-plug" style="color: forestgreen;font-size: 20px;"></span>
                                        <span class="h6" style="color: forestgreen">Vous êtes deconnecté</span>
                                    </div>
                                <?php
                                    }
                                
                                    if ((isset($_GET['reponse'])) && ($_GET['reponse'] == sha1("activation_error"))) {
                                ?>
                                    <div class="alert alert-info">
                                        <span class="fa fa-lock" style="color: #0069d9;font-size: 20px;"></span>
                                        <span class="h6" style="color: #0069d9">Ce compte est désactivé, Contactez l'administrateur du système</span>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-center mt-3 text-white h1 fw-bolder">Ets JOKOLE</h1>
                                <p class="text-center text-white h3 fw-bolder">Dieu est GRAND.</p>
                            </div>
                            <div class="col-12">
                                <h4 class="text-center mt-1 text-white fw-bolder h1">Connexion</h4>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <form class="" method="POST" action="contollers/login/loginController.php">
                                            <div class="form-group">
                                                <input style="margin-top: 10vh" type="text" class="form-control form-control-lg w-100" name="tb_nomutilisateur" placeholder="Nom d'utilisteur">
                                                <input style="margin-top: 5vh" type="password" class="form-control form-control-lg w-100" name="tb_motdepasse" placeholder="Mot de passe">
                                                <input style="margin-top: 5vh" type="submit" class="btn btn-success btn-lg w-100" name="bt_connexion" value="Valider">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div id="carouselExampleControls" class="carousel slide d-flex justify-content-center" data-bs-ride="carousel">
                            <div class="mt-4">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2" class="bg-dark" aria-label="Slide 3"></button>
                                </div>
                            </div>
                            <div class="row carousel-inner  bg-white opacity-75">
                                <div class="carousel-item active p-4">
                                    <div class="row d-flex justify-content-center">
                                        
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="text-start text-success"> <i class="fa fa-question-circle fs-1"></i> A PROPOS NOUS</h4>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="media/pictures-system/rice.avif" class="img-responsive" width="100" alt="">
                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-start">Nous sommes un établissement de vente et de transport des fournitures et produits de première nécessité, nous effectuons la vente et la distribution des produits tels que le sucre, le riz, la farine de blé, le savon en poudre, les bidons l'huile et bien des nombreux autres produits divers.</p>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <img src="media/pictures-system/truck2.jpg" class="img-responsive" width="150" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item p-4">
                                    <div class="row d-flex justify-content-center">
                                        <h4 class="text-start text-success text-start"> <i class="fa fa-handshake-o fs-1"></i> SERVICES</h4>
                                        <div class="col-md-12 text-justify">
                                            <ul class="list-inline-item">
                                                <li> 
                                                    <h5>PRODUIT ALIMENTAIRE</h5> 
                                                    <ul>
                                                        <li>Vente du Riz</li>
                                                        <li> Vente du Farine de blué</li>
                                                        <li> Vente des Bidons Huiles </li>
                                                    </ul>
                                                </li>
                                                <li> 
                                                    <h5>PRODUIT DIVERS</h5> 
                                                    <ul>
                                                        <li>Vente Biscuits</li>
                                                        <li> Vente Bombon</li>
                                                        <li> Vente Jus</li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h5>PRODUIT DE CONSTRUCTION</h5> 
                                                    <ul>
                                                        <li>Vente du Ciment</li>
                                                    </ul> 
                                                </li>
                                                <li> Transport des marchandises</li>
                                                <li> Transport des materiaux de construction</li>
                                                <li> Achat des biens pour nos clients</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item p-4">
                                    <h4 class="text-start text-success text-center"> <i class="fa fa-home fs-1"></i> ADDRESSES</h4>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <ul class="list-unstyled">
                                                <li> <i class="fa fa-map-marker"></i> RDC / SUD-Kivu / Kamanyola </li>
                                                <li> <i class="fa fa-map-marker"></i> RDC / SUD-Kivu / Bukavu </li>
                                                <li> <i class="fa fa-map-marker"></i> RDC / SUD-Kivu / Uvira </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <h3 class="text-success text-center"><i class="fa fa-phone-square fs-1"></i> CONCTATS</h3>
                                            <ul class="list-unstyled text-center">
                                                <li><i class="fa fa-phone"> <a href="tel:+243972090805" class="text-decoration-none text-black">+243 972 090 805</a></i></li>
                                                <li><i class="fa fa-envelope-o"> <a href="mailto:contact@etsjokole.com" class="text-decoration-none text-black">contact@etsjokole.com</a></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <?php
    include './views/meta/metabottom.php';
    ?>
</html>



