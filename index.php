<html>
    <head>
        <style>
    .loader {
        border: 8px solid #eeeeee;
        border-radius: 50%;
        border-top: 8px solid #183e67;
        width: 40px;
        height: 40px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        position: absolute;
        top: 5%;
        right: 5%;
    }
    
    .logo img{
        width: 20%;
        height: auto;
        position: absolute;
        top: 22%;
        left: 50%;
        transform: translateY(-50%);
        transform: translateX(-50%);
    }
    
    /*.logo img{
        width: 100%;
        height: auto;
    }*/

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    body{
        background: url(ihm/img/load.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    </style>
        
        <script>
            setTimeout(function() {
                window.location = "ihm/index.php";
            },2500); // 2.5 secondes de chargement
        </script>
    </head>
    <body>
        <div class="logo">
            <img src="ihm/img/logo_v2.png">
        </div>
        <div class="loader"></div>
    </body>
</html>