<?php $title = 'SUPER! Création de sites web et blog' ?>

<section class="connexion_container">
    <p class="error_message"><?php if (isset($messageErreur)){ echo $messageErreur; } ?></p>
    <form class="connexion_form" action="index.php?action=login" method="post"> 
        <input class="identifiant connex_form" type="text" name="identifiant" placeholder="Identifiant" id="identifiant"><br/>
        <input class="password connex_form" type="password" name="password" placeholder="Mot de passe" id="password"><br/>
        <input class="connexion connex_form" type="submit" name="connexion" placeholder="Connexion" id="connexion"><br/>
    </form>
</section>