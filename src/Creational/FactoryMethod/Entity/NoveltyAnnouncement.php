<?php

namespace App\Creational\FactoryMethod\Entity;

class NoveltyAnnouncement extends CommonAnnouncement
{
    public function createAnnouncement(): Announcement
    {
        return new Novelty();
    }
}