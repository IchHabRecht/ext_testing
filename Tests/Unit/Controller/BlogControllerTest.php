<?php
namespace IchHabRecht\ExtTesting\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Nicole Cordes <typo3@cordes.co>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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

/**
 * Test case for class IchHabRecht\ExtTesting\Controller\BlogController.
 *
 * @author Nicole Cordes <typo3@cordes.co>
 */
class BlogControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \IchHabRecht\ExtTesting\Controller\BlogController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('IchHabRecht\\ExtTesting\\Controller\\BlogController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBlogsFromRepositoryAndAssignsThemToView()
	{

		$allBlogs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$blogRepository = $this->getMock('IchHabRecht\\ExtTesting\\Domain\\Repository\\BlogRepository', array('findAll'), array(), '', FALSE);
		$blogRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBlogs));
		$this->inject($this->subject, 'blogRepository', $blogRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('blogs', $allBlogs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenBlogToView()
	{
		$blog = new \IchHabRecht\ExtTesting\Domain\Model\Blog();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('blog', $blog);

		$this->subject->showAction($blog);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenBlogToBlogRepository()
	{
		$blog = new \IchHabRecht\ExtTesting\Domain\Model\Blog();

		$blogRepository = $this->getMock('IchHabRecht\\ExtTesting\\Domain\\Repository\\BlogRepository', array('add'), array(), '', FALSE);
		$blogRepository->expects($this->once())->method('add')->with($blog);
		$this->inject($this->subject, 'blogRepository', $blogRepository);

		$this->subject->createAction($blog);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenBlogToView()
	{
		$blog = new \IchHabRecht\ExtTesting\Domain\Model\Blog();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('blog', $blog);

		$this->subject->editAction($blog);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenBlogInBlogRepository()
	{
		$blog = new \IchHabRecht\ExtTesting\Domain\Model\Blog();

		$blogRepository = $this->getMock('IchHabRecht\\ExtTesting\\Domain\\Repository\\BlogRepository', array('update'), array(), '', FALSE);
		$blogRepository->expects($this->once())->method('update')->with($blog);
		$this->inject($this->subject, 'blogRepository', $blogRepository);

		$this->subject->updateAction($blog);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenBlogFromBlogRepository()
	{
		$blog = new \IchHabRecht\ExtTesting\Domain\Model\Blog();

		$blogRepository = $this->getMock('IchHabRecht\\ExtTesting\\Domain\\Repository\\BlogRepository', array('remove'), array(), '', FALSE);
		$blogRepository->expects($this->once())->method('remove')->with($blog);
		$this->inject($this->subject, 'blogRepository', $blogRepository);

		$this->subject->deleteAction($blog);
	}
}
