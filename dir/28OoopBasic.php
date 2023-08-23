<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo 'Object Oriented Programming';
    class player
    {
        public $name;
        public $speed = 3;

        function set_name($name)
        {
            $this->name = $name;
        }
        function get_name()
        {
            return $this->name;
        }
    }
    $player1 = new player();
    $player1->set_name("Anirban");
    echo $player1->get_name() . "-" . $player1->speed;
    ?>
</body>

</html>