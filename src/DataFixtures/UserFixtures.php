<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
        {
            $User = new User();
            $User->setFirstNameUser("Jean Claude")
                ->setLastNameUser("Van Damme")
                ->setEmail("BeAware@aware.all")
                ->setPassword("JCVD")
                ->setPhotoUser("http://placehold.it/50x75")
                ->setBirthdayDateUser(new \DateTime())
                ->setPhoneUser("12 35 67 89 00")
                ->setAdressUser("Dojo Van Damme")
                ->setPostalCodeUser("90001 (CA)")
                ->setCityUser("Los Angeles")
                ->setCivilityUser(1)
                ->setRegistrationDateUser(new \DateTime())
                ->setPseudoUser("JCVD")
                ->setRoles(["ROLE_USER", "ROLE_ADMIN"]);

            $manager->persist($User);

        $manager->flush();
    }
}
