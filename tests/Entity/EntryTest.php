<?php

namespace Entity;

use Eluceo\Guestbook\Entity\Entry;
use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    public function test_getter_setter()
    {
        $entry = new Entry();
        $this->assertNull($entry->getAuthorEmail());
        $this->assertNull($entry->getAuthorName());
        $this->assertSame('', $entry->getBody());

        $entry->setAuthorName('John Doe');
        $entry->setAuthorEmail('jd@example.com');
        $entry->setBody('Lorem Ipsum Dolor ...');

        $this->assertSame('John Doe', $entry->getAuthorName());
        $this->assertSame('jd@example.com', $entry->getAuthorEmail());
        $this->assertSame('Lorem Ipsum Dolor ...', $entry->getBody());
    }
}
