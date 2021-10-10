<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\AssetDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentDataController extends AbstractController
{
    /**
     * @Route("/admin/empty", name="empty_data")
     */
    public function emptyData(AdminContext $adminContext): Response
    {
        $adminContext->getAssets()->addCssAsset(new AssetDto('/dashboard/css/empty-data.css'));

        return $this->render('dashboard/empty.html.twig', [
        ]);
    }
}
