<?php

namespace Controllers\Mnt;

class Candidatos extends \Controllers\PublicController
{
    public function run(): void
    {
        $viewData = array();
        $counter = 0;

        $ALLCandidatos = \Dao\CanditosPanel::getAllCandidatos();
        foreach ($ALLCandidatos as $candidatos) {
            $counter++;
            $candidatos["rownum"] = $counter;

            $viewData["candidatos"][] = $candidatos;
        }
        $time = time();
        $token = md5("candidatos" . $time);
        $_SESSION["candidatos_xss_token"] = $token;
        $_SESSION["candidatos_xss_token_tts"] = $time;
        \Views\Renderer::render("mnt/candidatos", $viewData);
    }
}
