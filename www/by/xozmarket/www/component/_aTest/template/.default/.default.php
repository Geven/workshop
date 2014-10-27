</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "_aTest" <?=$this->m->data["NAME"];?>
    </br>
    Component "_aTest" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "_aTest" <?=$this->m->data["ID"];?>
    <div>
        Component "_aTest" creation time "_aTest" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Component "_aTest" parent <?= (get_class($this->parent) == "Tree") ? "no parent" : ($this->parent->name . " id:" . $this->parent->id);?>
        </br>
        <?php
            $branch = new Branch('local', '_bTest', '.default', true, 30, array(), $this);
            $branch = new Branch('local', '_cTest', '.default', true, 10, array(), $this);
        ?>
    </div>
</div>
[Local=<?=$this->m->data["NAME"];?>]
</br>