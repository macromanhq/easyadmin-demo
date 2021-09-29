<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\EasyAdmin;

use App\Entity\Comment;
use App\Entity\FormFieldReference;
use App\Entity\Post;
use App\Entity\Tag;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/easyadmin", name="easyadmin")
     */
    public function index(): Response
    {
        return $this->render('dashboard/home.html.twig');

        // $adminUrlGenerator = $this->get(AdminUrlGenerator::class);

        // return $this->redirect($adminUrlGenerator->setController(PostCrudController::class)->generateUrl());
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            // ->addWebpackEncoreEntry('admin-app')
            ->addCssFile('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap')
            ->addCssFile('/dashboard/css/nav.css')
            ->addCssFile('/dashboard/css/sidebar.css')
            ->addCssFile('/dashboard/css/home.css')
        ;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Easyadmin Demo');
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            ->setSearchFields(null)
            ->setDateTimeFormat('medium', 'short');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getFullName())
            ->setMenuItems([
                MenuItem::linkToCrud('Blog Post ', 'fa fa-id-card', Post::class),
                MenuItem::linkToCrud('Tags', 'fa fa-user-cog', Tag::class),
                MenuItem::section(),
                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ])
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::subMenu('Sell', 'fa fa-store')->setSubItems([
            MenuItem::linkToRoute('Add Cart', 'fa fa-shopping-cart', 'cart_new'),
        ]);
        yield MenuItem::linkToCrud('Users', 'fa fa-users', User::class);
        yield MenuItem::subMenu('Blogging', 'fa fa-file')->setSubItems([
            MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text-o', Post::class),
            MenuItem::linkToCrud('Comments', 'far fa-comments', Comment::class),
            MenuItem::linkToCrud('Tags', 'fas fa-tags', Tag::class),
        ]);
        yield MenuItem::subMenu('Blogging', 'fa fa-file')->setSubItems([
            MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text-o', Post::class),
            MenuItem::linkToCrud('Comments', 'far fa-comments', Comment::class),
            MenuItem::linkToCrud('Tags', 'fas fa-tags', Tag::class),
        ]);
        yield MenuItem::subMenu('Blogging', 'fa fa-file')->setSubItems([
            MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text-o', Post::class),
            MenuItem::linkToCrud('Comments', 'far fa-comments', Comment::class),
            MenuItem::linkToCrud('Tags', 'fas fa-tags', Tag::class),
        ]);
        yield MenuItem::section('Resources');
        yield MenuItem::linkToUrl('EasyAdmin Docs', 'fas fa-book', 'https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html')->setLinkTarget('_blank');
        yield MenuItem::linkToCrud('Form Field Reference', 'far fa-file-code', FormFieldReference::class)->setAction(Action::NEW);

        yield MenuItem::section('Links');
        yield MenuItem::linkToUrl('Symfony Demo', 'fab fa-symfony', 'https://github.com/symfony/demo')->setLinkTarget('_blank');
        yield MenuItem::linkToUrl('EasyAdmin Demo', 'fas fa-magic', 'https://github.com/EasyCorp/easyadmin-demo')->setLinkTarget('_blank');
        yield MenuItem::linkToUrl('Sponsor EasyAdmin', 'fa fa-euro-sign', 'https://github.com/sponsors/javiereguiluz')->setLinkTarget('_blank');
    }
}
