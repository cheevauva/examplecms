<?php

namespace ExampleCMS\Factory;

class Action extends Component implements \ExampleCMS\Contract\Factory\Action
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        $metadata = [];

        if (!is_string($id)) {
            $metadata = $id;
            $id = $metadata['component'];
        }

        /* @var $action \ExampleCMS\Contract\Application\Action */
        $action = parent::get('actions.' . $id, $module);
        $action->setMetadata($metadata);
        $action->setModule($module);

        return $action;
    }

}
