<?php

namespace App\DataFixtures;

use App\Entity\LegalNotice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LegalNoticeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $LegalNotice = new LegalNotice();
            $LegalNotice->setTitle("Titre n°$i")
                ->setContent("Contenu n°$i");

            $manager->persist($LegalNotice);
        }
        $manager->flush();
    }
}
