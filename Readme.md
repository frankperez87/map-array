# Map Array

This class allows you to easily map the header of array and its data to a set of names you specify. 

## Example

```php
use MapArray\MapArray;

$mapper = new MapArray;

$map = array('header1' => 'Header 1', 
             'header2' => 'Header 2', 
             'header3' => 'Header 3');

$data = array(array('Header 1', 'Header 2', 'Header 3'),
              array('1:test 1', '1:test 2', '3:test 3'),
              array('2:test 1', '2:test 2', '3:test 3'),
              array('3:test 1', '3:test 2', '3:test 3'),
              array('4:test 1', '4:test 2', '4:test 3'),
              array('5:test 1', '5:test 2', '5:test 3'),
              array('6:test 1', '6:test 2', '6:test 3'));

$mapper->addMap($map);
$mapper->addData($data);
$mapper->mapData();
 
$output = $mapper->getData();
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
            [header3] => 3:test 3
        )

    [1] => Array
        (
            [header1] => 2:test 1
            [header2] => 2:test 2
            [header3] => 3:test 3
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

    [4] => Array
        (
            [header1] => 5:test 1
            [header2] => 5:test 2
            [header3] => 5:test 3
        )

    [5] => Array
        (
            [header1] => 6:test 1
            [header2] => 6:test 2
            [header3] => 6:test 3
        )

)
```
