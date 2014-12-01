<?php
use MtHaml\Support\Php\Executor;
use MtHaml\Environment;

class HamlViewRenderer extends CViewRenderer
{
    public $fileExtension = ".haml";
    /**
     * Parses the source view file and saves the results as another file.
     * @param string $sourceFile the source view file path
     * @param string $viewFile the resulting view file path
     */
    protected function generateViewFile($sourceFile,$viewFile)
    {
        static $haml = null;

        if ($haml === null) {
            $haml = new Environment('php');
        }

        if (substr($sourceFile, strlen($this->fileExtension) * -1) === $this->fileExtension) {

            $data = $haml->compileString(file_get_contents($sourceFile), $viewFile);

        } else {
            $data = file_get_contents($sourceFile);
        }

        file_put_contents($viewFile, $data);
    }
    public function renderFile($context,$sourceFile,$data,$return)
    {
        $hamlSourceFile = substr($sourceFile, 0, strrpos($sourceFile, '.')).$this -> fileExtension;

        if(!is_file($hamlSourceFile) || ($file = realpath($hamlSourceFile)) === false) {
            return parent::renderFile($context,$sourceFile,$data,$return);
        }
        $viewFile = $this->getViewFile($sourceFile);
        $this->generateViewFile($sourceFile, $viewFile);

        return $context->renderInternal($viewFile, $data, $return);
    }
};