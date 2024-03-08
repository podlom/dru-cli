<?php

namespace podlom\druCli;


use podlom\druCli\AbstractCommand;


final class ShellUpdateCommand extends AbstractCommand
{
    private $result;

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    public function __construct(string $command, Environment $environment)
    {
        $this->command = $command;
        $this->setEnvironment($environment);

        parent::__construct($command);
    }

    public function execute(): void
    {
        $command = $this->getCommand();
        $command = $this->environment->prepareCommand($command);
        echo __METHOD__ . ' +' . __LINE__ . ' Executing command: ' . var_export($command, true) . ' ...' . PHP_EOL;
        $this->result = shell_exec($command);

        if (!empty($this->result)) {
            echo __METHOD__ . ' +' . __LINE__ . ' ' . $this->result . PHP_EOL;
        } else {
            echo __METHOD__ . ' +' . __LINE__ . ' Error: the server did not respond. No results.' . PHP_EOL;
        }

        parent::execute();
    }
}