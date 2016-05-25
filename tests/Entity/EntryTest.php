<?php

/**
 * @author    Markus Poerschke <markus.poerschke@trivago.com>
 * @since     2016-05-25
 * @copyright 2016 (c) trivago GmbH, Düsseldorf
 * @license   All rights reserved.
 */

namespace Entity;

use Eluceo\Guestbook\Entity\Entry;

class EntryTest extends \PHPUnit_Framework_TestCase
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
