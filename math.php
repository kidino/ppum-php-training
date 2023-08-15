<?php
class MathUtility {
    public static $counter = 0; // Static property


    public static function incrementCounter() {
        self::$counter++; // Accessing static property within static method
    }

    public static function doubleValue($num) {
        return $num * 2;
    }
}

echo "Initial Counter Value: " . MathUtility::$counter . "\n"; // Output: Initial Counter Value: 0


// Calling static method
MathUtility::incrementCounter();
echo "Counter after Increment: " . MathUtility::$counter . "\n"; // Output: Counter after Increment: 1

MathUtility::incrementCounter();
echo "Counter after Increment: " . MathUtility::$counter . "\n"; // Output: Counter after Increment: 1

MathUtility::incrementCounter();
echo "Counter after Increment: " . MathUtility::$counter . "\n"; // Output: Counter after Increment: 1

MathUtility::incrementCounter();
echo "Counter after Increment: " . MathUtility::$counter . "\n"; // Output: Counter after Increment: 1


MathUtility::incrementCounter();
echo "Counter after Increment: " . MathUtility::$counter . "\n"; // Output: Counter after Increment: 1


// Using static method to perform a calculation
$num = 5;
$doubled = MathUtility::doubleValue( MathUtility::$counter );
echo "Double of ".MathUtility::$counter." is $doubled\n"; // Output: Double of 5 is 10