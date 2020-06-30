<?php

namespace Program;

use Program\ConsoleManager;

class AccountService
{
    private $accountActions = [];
    private $balance = 0;

    /** @var ConsoleManager $consoleManager */
    private $consoleManager;

    public function __construct(ConsoleManager $consoleManager)
    {
        $this->consoleManager = $consoleManager;
    }

    public function deposit(\DateTime $dateTime, int $amount): void
    {
        $this->balance += $amount;
        $this->accountActions[]= [$dateTime->format(DateTime::ATOM), $amount, $this->balance];
    }

    public function printStatement(): void
    {
        $this->consoleManager->printInConsole($this->accountActions);
    }

    public function withdraw(\DateTime $dateTime, int $amount): void
    {
        $this->balance -= $amount;
        $this->accountActions[]= [$dateTime->format(DateTime::ATOM), -$amount, $this->balance];
    }
}