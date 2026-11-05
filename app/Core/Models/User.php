<?php

declare(strict_types=1);

namespace App\Core\Models;

use Neutrino\Foundation\Auth\User as AuthUser;
use Neutrino\Model\Attribute\Column;
use Neutrino\Model\Attribute\Primary;
use Neutrino\Model\Attribute\Timestamps;
use Phalcon\Db\Column as Type;

/**
 * A user who can log in (see config/auth.php).
 */
#[Timestamps(format: 'Y-m-d H:i:s')]
class User extends AuthUser
{
    #[Primary]
    public ?int $id = null;

    #[Column(Type::TYPE_VARCHAR)]
    public ?string $name = null;

    #[Column(Type::TYPE_VARCHAR)]
    public ?string $email = null;

    #[Column(Type::TYPE_VARCHAR)]
    public ?string $password = null;

    #[Column(Type::TYPE_VARCHAR, nullable: true)]
    public ?string $remember_token = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    public function initialize(): void
    {
        parent::initialize();

        $this->setSource('users');
    }
}
