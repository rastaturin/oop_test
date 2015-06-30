<?php

use Figure\FigureFactory;

class Application {

    /**
     * @var resource
     */
    protected $handle;

    /**
     * @var Document
     */
    protected $document;

    /**
     * @var FigureFactory
     */
    protected $factory;

    /**
     * @param $handle resource
     */
    public function __construct($handle)
    {
        $this->handle = $handle;
        $this->factory = new FigureFactory();
        $this->document = new Document();
    }

    public function run()
    {
        $this->helpAction();
        while ($line = $this->getInputLine()) {
            try {
                $this->processCommand(trim($line));
            } catch (Exception $e) {
                $this->output(sprintf("Error %s: %s", get_class($e), $e->getMessage()));
            }
        }
    }

    /**
     * Process input line
     * @param $line
     */
    protected function processCommand($line)
    {
        try {
            list($command, $params) = $this->parseCommand($line);

            if ($this->addWidget($command, $params)) {
                $this->output("$command created");
            } elseif (method_exists($this, $method = $command . "Action")) {
                $this->$method($params);
            } else {
                $this->output("Incorrect command: $command");
            }
        } catch (InvalidArgumentException $e) {
            $this->output($e->getMessage());
        }
    }

    /**
     * Parse line into command and params
     * @param $line
     * @return array
     */
    protected function parseCommand($line)
    {
        if (!preg_match_all('/"[^"]+"|\S+/', $line, $matches)) {
            throw new InvalidArgumentException("Incorrect command");
        }

        $params = array_shift($matches);
        $command = array_shift($params);
        foreach ($params as &$param) {
            $param = trim($param, '"');
        }
        return [$command, $params];
    }

    /**
     * @param $shape
     * @param $params
     * @return bool
     */
    protected function addWidget($shape, $params)
    {
        $x = array_shift($params);
        $y = array_shift($params);

        try {
            $figure = $this->factory->create($shape, $params);
            $this->document->createWidget($figure, $x, $y);
            return true;
        } catch (\Exception\FigureNotFound $e) {
            return false;
        }
    }

    /**
     * Move action
     * @param $params
     */
    protected function moveAction($params)
    {
        if (count($params) < 3) {
            throw new InvalidArgumentException('Command "move" requires 3 arguments');
        }
        $this->document->move($params[0], $params[1], $params[2]);
        $this->output("ok");
    }

    /**
     * Output help
     */
    protected function helpAction()
    {
        $help =
            "Usage (defaults values are zeros):" . PHP_EOL . PHP_EOL
            ."Rectangle 10 10 30 40     // parameters: x, y, width, height" . PHP_EOL
            ."Square 15 30 35           // x, y, size" . PHP_EOL
            ."Ellipse 100 150 300 200   // x, y, horizontal diameter, vertical diameter" . PHP_EOL
            ."Circle 1 1 300            // x, y, size" . PHP_EOL
            ."Textbox 5 5 200 100 \"sample text\"   // x, y, width, height, text" . PHP_EOL
            ."Move 8 100 200            // Moves shape with ID=8 to x=100, y=200" . PHP_EOL
            ."Print                     // Output the current drawing using ASCII" . PHP_EOL
            ."PrintWeb                  // Output the current drawing using Web" . PHP_EOL
            ."Help                      // Print this message" . PHP_EOL
            ."Exit                      // Exit"

        ;
        $this->output($help);
    }

    /**
     * Print document using ASCII
     */
    protected function printASCIIAction()
    {
        $this->render(new \Renderer\ASCII\Factory(), $this->document);
    }

    /**
     * Print document using Web
     */
    protected function printWebAction()
    {
        $this->render(new \Renderer\Web\Factory(), $this->document);
    }

    /**
     * Exit application
     */
    protected function exitAction()
    {
        $this->output("bye!");
        exit();
    }

    protected function render(\Renderer\FactoryRendererInterface $docRenderer)
    {
        $out = $this->document->render($docRenderer);
        $this->output($out);
    }

    /**
     * @return string
     */
    protected function getInputLine()
    {
        echo "> ";
        return trim(fgets($this->handle));
    }

    public function output($out)
    {
        echo $out . PHP_EOL;
    }

}