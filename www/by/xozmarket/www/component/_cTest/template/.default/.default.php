</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "_cTest" <?=$this->m->data["NAME"];?>
    </br>
    Component "_cTest" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "_cTest" <?=$this->m->data["ID"];?>
    <div>
        Component "_cTest" creation time "_aTest" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Component "_cTest" parent <?= (get_class($this->parent) == "Tree") ? "no parent" : ($this->parent->name . " id:" . $this->parent->id);?>
        </br>
        <?php
            $branch = new Branch('local', '_dTest', '.default', false, 0, array(), $this);
        ?>
    </div>
</div>
[Local=<?=$this->m->data["NAME"];?>]
</br>