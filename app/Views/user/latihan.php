<?php $this->extend('template');?>
<?php $this->section('content');?>
    <div class="container">
        <h1>dashborard <?=$nama?></h1>
        
        <div class="col-12">
            <a href="<?=base_url('User')?>/logout">logout</a>
        </div>
    </form>
<?php $this->endSection();?>
