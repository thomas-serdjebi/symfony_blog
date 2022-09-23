<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

   
    
    public function configureFields(string $pageName): iterable
    {
        $datetime = new \Datetime('now');
        yield TextField::new('title');
        yield SlugField::new('slug')->setTargetFieldName('title'); //targetFieldName permet de se référencer au champ title puisque le slug reprend le title
        yield TextEditorField::new('content');
        yield TextEditorField::new('featuredText');
        yield AssociationField::new('categories');
        yield DateTimeField::new('createdAt')->hideOnForm();
        yield DateTimeField::new('updatedAt')->hideOnForm();
    }
    
}
