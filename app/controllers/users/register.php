<?php

$title = "My Blog :: Register";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /** @var \myfrm\Db $db */
    $db = \myfrm\App::get(\myfrm\Db::class);

    $fillable = ['name', 'email', 'password'];
    $data = load($fillable);

    $validator = new \myfrm\Validator();

    $validation = $validator->validate($data, [
        'name' => [
            'required' => true,
            'max' => 100,
        ],
        'email' => [
            'email' => true,
            'max' => 100,
            'unique' => 'users:email'
        ],
        'password' => [
            'required' => true,
            'min' => 6,
        ],
    ]);

    if (!$validation->hasErrors()) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($db->query("INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)", $data)) {
            $_SESSION['success'] = 'Вы успешно зарегистрировались';
        } else {
            $_SESSION['error'] = 'DB Error';
        }
        redirect(PATH);
    }

}

require_once VIEWS . '/users/register.tpl.php';
