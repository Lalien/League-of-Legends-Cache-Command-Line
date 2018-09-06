<?php
namespace App\Tests\Command;

use App\Command\LookupCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use App\Model\Summoner;

class LookupCommandTest extends KernelTestCase {
    public function testLookup() {
        $kernel = static::createKernel();
        $kernel->boot();
        self::$container = $kernel->getContainer();
        $this->lookup = self::$container->get('lookup');
        $summoner = $this->lookup->lookupByName("Lalien");
        $this->assertInstanceOf(Summoner::class, $summoner);
        $this->assertTrue(is_numeric($summoner->id));
        $this->assertTrue(!empty($summoner->name));
    }
}