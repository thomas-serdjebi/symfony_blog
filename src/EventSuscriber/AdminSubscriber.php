<?php

namespace App\EventSubscriberInterface;

//On utilise l'implémentation de l'interface EventSubscriberInterface

class AdminSubscriber implements EventSubscriberInterface {

    //Retour d'un tableau contenant les évènements auxquels on va s'abonner 
    //avec les fonctions à exécuter avant la création d'une entité article, catégorie etc..
    public static function getSubscribedEvents(): array{      
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setEntityUpdatedAt']
        ];
    }

    //Permet de set le champ createdAt sur les entités
    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event): void {
        $entity = $event->getEntityInstance();

        //Si l'entité n'est pas une implémentation de l'interface timestamped alors on arrête là
        if(!$entity instanceof TimestampedInterface) {
            return ;
        } 
    
        $entity->setCreatedAt("2022-06-11 00:00:00");
        
    }

    //Permet de set le champ updatedAt sur les entités
    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event): void {
        $entity = $event->getEntityInstance();

        //Si l'entité n'est pas une implémentation de l'interface timestamped alors on arrête là
        if(!$entity instanceof TimestampedInterface) {
            return ;
        } 
        
        $entity->setUpdatedAt(new \Datetime('now'));
        
    }
}

?>