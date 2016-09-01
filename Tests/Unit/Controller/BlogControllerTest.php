<?php
namespace IchHabRecht\ExtTesting\Tests\Unit\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Nicole Cordes <typo3@cordes.co>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use IchHabRecht\ExtTesting\Controller\BlogController;
use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Extbase\Service\EnvironmentService;
use TYPO3\CMS\Fluid\View\TemplateView;

/**
 * Test case for \IchHabRecht\ExtTesting\Controller\BlogController
 */
class BlogControllerTest extends UnitTestCase
{
    /**
     * @test
     */
    public function listActionCallsEnvironmentService()
    {
        $environmentServiceMock = $this->getMockBuilder(EnvironmentService::class)->getMock();
        $environmentServiceMock->expects($this->once())->method('isEnvironmentInBackendMode')->willReturn(true);

        $viewMock = $this->getMockBuilder(TemplateView::class)->disableOriginalConstructor()->getMock();

        $blogController = new BlogController($environmentServiceMock);
        $this->inject($blogController, 'view', $viewMock);

        $blogController->listAction();
    }
}
