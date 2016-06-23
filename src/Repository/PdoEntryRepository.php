<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;

class PdoEntryRepository implements EntryRepository
{
    /**
     * MySQL date format.
     *
     * @var string
     */
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @var \PDO
     */
    private $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Entry $entry)
    {
        $query = <<<QUERY
INSERT INTO `guestbook_entry`
    (`author_name`, `author_email`, `body`, `created_at`)
    VALUES
    (:author_name, :author_email, :body, :created_at)
QUERY;

        $statement = $this->connection->prepare($query);
        $statement->bindValue('author_name', $entry->getAuthorName());
        $statement->bindValue('author_email', $entry->getAuthorEmail());
        $statement->bindValue('body', $entry->getBody());
        $statement->bindValue('created_at', $entry->getCreatedAt()->format(static::DATE_FORMAT));

        if (!$statement->execute()) {
            throw new \Exception(implode(' ', $statement->errorInfo()));
        }
    }

    public function getAll()
    {
        $rows = $this->connection->query('SELECT * FROM `guestbook_entry`', \PDO::FETCH_ASSOC);
        $entries = [];

        foreach ($rows as $row)
        {
            $entry = new Entry();
            $entry->setAuthorName($row['author_name']);
            $entry->setAuthorEmail($row['author_email']);
            $entry->setBody($row['body']);
            $entry->setCreatedAt(\DateTime::createFromFormat(static::DATE_FORMAT, $row['created_at']));

            $entries[] = $entry;
        }

        return $entries;
    }
}
