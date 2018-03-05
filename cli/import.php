<?php
require_once __DIR__ . '/../config.php';
$pdo = new PDO(Config::getDatabaseDSN());
$stmt = $pdo->prepare("INSERT INTO article (title, description, link) VALUES (:title, :description, :link)");


// Fetch the latest Slashdot headlines
try {
    $slashdotRss =
        Zend\Feed\Reader\Reader::import('http://rss.slashdot.org/Slashdot/slashdot');
} catch (Zend\Feed\Reader\Exception\RuntimeException $e) {
    // feed import failed
    echo "Exception caught importing feed: {$e->getMessage()}\n";
    exit;
}

// Loop over each channel item/entry and store relevant data for each
foreach ($slashdotRss as $item) {
    $stmt->bindValue(':title', $item->getTitle());
    $stmt->bindValue(':description', $item->getDescription());
    $stmt->bindValue(':link', $item->getLink());
    $stmt->execute();
}
