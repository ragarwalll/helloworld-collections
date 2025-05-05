<?php if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    
    if($name){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(strlen($message)>=5){
                $email_default="agarwal.rahul324329@gmail.com";
                $headers = "From: agarwal.rahul324@gmail.com";
                mail($email_default,"Rotaract-Contact Us By: ".$name."",$message,$headers);
                echo "
                <script>
                    alert('We have recieved your mail. We will contact you soon');
                </script>
                ";
                
            }
            else{
                echo "
                <script>
                    alert('Your message should be greater than atleast 5 characters');
                ";
            }
        }
        else{
            echo "
            <script>
                alert('Invalid Email');
            ";
        }
    }
    else{
        echo "
        <script>
            alert('Enter Name');
        </script>  
        ";
    }
}
?>