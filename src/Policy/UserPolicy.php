<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;


class UserPolicy             
{
    /*
    public function canIndex(IdentityInterface $user)
    {
        return true;
    }*/

    public function canView(IdentityInterface $user, User $subject)
    {
        return true;
        
    }

    public function canAdd(IdentityInterface $user)
    {
        return $user->role == 'admin';
    }

    public function canEdit(IdentityInterface $user, User $subject)
    {
        if ($user->role == 'admin') {
            return true;
        }
    }
    

    public function canDelete(IdentityInterface $user, User $subject)
    {
        return $user->role == 'admin';
    }
}
