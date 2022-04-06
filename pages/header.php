<header>
    <nav>
        <ul id="navbar">
            <li id="first"><a id="home" href="index.php"><span>HOME</span></a></li>
            <li><a id="legends" href="legends.php"><span>LEGENDS</span></a></li>
            <li><a id="maps" href="maps.php"><span>MAPS</span></a></li>
            
            <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            ?> 
            
            <li class='last'><a id='login' href='login.php'><span>LOGIN</span></a></li>
            
            <?php 
            }
            else
            {
            ?> 
            <li><a id='lfg' href='lfg.php'><span>LFG</span></a></li>
            <li class='last'><a id='profile' href='profile.php'><span>PROFILE</span></a></li>
            <?php
            }
            ?>
              
        </ul>
    </nav>
</header>
<script>
    switch (window.location.pathname) {
        case "/pages/legends.php":
            active('legends');
            break;
        case "/pages/maps.php":
            active('maps');
            break;
        case "/pages/lfg.php":
            active('lfg');
            break;
        case "/pages/login.php":
            active('login');
            break;
        case "/pages/profile.php":
            active('profile');
            break;
        default:
            active('home');
            break;
    }
    function active(id) {
        document.getElementById(id).classList.add('active');
    }
</script>