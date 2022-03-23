<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outlands</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header>
                <nav>
                    <ul id="navbar">
                        <li id="first"><a href="home.html"><span>HOME</span></a></li>
                        <li><a href="legends.html"><span>LEGENDS</span></a></li>
                        <li><a href="maps.html"><span>MAPS</span></a></li>
                        <li><a href="lfg.html"><span>LFG</span></a></li>
                        <li class="login"><a class="active" href="#"><span>LOGIN</span></a></li>
                    </ul>
                </nav>
            </header>
            <form>
                <fieldset>
                    <main id="Container">
                        <h1 id="logintitle">Login</h1>
                        <div id="email-container"><label for="email">E-mail</label><br>
                            <input type="email" name="email" id="email" placeholder="E-mail">
                        </div>
                        <div id="pwd-container"><label for="pwd">Password</label><br>
                            <input type="password" name="pwd" id="pwd" placeholder="Password">
                        </div>
                        <div id="send-container">
                            <input type="submit" value="LOGIN">
                        </div>
                        <div id="registerhere">You don't have an account? Register <a href="register.html"><strong>here</strong></a></div>
                    </main>
                </fieldset>
            </form>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>