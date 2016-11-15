<?php

namespace App\Models;

use Luxury\Support\Facades\Log;
use Phalcon\Db\Column;
use Phalcon\Mvc\Model;

/**
 * Class User
 *
 * @package Models
 */
class User extends \Luxury\Foundation\Auth\User
{
    use Viewable;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    public function initialize()
    {
        // Returns table name mapped in the model.
        $this->setSource("users");
    }

    protected static function describe()
    {
        static::primary('id', Column::TYPE_INTEGER);

        static::column('name', Column::TYPE_VARCHAR);
        static::column('email', Column::TYPE_VARCHAR);
        static::column('password', Column::TYPE_VARCHAR);
        static::column('remember_token', Column::TYPE_VARCHAR, true);
    }
}
