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
        $db_dsn = isset($_SERVER['GUESTBOOK_DB_DSN']) ? $_SERVER['GUESTBOOK_DB_DSN'] : false;

        if (!$db_dsn) {
            $this->markTestSkipped('No DB available.');
        }

        $db_user = isset($_SERVER['GUESTBOOK_DB_USER']) ? $_SERVER['GUESTBOOK_DB_USER'] : 'root';
        $db_password = isset($_SERVER['GUESTBOOK_DB_PASSWORD']) ? $_SERVER['GUESTBOOK_DB_PASSWORD'] : '';
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
