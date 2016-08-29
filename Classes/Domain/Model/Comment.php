<?php
namespace IchHabRecht\ExtTesting\Domain\Model;


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

/**
 * Comment
 */
class Comment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * content
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $content = '';
    
    /**
     * commentdate
     * 
     * @var \DateTime
     */
    protected $commentdate = null;
    
    /**
     * Returns the content
     * 
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Sets the content
     * 
     * @param string $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
     * Returns the commentdate
     * 
     * @return \DateTime $commentdate
     */
    public function getCommentdate()
    {
        return $this->commentdate;
    }
    
    /**
     * Sets the commentdate
     * 
     * @param \DateTime $commentdate
     * @return void
     */
    public function setCommentdate(\DateTime $commentdate)
    {
        $this->commentdate = $commentdate;
    }

}