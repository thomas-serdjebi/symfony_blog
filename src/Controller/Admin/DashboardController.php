<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud; //A ajouter pour générer les pages de CRUD
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator; //Ajouter car redirection vers une autre page du backend
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article; // à ajouter pour faire référence au namespace de la classe article
use App\Entity\Category; // à ajouter pour faire référence au namespace de la classe catégories
use App\Entity\Comment; // à ajouter pour faire référence au namespace de la classe catégories

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator 

    ){ //doit rester vide mais nécessaire au construct

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ArticleCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Blog With Symfony');
    }

    //Permet de configurer les menus
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retourner sur le site sur le site', 'fa fa-undo', 'app_home');
        yield MenuItem::subMenu('Articles', 'fas fa-newspaper')->setSubItems([
            MenuItem::linktoCrud('Tous les Articles', 'fas fa-newspaper', Article::class),
            MenuItem::linktoCrud('Ajouter', 'fas fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linktoCrud('Catégories', 'fas fa-list', Category::class)

        ]);

        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment', Comment::class);
    }
}
