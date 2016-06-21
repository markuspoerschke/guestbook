<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;

class InMemoryEntryRepository implements EntryRepository
{
    /**
     * @var array
     */
    private $entries = [];

    public function add(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    public function getAll()
    {
        return $this->entries;
    }
}
