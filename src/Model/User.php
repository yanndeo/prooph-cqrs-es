<?php
declare(strict_types=1);

namespace App\Model;
use App\Model\Event\EmailChanged;
use App\Model\Event\UserRegistered;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class User extends AggregateRoot
{
    private $id, $email, $password;
    public function changeEmail(string $newEmail): void 
    {
        if ($this->email === $newEmail) {
            return;
        }

        $this->recordThat(EmailChanged::occur($this->id, [
            'email' => $newEmail
        ]));
    }

    public static function registerWithData(string $id, string $email, string $password): self
    {
        $obj = new self;
        $obj->recordThat(UserRegistered::occur($id, [
            'email' => $email,
            'password' => $password
        ])); 

        return $obj;
    }


    protected function aggregateId(): string
    {
        return $this->id;
    }

    /**
     * Apply given event
     */
    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case UserRegistered::class:
                $this->id = $event->aggregateId();
                $this->email = $event->email();
                $this->password = $event->password();
                break;
            case EmailChanged::class:
                # code...
                $this->id = $event->aggregateId();
                $this->email = $event->email();
                break;
        }
    }
}
