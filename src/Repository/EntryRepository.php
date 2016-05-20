<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;

class EntryRepository
{
    /**
     * @var array
     */
    private $entries = [];

    /**
     * @param Entry $entry
     */
    public function add(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    /**
     * @return Entry[]
     */
    public function getAll()
    {
        return $this->entries;
    }
}
