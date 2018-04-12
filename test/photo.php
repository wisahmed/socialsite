<html>
    <head>
    </head>
    <body>
        <table width="600" align="center" border="0" cellpadding="10" bgcolor="#EFEFEF">
            <tr>
                <td>
                    <?php 
                    session_start();
                    if (isset($_SESSION['User']) && !empty($_SESSION['User']))
                    {
                        
                    }
                    else
                    {
                        header('location:login.html');
                    } 
                    include 'album.php';
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>