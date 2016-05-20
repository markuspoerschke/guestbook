<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;

class EntryRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function test_is_empty()
    {
        $repository = new EntryRepository();

        $entries = $repository->getAll();
        $this->assertInternalType('array', $entries);
        $this->assertCount(0, $entries);
    }

    public function test_add_new_entry()
    {
        $repository = new EntryRepository();
        $repository->add(new Entry());

        $entries = $repository->getAll();
        $this->assertCount(1, $entries);
    }
}
