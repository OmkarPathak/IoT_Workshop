 <html>
 <head>
 <meta name="viewport" content="width=device-width" />
 <title>LED Control</title>
 </head>
         <body>
         LED Control:
         <form method="get" action="">
                 <input type="submit" value="ON" name="on">
                 <input type="submit" value="OFF" name="off">
         </form>
         <?php
         $setmode17 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
         if(isset($_GET['on'])){
         for($i=0;$i<100;$i++){
                
                 $gpio_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
                 shell_exec("sleep .5");
                 $gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
                 shell_exec("sleep .5");

                 $gpio_on = shell_exec("/usr/local/bin/gpio -g write 27 1");
                 sleep(0.8);
                 $gpio_off = shell_exec("/usr/local/bin/gpio -g write 27 0");
                 sleep(0.8);

                 $gpio_on = shell_exec("/usr/local/bin/gpio -g write 22 1");
                 sleep(0.8);
                 $gpio_off = shell_exec("/usr/local/bin/gpio -g write 22 0");
                 sleep(0.8);
                 }
         }
         ?>
         </body>
 </html>
