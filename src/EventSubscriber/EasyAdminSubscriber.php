<?php
declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * EasyAdminSubscriber
 */
readonly class EasyAdminSubscriber implements EventSubscriberInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    /**
     * constructor
     *
     * @param $passwordHasher - password hasher
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * get subscribed events
     */
    public static function getSubscribedEvents() : array
    {
        return [
            BeforeEntityPersistedEvent::class => ['beforePersist'],
            BeforeEntityUpdatedEvent::class => ['beforeUpdated']
        ];
    }

    /**
     * before persist
     *
     * @param $event - event
     */
    public function beforePersist(BeforeEntityPersistedEvent $event) : void
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Admin)
        {
            $entity->setRoles(['ROLE_ADMIN']);
            $this->encodePassword($entity);
        }
    }

    /**
     * before updated
     *
     * @param $event - event
     */
    public function beforeUpdated(BeforeEntityUpdatedEvent $event) : void
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Admin)
        {
            $this->encodePassword($entity);
        }
    }

    /**
     * encode password
     *
     * @param $entity - entity
     */
    private function encodePassword(Admin $entity) : void
    {
        if ($this->passwordHasher->needsRehash($entity))
        {
            $entity->setPassword($this->passwordHasher->hashPassword($entity, $entity->getPassword()));
        }
    }
}