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
                }
                else {
                    echo '';
                }
               ?>
               
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>