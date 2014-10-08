</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "c" <?=$this->m->data["NAME"];?>
    </br>
    Component "c" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "c" <?=$this->m->data["ID"];?>
    <div>
        Creation time "c" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Parent "c" <?= (get_class($this->parent) == "ContentPHP") ? "no parent" : ($this->parent->name . " id:" . $this->parent->id);?>
        </br>
    </div>
</div>
[<?=$this->m->data["NAME"];?>=Local]
</br>