<?php
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql= mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){
                echo "$email -This email already exist!";
            }else{
                if(isset($_FILES['images'])){
                    $img_name = $_FILES['images']['name']; //get user mengupload img_name
                    $img_type = $_FILES['images']['type']; //get user upload img_type
                    $tmp_name = $_FILES['image']['tmp_name']; 
                
                    $img_exploded = explode('_', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg', 'gif'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time(); //untuk mengetahui current time
                        $new_img_name = $time.$img_name;
                       if( move_uploaded_file($temp_name,"images/".$new_img_name)){
                        $status = "Active Now";
                        $random_id = rand(time(),10000000);

                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id,fname, lname, email, pasword, img, status) VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                       }
                        
                    }else{
                        echo "Please select an Image file - jpeg, jpg, png, gif";
                    }
                }else{
                echo "Please select Image file";
            }
        }

        }else{
            echo "$email - This is not a valid email!";
        }

    }else{
        echo "All input field are required!";
    }
?>