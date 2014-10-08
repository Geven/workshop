</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "b" <?=$this->m->data["NAME"];?>
    </br>
    Component "b" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "b" <?=$this->m->data["ID"];?>
    <div>
        Creation time "b" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Parent "b" <?= (get_class($this->parent) == "ContentPHP") ? "no parent" : ($this->parent->name . " id:" . $this->parent->id);?>
        </br>
        <?php
            $component = new Component('local', '_c', '.default', false, 0, array(), $this);
            $component = new Component('local', '_d', '.default', false, 0, array(), $this);
        ?>
        </br>
    </div>
</div>
[<?=$this->m->data["NAME"];?>=Local]
</br>