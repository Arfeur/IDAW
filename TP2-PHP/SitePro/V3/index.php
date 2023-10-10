<?php
    require_once("template_header.php");
    require_once("template_menu.php");
    $currentLang = 'fr';
    $currentPageId = 'accueil';
    if(isset($_GET['lang'])){
        $currentLang = $_GET['lang'];
        if($currentLang === "en"){
            $currentPageId = 'welcome';
        }
    }
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
?>
<header class="bandeau_haut">
    <h1 class="titre">Arthur Chevassut</h1>
</header>
<?php
    renderMenuToHTML($currentPageId, $currentLang);
?>
    <section class="corps">
<?php
    if($currentLang === "en"){
        $pageToInclude = $currentPageId. ".php";
        if(is_readable("./en/{$pageToInclude}"))
            require_once("./en/{$pageToInclude}");
        else
            require_once("error.php");
    }
    else{
        $pageToInclude = $currentPageId . ".php";
        if(is_readable("./fr/{$pageToInclude}"))
            require_once("./fr/{$pageToInclude}");
        else
            require_once("error.php");
    }

?>
</section>
<?php
if($currentLang ==="en"){
    require_once("./en/template_footer_en.php");
}
else{
    require_once("./fr/template_footer_fr.php");
}

?>

