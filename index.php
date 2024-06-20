<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- <nav>
        <ul>
            <li class="brand"><img src="logo.png" alt="Spotify Logo">Spotify</li>
            <li>Home</li>
            <li>About</li>
        </ul>
    </nav> -->
    
    <nav>
        <ul>
            <li class="brand"><img src="logo.png" alt="Spotify Logo">Spotify</li>
            <li id="username"><?php echo $_SESSION['username']; ?></li> <!-- Display the username here -->
            <li id="logout"><a href="/Spotify clone/logout.php">Logout</a></li> <!-- Logout button -->
        </ul>
    </nav>
    

    <div class="container">
        
        <div class="songList">
            <h1>Spotify Blend</h1>
            <div class="songItemContainer"> 
                <div class="songItem">
                    <img src="covers/1.jpg" alt="1" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">04:00 <i id ="0" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/2.jpg" alt="2" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:26 <i id ="1" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/3.jpg" alt="3" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:26 <i id ="2" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/4.jpg" alt="4" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">04:17 <i id ="3" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/5.jpg" alt="5" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:53 <i id ="4" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/6.jpg" alt="6" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:21 <i id ="5" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/7.jpg" alt="7" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:49 <i id ="6" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/8.jpg" alt="8" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:44 <i id ="7" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/9.jpg" alt="9" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">04:23 <i id ="8" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img src="covers/10.jpg" alt="10" >
                    <span class="songName">Let me Love You</span>
                    <span class="songListPlay"><span class="timeStamp">03:58 <i id ="9" class="songItemPlay fa fa-play-circle"></i></span></span>
                </div>
            </div>
        </div>
        <div class="songBanner"></div>
    </div>

    <div class="bottom">
        <input type="range" name="
        range" id="myProgressBar" min="0" value="0" max="100">
        <div class="icons">
            
            <i class="fa fa-3x fa-step-backward" id="previous"></i>
            <i class="fa fa-3x fa-play-circle" id="masterPlay"></i>
            <i class="fa fa-3x fa-step-forward" id="next"></i>
        </div>
        <div class="songInfo">
            <img src="playing.gif" width="42px" id="gif"><span id="masterSongName">Sweater Weather</span>
        </div>
    </div>
    <script src="script.js"></script>


</body>
</html>