<?php

namespace App\Models;

use Phalcon\Db\Column;

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
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $remember_token;

    /**
     * Describe the column of the model.
     *
     * Use the function "primary", "column" to describe them.
     *
     * @return void
     */
    protected function describe()
    {
        $this->setSource("users");

        $this->primary('id', Column::TYPE_INTEGER);

        $this->column('name', Column::TYPE_VARCHAR);
        $this->column('email', Column::TYPE_VARCHAR);
        $this->column('password', Column::TYPE_VARCHAR);
        $this->column('remember_token', Column::TYPE_VARCHAR, true);
    }
}
