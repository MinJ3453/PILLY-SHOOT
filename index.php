<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>PillyShoot</title>
    <script src="https://kit.fontawesome.com/be068f1c80.js" crossorigin="anonymous" async></script>
	<script src="js/alert.js" async></script>
</head>

<body>

<?php 
  include 'login_head.php';
?>

<?php
	require_once("tools.php");
	
	session_start_if_none();
	$id = sessionVar("uid");
	$name = sessionVar("uname");
?>
    <div class="main">
        <div class="pillyshoot__title">
			<span class="text1">나의 건강을 찍는다</span>
			<span class="text2">PILLY SHOOT</span>
		</div>
        <form name="reqForm" method="post" action="fileUploadResult.php" enctype="multipart/form-data">        
            <div class="camera__btn">
                <input type=file name='imgFile' accept="image/*" style='display: none;' onchange="form.submit()"/> 
                <img src="images/logo2.png" alt="My Image" width="72" height="62" onclick='document.all.imgFile.click();'> 
            </div>
        </form>
    </div>

    <img src="images/explain.png" alt="" width="231" height="217" class="ex_img"> 
	<span class="text5">영양제를 찍어보세요.</span>

    </div>
    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__btn">
                <a href="index.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <rect x="10" y="12" width="4" height="4" />
                        </svg>
                    </div>

                    <div class="nav__btn__text">HOME</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="medical.php" class="nav__link">
                    <div class=" nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                            <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">MEDICAL</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="community.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">COMMUNIY</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="mypage.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">MY PAGE</div>
                </a>
            </li>
        </ul>
    </nav>

    <script defer src="/__/firebase/9.1.1/firebase-app.js"></script>
    <!-- include only the Firebase features as you need -->
    <script defer src="/__/firebase/9.1.1/firebase-database.js"></script>
    <script defer src="/__/firebase/9.1.1/firebase-firestore.js"></script>
    <script defer src="/__/firebase/9.1.1/firebase-messaging.js"></script>
    <script defer src="/__/firebase/9.1.1/firebase-storage.js"></script>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyDEGNk43Dcic6EOhrqIMS9xs7rcRnfJ3Aw",
            authDomain: "pillyshoot.firebaseapp.com",
            databaseURL: "https://pillyshoot-default-rtdb.firebaseio.com",
            projectId: "pillyshoot",
            storageBucket: "pillyshoot.appspot.com",
            messagingSenderId: "708151341423",
            appId: "1:708151341423:web:db4c62db9c331648f9389a",
            measurementId: "G-EX6WCHHP70"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
  
</body>

</html>