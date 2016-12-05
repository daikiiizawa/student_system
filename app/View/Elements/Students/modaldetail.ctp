<?php
$createdDetail = Configure::read("createdDetail");
$nameDetail = Configure::read("nameDetail");
$meetingDetail = Configure::read("meetingDetail");
$admitDetail = Configure::read("admitDetail");
$yomiDetail = Configure::read("yomiDetail");
$statusDetail = Configure::read("statusDetail");
$contactDetail = Configure::read("contactDetail");
$idDetail = Configure::read("idDetail");
?>

<!-- 1.モーダル表示(エレメント化予定) -->
<a data-toggle="modal" data-target="#modal-example-<?= $modalLabel;?>">
    [？]
</a>
<!-- 2.モーダルの配置 -->
<div class="modal" id="modal-example-<?= $modalLabel;?>" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <!-- 3.モーダルのコンテンツ -->
        <div class="modal-content">
            <!-- 4.モーダルのヘッダ -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-label"><?= $titleLabel;?></h4>
            </div>
            <!-- 5.モーダルのボディ -->
            <div class="modal-body">
                <?= $$detailLabel;?>
            </div>
            <!-- 6.モーダルのフッタ -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
<!-- モーダル終わり -->