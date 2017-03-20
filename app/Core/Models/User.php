<?php

namespace App\Core\Models;

use Phalcon\Db\Column;

/**
 * Class User
 *
 * @package Models
 */
class User extends \Neutrino\Foundation\Auth\User
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

    /**
     * @var string
     */
    public $remember_token;

    /**
     * Initializes metaDatas & columnsMap if they are not.
     */
    public function initialize()
    {
        parent::initialize();

        $this->setSource("users");

        $this->primary('id', Column::TYPE_INTEGER);

        $this->column('name', Column::TYPE_VARCHAR);
        $this->column('email', Column::TYPE_VARCHAR);
        $this->column('password', Column::TYPE_VARCHAR);
        $this->column('remember_token', Column::TYPE_VARCHAR, [
            'nullable' => true
        ]);
    }
}
