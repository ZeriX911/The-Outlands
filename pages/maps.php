<?php

session_start();
     
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outlands</title>

    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleMaps.css">
    <link rel="icon" href="../img/apex.ico">
    <script src="../scripts/maps.js"></script>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>

            <main>
                <section id="br-section">
                    <div id="br-title" class="title">
                        <h1>Battle Royale</h1>
                    </div>

                    <div id="br-content" class="content br-KK">

                        <div id="br-menu" class="menu">
                            <ul class="menu-chooser">
                                <li class="activeIcon" id="KK" onclick="clickedBR(this)"><span>Kings Canyon</span></li>
                                <li id="WO" onclick="clickedBR(this)"><span>World's Edge</span></li>
                                <li id="OL" onclick="clickedBR(this)"><span>Olympus</span></li>
                                <li id="SP" onclick="clickedBR(this)"><span>Storm Point</span></li>
                            </ul>
                        </div>
                        <div>

                        </div>
                        <div>

                        </div>
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>

                </section>
                <section id="ar-section">
                    <div id="ar-title" class="title">
                        <h1>Arenas</h1>
                    </div>

                    <div id="ar-content" class="content ar-PC">
                        <div id="ar-menu" class="menu">
                            <ul class="menu-chooser">
                                <li class="activeIcon" id="PC" onclick="clickedAR(this)"><span>Party Crasher</span></li>
                                <li id="PR" onclick="clickedAR(this)"><span>Phase Runner</span></li>
                                <li id="OF" onclick="clickedAR(this)"><span>Overflow</span></li>
                                <li id="EN" onclick="clickedAR(this)"><span>Encore</span></li>
                                <li id="H4" onclick="clickedAR(this)"><span>Habitat 4</span></li>
                            </ul>
                        </div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                </section>
                <section id="spec-section">
                    <div id="spec-title" class="title">
                        <h1>Specials</h1>
                    </div>

                    <div id="spec-content" class="content sp-FR">
                        <div id="spec-menu" class="menu">
                            <ul class="menu-chooser">
                                <li class="activeIcon" id="FR" onclick="clickedSPEC(this)"><span>The Firing Range</span></li>
                                <li id="KC" onclick="clickedSPEC(this)"><span>Kings Canyon After Dark</span></li>
                                <li id="WE" onclick="clickedSPEC(this)"><span>Winter Express</span></li>
                            </ul>
                        </div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                </section>
            </main>



            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>