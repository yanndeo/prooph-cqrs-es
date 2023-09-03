<?php


namespace {

    use App\Model\Command\ChangeEmail;
    use App\Model\Command\RegisterUser;


    include "./config.php";


    $commandBus->dispatch(new RegisterUser([
        'id' => $userId,
        'email' => 'random@email.com',
        'password' => 'test'
    ]));

    for ($i = 0; $i < 8; $i++) {
        # code...
        $commandBus->dispatch(new ChangeEmail(
            [
                'id' => $userId,
                'email' => 'random' . $i . '@email.com',
            ]
        ));
    }
}
