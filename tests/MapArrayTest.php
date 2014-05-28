<?php 

use MapArray\MapArray;

class MapArrayTest extends PHPUnit_Framework_TestCase {

    private $mapper, $map, $data, $mapped_data;

    public function setUp() {

        $this->mapper = new MapArray;

        $this->map = array('header1' => 'Header 1', 
                           'header2' => 'Header 2', 
                           'header3' => 'Header 3');

        $this->data = array(array('Header 1', 'Header 2', 'Header 3'),
                            array('1:test 1', '1:test 2', '3:test 3'),
                            array('2:test 1', '2:test 2', '3:test 3'),
                            array('3:test 1', '3:test 2', '3:test 3'),
                            array('4:test 1', '4:test 2', '4:test 3'),
                            array('5:test 1', '5:test 2', '5:test 3'),
                            array('6:test 1', '6:test 2', '6:test 3'));

        $this->mapped_data = array(array('header1' => '1:test 1', 'header2' => '1:test 2', 'header3' => '3:test 3'),
                                   array('header1' => '2:test 1', 'header2' => '2:test 2', 'header3' => '3:test 3'),
                                   array('header1' => '3:test 1', 'header2' => '3:test 2', 'header3' => '3:test 3'),
                                   array('header1' => '4:test 1', 'header2' => '4:test 2', 'header3' => '4:test 3'),
                                   array('header1' => '5:test 1', 'header2' => '5:test 2', 'header3' => '5:test 3'),
                                   array('header1' => '6:test 1', 'header2' => '6:test 2', 'header3' => '6:test 3'));


        $this->mapper->addMap($this->map);

        $this->mapper->addData($this->data);

        $this->mapper->mapData();

    }

    public function testGetData() {
        $result = $this->mapper->getData();
        $this->assertEquals($this->mapped_data, $result);
    }

}
