<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 28/02/2018
 * Time: 09:24
 */

namespace App\Services\semantic;


use Ajax\bootstrap\html\HtmlLabel;

class DevelopersGui extends Gui
{

    public function getForm($dev)
    {
        $frm=$this->_semantic->dataForm("frm-dev", $dev);
        $frm->setIdentifierFunction("getId");
        $frm->setFields(["id","identity","submit","cancel"]);
        $frm->setCaptions(["","Identity","Valider","Annuler"]);
        $frm->fieldAsHidden("id");
        $frm->fieldAsInput("identity",["rules"=>["empty","maxLength[30]"]]);
        $frm->setValidationParams(["on"=>"blur","inline"=>true]);
        $frm->onSuccess("$('#frm-dev').hide();");
        $frm->fieldAsSubmit("submit","positive","developer/submit", "#dtDevelopers",["ajax"=>["attr"=>"","jqueryDone"=>"replaceWith"]]);
        $frm->fieldAsLink("cancel",["class"=>"ui button cancel"]);
        $this->click(".cancel","$('#frm-dev').hide();");
        return $frm;
    }

    public function getTable($arrayInstance)
    {
        $dt = $this->_semantic->dataTable("dtDevelopers", "App\Entity\Developer", $arrayInstance);
        $dt->setFields(["developer"]);
        $dt->setCaptions(["Developer"]);
        $dt->setValueFunction("developer", function($v,$arrayInstance){
            $lbl=new HtmlLabel("",$arrayInstance->getIdentity());
            return $lbl;
        });
        $dt->addEditButton();
        $dt->setTargetSelector("#update-developer");
        $dt->addDeleteButton();
        $dt->setTargetSelector("#delete-developer");
        $dt->setIdentifierFunction("getId");
        $dt->setUrls(["edit"=>"developer/update","delete"=>"developer/delete"]);
        return $dt;
    }

    public function getAddForm(){
        $form = $this->_semantic->form();
        $form->addField("Identity");
        return form;
    }

}