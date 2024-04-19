<?php

$age = 14;

if ($age < 18) {
    echo "
        <div>
            <u>Mineur : " . $age . "</u>
        </div>    
    ";
}
else {
    echo "
        <div>
            <u>Adulte : " . $age . "</u>
        </div>    
    ";
}

if ($age < 18) { ?>
    <div>
        <u>Adulte : <?php echo $age; ?></u>
    </div>
<?php } else { ?>
    <div>
        <u>Mineur : <?php echo $age; ?></u>
    </div>
<?php } ?>

<?php
$arr = [10, 20, 30, 40];
for($i = 0; $i < count($arr); $i++) {
    echo $i . " - " . $arr[$i] . "<br>";
}
foreach($arr as $i => $nb) {
    echo $i . " - " . $nb . "<br>";
}
?>

<?php
    $arr = [
        "name" => "Karim",
        "age" => 20,
        "email" => "test@gmail.com"
    ];
    
    foreach($arr as $key => $item) {
        echo $key . " : " . $item . "<br>";
    }

    foreach($arr as $key => $item) { ?>
    <div>
        <b><?= $key ?></b> : <span><?= $item ?></span>
    </div>
<?php } ?>


<?php
    function addition($a = 0, $b = 0) {
        return $a + $b;
    }
    $total = addition();
    echo $total;
?>