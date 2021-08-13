<?php

namespace Controllers\Mnt;

class Candidato extends \Controllers\PublicController
{

    public function run(): void
    {

        $viewData = array();
        $ModalTitles = array(
            "INS" => "Nuevo Candidato",
            "UPD" => "Actualizando %s - %s",
            "DSP" => "Detalle de %s - %s",
            "DEL" => "Eliminado %s - %s"
        );

        $viewData["ModalTitle"] = "";
        $viewData["idCandidatos"] = 0;
        $viewData["NombreCandidato"] = "Kevin Funes";
        $viewData["edad"] = 22;
        $viewData["showCommitBtn"] = true;
        $viewData["readonly"] = '';

        //if (isset($_POST["btnConfirmar"]))
        if ($this->isPostBack()) {
            $viewData["mode"] = $_POST["mode"];
            $viewData["idCandidatos"] = $_POST["idCandidatos"];
            $viewData["token"] = $_POST["token"];

            $this->verificarToken();
            if ($viewData["token"] != $_SESSION["candidatos_xss_token"]) {
                $time = time();
                $token = md5("candidatos" . $time);
                $_SESSION["candidatos_xss_token"] = $token;
                $_SESSION["candidatos_xss_token_tts"] = $time;
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_candidatos",
                    "Algo sucedio mal intente de nuevo"
                );
            }
            if ($viewData["mode"] != "DEL") {
                $viewData["NombreCandidato"] = $_POST["NombreCandidato"];
                $viewData["edad"] = $_POST["edad"];
            }
            switch ($viewData["mode"]) {
                case "INS":
                    $ok = \Dao\CanditosPanel::addCandidatos(
                        $viewData["NombreCandidato"],
                        $viewData["edad"],

                    );
                    if ($ok) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_candidatos",
                            "Candidatos agregado Exitosamente"
                        );
                    }
                    break;
                case "UPD":
                    $ok = \Dao\CanditosPanel::updateCandidato(
                        $viewData["NombreCandidato"],
                        $viewData["edad"],
                        $viewData["idCandidatos"]
                    );
                    if ($ok) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_candidatos",
                            "Candidato actualizado Exitosamente"
                        );
                    }
                    break;
                case "DEL":
                    $ok = \Dao\CanditosPanel::deleteCandidato(
                        $viewData["idCandidatos"]
                    );
                    if ($ok) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_candidatos",
                            "Candidato eliminado Exitosamente"
                        );
                    }
                    break;
            }
        } else {
            $viewData["mode"] = $_GET["mode"];
            $viewData["idCandidatos"] = isset($_GET["id"]) ? $_GET["id"] : 0;
            $this->verificarToken();
        }
        //Visualizar los Datos
        if ($viewData["mode"] == "INS") {
            $viewData["ModalTitle"] = "Agregando nuevo Candidato";
        } else {
            //aqui obtenemos el registro por id.
            $candidato = \Dao\CanditosPanel::getCandidatoById($viewData["idCandidatos"]);

            error_log(json_encode($candidato));
            if (!$candidato) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_candidatos",
                    "No existe el registro"
                );
            }

            // Mas rapido lazy developers
            \Utilities\ArrUtils::mergeFullArrayTo($candidato, $viewData);
            $viewData["ModalTitle"] = sprintf(
                $ModalTitles[$viewData["mode"]],
                $viewData["idCandidatos"],
                $viewData["NombreCandidato"]
            );


            if ($viewData["mode"] == "DEL" || $viewData["mode"] == "DSP") {
                $viewData["readonly"] = "readonly";
                $viewData["showCommitBtn"]  = $viewData["mode"] == "DEL";
            }
        }



        \Views\Renderer::render("mnt/candidato", $viewData);
    }


    private function verificarToken()
    {
        if (!isset($_SESSION["candidatos_xss_token"])) {
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_candidatos",
                "Algo sucedio mal intente de nuevo"
            );
        } else {
            $time = time();
            if ($time - $_SESSION["candidatos_xss_token_tts"] > 86400) {
                //24 * 60 * 60  horas * minutos * segundo
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_candidatos",
                    "Algo sucedio mal intente de nuevo"
                );
            }
        }
    }
}

/*
c#
import System.SQL.SqlConnection;

java

import java.utils.ArraList;

com.unicahiccnw.Main

com
 |- unicahiccnw
    |- Main.java

*/
