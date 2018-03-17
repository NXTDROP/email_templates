<?php
    $hostname = "localhost";
    $username = "datadrop";
    $password = "(^@=t.Huu)FE";
    $dbname = "users_beta";

    //Create connection to DB
    $conn = new mysqli($hostname, $username, $password, $dbname);

    //Check Connection
    if ($conn->connect_error) {
        die("Connection Failed:".$conn->connection_error);
    }
    else {
        /*echo "Successfully connected!";*/
    }

    $q = "SELECT * FROM signup_beta;";
    $result = $conn->query($q);

    while ($row = mysqli_fetch_assoc($result)) {
        $from = 'NXTDROP Team <support@nxtdrop.com>';

        $subject = "THANK YOU FOR SIGNING UP! NXTDROP IS FINALLY HERE!!!";

        $to = $row['user_email'];

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $message = '<html>
        <title>
            NXTDROP IS FINALLY HERE!!!
        </title>
    
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                @media only screen and (max-width: 768px) {
                    .email_head a img {
                        width: 20% !important;
                    }
                }
                
                @media only screen and (max-width: 414px) {
                    .email_head a img {
                        width: 30% !important;
                    }
                }
                
                body {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, Helvetica, sans-serif;
                    border: 5px solid #aa0000;
                    min-height: 98.77%;
                }
                
                .email_head {
                    width: 100%;
                    background-color: #fcfcfc;
                    padding: 10px 0;
                }
                
                .email_head a {
                    width: auto;
                }
                
                .email_head a img {
                    width: 10%;
                    display: block;
                    margin: auto;
                }
                
                .email_body {
                    width: 70%;
                    margin: 20px auto;
                }
                
                .email_body h1 {
                    font-size: 16px;
                    color: #333232;
                }
                
                .email_body p {
                    font-size: 14px;
                    text-align: center;
                    color: #333232;
                }
                
                .email_body p a {
                    color: #aa0000;
                }
                
                .email_footer p {
                    font-size: 12px;
                    text-align: center;
                    color: #333232;
                }
                
                .email_footer {
                    width: 70%;
                    margin: auto;
                }
                
                a {
                    text-decoration: none;
                }
                
                #login {
                    background: #aa0000;
                    color: #fff;
                    text-align: center;
                    width: 25%;
                    margin: 0 37.5%;
                    padding: 5px;
                    border-radius: 24px;
                    border: 1px solid #aa0000;
                }
                
                #login:hover {
                    background: #fff;
                    color: #aa0000;
                    border: 1px solid #aa0000;
                }
                
                #copy {
                    font-size: 10px;
                    text-align: center;
                    background: #aa0000;
                    color: #fff;
                }
                
                #six {
                    color: #aa0000;
                }
                
                #six:hover {
                    text-decoration: underline;
                    cursor: pointer;
                }
                
                #team {
                    color: #aa0000;
                }
                
                ul {
                    list-style: none;
                    text-align: center;
                    padding: 0;
                    margin: 0;
                }
                
                ul li {
                    display: inline-block;
                }
                
                ul li a p {
                    color: #aa0000;
                }
                
                ul li a p:hover {
                    cursor: pointer;
                    text-decoration: underline
                }
    
                .image {
                    width: 35px;
                }
            </style>
        </head>
    
        <body>
            <div class="email_head">
                <a href="https://nxtdrop.com"><img src="https://nxtdrop.com/img/nxtdroplogo.png" alt="NXTDROP, INC." title="NXTDROP, Inc."></a>
            </div>
    
            <div class="email_body">
                <h1>Dear '.$row['user_fn'].',</h1>
                <p>The Fashion Trade Centre, NXTDROP, is finally here! We want to thank you for signing up to try the Alpha Version of our platform. NXTDROP is an exclusive community to buy, sell, trade, request and discover fashion items. You can also share your favorite sneakers and clothes simply by making a post. You can now go on <a href="https://nxtdrop.com">nxtdrop.com</a> and create an account. If you have any issues with the platform or want to give us feedback, send a report @ <a href="https://nxtdrop.com/report">nxtdrop.com/report.</a> Once again, we want to thank for taking the time to sign up. Enjoy your day!</p>
                
                <p>Best,</p>
                <p id="team">Team NXTDROP</p><br>
                <a href="https://nxtdrop.com/login_signup"><p id="login" title="Login To Your Account">SIGN UP NOW!!!</p></a><br>
            </div>
    
            <div class="email_footer">
                <p>We are looking forward to bring a better and safer experience. Thank you for joining us in this journey.</p>
                <p id="six" title="Toronto, Ontario, Canada">Love from the 6IX</p>
                <ul>
                    <li><p><a href="https://www.instagram.com/nxtdrop/"><img class="image" src="https://nxtdrop.com/img/instagram.png" title="Instagram"/></a></p></li>
                    <li><p><a href="https://www.twitter.com/nxtdrop/"><img class="image" src="https://nxtdrop.com/img/twitter.png" title="Twitter"/></a></p></li>
                </ul>
                    
                <ul>
                    <li><a href="https://nxtdrop.com/terms"><p title="Terms of Use"> Terms of Use </p></a></li>
                    <li><a href="https://nxtdrop.com/privacy"><p title="Privacy Policy"> Privacy Policy </p></a></li>
                    <li><a href="https://nxtdrop.com/login_signup"><p title="Login"> Sign Up </p></a></li>
                </ul>
                <p id="copy">&copy; 2018 NXTDROP, INC. All rights reserved.</p>
            </div>
        </body>
    </html>';

        if (mail($to, $subject, $message, $headers)) {
            echo 'Email Sent to '.$to.'';
            echo '</br>';
        }
        else {
            echo 'Error!';
            echo '</br>';
        }
    }
?>