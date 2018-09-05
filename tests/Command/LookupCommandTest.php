<?php
namespace App\Tests\Command;

use App\Command\LookupCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class LookupCommandTest extends KernelTestCase {
    public function testThis() {
        $kernel = static::createKernel();
        $kernel->boot();
        self::$container = $kernel->getContainer();
        $this->lookup = self::$container->get('lookup');
        $summoner = $this->lookup->lookupByName("Lalien");
        $this->assertInternalType('object', $summoner);
    }
}