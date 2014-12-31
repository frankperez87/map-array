# Map Array
This class allows you to easily map the header of array and its data to a set of names you specify. 

### Example
```php
<?php

require 'vendor/autoload.php';

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

$mapper = new MapArray\Mapper;

$mapper->addMap($map);
$mapper->addData($data);

$output = $mapper->getOrganizedData();

print '<pre>';
print_r($output);
print '</pre>';
```
## Example Output
```
Array
(
    [0] => Array
        (
            [header1] => 1:test 1
            [header2] => 1:test 2
            [header3] => 1:test 3
        )

    [1] => Array
        (
            [header1] => 2:test 1
            [header2] => 2:test 2
            [header3] => 2:test 3
        )

    [2] => Array
        (
            [header1] => 3:test 1
            [header2] => 3:test 2
            [header3] => 3:test 3
        )

    [3] => Array
        (
            [header1] => 4:test 1
            [header2] => 4:test 2
            [header3] => 4:test 3
        )

)
```
