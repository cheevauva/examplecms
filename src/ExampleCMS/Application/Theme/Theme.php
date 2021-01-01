<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Theme;

class Theme implements \ExampleCMS\Contract\Responder\Theme
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
    protected $language = 'en_US';
    protected $languages = [];
    protected $options = [];
    protected $theme = [];

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
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

    public function make($data)
    {
        if (!is_array($data)) {
            echo '<pre>';
            print_r($data);
            die;
        }

        $templatePath = $data['templatePath'];
        $templatePathString = implode('.', $templatePath);

        $data['_'] = $this->getByData('languages', $data);

        if (!empty($this->parts[$templatePathString])) {
            return $this->parts[$templatePathString]($this, $data);
        }

        $templates = $this->getByData('templates', $data);
        $assets = $this->getByData('assets', $data);

        if (empty($templates[$templatePathString])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('template "%s" is not define in "%s" theme', $templatePathString, $this->options['name']));
        } else {
            $this->parts[$templatePathString] = $this->createFunctionForFile($templates[$templatePathString]);
        }

        if (!empty($assets[$templatePathString])) {
            $this->addAssets($assets[$templatePathString]);
        }

        return $this->make($data);
    }

    protected function getByData($var, $data)
    {
        $module = $data['module'];
        $theme = $this->options['name'];

        if (empty($this->theme[$theme][$module])) {
            $this->theme[$theme][$module]['templates'] = $this->metadata->get([
                'theme_templates',
                $theme,
                $module,
            ]);
            $this->theme[$theme][$module]['assets'] = $this->metadata->get([
                'theme_assets',
                $theme,
                $module,
            ]);
            $this->theme[$theme][$module]['languages'] = $this->metadata->get(array(
                'languages',
                $this->language,
                $module,
            ));
        }

        return $this->theme[$theme][$module][$var];
    }

    public function getAssets()
    {
        return $this->paths;
    }

    protected function addAssets(array $assets)
    {
        foreach ($assets as $id => $path) {
            list ($type, $pathName) = explode('.', $id);
            $this->paths[$type][$pathName] = $path;
        }
    }

}
