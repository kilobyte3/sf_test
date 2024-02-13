<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * AdminCrudController
 */
class AdminCrudController extends AbstractCrudController
{
    /**
     * get entity fqcn
     */
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }
}
