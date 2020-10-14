<?= $this->Form->create('import',['enctype'=>'multipart/form-data'])?>
<h3>จำนำ</h3>
<input type="file" name="excelfile" class="form-control" />
<button type="submit" class="btn btn-primary">upload</button>
<?= $this->Form->end()?>
<div class="row">
    <div class="col-12">
        <?php debug($result);?>
    </div>
</div>