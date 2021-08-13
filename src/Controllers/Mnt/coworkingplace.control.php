<?php

namespace Controllers\Mnt;

class coworkingplace extends \Controllers\PublicController
{

    public function run(): void
    {
        $viewData = array();
        $ModalTitles = array(
            "INS" => "Nuevo CoworkingPlaces Panel",
            "UPD" => "Actualizando %s - %s",
            "DSP" => "Detalle de %s - %s",
            "DEL" => "Eliminado %s - %s"
        );

        $viewData["ModalTitle"] = "";
        $viewData["cwp_id"] = 0;
        $viewData["cwp_name"] = "Kevin Espinal";
        $viewData["cwp_email"] = "kevinE@gmail.com";
        $viewData["cwp_phone"] = "12345678";
        $viewData["cwp_type"] = "ADM";
        $viewData["cwp_status"] = "ACT";
        $viewData["readonly"] = '';
        $viewData["showCommitBtn"] = true;
        $viewData["cwp_status_act"] = true;
        $viewData["cwp_status_ina"] = false;

        if ($this->isPostBack()) {
            $viewData["mode"] = $_POST["mode"];
            $viewData["cwp_id"] = $_POST["cwp_id"];




            if ($viewData["mode"] != "DEL") {
                $viewData["cwp_name"] = $_POST["cwp_name"];
                $viewData["cwp_status"] = $_POST["cwp_status"];
            }
            switch ($viewData["mode"]) {
                case "INS":
                    $ok = \Dao\coworkingplacesPanel::addcoworkingplaces(
                        $viewData["cwp_name"],
                        $viewData["cwp_email"],
                        $viewData["cwp_phone"],
                        $viewData["cwp_type"],
                        $viewData["cwp_status"],
                    );
                    if ($ok) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_coworkingplaces",
                            "coworkinplace Panel agregado Exitosamente"
                        );
                    }
                    break;
                case "UPD":
                    $ok = \Dao\coworkingplacesPanel::updatecoworkingplaces(
                        $viewData["cwp_name"],
                        $viewData["cwp_email"],
                        $viewData["cwp_phone"],
                        $viewData["cwp_type"],
                        $viewData["cwp_status"],
                        $viewData["cwp_id"]
                    );
                    if ($ok) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_coworkingplaces",
                            "coworking Panel actualizado Exitosamente"
                        );
                    }
                    break;

                case "DEL":
                    $ok = \Dao\coworkingplacesPanel::deletecoworkingplaces(
                        $viewData["cwp_id"]
                    );
                    if ($ok) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_coworkingplaces",
                            "coworking Panel eliminado Exitosamente"
                        );
                    }
                    break;
            }
        } else {
            $viewData["mode"] = $_GET["mode"];
            $viewData["cwp_id"] = isset($_GET["id"]) ? $_GET["id"] : 0;
        }
        //Visualizar los Datos
        if ($viewData["mode"] == "INS") {
            $viewData["ModalTitle"] = "Agregando nueva coworking Panel";
        } else {
            //aqui obtenemos el registro por id.
            $coworkingplaces = \Dao\coworkingplacesPanel::getcoworkingplacesById($viewData["cwp_id"]);

            error_log(json_encode($coworkingplaces));
            if (!$coworkingplaces) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_coworkingplaces",
                    "No existe el registro"
                );
            }

            // Mas rapido lazy developers
            \Utilities\ArrUtils::mergeFullArrayTo($coworkingplaces, $viewData);
            $viewData["ModalTitle"] = sprintf(
                $ModalTitles[$viewData["mode"]],
                $viewData["cwp_id"],
                $viewData["cwp_name"]
            );
            $viewData["cwp_status_act"] = $viewData["cwp_status"] == "ACT";
            $viewData["cwp_status_ina"] = $viewData["cwp_status"] == "INA";

            if ($viewData["mode"] == "DEL" || $viewData["mode"] == "DSP") { /*Visualizar*/
                $viewData["readonly"] = "readonly";
                $viewData["showCommitBtn"]  = $viewData["mode"] == "DEL";
            }
        }


        \Views\Renderer::render("mnt/coworkingplace", $viewData);
    }
}
