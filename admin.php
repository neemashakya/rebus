<!--FIXME: random user can get to page by putting admin.php into the url need to change so that only an admin can load the page-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <title>Final Project</title>
</head>
<?PHP
require('session_validation.php');
//require('import.php');
/*
if ((!isset($_SESSION['valid_admin'])){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
}
else{
}
*/
?>

<body>
<?PHP
session_start();
echo getTopNav();
?>
<div id="export">
    <div id="import">
        <form id="edit_word_form" class="upload" action="admin_edit_synonyms.php" method="get">
            <a class="upload" href="#" onclick="document.getElementById('edit_word_form').submit()">[1]Edit Synonyms for
                the word:</a>
            <input class="upload" type="textbox" name="word"/>
        </form>
    </div>
    <br><br>
    <a href="export_db.php">[2]Export the word list (Source: Database; Target: Excel file)</a><br>
    <h2 class="upload">[3]Import the word list (Source: Excel File; Target: Database)</h2>
    <div id="import">
        <p id="error" style="display: none;">Error: You must select a file to import</p>
        <?php
        require('import.php');
        if ($error) {
            ?>
            <p id="error" style="display:block;background-color: #ce4646;padding:5px;color:#fff;">
                <?php echo $result; ?>
            </p>
        <?php } ?>
        <form class="upload" method="post" name="importFrom" enctype="multipart/form-data"
              onsubmit="return validateForm()">
            <label class="upload"><input class="upload" type="file" name="fileToUpload" id="fileToUpload"></label>
            <input class="upload" type="submit" value="Submit File" name="submit">
        </form>
    </div>
    <br><br>
    <!--
            <a href="admin_manage_users.php">[6] Manage Users (add, delete, update) (Extra Credit)</a><br> -->
    <a href="list_words.php">[4] Edit Words</a>
    <table align="center" class="adminTable">
        <tr>
            <td align="center">
                <a href="list_words.php"><img src="./pic/adminEdit.jpeg" class="thumbnailSize"></a>
            </td>
            <td align="center">
                <a href="export_db.php"><img src="./pic/export.png" class="thumbnailSize">
            </td>
            <td align="center">
                <a href="#"><img src="./pic/import.png" class="thumbnailSize"></a>
            </td>
        </tr>
        <tr>
            <td align="center"><a href="list_words.php">Word List</a></td>
            <td align="center"><a href="export_db.php">Export</a></td>
            <td align="center"><a href="#">Import</a></td>
        </tr>
    </table>
</div>

<script>
    function validateForm() {
        var eng = document.forms["importFrom"]["fileToUpload"].value;
        if (eng == "") {

            document.getElementById("error").style = "display:block;background-color: #ce4646;padding:5px;color:#fff;";
            return false;
        }
    }

</script>
</body>

</html>
