<?php

namespace app\models;
use app\models\Staff;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public static $users;

    public static function initialize()
    {
        // Load user data from the Staff table
        
        $users = [];
        $staffData = Staff::find()->all();

        // Replace existing data in the static variable $users with new data from the Staff table
        foreach ($staffData as $staff) {
            self::$users[$staff->id] = [
                'id' => $staff->id,
                'username' => $staff->username,
                'password' => $staff->password,
                'authKey' => $staff->authKey,
                'accessToken' => $staff->accessToken,
            ];
        }
    }
 
    public static function findIdentity($id)
    {
        self::initialize();
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        self::initialize();
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds a user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        self::initialize();
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates the password
     *
     * @param string $password password to validate
     * @return bool if the provided password is valid for the current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function users()
    {
        return $this->users;
    }
}