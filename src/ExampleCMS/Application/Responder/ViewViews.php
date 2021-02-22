<?php

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewViews extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['views'] = [];

        foreach ($this->metadata['views'] ?? [] as $view) {
            $data['views'][] = $this->responder('view', $view)->execute($context);
        }

        return $data;
    }

}
