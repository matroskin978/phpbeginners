<?php

$title = "My Blog :: Register";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /** @var \myfrm\Db $db */
    $db = \myfrm\App::get(\myfrm\Db::class);
    $data = load(['name', 'email', 'password']);

//    dump($_POST);
//    dump($_FILES);

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
        $data['avatar'] = $_FILES['avatar'];
    } else {
        $data['avatar'] = [];
    }

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
        'avatar' => [
            'required' => true,
            'ext' => 'jpg|png',
            'size' => 1_048_576,
        ],
    ]);

    dd($validation->getErrors());

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
