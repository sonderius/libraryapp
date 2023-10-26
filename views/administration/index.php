<?php
/** @var yii\web\View $this */
use yii\widgets\Menu;
$menuItems = [
    ['label' => 'Domov', 'url' => ['site/index']],
    ['label' => 'Knihy', 'url' => ['library/index']],
    // Pridajte ďalšie položky menu podľa potreby
];
?>
<h1>administration/index</h1>

<p>
<?php
$menuItems = [
    ['label' => 'Sprava diel', 'url' => ['/books']],
    ['label' => 'Sprava vytisku diel', 'url' => ['/book']],
    ['label' => 'Sprava clenov', 'url' => ['/member']],
    ['label' => 'Sprava zamestnancov', 'url' => ['/staff']],
    ['label' => 'Sprava pokut', 'url' => ['/debt']],
    ['label' => 'Sprava rezervaci', 'url' => ['/reservation']],
    ['label' => 'Sprava pujcek', 'url' => ['/bookloan']],
    // Pridajte ďalšie položky menu podľa potreby
];

echo Menu::widget([
    'items' => $menuItems,
    'options' => ['class' => 'navbar-nav'], // Voliteľné triedy CSS
]);


?>
</p>
