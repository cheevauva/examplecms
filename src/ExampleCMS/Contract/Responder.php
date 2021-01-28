<?php

namespace ExampleCMS\Contract;

use ExampleCMS\Contract\Context;

interface Responder
{

    /**
     * @param Context $context
     * @return array
     */
    public function execute(Context $context);
}
