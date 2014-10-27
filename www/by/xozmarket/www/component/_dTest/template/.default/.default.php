</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "_dTest" <?=$this->m->data["NAME"];?>
    </br>
    Component "_dTest" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "_dTest" <?=$this->m->data["ID"];?>
    <div>
        Component "_dTest" creation time "_aTest" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Component "_dTest" parent <?= (get_class($this->parent) == "Tree") ? "no parent" : ($this->parent->name . " id:" . $this->parent->id);?>
        </br>
    </div>
</div>
[Local=<?=$this->m->data["NAME"];?>]
</br>