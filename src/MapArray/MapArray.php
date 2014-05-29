<?php namespace MapArray;

class MapArray {

    private $map, $data, $positions;

    public function __construct($data = array()) {
        if(!empty($data))
            $this->addData($data);
    }

    public function addMap(array $map) {
        if(!empty($map))
            $this->map = $map;
        else
            throw new MapArrayException('$map should not be empty.');
    }

    public function addData(array $data) {
        if(!empty($data))
            $this->data = $data;
        else
            throw new MapArrayException('$data should not be empty.');
    }

    public function mapData() {
        $this->setPositions();
        $this->cleanData();
    }

    private function setPositions() {

        if(empty($this->data))
            throw new MapArrayException('$this->data should not be empty.');

        $header = array_shift($this->data);
        foreach($header as $k => $v) {
            $map_key = array_search($v, $this->map);
            if($map_key != false)
                $this->positions[$k] = $map_key;
        }

    }

    private function cleanData() {

        if(empty($this->data))
            throw new MapArrayException('$this->data should not be empty.');

        if(empty($this->positions))
            throw new MapArrayException('$this->positions should not be empty.');

        $data = array();
        foreach($this->data as $k => $v) {
            foreach($this->positions as $kk => $vv) {
                $data[$k][$vv] = $v[$kk];
            }
        }

        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

}
