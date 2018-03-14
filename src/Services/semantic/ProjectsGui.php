<?php
namespace App\Services\semantic;

use Ajax\php\symfony\JquerySemantic;

class ProjectsGui extends Gui {
    public function button(){
        $bt=$this->semantic()->htmlButton("btProjects","Projets","orange");
        $bt->getOnClick($this->getUrl("/projects"),"#response",["attr"=>""]);
        return $bt;
    }
    public function buttons(){
        $bts=$this->_semantic->htmlButtonGroups("bts",["Projects","Tags","Developers"]);
        $bts->addIcons(["folder","tags"]);
        $bts->setPropertyValues("data-url", ["projects","tags","developers"]);
        $bts->getOnClick("","#response",["attr"=>"data-url"]);
    }

    public function getForm($instance)
    {
        // TODO: Implement getForm() method.
    }

    public function getTable($arrayInstance)
    {
        $dt = $this->_semantic->dataTable("dtDevelopers", "App\Entity\Project", $arrayInstance);
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

}