<?php

namespace MapArray;

/**
 * Class Mapper
 * @package MapArray
 */
class Mapper
{

    /**
     * @var
     */
    protected $map;
    /**
     * @var
     */
    protected $data;

    /**
     * @param array $map
     */
    public function addMap(array $map)
    {
        $this->map = $map;
    }

    /**
     * @return mixed
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param array $data
     */
    public function addData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getHeaderIndex()
    {
        $header = $this->data[0];
        $output = [];
        foreach ($header as $key => $value) {
            $output[$key] = $this->map[trim($value)];
        }
        return $output;
    }

    /**
     * @return array
     */
    public function getOrganizedData()
    {

        $count = count($this->data);

        $output = [];

        for ($i = 1; $i < $count; $i++) {
            $output[] = $this->organizeSingleRow($this->data[$i]);
        }

        return $output;
    }

    /**
     * @param array $data
     * @return array
     */
    private function organizeSingleRow(array $data)
    {
        $headerIndex = $this->getHeaderIndex();
        $output = [];
        foreach ($data as $key => $value) {
            $output[$headerIndex[$key]] = $value;
        }
        return $output;
    }
}
