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
use TYPO3\CMS\Extbase\Validation\Error;

/**
 * Test case for \IchHabRecht\ExtTesting\Validation\Validator\DateBeforeValidator
 */
class DateBeforeValidatorTest extends UnitTestCase
{
    /**
     * @return array
     */
    public function validateAcceptsDateInThePastDataProvider()
    {
        return [
            'Date in the past without referenceDate' => [
                [],
                '2015-09-02',
            ],
            'Date in the past with referenceDate' => [
                [
                    'referenceDate' => 1472767200,
                ],
                '2015-09-02',
            ],
        ];
    }

    /**
     * @param array $options
     * @param string $dateTime
     *
     * @test
     * @dataProvider validateAcceptsDateInThePastDataProvider
     */
    public function validateAcceptsDateInThePast(array $options, $dateTime)
    {
        $validator = new DateBeforeValidator($options);
        $dateTime = new \DateTime($dateTime);

        $result = $validator->validate($dateTime);

        $this->assertEmpty($result->getErrors());
    }

    /**
     * @return array
     */
    public function validateDeniesInvalidDatesDataProvider()
    {
        return [
            'Date one year in the future without referenceDate' => [
                [],
                date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y') + 1)),
            ],
            'Date one year in the future with referenceDate' => [
                [
                    'referenceDate' => 1472767200,
                ],
                date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y') + 1)),
            ],
            'Now with referenceDate in the past' => [
                [
                    'referenceDate' => 1441144800,
                ],
                'now',
            ],
            'Empty date' => [
                [],
                '',
            ],
        ];
    }

    /**
     * @param array $options
     * @param string $dateTime
     *
     * @test
     * @dataProvider validateDeniesInvalidDatesDataProvider
     */
    public function validateDeniesInvalidDates(array $options, $dateTime)
    {
        $validator = new DateBeforeValidator($options);
        $dateTime = new \DateTime($dateTime);

        $result = $validator->validate($dateTime);

        $this->assertNotEmpty($result->getErrors());

        $errorCodes = array_map(function (Error $error) {
            return $error->getCode();
        }, $result->getErrors());

        $this->assertContains(1472749225, $errorCodes);
    }
}
