<html>

<head>
    <title>Receiving Input </title>
</head>

<body>
    <p size=5>Thank You: Got Your Input.</p>
    <?php
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        print("<br> Your email address is $email");
        print("<br> Contact preference is $contact");
    ?>
</body>

</html>