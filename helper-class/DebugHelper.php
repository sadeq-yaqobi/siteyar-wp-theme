<?php

/**
 * Helper class for dumping debug information about variables.
 */
class DebugHelper
{
    /**
     * Outputs formatted debug information about a variable.
     *
     * @param mixed $input The variable to debug.
     * @param bool $collapse Whether to collapse array and object elements by default.
     * @return void
     */
    public static function dump($input, bool $collapse = false)
    {
        // Start debug output
        echo '<div style="direction: ltr; padding: 35px;font-size: 16px;background-color: #F4F5F7">';

        // Recursive function to process and output debug information
        $recursive = function ($data, $level = 0) use (&$recursive, $collapse) {
            global $argv; // Access command-line arguments

            $isTerminal = isset($argv); // Check if running in a terminal

            // Output JavaScript for toggling display if not running in a terminal
            if (!$isTerminal && $level == 0 && !defined("DUMP_DEBUG_SCRIPT")) {
                define("DUMP_DEBUG_SCRIPT", true); // Prevent multiple script definitions

                echo '<script language="Javascript">function toggleDisplay(id) {';
                echo 'var state = document.getElementById("container"+id).style.display;';
                echo 'document.getElementById("container"+id).style.display = state == "inline" ? "none" : "inline";';
                echo 'document.getElementById("plus"+id).style.display = state == "inline" ? "inline" : "none";';
                echo '}</script>' . PHP_EOL;
            }

            // Determine type and format data accordingly
            $type = !is_string($data) && is_callable($data) ? "Callable" : ucfirst(gettype($data));
            $type_data = null;
            $type_color = null;
            $type_length = null;

            switch ($type) {
                case "String":
                    $type_color = "#F6511D";
                    $type_length = strlen($data);
                    $type_data = "\"" . htmlentities($data) . "\"";
                    break;
                case "Double":
                case "Float":
                    $type = "Float";
                    $type_color = "#0099c5";
                    $type_length = strlen($data);
                    $type_data = htmlentities($data);
                    break;
                case "Integer":
                    $type_color = "#93032E";
                    $type_length = strlen($data);
                    $type_data = htmlentities($data);
                    break;
                case "Boolean":
                    $type_color = "#00ABF5 ";
                    $type_length = strlen($data);
                    $type_data = $data ? "TRUE" : "FALSE";
                    break;
                case "NULL":
                    $type_length = 0;
                    break;
                case "Array":
                    $type_length = count($data);
                    break;
                case "Object":
                    $reflection = new ReflectionClass($data);
                    $props = $reflection->getProperties();
                    $type_length = count($props);
                    break;
            }

            // Process arrays and objects recursively
            if (in_array($type, ["Object", "Array"])) {
                $notEmpty = false;

                foreach ($data as $key => $value) {
                    if (!$notEmpty) {
                        $notEmpty = true;

                        // Output type and setup toggling if not in terminal
                        if ($isTerminal) {
                            echo $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "\n";
                        } else {
                            $id = substr(md5(rand() . ":" . $key . ":" . $level), 0, 8);

                            echo "<a href=\"javascript:toggleDisplay('" . $id . "');\" style=\"text-decoration:none\">";
                            echo "<span style='color:#b7b7b8;font-weight: lighter;font-size: 13px;'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>";
                            echo "</a>";
                            echo "<span id=\"plus" . $id . "\" style=\"display: " . ($collapse ? "inline" : "none") . ";\">&nbsp;&#10549;</span>";
                            echo "<div id=\"container" . $id . "\" style=\"display: " . ($collapse ? "" : "inline") . ";\">";
                            echo "<br />";
                        }

                        // Indentation for nested levels
                        for ($i = 0; $i <= $level; $i++) {
                            echo $isTerminal ? "|    " : "<span style='color:#b7b7b8'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }

                        echo $isTerminal ? "\n" : "<br />";
                    }

                    // Indentation for nested levels
                    for ($i = 0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span style='color:#b7b7b8'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    // Output key-value pairs
                    echo $isTerminal ? "[" . $key . "] => " : "<span style='color:#070600'>[" . $key . "]&nbsp;=>&nbsp;</span>";
                    call_user_func($recursive, $value, $level + 1);
                }

                // If the type is an object, also process its properties
                if ($type === "Object") {
                    foreach ($reflection->getProperties() as $property) {
                        $property->setAccessible(true);
                        $key = $property->getName();
                        $value = $property->getValue($data);

                        for ($i = 0; $i <= $level; $i++) {
                            echo $isTerminal ? "|    " : "<span style='color:#b7b7b8'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }

                        echo $isTerminal ? "[" . $key . "] => " : "<span style='color:#070600'>[" . $key . "]&nbsp;=>&nbsp;</span>";
                        call_user_func($recursive, $value, $level + 1);
                    }
                }

                // Close divs and output if non-empty
                if ($notEmpty) {
                    for ($i = 0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span style='color:#b7b7b8'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    if (!$isTerminal) {
                        echo "</div>";
                    }
                } else {
                    echo $isTerminal ?
                        $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                        "<span style='color:#b7b7b8;font-weight: lighter;font-size: 13px;'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";
                }
            } else {
                // Output non-array and non-object types
                echo $isTerminal ?
                    $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                    "<span style='color:#b7b7b8;font-weight: lighter;font-size: 13px;'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";

                if ($type_data != null) {
                    echo $isTerminal ? $type_data : "<span style='color:" . $type_color . "'>" . $type_data . "</span>";
                }
            }

            echo $isTerminal ? "\n" : "<br />";
        };

        // Start recursive processing
        call_user_func($recursive, $input);

        // End debug output
        echo '</div>';
    }
}
