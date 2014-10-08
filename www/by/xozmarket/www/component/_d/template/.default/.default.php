</br>
[Local=<?=$this->m->data["NAME"];?>]
<div>
    Component "d" <?=$this->m->data["NAME"];?>
    </br>
    Component "d" <?=$this->m->data["TEMPLATE"];?>
    </br>
    Component "d" <?=$this->m->data["ID"];?>
    <div>
        Creation time "d" <?=$this->m->data["CREATION_TIME"];?>
        </br>
        Parent "d" <?= (get_class($this->parent) == "ContentPHP") ? "no parent" : ($this->parent->name . " id:" . $this->parent->id);?>
        </br>
    </div>
</div>
[<?=$this->m->data["NAME"];?>=Local]
</br>