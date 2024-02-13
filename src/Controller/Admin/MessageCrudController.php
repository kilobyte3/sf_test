<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Message;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * message crud controller
 */
class MessageCrudController extends AbstractCrudController
{
    /**
     * get entity fqcn
     */
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }
}
