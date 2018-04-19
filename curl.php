<?php
$data = array("name" => "Hagrid", "age" => "36");                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.twilio.com/2010-04-01/Accounts/ACc9b7a259334691c6ac2ebca0823c58cc/Messages.json');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
///////////////////////////////////////////////
/////////////////'https://api.twilio.com/2010-04-01/Accounts/ACc9b7a259334691c6ac2ebca0823c58cc/Messages.json' -X POST \
////////////-u ACc9b7a259334691c6ac2ebca0823c58cc:91d5ebb3b2529b9ff7f2107081b0b41f

///////////////////////////////////////////////
curl 'https://api.twilio.com/2010-04-01/Accounts/ACc9b7a259334691c6ac2ebca0823c58cc/Messages.json' -X POST \
--data-urlencode 'To=91840015801539' \
--data-urlencode 'From=+441588242053' \
--data-urlencode 'MessagingServiceSid=MG48928230e449a62d57a07c2c83f51960' \
--data-urlencode 'Body=hello' \
-u ACc9b7a259334691c6ac2ebca0823c58cc:91d5ebb3b2529b9ff7f2107081b0b41f