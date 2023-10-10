<?php
    function renderMenuToHTML($currentPageId, $lang) {
        if($lang==="en"){
            $mymenu = array(
                'welcome' => array( 'Welcome' ),
                'cv' => array( 'Cv' ),
                'project' => array('My Projects'),
                'contact' => array('Contact')
                );

        }
        else{
            $mymenu = array(
                'accueil' => array( 'Accueil' ),
                'cv' => array( 'Cv' ),
                'projet' => array('Mes Projets'),
                'contact' => array('Contact')
                );

        }
        
        echo '<nav class="menu">
        <ul class="accueil">';
        foreach($mymenu as $pageId => $pageParameters) {
            foreach($pageParameters as $pageParameters => $pageLabel) {
                if ($pageId === $currentPageId) {
                    echo '<li><a class="active" href="index.php?page=' .$pageId. '&lang='.$lang. '" >' .$pageLabel. '</a></li>';
                } else {
                    echo '<li><a href="index.php?page=' .$pageId. '&lang='.$lang. '">' .$pageLabel. '</a></li>';
                }
                
                    
            }     
        }
        if($lang ==="fr"){
            echo '<li ><a class="british" href="index.php?page=welcome&lang=en">English</a></li>';
        }
        elseif($lang ==="en"){
            echo '<li ><a class="french" href="index.php?page=accueil&lang=fr">Français</a></li>';
        }
        echo '</ul>
        </nav>';
    }
?>