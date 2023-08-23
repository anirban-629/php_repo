<?php
$d = date("d D j l");
// echo $d;

echo date("F j, Y, g:i a");




// Search php dates manual https://www.php.net/manual/en/function.date.php;


// date(string $format, ?int $timestamp = null): string

// // set the default timezone to use.
// date_default_timezone_set('UTC');


// // Prints something like: Monday
// echo date("l");

// // Prints something like: Monday 8th of August 2005 03:12:46 PM
// echo date('l jS \of F Y h:i:s A');

// // Prints: July 1, 2000 is on a Saturday
// echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

// /* use the constants in the format parameter */
// // prints something like: Wed, 25 Sep 2013 15:28:57 -0700
// echo date(DATE_RFC2822);

// // prints something like: 2000-07-01T00:00:00+00:00
// echo date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));


// // prints something like: Wednesday the 15th
// echo date('l \t\h\e jS');

// $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
// $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
// $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);


// $today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
// $today = date("m.d.y");                         // 03.10.01
// $today = date("j, n, Y");                       // 10, 3, 2001
// $today = date("Ymd");                           // 20010310
// $today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
// $today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
// $today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
// $today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
// $today = date("H:i:s");                         // 17:16:18
// $today = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)