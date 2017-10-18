<?php

require_once __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repository = new \Eluceo\Guestbook\Repository\PdoEntryRepository(new \PDO(
        getenv('GUESTBOOK_DB_DSN'), getenv('GUESTBOOK_DB_USER'), getenv('GUESTBOOK_DB_PASSWORD')
    ));

    $entry = new \Eluceo\Guestbook\Entity\Entry();
    $entry->setAuthorName($_POST['author']);
    $entry->setAuthorEmail($_POST['email']);
    $entry->setBody($_POST['body']);

    $repository->add($entry);

    header('Location: index.php');
    exit;
}

?>

<html>
    <body>
        <h1>Write message</h1>
        <form method="post">
            <label for="form-author">Author:</label><br>
            <input id="form-author" name="author" required><br>
            <br>
            <label for="form-email">Email:</label><br>
            <input id="form-email" name="email" type="email" required><br>
            <br>
            <label for="form-body">Your message:</label><br>
            <textarea id="form-body" name="body" required></textarea><br>
            <br>
            <input type="submit">
        </form>
    </body>
</html>
