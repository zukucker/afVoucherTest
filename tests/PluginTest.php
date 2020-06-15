<?php

namespace afVoucherTest\Tests;

use afVoucherTest\afVoucherTest as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'afVoucherTest' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['afVoucherTest'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
