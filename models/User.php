<?php

namespace app\models;

use http\Message;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $username
 * @property string $surname
 * @property string $firstname
 * @property string $password
 *
 * @property Car[] $cars
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
                return User::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'surname', 'firstname', 'password'], 'required'],
            [['username', 'surname', 'firstname', 'password'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 20, 'min' => 4],
            [['username', 'password'], 'match', 'pattern' => '/^[a-zA, 0-9]+$/', 'message' => ' Вы можете использовать толкьо латиницу и цифры'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'surname' => 'Surname',
            'firstname' => 'Firstname',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['username' => 'username']);
    }
}
