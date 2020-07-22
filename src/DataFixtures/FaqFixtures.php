<?php

namespace App\DataFixtures;

use App\Entity\Faq;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FaqFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $Faq = new Faq();
            $Faq->setQuestion("Question n°$i")
                ->setAnswer("Réponse n°$i");

            $manager->persist($Faq);
        }

        $manager->flush();
    }
}
