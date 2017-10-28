<?php

require_once __DIR__ . '/../vendor/autoload.php';

$repository = new \Eluceo\Guestbook\Repository\PdoEntryRepository(new \PDO(
    getenv('GUESTBOOK_DB_DSN'), getenv('GUESTBOOK_DB_USER'), getenv('GUESTBOOK_DB_PASSWORD')
));

/** @var \Eluceo\Guestbook\Entity\Entry[] $entries */
$entries = $repository->getAll();

?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Guestbook</h1>
        <p><a href="create.php">Leave a nice message</a></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entries as $entry): ?>
                    <tr>
                        <td>
                            <a href="mailto:<?php echo $entry->getAuthorEmail() ?>">
                                <?php echo $entry->getAuthorName() ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $entry->getCreatedAt()->format('d.m.Y') ?>
                        </td>
                        <td>
                            <?php echo $entry->getBody() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
