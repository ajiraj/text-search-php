<?php
/****************************************************************************************************
Name :File content search
Author:AjiRaj
Technologies: python,php
desc: Searches files inside directory and subdirectories for search string
	  and returns line and line number of the found file.
*****************************************************************************************************/
?>
<html>
<body>
<h1>File content search (.php files)</h1>
<?php
if (isset($_POST['query']) && isset($_POST['folder'])) {
    $dir     = $_POST['folder'];
    $q       = $_POST['query'];
    $command = escapeshellcmd('search.pyc ' . $dir . " " . $q);
    $output  = shell_exec($command);
    $output  = str_replace($q, "<b class='found'>" . $q . "</b>", $output);
    echo $output;
} else {
?>

<form action="" method="post" style="text-align:center;"><br><br>
<label>Folder Path:</label><br>
<input type="text" name="folder" style="width:350px;height:30px;" /><br><br>
<label>Enter Query String:</label><br>
<input name="query" type="text" style="width:350px;height:30px;"/><br><br>
<input type="submit" value="Search" style="width:150px;height:30px;"/>
</form>

<?php
}
?>
<style>
body{
    font-family: arial, sans-serif;
    padding: 21px;
	background-color: #C3BDBD;
}
.line {
    font-size: 16px;
    font-weight: bold;
    color: #210000;
	padding-left: 10px;
}
.code {
    border: 1px solid #969445;
    max-width: 90%;
    text-align: left;
    word-wrap: break-word;
    position: relative;
    font-size: 11px;
    color: #769892;
    background: #FFF9D1;
	margin-top: 5px;
	font-size: 13px;
    font-weight: bold;
	padding-left:15px;
}
.filepath {
    font-weight: bold;
    margin-top: 35px;
    position: relative;
}
.total {
    position: absolute;
    padding: 9px;
    border-bottom: 2px dotted #ccc;
    top: 0;
    bottom: 10px;
    height: 11px;
	background-color: #CFFBA8;
    border-radius: 5px;
    padding: 20px;
    font-weight: bold;
}
xmp{display: block;
    width: auto;
    margin: 0;
    float: left;}
.found{    font-size: 13px;
    color: #3140B1;
    text-decoration: blink;
    font-style: italic;}
h1{padding:10px;text-align:center;border-bottom:2px solid #cdc;}
</style>

</body>
</html>