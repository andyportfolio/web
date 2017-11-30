<!--this is last labfile -->
<!--read the log file and get another people IP -->

<html>
    <head>
        <title>Check IP Page</title>
        <style>
            #content{
                width: 90%;
                margin: 0 auto;
                padding: 20px 20px;
                background:white;
                border: 5px solid navy;
            }
        </style>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        
        
     $(document).ready(function () {    
        $('button').click(function(){

            $.ajax({
                url:'getip.php',
                type:'get',
                data:$('form').serialize(),
                success:function(data){
                   console.log(data);
                    
                   if (data == "true"){    
                     $("#div1").html("<a href='upload.html'>go to upload html</a>");
                    }else{
                      $("#div1").html("login fail");  
                    }
                   
                }
            })
        })
    });

    </script>    
        
    </head>

    <body>
       <div id="content">
        <h1>This is Access Log file for check anothers access to my web</h1>
 
<?php

//myIP: 192.168.10.93/week7/index.html

//read file
$myfile = fopen("../../logs/apache_access.log", "r") or die("Unable to open file!");
// Output one line until end-of-file
$lastdata = "";

$data = array();
$data_count = array();

$temp_value="0";           
           
while(!feof($myfile)) {
    
    $line = fgets($myfile);
    //echo "substring=>".substr($line,0,3)."</br>";
    
    $cmp =strcmp(substr($line,0,3), "::1");
    //echo "compare value=>".$str."</br>";
    
    
    if ($cmp){
//         
//        if ($tmp_value= substr($line,0,13))
//        
//            
        $ip_array = substr($line,0,13)."&nbsp&nbsp&nbsp&nbsp".substr($line,19,21);
        array_push($data,$ip_array);
        echo $line. "<br>";
    }
    
}
fclose($myfile);

//echo $lastdata.",<br>";

//123456789012345678901 (21 count)
//http://192.168.10.210
//$lastdata = substr($lastdata,7,15);


//echo "Access IP Address: ".$lastdata;

?>
        </div>   
        
        <div id="content">
            <?php
                foreach ($data as $ipdata) {
                    echo $ipdata."</br>";
                }
            
            ?>
        
        </div>
            
    </body>
</html>           
