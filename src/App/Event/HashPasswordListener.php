<?php

final class HashPasswordListener implements EventSubscriber
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->setPassword($args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->setPassword($args);
    }

    private function setPassword(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if(!$entity instanceof BaseUser || !$entity->getPlainPassword()) {
            return;
        }

        $entity->setPassword($this->encoder->encodePassword($entity, $entity->getPlainPassword()));
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }
}