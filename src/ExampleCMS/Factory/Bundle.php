<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Bundle extends Factory
{

    /**
     * @var array
     */
    protected $bundles = [];

    public function get($bundle)
    {
        if (isset($this->bundles[$bundle])) {
            return $this->bundles[$bundle];
        }

        $bundleObject = $this->container->create('ExampleCMS\Bundle');
        $bundleObject->setBundle($bundle);

        $this->bundles[$bundle] = $bundleObject;

        return $bundleObject;
    }

}
