<?php

namespace App\Model;

//Interface qui sera implementée dans toutes les entités ayant les champs updatedAt et createdAt
interface TimestampedInterface {

    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createdAt);

    public function getUpdatedAt(): ?\DateTimeInterface;

    public function setUpdatedAt(?\DateTimeInterface $updatedAt);

}


?>