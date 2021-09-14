<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{

    private $passwordEncoder;

    const USER = 'user-1';

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();

        $user->setPassword($this->passwordEncoder->hashPassword(
            $user,
            'admin'
        ))
            ->setEmail('flavien@mail.com')
            ->setPrenom('flavien')
            ->setNom('wils')
            ->setDateDeNaissance(new \DateTime('2021-09-12'))
            ->setRoles(['ROLE_ADMIN'])
            // ->setImageName('ROLE_ADMIN')
            ->setCreatedAt(new \DateTime());
        $manager->persist($user);

        $manager->flush();

        // $this->addReference(self::USER, $user);
    }
}
