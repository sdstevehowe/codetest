<?php

/**
* Configuration code overview - Steve Howe | email - rinzaimedia@gmail.com | phone (702) 426-7484
**/

class parser{

    public function parseini($data){


        if( is_numeric($data) ) #this normalizes the numeric values
        {

            $data = doubleval(str_replace(",","",$data));

        }
        else
        {
            switch($data) #convert on, yes and true to true value and not 1 and to convert off no and false to false
            {
                case "on":
                case "yes":
                case "true":

                    $data = 'true';

                    break;

                case "off":
                case "no":
                case "false":

                    $data = 'false';

                    break;

            }
        }


        return $data;

    }

    public function getConfig($data)
    {


        #do some clean up if underscores not provided
        $data = str_replace(' ', '_', strtolower($data));

        #included config file to check
        $config = parse_ini_file('config.ini', true, INI_SCANNER_RAW);

        switch($data){
            case "all": #this allows all config values to be displayed

                foreach ($config as $key=>$value)
                {
                    echo $key ." = ".$value."<br />";
                }

                break;

            default: #default is when a value is entered

                if(array_key_exists($data, $config))
                { #check if the provided config key exists if so return it

                    $value = $config[$data];

                    return self::parseini($value);

                }

                else
                { #if config key doesn't exist return not found message
                    return "not found";
                }

        }



    }

}

