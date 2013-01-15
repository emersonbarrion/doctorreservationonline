<?php
/**
* Get difference between timestamps broken down into years/months/weeks/etc.
* @return array
* @param int $t1 UNIX timestamp
* @param int $t2 UNIX timestamp
*/
function timeDiff($t1, $t2)
{
   if($t1 > $t2)
   {
      $time1 = $t2;
      $time2 = $t1;
   }
   else
   {
      $time1 = $t1;
      $time2 = $t2;
   }
   $diff = array(
      'years' => 0,
      'months' => 0,
      'weeks' => 0,
      'days' => 0,
      'hours' => 0,
      'minutes' => 0,
      'seconds' =>0
   );
   foreach(array('years','months','weeks','days','hours','minutes','seconds')
         as $unit)
   {
      while(TRUE)
      {
         $next = strtotime("+1 $unit", $time1);
         if($next < $time2)
         {
            $time1 = $next;
            $diff[$unit]++;
         }
         else
         {
            break;
         }
      }
   }
   return($diff);
}


/*
   HOW TO USE

   <?php
      $start = strtotime('2007-01-15 07:35:55');
      $end = strtotime('2009-11-09 13:01:00');
      $diff = timeDiff($start, $end);
      $output = "The difference is:";
      foreach($diff as $unit => $value)
      {
         echo " $value $unit,";
      }
      $output = trim($output, ',');
      echo $output;
   ?>
*/