<?php

namespace App\DataFixtures;

use App\Entity\Notice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class NoticeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $Notice = new Notice();
            $Notice->setTitleNotice("Annonce n°$i")
                ->setPriceNotice(99)
                ->setDescriptionNotice("Description n°$i")
                ->setLocationNotice("Lieu n°$i")
                ->setPhotoOneNotice("http://placehold.it/100x75")
                ->setPhotoTwoNotice("http://placehold.it/100x75")
                ->setPhotoThreeNotice("http://placehold.it/100x75")
                ->setDateNotice(new \DateTime())
                ->setCategoryProfessionnalNotice(1);

            $manager->persist($Notice);
        }

        $manager->flush();
    }
}
