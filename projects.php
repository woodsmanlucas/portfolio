<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>
    <link rel="stylesheet" href="/styles/navbar.css">
    <link rel="import" href="/navbar.html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato|Oswald&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        require_once("connect.php")
    ?>
<div class="wrapper">
<div id="header"></div>
 </div>
 <script src="scripts/menu.js"></script>   
</body>
<script>
        $(function(){
            $('#header').load('navbar.html', function (){
                const body = document.body;
const btn = document.querySelector('.btn-menu');

btn.addEventListener('click', function(){
    body.classList.toggle('show');
});

btn.addEventListener('mousedown', function(e){
    e.preventDefault();
});
            });
        });
        </script>
</html>