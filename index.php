<?php
    require "header.php";
?>

<link rel="stylesheet" href="style.css">
    <main>
      <div class="wrapper-main">
            <section class="section-default">
               <?php
                if (isset($_SESSION['userId'])) {
                    echo '<div id="container">
                    <div id="header">
                        <h1>Sections</h1>
                    </div>
                    <div id="content2">
                        <ul>
                            <li><a class="selected2" href="createasection.php">Create a Section</a></li>
                        </ul>
                    </div>
                </div>';
                ?>
                <ul>

                <?php
                require './includes/dbh.inc.php';
                $username = $_COOKIE['User'];

                $query = "select sectionname from usersection inner join usermeetsection on usermeetsection.idsection = usersection.idsection where usermeetsection.idUsers = (select idUsers from users where uidUsers = '$username');";
                
                //mysqli_query($conn, $sql);
                

                if ($result = mysqli_query($conn, $query)) {

                    /* fetch associative array */
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<li> $row[0] </li>";
                    }
                
                    /* free result set */
                    mysqli_free_result($result);
                }


                mysqli_close($conn);  

                }
                else {
                    echo '';
                }
               ?>
               </ul>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>