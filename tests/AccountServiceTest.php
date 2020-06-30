<?php
use \PHPUnit\Framework\TestCase;
use Program\AccountService;

class AccountServiceTest extends TestCase
{
    /** @var AccountService $accountService */
    private $accountService;
    /** @var \PHPUnit\Framework\MockObject\MockObject | \Program\ConsoleManager $consoleManagerMock */
    private $consoleManagerMock;

    public function setUp(): void
    {
        $this->consoleManagerMock = $this->createMock(\Program\ConsoleManager::class);
        $this->accountService = new AccountService($this->consoleManagerMock);
    }

    public function testIsAllOk(): void
    {
        $this->assertTrue(true);
    }


    public function testCanWithdraw(): void
    {
        $expectedArray['2012-01-04'] = [1000,1000];
        $expectedArray['2012-02-04'] = [-500,500];

        $this->consoleManagerMock
            ->expects($this->once())
            ->method('printInConsole')
            ->with($expectedArray);

        $accountService = new AccountService($this->consoleManagerMock);
        $date = new DateTime('2012-01-04');
        $amount = 1000;
        $accountService->deposit($date,$amount);

        $date = new DateTime('2012-02-04');
        $amount = 500;

        $accountService->withdraw($date,$amount);
        $accountService->printStatement();
    }



}