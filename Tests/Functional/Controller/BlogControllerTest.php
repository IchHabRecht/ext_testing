<?php
namespace IchHabRecht\ExtTesting\Tests\Functional\Controller;

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
use IchHabRecht\ExtTesting\Domain\Model\Blog;
use IchHabRecht\ExtTesting\Domain\Repository\BlogRepository;
use TYPO3\CMS\Core\Tests\FunctionalTestCase;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Service\EnvironmentService;

/**
 * Test case for \IchHabRecht\ExtTesting\Controller\BlogController
 */
class BlogControllerTest extends FunctionalTestCase
{
    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/ext_testing',
    ];

    protected function setUp()
    {
        parent::setUp();

        $this->importDataSet(ORIGINAL_ROOT . 'typo3/sysext/core/Tests/Functional/Fixtures/pages.xml');
    }

    /**
     * @test
     */
    public function createActionSavesBlogInDatabase()
    {
        $blog = new Blog();
        $blog->setTitle('Functional test blog');
        $blog->setDescription('This blog was saved by BlogController::createAction');

        $environmentService = new EnvironmentService();
        $objectManager = new ObjectManager();
        $blogController = $this->getMockBuilder(BlogController::class)
            ->setMethods(
                [
                    'addFlashMessage',
                    'redirect',
                ]
            )
            ->setConstructorArgs(
                [
                    'environmentService' => $environmentService,
                ]
            )
            ->getMock();
        $blogController->expects($this->once())
            ->method('redirect')
            ->willReturnCallback(
                [
                    $objectManager->get(PersistenceManager::class),
                    'persistAll',
                ]
            );

        $blogRepository = $objectManager->get(BlogRepository::class);
        $this->inject($blogController, 'blogRepository', $blogRepository);

        $blogController->createAction($blog);

        $count = $this->getDatabaseConnection()->exec_SELECTcountRows(
            '*',
            'tx_exttesting_domain_model_blog',
            'title=' . $this->getDatabaseConnection()->fullQuoteStr('Functional test blog', 'tx_exttesting_domain_model_blog')
        );

        $this->assertSame(1, $count);
    }
}
