<?php

use app\models\Member;
use yii\helpers\Html;
?>




<h1>Seznam knih a jejich konkrétních výtisků</h1>

<table class="table">
    <tr>
        <th>Název knihy</th>
        <th>ISBN</th>
        <th>Název výtisku</th>
        <th>Dostupnost</th>
        <th>Akce</th>
    </tr>
    <?php
     foreach ($books as $book):foreach ($editions as $edition): if ($book->ISBN == $edition->ISBN ){?>
        <tr>
            <td><?= Html::encode($book->name) ?></td>
            <td><?= Html::encode($book->ISBN) ?></td>
            
            <td><?= $edition ? Html::encode($edition->id) : 'Nedostupný' ?></td>
            <td><?= Html::encode($edition->availability) ?></td>
            <td>
                <?php if (Html::encode($edition->availability) == "požičaná") echo(Html::a('Vratit', ['return', 'editionId' => $edition->id,'userId' => Yii::$app->user->id,], ['class' => 'btn btn-primary'])); ?>
                <?php if (Html::encode($edition->availability) == "k dispozícii") echo(Html::a('Pozicat', ['borrow', 'editionId' => $edition->id,'userId' => Yii::$app->user->id,], ['class' => 'btn btn-success'])); ?>
                <?= Html::a('Rezervovat', ['reserve', 'editionId' => $edition->id,'userId' => Yii::$app->user->id,], ['class' => 'btn btn-success']) ?>            
                
                 
                
               

            </td>
        </tr>
    <?php }

        else {
            ?> 
             <tr>
            <td><?= Html::encode($book->name) ?></td>
            <td><?= Html::encode($book->ISBN) ?></td>
            
            <td> Nedostupný </td>
            <td> Nedostupný </td>
            <td>
               
            </td>
        </tr>
             <?php
        }
        endforeach; endforeach; ?>
   

</table>

<script>
    // Funkcia pre zachytenie zmeny výberu v `select` elemente
    $("#user-select").change(function() {
        var selectedUserId = $(this).val();
        if (selectedUserId === "") {
            // Ak je vybraná možnosť "Nikto", skryte obsah tabuľky
            $("#table-container").hide();
        } else {
            // Inak zobrazte obsah tabuľky
            $("#table-container").show();
        }
    });
</script>