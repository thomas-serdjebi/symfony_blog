<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Model\TimestampedInterface;

class AdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setEntityUpdatedAt']
        ] ;
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event): void
    { 
        $entity = $event->getEntityInstance();

        if(!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setCreatedAt(new \Datetime('now')) ;
    }

    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event): void
    { 
        $entity = $event->getEntityInstance();

        if(!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setUpdatedAt(new \Datetime('now')) ;
    }

}