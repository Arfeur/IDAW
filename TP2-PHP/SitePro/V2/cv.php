<?php
    require_once('template_header.php');
?>
<body>
    <?php
        require_once('template_menu.php');
        renderMenuToHTML('cv');
    ?>
    <h1>Arthur CHEVASSUT</h1>
    <div class="center">Etudiant ingénieur à l'Ecole des Mines de Douai</div>
    <hr>
    <div class="main">

        <div class="left">
            
            <h1>Expériences Professionelles</h1>
        <p class="titreStage">Chef de projet SI</p>
        <p class="P1">Stage - 16 Semaines - MAI - AOUT 2023 - Paris</p>
        <ul>
            <li>Gestion d'un portefeuille client</li>
            <li>Création de plateforme web de type Saas</li>
            <li>Dautres trucs cool</li>
        </ul>
        
        <p class="titreStage">Responsable projet - Monnot Prod</p>
        <p class="P1">Stage - 12 Semaines - MAI - JUILLET 2022 - Beaune</p>
        <ul>
            <li>En charge du projet de certification initiale ISO9001</li>
            <li>Refonte du système de management de la qualité</li>
            <li>Audit et mise à jour des processus de l’entreprise</li>
    </ul>
    <p class="titreStage">Assistant Chef de production- TEB V&S</p>
    <p class="P1">Stage - 9 Semaines- FEVRIER - AVRIL 2021 - Corpeau</p>
    <ul>
        <li>Projet de mesure des temps de fabrication des produits</li>
        <li>Evaluation de la charge atelier via analyse de base de donnée</li>
        <li>Optimisation de la chaine de production et lean management</li>
    </ul>
</div>
<div class="right">
    <h1>Compétences</h1>
    <strong>Langues</strong>
    <ul>
        <li>Français - Langue maternelle</li>
        <li>Anglais - Courant (TOEIC 970/990)</li>
        <li>Espagnol  Notions</li>
    </ul>
    <strong>Informatique</strong>
    <ul>
        <li>Programmation: C++ / Python / SQL / Java / HTML / CSS</li>
        <li>Logiciel: JIRA / GitLab / REDMINE / Confluence / Salesforce / SX</li>
        <li>OFFICE: PowerPoint / Word / Excel: analyse de BDD / DashBoard / Pivot Table / KPIs automatiques / VBA</li>
        <li>UNIX: Shell / Virtual Machine</li>      
    </ul>    
</div>
</div>
<?php 
    require_once('template_footer.php');
    ?>