<?php

namespace Program;

use Program\ConsoleManager;

class AccountService
{
    private $accountAction = [];
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
        $this->accountAction[$dateTime->format('Y-m-d')]= [$amount, $this->balance];
    }

    public function printStatement(): void
    {
        $this->consoleManager->printInConsole($this->accountAction);
    }

    public function withdraw(\DateTime $dateTime, int $amount): void
    {
        $this->balance -= $amount;
        $this->accountAction[$dateTime->format('Y-m-d')]= [-$amount, $this->balance];
    }
}