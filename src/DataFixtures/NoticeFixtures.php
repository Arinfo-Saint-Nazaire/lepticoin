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
            $Notice->setTitleNotice("Title Notice n°$i")
                ->setPriceNotice(99)
                ->setDescriptionNotice("<p>Description Notice n°$i</p>")
                ->setLocationNotice("<p>Location Notice n°$i</p>")
                ->setPhotoOneNotice("http://placehold.it/350x150")
                ->setPhotoTwoNotice("http://placehold.it/350x150")
                ->setPhotoThreeNotice("http://placehold.it/350x150")
                ->setDateNotice(new \DateTime())
                ->setCategoryProfessionnalNotice(1);

            $manager->persist($Notice);
        }

        $manager->flush();
    }
}
