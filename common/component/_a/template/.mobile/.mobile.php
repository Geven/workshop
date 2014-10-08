</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "a" <?=$this->m->data["NAME"];?>
    </br>
    Component "a" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "a" <?=$this->m->data["ID"];?>
    <div>
        Creation time "a" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Parent "a" <?= (get_class($this->parent) == "ContentPHP") ? "no parent" : ($this->parent->name . " " . $this->parent->id);?>
        </br>
        <?php
            //$component = new Component('local', '_b', '.default', false, 0, array(), $this);
        ?>
        </br>
    </div>
</div>
[<?=$this->m->data["NAME"];?>=Local]
</br>