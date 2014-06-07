<?php

class RecoverCat {

    public static function numeroSeccion($nombreSeccion) {
        switch ($nombreSeccion) {
            case "aperitivos":
                return 1;
                break;
            case "ensaladas-y-verduras":
                return 2;
                break;
            case "arroces-y-cereales":
                return 3;
                break;
            case "sopas-y-cremas":
                return 4;
                break;
            case "pastas-y-pizzas":
                return 5;
                break;
            case "legumbres":
                return 6;
                break;
            case "carnes":
                return 7;
                break;
            case "pescados-y-mariscos":
                return 8;
                break;
            case "huevos":
                return 9;
                break;
            case "setas-y-hongos":
                return 10;
                break;
            case "salsas":
                return 11;
                break;
            case "postres":
                return 12;
                break;
        }
    }

    public static function nombreSeccion($numeroSeccion) {
        switch ($numeroSeccion) {
            case 1:
                return "aperitivos";
                break;
            case 2:
                return "ensaladas-y-verduras";
                break;
            case 3:
                return "arroces-y-cereales";
                break;
            case 4:
                return "sopas-y-cremas";
                break;
            case 5:
                return "pastas-y-pizzas";
                break;
            case 6:
                return "legumbres";
                break;
            case 7:
                return "carnes";
                break;
            case 8:
                return "pescados-y-mariscos";
                break;
            case 9:
                return "huevos";
                break;
            case 10:
                return "setas-y-hongos";
                break;
            case 11:
                return "salsas";
                break;
            case 12:
                return "postres";
                break;
        }
    }

    public static function checkedSeccion($nombreSeccion) {
        $checked = array();
        switch ($nombreSeccion) {
            case "aperitivos":
                $checked[1] = "checked";
                break;
            case "ensaladas-y-verduras":
                $checked[2] = "checked";
                break;
            case "arroces-y-cereales":
                $checked[3] = "checked";
                break;
            case "sopas-y-cremas":
                $checked[4] = "checked";
                break;
            case "pastas-y-pizzas":
                $checked[5] = "checked";
                break;
            case "legumbres":
                $checked[6] = "checked";
                break;
            case "carnes":
                $checked[7] = "checked";
                break;
            case "pescados-y-mariscos":
                $checked[8] = "checked";
                break;
            case "huevos":
                $checked[9] = "checked";
                break;
            case "setas-y-hongos":
                $checked[10] = "checked";
                break;
            case "salsas":
                $checked[11] = "checked";
                break;
            case "postres":
                $checked[12] = "checked";
                break;
        }

        return $checked;
    }

    public static function checkedTemporada($temporada) {
        $checked = array();
        switch ($temporada) {
            case "V":
                $checked[1] = "checked";
                break;
            case "I":
                $checked[2] = "checked";
                break;
            case "O":
                $checked[3] = "checked";
                break;
            case "P":
                $checked[4] = "checked";
                break;
        }
        return $checked;
    }

}
