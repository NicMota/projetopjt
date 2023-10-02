<?php
    session_start();
    if(!isset($_SESSION['user'])) {
       
        header("Location: ./register.php");
    }
?>
<?php
    include_once 'inc/header_inc.php';
?>
<body>
    <h1>
        YOU ARE LOGGED!!!
    </h1>
</body>
</html>