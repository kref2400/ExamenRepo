<?php

namespace Controllers\Mnt;

class coworkingplaces extends \Controllers\PublicController
{

    public function run(): void
    {
        $viewData = array();
        $tmpcoworkingplaces = \Dao\coworkingplacesPanel::getAllcoworkingplaces();
        $viewData["coworkingplaces"] = array();
        $counter = 0;

        foreach ($tmpcoworkingplaces as $coworkingplaces) {
            $counter++;
            $pianos["rownum"] = $counter;
            $viewData["coworkingplaces"][] = $coworkingplaces;
        }


        \Views\Renderer::render("mnt/coworkingplaces", $viewData);
    }
}
