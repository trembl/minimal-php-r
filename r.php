<pre>
<?php

// user: www users

// Add custom R lib path
$r_home = "/usr/local/package/r/current3";
putenv("PATH=$r_home/bin:".$_ENV['PATH']);
putenv("LD_LIBRARY_PATH=$r_home/lib64/R/lib:".$_ENV['LD_LIBRARY_PATH']);

// custom R Lib location
putenv('R_LIBS=/usr/proj/my-project/.R');
//$output = shell_exec("R -q -e 'packageVersion(\"rjson\")'");


// 'shell_exec' from shell commands
echo shell_exec("whoami");
// user name

// change to current directory
chdir("/usr/proj/my-project/r/");

// 'exec' for executing scripts
// append ' 2>&1' to log errors, echo exec("Rscript --vanilla test.R 2>&1", $output, $return_var);
echo exec("Rscript --vanilla test.R", $output, $return_var);

// each 'print' in R, appends an entry to the $output array
$data = $output[0];
$data = substr($data, 4);  // remove "[0] " from. TODO. suppress this in R

print_r($data);


?>
</pre>