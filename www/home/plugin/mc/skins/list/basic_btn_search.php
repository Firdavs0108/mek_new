<?php
/**
 * 기본 검색버튼형 목록보기 레이아웃 스킨
 */
/** @var \mc\Board $board */
/** @var array $write */


?>
<div class="mc-control-row" style="border:0" >
    <div class="mc-checked-list">
        <button type="button" class="mc-btn-submit" onclick="mc_search(this.form);this.form.submit()">검색</button>
        <?php foreach ($board->getExistValues() as $item): ?>
            <span onclick="mc.removeCheckedItem('list', this)" class="mc-checked-item" data-name="<?php echo $item['name']; ?>" data-value="<?php echo $item['value']; ?>"><?php echo $item['value']; ?><em>✗</em></span>
        <?php endforeach; ?>
        <span class="mc-checked-reset" onclick="mc.resetCheckedItem()">검색초기화</span>
    </div>
</div>
<?php
foreach ($board->getColumns() as $column): ?>
    <?php if($column->searchable):?>
        <div class="mc-control-row" data-searchmode="btn">
            <span class="mc-control-label"><?php echo $column->title; ?></span><?php $column->render(); ?>
        </div>
    <?php endif;?>
<?php endforeach; ?>



