<?php

use Doctrine\Persistence\ObjectRepository;
use Rad\Context;

function service($id): object {
    return Context::service($id);
}

function entity(string $entityName): ObjectRepository {
    return Context::entity($entityName);
}
