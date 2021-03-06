<?php
namespace IchHabRecht\ExtTesting\Controller;


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

use TYPO3\CMS\Extbase\Service\EnvironmentService;

/**
 * BlogController
 */
class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * blogRepository
     * 
     * @var \IchHabRecht\ExtTesting\Domain\Repository\BlogRepository
     * @inject
     */
    protected $blogRepository = NULL;
    
    /**
     * @var EnvironmentService
     */
    protected $environmentService;

    /**
     * @param EnvironmentService $environmentService
     */
    public function __construct(EnvironmentService $environmentService)
    {
        parent::__construct();
        $this->environmentService = $environmentService;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        // Please do not remove this function
        if ($this->environmentService->isEnvironmentInBackendMode()) {
            $blogs = [];
        } else {
            $blogs = $this->blogRepository->findAll();
        }
        $this->view->assign('blogs', $blogs);
    }
    
    /**
     * action show
     * 
     * @param \IchHabRecht\ExtTesting\Domain\Model\Blog $blog
     * @return void
     */
    public function showAction(\IchHabRecht\ExtTesting\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog', $blog);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \IchHabRecht\ExtTesting\Domain\Model\Blog $newBlog
     * @return void
     */
    public function createAction(\IchHabRecht\ExtTesting\Domain\Model\Blog $newBlog)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->blogRepository->add($newBlog);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \IchHabRecht\ExtTesting\Domain\Model\Blog $blog
     * @ignorevalidation $blog
     * @return void
     */
    public function editAction(\IchHabRecht\ExtTesting\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog', $blog);
    }
    
    /**
     * action update
     * 
     * @param \IchHabRecht\ExtTesting\Domain\Model\Blog $blog
     * @return void
     */
    public function updateAction(\IchHabRecht\ExtTesting\Domain\Model\Blog $blog)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->blogRepository->update($blog);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \IchHabRecht\ExtTesting\Domain\Model\Blog $blog
     * @return void
     */
    public function deleteAction(\IchHabRecht\ExtTesting\Domain\Model\Blog $blog)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->blogRepository->remove($blog);
        $this->redirect('list');
    }

}