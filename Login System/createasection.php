<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="This is where you register to sign-in to the website">
        <meta name="keywords" content="Educational Purposes, Ateneo de Davao Senior High School, AdDU, AdDU SHS, Helpful, Home,">
        <title>Create a Section</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1>Create a Section</h1>
            </div>
            <form class = "create-section" action="includes/createasection.inc.php" method="post">
                <div id="main">
                    <h2>Section Name:</h2>
                    <input type="text" name="section-name" placeholder="Section">
                    <br>
                    <h2>Upload List of Students:</h2>
                    <div id="excel-file">
                    <input type="file" name="excel-file">
                    </div>
                    <br><br><br>
                    <button type="submit" name="create-section">Create Section</button>
                    <br><br>
                    <div id="backtohome">
                    <a class="back-to-home" href="index.php">Back to Home</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

