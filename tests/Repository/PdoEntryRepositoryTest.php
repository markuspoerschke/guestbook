<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;

class PdoEntryRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PdoEntryRepository
     */
    private $repository;

    protected function setUp()
    {
        $db_dsn = isset($_ENV['DB_DSN']) ? $_ENV['DB_DSN'] : 'mysql:dbname=guestbook;host=mysql';
        $db_user = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : 'root';
        $db_password = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : 'root';

        $this->repository = new PdoEntryRepository(new \PDO($db_dsn, $db_user, $db_password));
    }

    public function test_is_empty()
    {
        $entries = $this->repository->getAll();
        $this->assertInternalType('array', $entries);
        $this->assertCount(0, $entries);
    }

    public function test_add_new_entry()
    {
        $entry = new Entry();
        $entry->setAuthorEmail('test@example.com');
        $entry->setAuthorName('Max Mustermann');
        $entry->setBody('Lorem Ipsum');

        $this->repository->add($entry);

        $entries = $this->repository->getAll();
        $this->assertCount(1, $entries);
    }
}
