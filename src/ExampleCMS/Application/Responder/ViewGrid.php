<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewGrid extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['grid'] = $this->responder('grid', $this->metadata['grid'])->execute($context);

        return $data;
    }

}
