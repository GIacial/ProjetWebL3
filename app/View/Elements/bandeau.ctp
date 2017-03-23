<?php
$tab = AuthComponent::user();
if($tab == NULL){
    echo $this->Html->image('bandeau_pas_co.jpg', ['alt'=>'Bandeau']);

}else{
    if($tab['isadmin'] == 0){
        echo $this->Html->image('bandeau_client.png', ['alt'=>'Bandeau']);
    }else{
        echo $this->Html->image('bandeau_admin.jpg', ['alt'=>'Bandeau']);
    }
}

?>