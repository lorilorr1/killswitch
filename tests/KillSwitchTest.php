<?php

class KillSwitchTest extends PHPUnit_Framework_TestCase
{
    private $killswitch;

    public function __construct()
    {
        $this->killswitch = new KillSwitch\KillSwitch;
    }

    /**
     * @test
     */
    public function it_can_instanciate()
    {
        $this->assertInstanceOf('KillSwitch\KillSwitch', $this->killswitch);
    }

    /**
     * @test
     */
    public function it_defaults_to_inactive()
    {
        $this->assertFalse($this->killswitch->status());
    }

    /**
     * @test
     */
    public function it_can_set_the_status_with_a_setter()
    {
        $this->assertTrue($this->killswitch->setStatus(true));
    }

    /**
     * @test
     */
    public function it_can_activate_the_kill_switch()
    {
        $this->killswitch->kill();

        $this->assertTrue($this->killswitch->status());
    }

    /**
     * @test
     */
    public function it_can_activate_the_kill_switch_from_a_url()
    {
        $this->killswitch = new \KillSwitch\KillSwitch('http://localhost:8080');

        $this->assertTrue($this->killswitch->status());
    }

    /**
     * @test
     */
    public function it_will_throw_an_exception_of_the_url_isnt_accessible()
    {
        $this->setExpectedException(KillSwitch\Exceptions\BadUrlException::class);
        $this->killswitch = new \KillSwitch\KillSwitch('foo');
        $this->killswitch->status();
    }

}
