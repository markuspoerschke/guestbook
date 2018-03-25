<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;
use PHPUnit\Framework\TestCase;

class InMemoryEntryRepositoryTest extends TestCase
{
    public function test_is_empty()
    {
        $repository = new InMemoryEntryRepository();

        $entries = $repository->getAll();
        $this->assertInternalType('array', $entries);
        $this->assertCount(0, $entries);
    }

    public function test_add_new_entry()
    {
        $repository = new InMemoryEntryRepository();
        $repository->add(new Entry());

        $entries = $repository->getAll();
        $this->assertCount(1, $entries);
    }
}
