<?php
/** @var yii\web\View $this */
use yii\widgets\Menu;
$menuItems = [
    ['label' => 'Home', 'url' => ['site/index']],
    ['label' => 'Books', 'url' => ['library/index']],
    // Add more menu items as needed
];
?>
<h1>administration/index</h1>

<p>
<?php
$menuItems = [
    ['label' => 'Manage Works', 'url' => ['/books']],
    ['label' => 'Manage Work Editions', 'url' => ['/book']],
    ['label' => 'Manage Members', 'url' => ['/member']],
    ['label' => 'Manage Staff', 'url' => ['/staff']],
    ['label' => 'Manage Penalties', 'url' => ['/debt']],
    ['label' => 'Manage Reservations', 'url' => ['/reservation']],
    ['label' => 'Manage Loans', 'url' => ['/bookloan']],
    // Add more menu items as needed
];

echo Menu::widget([
    'items' => $menuItems,
    'options' => ['class' => 'navbar-nav'], // Optional CSS classes
]);
?>
</p>