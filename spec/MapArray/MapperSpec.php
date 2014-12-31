<?php

namespace spec\MapArray;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MapArray\Mapper');
    }

    function it_accepts_an_array_to_which_the_data_will_be_organized_to()
    {
        $map = [
            'Header 1' => 'header1',
            'Header 2' => 'header2',
            'Header 3' => 'header3',
        ];
        $this->addMap($map);
        $this->getMap()->shouldReturn($map);
    }

    function it_accepts_an_array_of_data_to_organize()
    {
        $data = [
            ['Header 1', 'Header 2', 'Header 3'],
            ['1:test 1', '1:test 2', '1:test 3'],
            ['2:test 1', '2:test 2', '2:test 3'],
            ['3:test 1', '3:test 2', '3:test 3'],
            ['4:test 1', '4:test 2', '4:test 3'],
        ];
        $this->addData($data);
        $this->getData()->shouldReturn($data);
    }

    function it_indexes_the_current_header_to_an_array()
    {
        $map = [
            'Header 1' => 'header1',
            'Header 2' => 'header2',
            'Header 3' => 'header3',
        ];

        $data = [
            ['Header 1', 'Header 2', 'Header 3'],
            ['1:test 1', '1:test 2', '1:test 3'],
            ['2:test 1', '2:test 2', '2:test 3'],
            ['3:test 1', '3:test 2', '3:test 3'],
            ['4:test 1', '4:test 2', '4:test 3'],
        ];

        $this->addMap($map);
        $this->addData($data);

        $this->getHeaderIndex()->shouldReturn([
            0 => 'header1',
            1 => 'header2',
            2 => 'header3',
        ]);
    }

    function it_organizes_the_original_data_to_the_new_mapped_values()
    {
        $map = [
            'Header 1' => 'header1',
            'Header 2' => 'header2',
            'Header 3' => 'header3',
        ];

        $data = [
            ['Header 1', 'Header 2', 'Header 3'],
            ['1:test 1', '1:test 2', '1:test 3'],
            ['2:test 1', '2:test 2', '2:test 3'],
            ['3:test 1', '3:test 2', '3:test 3'],
            ['4:test 1', '4:test 2', '4:test 3'],
        ];

        $organizedData = [
            [
                'header1' => '1:test 1',
                'header2' => '1:test 2',
                'header3' => '1:test 3',
            ],
            [
                'header1' => '2:test 1',
                'header2' => '2:test 2',
                'header3' => '2:test 3',
            ],
            [
                'header1' => '3:test 1',
                'header2' => '3:test 2',
                'header3' => '3:test 3',
            ],
            [
                'header1' => '4:test 1',
                'header2' => '4:test 2',
                'header3' => '4:test 3',
            ],
        ];

        $this->addMap($map);
        $this->addData($data);

        $this->getOrganizedData()->shouldReturn($organizedData);
    }
}
