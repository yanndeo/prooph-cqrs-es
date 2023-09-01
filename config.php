<?php 

namespace {
use Prooph\Common\Messaging\FQCNMessageFactory;
use Prooph\EventStore\Pdo\MySqlEventStore;
use Prooph\EventStore\Pdo\PersistenceStrategy\MySqlAggregateStreamStrategy;


include "./vendor/autoload.php";

    $pdo = new PDO('mysql:dbname=prooph;host=localhost', 'root', '');
    $eventStore = new MySqlEventStore(new FQCNMessageFactory(), $pdo, new MySqlAggregateStreamStrategy());
}