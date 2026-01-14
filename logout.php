<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<body>
    <script>
        localStorage.removeItem('wuwa_login');
        
        window.location.href = 'login.php';
    </script>
</body>
</html>