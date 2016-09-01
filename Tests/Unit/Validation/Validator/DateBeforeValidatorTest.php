<?php
namespace IchHabRecht\ExtTesting\Tests\Unit\Validation\Validator;

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

use IchHabRecht\ExtTesting\Validation\Validator\DateBeforeValidator;
use TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Test case for \IchHabRecht\ExtTesting\Validation\Validator\DateBeforeValidator
 */
class DateBeforeValidatorTest extends UnitTestCase
{
    /**
     * @test
     */
    public function validateAcceptsDateFromLastYear()
    {
        $validator = new DateBeforeValidator();
        $dateTime = new \DateTime('2015-09-02');

        $result = $validator->validate($dateTime);

        $this->assertEmpty($result->getErrors());
    }

    /**
     * @test
     */
    public function validateDeniesDateInTheFuture()
    {
        $validator = new DateBeforeValidator();
        $dateTime = new \DateTime(date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y') + 1)));

        $result = $validator->validate($dateTime);

        $this->assertNotEmpty($result->getErrors());
    }
}
