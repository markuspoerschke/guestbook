<?php

namespace Eluceo\Guestbook\Repository;

use Eluceo\Guestbook\Entity\Entry;

interface EntryRepository
{
    public function add(Entry $entry);

    /**
     * @return Entry[]
     */
    public function getAll();
}
