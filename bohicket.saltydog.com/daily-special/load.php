







// <?php

// $data = json_decode(file_get_contents("data.txt"), true); // true for assoc



// foreach($data as $k => $v) {

//     echo "<p>" . PHP_EOL;

//     echo "Special Restaurant " . $k . ":<br />" . PHP_EOL;

//     echo "Chef: " . $v['chef'] . "<br />" . PHP_EOL;

//     echo "bio: " . $v['bio'] . "<br />" . PHP_EOL;

//     echo "image: " . $v['image'] . "<br />" . PHP_EOL;

//     echo "Name: " . $v['special_name'] . "<br />" . PHP_EOL;

//     echo "Description: " . $v['special_descr'] . "<br />" . PHP_EOL;

//     echo "Children: " . $v['child_name'] . "<br />" . PHP_EOL;

//     echo "Description: " . $v['child_descr'] . "<br />" . PHP_EOL;

//     echo "</p>" . PHP_EOL;  

//     } 

    

// 



$data = json_decode(file_get_contents("data.txt"), true); // true for assoc



foreach($data as $k => $v) {

   

     $Restaurant= $k;

     $Date=$v['date'] ;

     $Meal=$v['meal'] ;

   $Chef=$v['chef'] ;

    $bio = $v['bio'] ;

   $image = $v['image'];

    $Name = $v['special_name'] ;

    $Description = $v['special_descr'] ;

    $Children = $v['child_name'];

    $kidDescription = $v['child_descr'];

    $header = $v['header'];

    } 

    









?>











                