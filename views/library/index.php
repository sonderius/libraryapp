<?php
use app\models\Member;
use yii\helpers\Html;
?>

<h1>List of books and their specific editions</h1>

<table class="table">
    <tr>
        <th>Book Title</th>
        <th>ISBN</th>
        <th>Edition Title</th>
        <th>Availability</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($books as $book):
        foreach ($editions as $edition):
            if ($book->ISBN == $edition->ISBN):
    ?>
        <tr>
            <td><?= Html::encode($book->name) ?></td>
            <td><?= Html::encode($book->ISBN) ?></td>
            
            <td><?= $edition ? Html::encode($edition->id) : 'Unavailable' ?></td>
            <td><?= Html::encode($edition->availability) ?></td>
            <td>
                <?php if (Html::encode($edition->availability) == "Borrowed") {
                    echo Html::a('Return', ['return', 'editionId' => $edition->id, 'userId' => Yii::$app->user->id], ['class' => 'btn btn-primary']);
                }
                if (Html::encode($edition->availability) == "Available") {
                    echo Html::a('Borrow', ['borrow', 'editionId' => $edition->id, 'userId' => Yii::$app->user->id], ['class' => 'btn btn-success']);
                }
                echo Html::a('Reserve', ['reserve', 'editionId' => $edition->id, 'userId' => Yii::$app->user->id], ['class' => 'btn btn-success']);
                ?>
            </td>
        </tr>
    <?php
            else:
    ?>
        <tr>
            <td><?= Html::encode($book->name) ?></td>
            <td><?= Html::encode($book->ISBN) ?></td>
            
            <td>Unavailable</td>
            <td>Unavailable</td>
            <td>
               
            </td>
        </tr>
    <?php
            endif;
        endforeach;
    endforeach;
    ?>
</table>

<script>
    // Function to capture selection change in the `select` element
    $("#user-select").change(function() {
        var selectedUserId = $(this).val();
        if (selectedUserId === "") {
            // If "Nobody" is selected, hide the table content
            $("#table-container").hide();
        } else {
            // Otherwise, show the table content
            $("#table-container").show();
        }
    });
</script>