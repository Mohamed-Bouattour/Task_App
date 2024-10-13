<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;


class ProgresPolicy             
{
    /*
    public function canIndex(IdentityInterface $user)
    {
        return true;
    }*/
    
    /*
    public function canView(IdentityInterface $user)
    {
        return true;
        
    }*/

    public function canAdd(IdentityInterface $user)
    {
        if($user->role == 'admin'|| $user->role == 'employee')
            return true;
        
        return false;
    }

    public function canEdit(IdentityInterface $user)
    {
        if($user->role == 'admin'|| $user->role == 'employee')
            return true;
        
        return false;
    }
    

    public function canDelete(IdentityInterface $user)
    {
        return $user->role == 'admin';
    }
}
