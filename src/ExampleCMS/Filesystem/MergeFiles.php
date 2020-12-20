<?php

namespace ExampleCMS\Filesystem;

class MergeFiles
{

    const PATH = 'path';
    const PATHBASE = 'pathBase';
    const PATHTARGET = 'pathTarget';
    const APP = 'app';
    const LEVEL = 'level';
    const MODULES = 'modules';
    const SECTION = 'section';
    const FILTER = 'filter';
    const NAME = 'name';

    /**
     * @var array 
     */
    protected $params = [];

    protected function log($message)
    {
        sprintf('%s: %s', get_class($this), $message);
    }

    public function execute(array $params = [])
    {
        if (empty($params[static::MODULES])) {
            $params[static::MODULES] = [];
        }

        if (empty($params[static::NAME])) {
            $params[static::NAME] = null;
        }

        $this->params = $params;

        $basePaths = array_values($params[static::PATHBASE]);
        $basePathsCount = count($basePaths);
        $basePathIndex = 0;

        while ($basePathIndex < $basePathsCount) {
            $currentBasePath = $basePaths[$basePathIndex];

            $this->process($currentBasePath);

            $basePathIndex++;
        }
    }

    public function process(string $basePath)
    {
        $path = $this->params[static::PATH];
        $modules = $this->params[static::MODULES];
        $basePaths = array_values($this->params[static::PATHBASE]);

        if ($this->params[static::LEVEL] !== 'application') {
            foreach ($modules as $module) {
                $extension = [];

                foreach ($basePaths as $basePath) {
                    $extpath = "modules/$module/$path";
                    $override = [];

                    foreach (glob($basePath . '/' . $extpath . '/*') as $entry) {

                        if ($this->isPass($entry) && is_file($entry)) {
                            if (substr($entry, 0, 9) == '_override') {
                                $override[] = $entry;
                            } else {
                                $extension[] = file_get_contents($entry);
                            }
                        }
                    }

                    foreach ($override as $entry) {
                        $extension[] = file_get_contents($entry);
                    }

                    $this->saveExtension($extension, $extpath);
                }
            }
        }

        if ($this->params[static::LEVEL] !== 'module') {
            $extension = [];

            foreach ($basePaths as $basePath) {
                $extpath = "application/$path";

                foreach (glob($basePath . '/' . $extpath . '/*') as $entry) {
                    if ($this->isPass($entry) && is_file($entry)) {
                        $extension[] .= file_get_contents($entry);
                    }
                }
            }

            $this->saveExtension($extension, $extpath);
        }
    }

    protected function saveExtension($extension, $extpath)
    {
        $name = $this->params[static::NAME];
        $pathBase = $this->params[static::PATHTARGET];

        if (empty($name)) {
            $dir = dirname("$pathBase/$extpath");
        } else {
            $dir = dirname("$pathBase/$extpath/$name");
        }

        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        foreach ($extension as $index => $ext) {
            $extension[$index] = $this->removeTrashFromCode($ext);
        }


        array_unshift($extension, '$' . $this->params[static::SECTION] . ' = [];');
        array_unshift($extension, '<?php');

        $extension[] = 'return $' . $this->params[static::SECTION] . ';';

        if (empty($name)) {
            file_put_contents("$pathBase/$extpath.php", implode(PHP_EOL, array_filter($extension)));
        } else {
            file_put_contents("$pathBase/$extpath/$name.php", implode(PHP_EOL, array_filter($extension)));
        }
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function isPass(string $file): bool
    {
        $result = true;
        $result &= (empty($this->params[static::FILTER]) || substr_count($file, $this->params[static::FILTER]) > 0);
        $result &= $file !== '.';
        $result &= $file !== '..';
        $result &= strtolower(substr($file, -4)) === ".php";

        return $result;
    }

    /**
     * @param string $code
     * @return string
     */
    protected function removeTrashFromCode(string $code): string
    {
        $codeWithoutTrash = strtr($code, [
            '<?php' => '',
            '?>' => '',
            '<?PHP' => '',
            '<?' => '',
        ]);

        return trim($codeWithoutTrash);
    }

}
