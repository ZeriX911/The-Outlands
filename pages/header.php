<header>
    <nav>
        <ul id="navbar">
            <li id="first"><a id="home" href="index.php"><span>HOME</span></a></li>
            <li><a id="legends" href="legends.php"><span>LEGENDS</span></a></li>
            <li><a id="maps" href="maps.php"><span>MAPS</span></a></li>
            <li><a id="lfg" href="lfg.php"><span>LFG</span></a></li>
            <li class="login"><a id="login" href="login.php"><span>LOGIN</span></a></li>
        </ul>
    </nav>
</header>
<script>
    //alert(window.location.pathname);
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
        default:
            active('home');
            break;
    }
    function active(id) {
        document.getElementById(id).classList.add('active');
    }
</script>