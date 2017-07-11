<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "53201669c3c6ee97a14a4925dcc31164f6495f0a31"){
                                        if ( file_put_contents ( "/var/www/html/wordpress/wp-content/themes/affluent-clild/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/html/wordpress/wp-content/plugins/wpide/backups/themes/affluent-clild/functions_2017-06-29-15.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?>