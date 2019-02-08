<?php

$book = htmlspecialchars($_POST['book']);
$chapter = htmlspecialchars($_POST['chapter']);
$verse = htmlspecialchars($_POST['verse']);	
$content = htmlspecialchars($_POST['content']);
$topics = $_POST['topics']; 

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


$stmt = $db->prepare('INSERT INTO scripture(book, chapter, verse, content) 
VALUES (:book, :chapter, :verse, :content)'); 
$stmt->bindValue(':book', $book, PDO::PARAM_STR); 
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute(); 

$stmt = $db->prepare('SELECT id FROM scripture 
WHERE book = ? AND chapter = ? AND verse = ?
AND content = ?');
$stmt->execute(array($book, $chapter, $verse, $content));

$scriptureId; 
while ($row = $stmt->fetch()) {
    $scriptureId = $row;
	echo $row; 
  }

//foreach($topics as $topic) {
//	$topic = htmlentities($topic); 
//	$topicId = $db->prepare('SELECT id FROM topic WHERE name = ?'); 
//	$stmt->execute(array($topic));
//	
//	$topicId; 
//	while ($row = $stmt->fetch()) {
//		$topicId = $row; 
//		echo $row; 
//	}
//
//	$stmt = $db->prepare('INSERT INTO scripture_topic VALUES (?, ?)'); 
//	$stmt->execute(array($scriptureId, $topicId)); 
//}
  

?>