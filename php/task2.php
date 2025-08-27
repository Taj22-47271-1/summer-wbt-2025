<?php
// 1. Simple Interest
echo "<h2>1. Simple Interest</h2> <hr>";
$P = 1000; // Principal
$R = 5;    // Rate (%)
$T = 2;    // Time (years)
$SI = ($P * $R * $T) / 100;
echo "Principal = $P, Rate = $R%, Time = $T years<br>";
echo "Simple Interest = $SI<br><br>";


// 2. Swap two numbers without using a third variable
echo "<h1>2. Swap two Numbers</h1> <hr>";
$a = 10;
$b = 20;
echo "Before Swap: a = $a, b = $b<br>";
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "After Swap: a = $a, b = $b<br><br>";


// 3. Check Leap Year
echo "<h3>3. Leap Year Check</h3> <hr>";
$year = 2024;
if (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)) {
    echo "$year is a Leap Year.<br><br>";
} else {
    echo "$year is NOT a Leap Year.<br><br>";
}


// 4. Factorial of a number
echo "<h3>4. Factorial of a Number</h3><hr>";
$num = 5;
$fact = 1;
for ($i = 1; $i <= $num; $i++) {
    $fact *= $i;
}
echo "Factorial of $num = $fact<br><br>";


// 5. Prime numbers between 1 to 50
echo "<h3>5. Prime Numbers from 1 to 50</h3><hr>";
for ($i = 2; $i <= 50; $i++) {
    $prime = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $prime = false;
            break;
        }
    }
    if ($prime) {
        echo "$i ";
    }
}
echo "<br><br> ";


// 6. Patterns
echo "<h3>6. Patterns</h3><hr>";

// Pattern 1
echo "#Pattern 1:<br>";
for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";

// Pattern 2
echo "#Pattern 2:<br>";
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
echo "<br>";

// Pattern 3
echo "#Pattern 3:<br>";
$ch = 'A';
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $ch . " ";
    }
    echo "<br>";
    $ch++;
}
?>
