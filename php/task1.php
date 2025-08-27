
<?php
echo "<h1>1.length width, perimeter</h1> <hr>";
$length = 10;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area of Rectangle = $area <br>";
echo "Perimeter of Rectangle = $perimeter <br>";
//vat calculate
echo "<h1>2.vat calculate</h1> <hr>";
$amount = 1000;
$vat = 0.15 * $amount;

echo "Amount = $amount <br>";
echo "VAT (15%) = $vat <br>";
echo "Total with VAT = " . ($amount + $vat); 

// odd or even
echo "<h1>3.odd or even</h1> <hr>";
$num = 17;

if ($num % 2 == 0) {
    echo "<br>$num is Even <br>";
} else {
    echo "<br>$num is Odd <br>" ;
}
//largest of three number
echo "<h1>4.largest of three number</h1> <hr>";

$a = 15;
$b = 25;
$c = 10;

if ($a >= $b && $a >= $c) {
    echo "Largest number is $a<br>";
} elseif ($b >= $a && $b >= $c) {
    echo "Largest number is $b <br>";
} else {
    echo "Largest number is $c <br>";
}

//odd numbers between 10 to 100 Hints
echo "<h1>5.odd numbers between 10 to 100 Hints</h1> <hr>";

for ($i = 10; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

//Search Element in Array
echo "<h1>6.Search Element in Array</h1> <hr>";

$arr = array(5, 10, 15, 20, 25);
$search = 15;
$found = false;

foreach ($arr as $value) {
    if ($value == $search) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "<br>Element $search found in array.<br>";
} else {
    echo "<br>Element $search not found in array.<br>";
}
echo "<h1>7.parttan</h1> <hr>";
//Triangle with *
echo "<h1>Triangle with *</h1> <hr>";

for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

//Number Pattern
echo "<h1>Number Pattern</h1> <hr>";

$num = 1;
for ($i = 3; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo $num . " ";
        $num++;
    }
    echo "<br>";
}

//Alphabet Pattern
echo "<h1>Alphabet Pattern</h1> <hr>";

$ch = 'A';
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $ch . " ";
        $ch++;
    }
    echo "<br>";
}

?>