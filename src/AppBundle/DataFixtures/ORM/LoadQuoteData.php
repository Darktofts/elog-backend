<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Quote;

/**
 * Class LoadQuoteData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadQuoteData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $quoteDescriptions = [
            'Carpet deep clean',
            'New carpet in reception',
            'New entrance doors',
            'Fixing toilet leak',
            'New parts required for boiler',
            'New office equipment',
        ];

        foreach ($quoteDescriptions as $quoteDescription) {
            $quote = new Quote();
            $quote->setDescription($quoteDescription);

            $manager->persist($quote);
        }

        $manager->flush();
    }
}