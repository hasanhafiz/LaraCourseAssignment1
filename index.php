<?php 

class Assignment1 {

    // Problem 1: Given a list of integers, find the minimum of their absolute values.
    // Note: 'Absolute values' means the non-negative value without regard to its sign. For example, the Absolute value of 123 is 123, and the Absolute value of -123 is also 123. 

    // Sample input 1: 10 12 15 189 22 2 34
    //  Sample output 1: 2

    // Sample input 2: 10 -12 34 12 -3 123
    // Sample output 2: 3    

    public function findAbsoluteVal( $int_list ): ?int { 
        // convert list of int to array

        // check empty int_list
        if ( empty($int_list)) {
            echo "Invalid list.";
            return null;
        }

        $explode_int_list = explode(" ", $int_list);

        // now loop through the array and find the minimum
        $min_int = $explode_int_list[0]; 

        // convert negative to non-negative num
        $min_int = ($min_int < 0) ? -1 * $min_int : $min_int;

        for($i=1; $i<count($explode_int_list); $i++) {
            $explode_int_list_item = $explode_int_list[$i] < 0 ? -1 * $explode_int_list[$i] : $explode_int_list[$i];
            if ( $explode_int_list_item < $min_int) {
                $min_int = $explode_int_list_item;
            }
        }

        return $min_int;
        // echo "Minimum absolute value is [$int_list]:  $min_int";
    }


    /*
    *Problem 2: Given a few paragraphs in a file, read the file and count how many words are there. 
        For example, if there is a file with the following contents:
        Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.  
        You need to output: 10
    *
    */

    public function wordCount( $file): int {
        
        // read entire file into array
        $file_arr = file($file);

        // look through each array 
        // convert string into array and count it
        $total_count = 0 ;
        foreach( $file_arr as $line ) {
                $line = trim($line);
                if ( empty($line) ) continue;
                $strtoarr = explode(" ", $line);
                $total_count += count($strtoarr);
        }
        return $total_count;
    }

    /*
    *Problem 3:
        Given a sentence, keep the order of the words same, but reverse the characters of each word. 
        For example, if the given sentence is: ‘I love programming’ 
        The result should be: ‘I evol gnimmargorp’

        Here the order of the words is the same as the given sentence, but the order of the characters in the words is reversed.
    *
    */

    public function reverseWord( string $sentense ): string {

        $rev_word = '';

        // convert string into array
        $strto_arr = explode(' ', $sentense);

        // now iterate each array and reverse the string
        foreach( $strto_arr as $word ) {
            for( $i= strlen($word) -1 ; $i >=0 ; $i-- ) {
                $rev_word .= $word[$i];
            }
            $rev_word .= ' ';
        }
        return $rev_word;
    }

    /*
    * Problem 4 output

     *
    ***
   *****
  *******
 *********
***********
    *
    */
    public function makePyramid( int $number ) {
        $pyramid = '';
        $pad_len = $number - 1;
        for( $i= 1; $i <= $number; $i++ ) {
            $num_print = $i * 2 - 1;
            if ($pad_len >0) {
                echo str_pad(' ', $pad_len,' ', STR_PAD_LEFT); 
            }
            echo str_repeat('*', $num_print);
            echo "\n";
            $pad_len--;
        }
    }


    public function sumOfIntegers( int $number ): int {

        $sum = 0 ;

        // get the remainder of numbers
        // $num_remainder = $number % 10;

        while ( $number > 0) {
            $sum += ($number % 10);
            $number = (int) ($number / 10) ;
        }
        return $sum;
    }
}

$ass1 = new Assignment1();

// ########## problem 1 ###########
// sample input 1: 10 12 15 189 22 2 34
// Sample output 1: 2

echo $ass1->findAbsoluteVal("10 12 15 189 22 2 34"); // 2
echo "\n";

// sample input 2: 10 -12 34 12 -3 123
// Sample output 2: 3
echo $ass1->findAbsoluteVal("10 -12 34 12 -3 123"); // 3
echo "\n";

// ########## problem 2 ###########
echo $ass1->wordCount("problem2.txt"); // 30
echo "\n";

// ########## problem 3 ###########
echo $ass1->reverseWord("I love programming"); // I evol gnimmargorp
echo "\n";

// ########## problem 4 ###########
$ass1->makePyramid(5);
echo "\n";

// ########## problem 5 ###########
echo $ass1->sumOfIntegers(12345); // 15




