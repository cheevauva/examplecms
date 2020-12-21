<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Theme;

class Basic implements \ExampleCMS\Contract\Responder\Theme
{

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Asset
     */
    public $asset;

    /**
     * @var array
     */
    protected $parts;

    /**
     * @var array
     */
    protected $paths = array(
        'css' => array(),
        'js' => array(),
    );
    protected $module;

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function setTheme($theme)
    {
        $this->theme = $this->metadata->get(array(
            'themes',
            (string) $this->module,
            $theme
        ));

        $this->languages = $this->metadata->get(array(
            'languages',
            (string) $this->module,
            'ru_RU' // Временно захардкодил
        ));
    }

    protected function tryFetch($type, array $fields)
    {
        $data = null;

        foreach ($fields as $field) {
            if (!empty($this->theme[$type][$field])) {
                return $this->theme[$type][$field];
            }
        }

        return $data;
    }

    protected function createFunctionForFile($filename)
    {
        $code = implode(PHP_EOL, array(
            'return function ($theme, $data) {',
            'ob_start();',
            'extract($data);',
            '?>',
            file_get_contents($filename),
            '<?php',
            'return ob_get_clean();',
            '};?>',
        ));

        return eval($code);
    }

    public function make(array $data)
    {
        $templatePath = $data['templatePath'];
        $templatePathString = implode('.', $templatePath);

        $data['_'] = $this->languages;

        if (!empty($this->parts[$templatePathString])) {
            return $this->parts[$templatePathString]($this, $data);
        }

        $defaulTemplatePath = $templatePath;

        array_shift($defaulTemplatePath);
        array_unshift($defaulTemplatePath, 'default');

        $defaulTemplatePathString = implode('.', $defaulTemplatePath);

        $location = $this->tryFetch('paths', array(
            $templatePathString,
            $defaulTemplatePathString
        ));

        if (empty($location)) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('undefinedTemplate %s', $defaulTemplatePathString));
        }

        $this->parts[$templatePathString] = $this->createFunctionForFile($location);

        $assets = $this->tryFetch('assets', array(
            $templatePathString,
            $defaulTemplatePathString
        ));

        if (!empty($assets)) {
            $this->addAssets($assets);
        }

        return $this->sanitizeHtml($this->make($data));
    }

    public function getAssets()
    {
        return $this->paths;
    }

    protected function sanitizeHtml($html)
    {
        return $html;
        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s'
        );

        $replace = array(
            '>',
            '<',
            '\\1'
        );

        return preg_replace($search, $replace, $html);
    }

    protected function addAssets(array $assets)
    {
        foreach ($assets as $id => $path) {
            list ($type, $pathName) = explode('.', $id);
            $this->paths[$type][$pathName] = $path;
        }
    }

}
