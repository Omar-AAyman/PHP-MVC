<?php

declare(strict_types=1);

namespace app\Controllers;

use app\core\App;
use app\models\User;
use app\core\Request;
use app\core\Controller;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $user = new User;

    if ($request->isPost()) {
      $user->loadData($request->getBody());
    };
    $this->setLayout('auth');
    return $this->render('login');
  }
  public function register(Request $request)
  {
    $user = new User;

    if ($request->isPost()) {
      $user->loadData($request->getBody());

      //   // If validation and register done successfully return Success Message 
      if ($user->validate() && $user->store()) {
        App::$app->response->redirect('/login');
        return "Success";
      }

      return $this->render(
        'register',
        [
          'model' => $user
        ]
      );
    }

    $this->setLayout('auth');
    return $this->render(
      'register',
      [
        'model' => $user
      ]
    );
  }
}
