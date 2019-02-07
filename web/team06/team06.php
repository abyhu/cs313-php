<?php

$db;

try
{
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>


<!DOCTYPE HTML>

<html>
    <head>
        <title>Team 06</title>
        <style type="text/css">

        </style>
    </head>
    <body>
        <h1>Insert Scripture</h1>
        <form method="post" action="insert.php">

            <label for="book">Book</label>
            <input name="book" id="book" type="text"/>
            <br/><br/>
			<label for="chapter">Chapter</label>
            <input name="chapter" id="chapter" type="text"/>
            <br/><br/>
			<label for="verse">Verse</label>
            <input name="verse" id="verse" type="text"/>
            <br/><br/>
			<label for="content">Content</label>
            <input name="content" id="content" type="textarea"/>
            <br/><br/>
			
			<?php
			
			foreach($db->query("SELECT * FROM topic;") as $row)
            {
                echo "<input type='checkbox' name='topics[]' value='".$row[name]."'>".$row[name]."<br /><br />";
	        }
			
			?>
			
			
			
            <input  type="submit" value="Insert Scripture"/>

        </form>

    </body>
</html>
