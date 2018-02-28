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
        // TODO: Implement getTable() method.
    }

}