<?php
namespace App\Services\semantic;

use Ajax\php\symfony\JquerySemantic;

class ProjectsGui extends JquerySemantic{
    public function button(){
        $bt=$this->semantic()->htmlButton("btProjects","Projets","orange");
        $bt->getOnClick($this->getUrl("/projects"),"#response",["attr"=>""]);
        return $bt;
    }
    public function buttons(){
        $bts=$this->_semantic->htmlButtonGroups("bts",["Projects","Tags"]);
        $bts->addIcons(["folder","tags"]);
        $bts->setPropertyValues("data-url", ["projects","tags"]);
        $bts->getOnClick("","#response",["attr"=>"data-url"]);
    }
}