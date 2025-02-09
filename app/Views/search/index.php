<?php
// Fungsi untuk menyoroti teks yang dicari dalam hasil pencarian
function highlightSearch($text, $search) {
    if (!$search) return $text;
    return preg_replace("/(" . preg_quote($search, '/') . ")/i", "<strong>$1</strong>", $text);
}
// Fungsi untuk menghapus base64 dari teks
function removeBase64($text) {
    // Hapus pola base64 standar seperti data:image/png;base64,...
    $text = preg_replace('/data:image\/[a-zA-Z]+;base64,[^\s"]+/i', '', $text);
    
    // Hapus string base64 panjang (hanya huruf besar/kecil, angka, +, /, =)
    $text = preg_replace('/(?:[A-Za-z0-9+\/=]{30,})/', '', $text);

    return trim($text);
}

// Fungsi untuk menghapus tag HTML agar teks polos
function stripHtmlTags($text) {
    return strip_tags($text);
}

// Fungsi untuk mendapatkan cuplikan teks yang relevan
function getRelevantSnippet($text, $search, $length = 200) {
    // Hapus base64 dan tag HTML terlebih dahulu
    $text = stripHtmlTags(removeBase64($text));

    if (!$search) return substr($text, 0, $length) . (strlen($text) > $length ? "..." : "");

    $pos = stripos($text, $search);
    if ($pos === false) return substr($text, 0, $length) . (strlen($text) > $length ? "..." : "");

    $start = max(0, $pos - ($length / 2));
    $snippet = substr($text, $start, $length);
    
    return highlightSearch($snippet, $search) . (strlen($text) > $length ? "..." : "");
}
?>

<section class="faq pt-90 pb-0">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <div class="heading-layout2">
            <h2 class="heading-title mb-40">Search: <?= $search ?></h2>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="accordion" id="accordion1">
            <div class="accordion-item">
            <div class="accordion-header" data-toggle="collapse" data-target="#collapse1">
                <a class="accordion-title" href="#">Labolatorium</a>
            </div><!-- /.accordion-item-header -->
            <div id="collapse1" class="collapse" data-parent="#accordion1">
                <div class="accordion-body">
                    <?php foreach ($listLab as $lab) : ?>
                        <h4 style="font-size: 20px"><a href="labolatorium/<?=$lab->seo_lab?>"><?= highlightSearch($lab->lab_name, $search) ?></h4>
                        <p><?= getRelevantSnippet($lab->lab_description, $search) ?></p>
                        <hr>
                    <?php endforeach; ?>
                </div><!-- /.accordion-item-body -->
            </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
            <div class="accordion-header" data-toggle="collapse" data-target="#collapse2">
                <a class="accordion-title" href="#">Project</a>
            </div><!-- /.accordion-item-header -->
            <div id="collapse2" class="collapse" data-parent="#accordion1">
                <div class="accordion-body">
                <?php foreach ($listProject as $project) : ?>
                        <h4 style="font-size: 20px"><a href="proyek/<?=$project->seo_projects?>"><?= highlightSearch($project->projects_name, $search) ?></h4>
                        <p><?= getRelevantSnippet($project->projects_description, $search) ?></p>
                        <hr>
                    <?php endforeach; ?>
                </div><!-- /.accordion-item-body -->
            </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
            <div class="accordion-header" data-toggle="collapse" data-target="#collapse3">
                <a class="accordion-title" href="#">Peralatan</a>
            </div><!-- /.accordion-item-header -->
            <div id="collapse3" class="collapse show" data-parent="#accordion1">
                <div class="accordion-body">
                <?php foreach ($listEquipment as $equipment) : ?>
                    <h4 style="font-size: 20px"><a href="peralatan/<?=$equipment->seo_equipment?>"><?= highlightSearch($equipment->equipments_name, $search) ?></h4>
                    <p><?= getRelevantSnippet($equipment->equipments_description, $search) ?></p>
                    <hr>
                <?php endforeach; ?>
                </div><!-- /.accordion-item-body -->
            </div>
            </div><!-- /.accordion-item -->
        </div><!-- /.accordion -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.FAQ -->