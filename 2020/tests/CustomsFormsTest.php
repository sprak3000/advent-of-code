<?php

namespace adventofcode\Year2020\Test;

use Exception;
use adventofcode\Year2020\CustomsForms;
use PHPUnit\Framework\TestCase;

class CustomsFormsTest extends TestCase
{
    protected $customsForms;

    protected function setup(): void
    {
        $this->customsForms = new CustomsForms();
    }

    public function testImport()
    {
        // Day 6 sample input
        try {
            $forms = $this->customsForms->import(__DIR__ . '/../inputs/day-06-sample.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing sample customs forms file.');
        }

        $this->assertCount(5, $forms);
    }

    public function testImportException()
    {
        $this->expectException(Exception::class);
        $this->customsForms->import(__DIR__ . '/../inputs/not-a.file');
    }

    public function testAnyoneYesResponses()
    {
        // Day 6 sample inputs
        try {
            $forms = $this->customsForms->import(__DIR__ . '/../inputs/day-06-sample.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing sample customs forms file.');
        }

        $this->assertCount(5, $forms);

        $yesResponses = $this->customsForms->anyoneYesResponses($forms);
        $this->assertSame(11, $yesResponses);

        // Day 6 Part 1 input
        try {
            $forms = $this->customsForms->import(__DIR__ . '/../inputs/day-06.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing customs forms file.');
        }

        $yesResponses = $this->customsForms->anyoneYesResponses($forms);
        $this->assertSame(6680, $yesResponses);
    }

    public function testEveryoneYesResponses()
    {
        // Day 6 sample inputs
        try {
            $forms = $this->customsForms->import(__DIR__ . '/../inputs/day-06-sample.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing sample customs forms file.');
        }

        $this->assertCount(5, $forms);

        $yesResponses = $this->customsForms->everyoneYesResponses($forms);
        $this->assertSame(6, $yesResponses);

        // Day 6 Part 2 input
        try {
            $forms = $this->customsForms->import(__DIR__ . '/../inputs/day-06.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing customs forms file.');
        }

        $yesResponses = $this->customsForms->everyoneYesResponses($forms);
        $this->assertSame(3117, $yesResponses);
    }
}
