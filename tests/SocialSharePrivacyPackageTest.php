<?php
class SocialSharePrivacyPackageTest extends PHPUnit_Framework_TestCase {
   /**
     * @var DateHelper
     */
    protected $object;
    

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = Loader::package("social_share_privacy");
        // $this->object = Package::getByHandle("social_share_privacy");
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
    
    public function testInstall() {
    	$this->assertEquals(true,$this->object->testForInstall($this->object->getPackageHandle(),true));
    	$this->assertEquals(null,$this->object->install());
    	$this->assertCount(1,$this->object->testForInstall($this->object->getPackageHandle(),true));
    }
    
    public function testUninstall() {
    	// echo $this->object->getPackageItems();
    	$pkg = Package::getByHandle($this->object->getPackageHandle());
    	$this->assertEquals(null,$pkg->uninstall());
    	$this->assertEquals(true,$this->object->testForInstall($this->object->getPackageHandle(),true));
    }
}