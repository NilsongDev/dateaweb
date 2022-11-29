<?php
session_start();
error_reporting(0);





session_destroy();




header("refresh:2;url=../index.php");
?><html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Adios',
            text: 'cerrando sesion',
            showConfirmButton: false,
            
        })
    </script>
</body>

</html>



<?php








        ?>