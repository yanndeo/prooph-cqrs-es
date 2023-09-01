<?php 

namespace {
use Prooph\Common\Event\ProophActionEventEmitter;
use Prooph\Common\Messaging\FQCNMessageFactory;
use Prooph\EventStore\ActionEventEmitterEventStore;
use Prooph\EventStore\Pdo\MySqlEventStore;
use Prooph\EventStore\Pdo\PersistenceStrategy\MySqlAggregateStreamStrategy;
use Prooph\EventStoreBusBridge\EventPublisher;
use Prooph\ServiceBus\EventBus;


include "./vendor/autoload.php";

    $pdo = new PDO('mysql:dbname=prooph;host=localhost', 'root', '');
    $eventStore = new MySqlEventStore(
        new FQCNMessageFactory(),
        $pdo,
        new MySqlAggregateStreamStrategy());
    
    $eventEmitter = new ProophActionEventEmitter();
    $eventStore = new ActionEventEmitterEventStore($eventStore, $eventEmitter);

    $eventBus = new EventBus($eventEmitter);
    $eventPublisher = new EventPublisher($eventBus);
    $eventPublisher->attachToEventStore($eventStore);

    $pdoSnapshotStore = new $pdoSnapshotStore($pdo);
    $userRepository = new $userRepository($eve)

}