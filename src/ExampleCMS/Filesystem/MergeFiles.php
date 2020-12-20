<?php

namespace ExampleCMS\Filesystem;

class MergeFiles
{

    const PATH = 'path';
    const PATHBASE = 'pathBase';
    const PATHTARGET = 'pathTarget';
    const NAME = 'name';
    const APP = 'app';
    const LEVEL = 'level';
    const MODULES = 'modules';

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

        $this->params = $params;

        $basePaths = array_values($params[static::PATHBASE]);
        $basePathsCount = count($basePaths);
        $basePathIndex = 0;

        while ($basePathIndex < $basePathsCount) {
            $nextBasePath = '';
            $currentBasePath = $basePaths[$basePathIndex];

            if (!empty($basePaths[$basePathIndex + 1])) {
                $nextBasePath = $basePaths[$basePathIndex + 1];
            }

            $this->process($currentBasePath, $nextBasePath);

            $basePathIndex++;
        }
    }

    public function process(string $basePath, string $basePathNext)
    {
        $path = $this->params[static::PATH];
        $name = $this->params[static::NAME];
        $modules = $this->params[static::MODULES];
        $basePaths = array_values($this->params[static::PATHBASE]);

        if ($this->params[static::LEVEL] !== 'application') {
            foreach ($modules as $module) {
                $extension = [];

                foreach ($basePaths as $basePath) {
                    $extpath = "modules/$module/$path";
                    $override = [];

                    foreach (glob($basePath . '/Extension/' . $extpath . '/*') as $entry) {

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

                    $this->saveExtension($extension, $extpath, $name);
                }
            }
        }

        if ($this->params[static::LEVEL] !== 'module') {
            $extension = [];

            foreach ($basePaths as $basePath) {
                $extpath = "application/$path";

                foreach (glob($basePath . '/Extension/' . $extpath . '/*') as $entry) {
                    if ($this->isPass($entry) && is_file($entry)) {
                        $extension[] .= file_get_contents($entry);
                    }
                }
            }

            $this->saveExtension($extension, $extpath, $name);
        }
    }

    protected function saveExtension($extension, $extpath, $name)
    {
        $pathBase = $this->params[static::PATHTARGET];

        if (!file_exists("$pathBase/$extpath")) {
            mkdir("$pathBase/$extpath", 0775, true);
        }

        foreach ($extension as $index => $ext) {
            $extension[$index] = $this->removeTrashFromCode($ext);
        }


        array_unshift($extension, '// auto-generated');
        array_unshift($extension, '<?php');

        file_put_contents("$pathBase/$extpath/$name", implode(PHP_EOL, array_filter($extension)));
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function isPass(string $file): bool
    {
        $result = true;
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
