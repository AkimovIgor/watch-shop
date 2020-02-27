<?php


namespace App\Models;


use FW\App;
use PHPMailer\PHPMailer\PHPMailer;
use RedBeanPHP\R;

class ContactUs extends BaseModel
{
    public $attributes = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'subject' => '',
        'message' => ''
    ];

    public $rules = [
        'required' => [
            ['name'],
            ['email'],
            ['phone'],
            ['subject'],
            ['message'],
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['name', 3],
            ['subject', 8],
            ['message', 200]
        ],
        'lengthMax' => [
            ['subject', 100],
            ['message', 5000]
        ]
    ];

    /**
     * Отправить сообщение администрации
     *
     * @param $data Данные сообщения
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send($data)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = App::$app->getProperty('smtp_host');
        $mail->SMTPAuth = true;
        $mail->Username = App::$app->getProperty('smtp_login');
        $mail->Password = App::$app->getProperty('smtp_password');
        $mail->SMTPSecure = App::$app->getProperty('smtp_protocol');
        $mail->Port = App::$app->getProperty('smtp_port');

        $mail->setFrom(App::$app->getProperty('smtp_login'), $data['name']); // от кого (email и имя)
        $mail->addAddress(App::$app->getProperty('admin_email'));  // кому (email и имя)
        $mail->Subject = $data['subject'];
        $mail->Body = $data['message'];
        $mail->AltBody = $data['message'];

        if ($mail->send()) {
            $_SESSION['success'] = 'Ваше письмо было успешно отправлено администрации сайта.';
        } else {
            throw new \Exception('Ошибка отправки письма', 500);
        }


    }

    /**
     * Проверить, существует ли пользователь с таким email
     *
     * @return bool
     */
    public function checkUnique()
    {
        $user = R::findOne('users', 'email = ?', [$this->attributes['email']]);
        $currUser = isset($_COOKIE['user']) ? $_COOKIE['user'] : isset($_SESSION['user']) ? $_SESSION['user'] : null;
        if ($user && !$currUser) {
            if ($user->email == $this->attributes['email']) {
                $this->errors['email'][] = 'Пользователь с таким email уже зарегистрирован';
            }
            return false;
        }
        return true;
    }
}