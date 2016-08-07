<?php

namespace App\Models;

use Phalcon\Mvc\Model;

/**
 * Class User
 *
 * @package Models
 */
class User extends Model
{

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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }
}
