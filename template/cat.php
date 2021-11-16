<?php
/**
 * category page template
 */


require_once 'headers/header.php';

$out = '';

for ($i = 0; $i < count($result); $i++) {
    $out .= '<div class="col-sm-4 col-md-4" style="margin-bottom: 50px;">';
    $out .= '<div class="card text-center rounded myBox">';
    $out .= '<figure style="margin-top: 20px;">';
    $out .= '<img class="img-fluid myImg rounded-circle" src="/static/images/' . $result[$i]['image'] . '">';
    $out .= '</figure>';
    $out .= '<h3>' . $result[$i]['title'] . '</h3>';
    $out .= '<div class="card-body">';
    $out .= '<p class="card-text">' . $result[$i]['descr_min'] . '</p>';
    $out .= '<a class="btn myBtn" href="/article/' . $result[$i]['url'] . '">Читать полностью</a>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col mb-5 sort ml-auto">
            <select class="form-control form-control" onchange="window.location.href = this.options[this.selectedIndex].value">
                <option value="">Выбрать категорию...</option>
                <?php
                $query3 = 'SELECT * FROM category';
                $result3 = select($query3);
                foreach ($result3 as $key => $item): ?>
                    <option value="<?= $item['url']; ?>">
                        <?= $item['title']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <div class="col">
                <div class="card-deck myCard">
                    <?php
                    echo $out; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require_once 'footer.php';
?>