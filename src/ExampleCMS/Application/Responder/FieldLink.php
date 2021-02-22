<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class FieldLink extends Field
{

    protected $type = 'link';

    public function execute(Context $context)
    {
        $data = parent::execute($context);

        $data['label'] = $this->metadata['label'] ?? 'undefined';
        $data['route'] = $this->metadata['route'] ?? '';

        return $data;
    }

}
