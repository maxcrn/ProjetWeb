<html>
<head> 
    <link rel="stylesheet" type="text/css" href="/view/bracket32.css">
</head>
<body>

<main id="tournament">

    <?php 
        $afficherUl = 0;
        $nomEquipe1 = "";
        $nomEquipe2 = "";
        foreach($matchsTournoi as $matchTournoi){
            if($matchTournoi['tourPartie'] == 16){
                if($afficherUl == 0){
                    echo '<ul class="round round-0">';
                    echo '<li class="spacer">&nbsp;</li>';
                    $afficherUl = 1;
                }
                foreach($equipesTournoi as $equipeTournoi){
                    if($matchTournoi['idEquipe1'] == $equipeTournoi['idEquipe']){
                        $nomEquipe1=$equipeTournoi['nomEquipe'];
                    }
                    else if($matchTournoi['idEquipe2'] == $equipeTournoi['idEquipe']){
                        $nomEquipe2=$equipeTournoi['nomEquipe'];
                    }
                    if($nomEquipe1 != "" and $nomEquipe2 != ""){
                        if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe1']){
                            echo '<li class="game game-top winner">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom ">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";
                        }
                        else if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe2']){
                            echo '<li class="game game-top winner">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom winner">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";  
                        }
                    }
                }
            }
        } ?>
    </ul>

    <?php 
        $afficherUl = 0;
        $nomEquipe1 = "";
        $nomEquipe2 = "";
        foreach($matchsTournoi as $matchTournoi){
            if($matchTournoi['tourPartie'] == 8){
                if($afficherUl == 0){
                    echo '<ul class="round round-1">';
                    echo '<li class="spacer">&nbsp;</li>';
                    $afficherUl = 1;
                }
                foreach($equipesTournoi as $equipeTournoi){
                    if($matchTournoi['idEquipe1'] == $equipeTournoi['idEquipe']){
                        $nomEquipe1=$equipeTournoi['nomEquipe'];
                    }
                    else if($matchTournoi['idEquipe2'] == $equipeTournoi['idEquipe']){
                        $nomEquipe2=$equipeTournoi['nomEquipe'];
                    }
                    if($nomEquipe1 != "" and $nomEquipe2 != ""){
                        if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe1']){
                            echo '<li class="game game-top winner">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom ">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";
                        }
                        else if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe2']){
                            echo '<li class="game game-top ">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom winner">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";  
                        }
                    }
                }
            }
        } ?>
    </ul>

    <?php 
        $afficherUl = 0;
        $nomEquipe1 = "";
        $nomEquipe2 = "";
        foreach($matchsTournoi as $matchTournoi){
            if($matchTournoi['tourPartie'] == 4){
                if($afficherUl == 0){
                    echo '<ul class="round round-2">';
                    echo '<li class="spacer">&nbsp;</li>';
                    $afficherUl = 1;
                }
                foreach($equipesTournoi as $equipeTournoi){
                    if($matchTournoi['idEquipe1'] == $equipeTournoi['idEquipe']){
                        $nomEquipe1=$equipeTournoi['nomEquipe'];
                    }
                    else if($matchTournoi['idEquipe2'] == $equipeTournoi['idEquipe']){
                        $nomEquipe2=$equipeTournoi['nomEquipe'];
                    }
                    if($nomEquipe1 != "" and $nomEquipe2 != ""){
                        if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe1']){
                            echo '<li class="game game-top winner">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom ">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";
                        }
                        else if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe2']){
                            echo ' <li class="game game-top ">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom winner">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";  
                        }
                    }
                }
            }
        } ?>   
    </ul>

    <?php 
        $afficherUl = 0;
        $nomEquipe1 = "";
        $nomEquipe2 = "";
        foreach($matchsTournoi as $matchTournoi){
            if($matchTournoi['tourPartie'] == 2){
                if($afficherUl == 0){
                    echo '<ul class="round round-3">';
                    echo '<li class="spacer">&nbsp;</li>';
                    $afficherUl = 1;
                }
                foreach($equipesTournoi as $equipeTournoi){
                    if($matchTournoi['idEquipe1'] == $equipeTournoi['idEquipe']){
                        $nomEquipe1=$equipeTournoi['nomEquipe'];
                    }
                    else if($matchTournoi['idEquipe2'] == $equipeTournoi['idEquipe']){
                        $nomEquipe2=$equipeTournoi['nomEquipe'];
                    }
                    if($nomEquipe1 != "" and $nomEquipe2 != ""){
                        if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe1']){
                            echo '<li class="game game-top winner">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom ">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";
                        }
                        else if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe2']){
                            echo '<li class="game game-top ">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom winner">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";  
                        }
                    }
                }
            }
        } ?>
    </ul>

    <?php 
        $afficherUl = 0;
        $nomEquipe1 = "";
        $nomEquipe2 = "";
        foreach($matchsTournoi as $matchTournoi){
            if($matchTournoi['tourPartie'] == 1){
                if($afficherUl == 0){
                    echo '<ul class="round round-4">';
                    echo '<li class="spacer">&nbsp;</li>';
                    $afficherUl = 1;
                }
                foreach($equipesTournoi as $equipeTournoi){
                    if($matchTournoi['idEquipe1'] == $equipeTournoi['idEquipe']){
                        $nomEquipe1=$equipeTournoi['nomEquipe'];
                    }
                    else if($matchTournoi['idEquipe2'] == $equipeTournoi['idEquipe']){
                        $nomEquipe2=$equipeTournoi['nomEquipe'];
                    }
                    if($nomEquipe1 != "" and $nomEquipe2 != ""){
                        if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe1']){
                            echo '<li class="game game-top winner">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom ">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";
                        }
                        else if($matchTournoi['idGagnantPartie'] == $matchTournoi['idEquipe2']){
                            echo '<li class="game game-top ">' . $nomEquipe1 . ' <span> ' . $matchTournoi['scoreEquipe1'] . '</span></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom winner">' . $nomEquipe2 . '<span> ' . $matchTournoi['scoreEquipe2'] . '</span></li>

                            <li class="spacer">&nbsp;</li>';
                            $nomEquipe1 = "";
                            $nomEquipe2 = "";  
                        }
                    }
                }
            }
        } ?>
    </ul>       
</main>
</body>
</html>

