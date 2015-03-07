<h2>Ajouter votre image</h2>
<div style="color:red;">
<?= $this->Session->flash(); ?>
</div>
<?= $this->Form->create('Tattoo', array('type'=>'file')); ?>
    <?= $this->Form->input('name', array("label"=>'titre'));?>
    <?= $this->Form->input('image_file', array("label"=>'télécharger', "type"=>'file'));?>
<?= $this->Form->end('envoyer'); ?>