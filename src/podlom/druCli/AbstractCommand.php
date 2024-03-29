<?php

namespace podlom\druCli;


use podlom\druCli\Command;


class AbstractCommand implements Command
{
    protected $id;

    protected $status = 0;

    protected ?Environment $environment = null;

    /**
     * @var string Command to execute.
     */
    protected $command;

    public function __construct(string $command)
    {
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     */
    public function setCommand(string $command): void
    {
        $this->command = $command;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return Environment|null
     */
    public function getEnvironment(): ?Environment
    {
        return $this->environment;
    }

    /**
     * @param Environment|null $environment
     */
    public function setEnvironment(?Environment $environment): void
    {
        $this->environment = $environment;
    }
}