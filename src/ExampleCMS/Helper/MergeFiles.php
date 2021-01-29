<?php

namespace ExampleCMS\Helper;

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
    const PRESET_MARK = '// @preset ';
    const PRESETVAR = '@presetvar';

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

        $path = $this->params[static::PATH];
        $modules = $this->params[static::MODULES];

        $paths = [];

        if ($this->params[static::LEVEL] !== 'application') {
            foreach ($modules as $module) {
                $paths[] = "modules/$module/$path";
            }
        }

        if ($this->params[static::LEVEL] !== 'module') {
            $paths[] = "application/$path";
        }

        foreach ($paths as $path) {
            $extensions = $this->prepareExtensions($path);

            foreach ($extensions as $index => $extension) {
                if (strpos($extension, static::PRESET_MARK) !== false) {
                    $presets = $this->getPresetsByPathAndExtension($path, $extension);
                    $extensions[$index] = strtr($extension, $presets);
                }
            }

            $this->saveExtension($extensions, $path);
        }
    }

    protected function getPresetsByPathAndExtension($path, $extension)
    {
        $result = [];
        $basePaths = array_values($this->params[static::PATHBASE]);

        $presets = array_filter(explode("\n", $extension), function ($line) {
            return strpos($line, static::PRESET_MARK) !== false;
        });

        foreach ($presets as $preset) {
            $presetCommandLine = explode(' ', str_replace(static::PRESET_MARK, '', trim($preset)));
            $presetBasename = reset($presetCommandLine);
            $presetFilename = $presetBasename;
            $presetVars = [];

            if (strpos($presetBasename, '/') === false) {
                $presetFilename = $path . '/' . $presetBasename;
            }

            $presetExtensions = [];

            foreach ($basePaths as $basePath) {
                $file = $basePath . '/presets/' . $presetFilename;

                if (!is_file($file)) {
                    continue;
                }

                $code = file_get_contents($file);
                $presetExtensions[] = $this->removeTrashFromCode($code);
            }

            foreach ($presetCommandLine as $index => $value) {
                $presetVars[static::PRESETVAR . $index] = $value;
            }

            $result[$preset] = strtr(implode(PHP_EOL, $presetExtensions), $presetVars);
        }

        return $result;
    }

    protected function prepareExtensions($extpath)
    {
        $basePaths = array_values($this->params[static::PATHBASE]);
        $extensions = [];

        foreach ($basePaths as $basePath) {
            foreach (glob($basePath . '/' . $extpath . '/*') as $file) {
                if ($this->isPass($file) && is_file($file)) {
                    $extensions[] = file_get_contents($file);
                }
            }
        }
        return $extensions;
    }

    protected function saveExtension($extension, $extpath)
    {
        $name = $this->params[static::NAME];
        $targetPath = $this->params[static::PATHTARGET];

        if (empty($name)) {
            $dir = dirname("$targetPath/$extpath");
        } else {
            $dir = dirname("$targetPath/$extpath/$name");
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
            file_put_contents("$targetPath/$extpath.php", implode(PHP_EOL, array_filter($extension)));
        } else {
            file_put_contents("$targetPath/$extpath/$name.php", implode(PHP_EOL, array_filter($extension)));
        }
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function isPass(string $file): bool
    {
        $fileParts = explode('.', basename($file));

        $result = true;
        $result &= empty($this->params[static::FILTER]) || $this->params[static::FILTER] === $fileParts[0];
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
