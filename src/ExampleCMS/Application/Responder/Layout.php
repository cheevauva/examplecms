<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class Layout extends \ExampleCMS\Responder
{

    /**
     * @var string
     */
    protected $templateType = 'layouts';

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['basePath'] = $context->getAttribute('basePath', null);

        $views = $this->metadata['views'] ?? [];

        if ($context->hasAttribute('views')) {
            foreach ($context->getAttribute('views', []) as $name => $view) {
                $views[$name] = $view;
            }
        }

        foreach ($views as $name => $view) {
            $data['views'][$name] = $this->responder('view', $view)->execute($context);
        }

        return $data;
    }

}
