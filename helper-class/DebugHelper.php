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
        // Include external CSS and JS for modern UI
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<style>
            .debug-container {
                direction: ltr;
                padding: 20px;
                font-size: 14px;
                background-color: #f0f2f5;
                border: 1px solid #dcdcdc;
                border-radius: 8px;
                font-family: Arial, sans-serif;
            }
            .debug-key {
                color: #495057;
            }
            .debug-type {
                color: #adb5bd;
                font-weight: lighter;
                font-size: 13px;
            }
            .debug-string {
                color: #d6336c;
            }
            .debug-float {
                color: #20c997;
            }
            .debug-integer {
                color: #fd7e14;
            }
            .debug-boolean {
                color: #0d6efd;
            }
            .debug-toggle {
                color: #0d6efd;
                cursor: pointer;
                text-decoration: none;
            }
            .debug-toggle .fas {
                font-size: 12px;
            }
            .nested {
                margin-left: 20px;
                display: none;
            }
        </style>';

        // Start debug output
        echo '<div class="debug-container">';

        // Recursive function to process and output debug information
        $recursive = function ($data, $level = 0) use (&$recursive, $collapse) {
            global $argv; // Access command-line arguments

            $isTerminal = isset($argv); // Check if running in a terminal

            // Output JavaScript for toggling display if not running in a terminal
            if (!$isTerminal && $level == 0 && !defined("DUMP_DEBUG_SCRIPT")) {
                define("DUMP_DEBUG_SCRIPT", true); // Prevent multiple script definitions

                echo '<script>
                        $(document).ready(function() {
                            $(".debug-toggle").click(function() {
                                var target = $(this).data("target");
                                $("#" + target).slideToggle();
                                $(this).find(".fas").toggleClass("fa-plus-square fa-minus-square");
                            });
                        });
                      </script>';
            }

            // Determine type and format data accordingly
            $type = !is_string($data) && is_callable($data) ? "Callable" : ucfirst(gettype($data));
            $type_class = strtolower($type);
            $type_data = null;
            $type_length = null;

            switch ($type) {
                case "String":
                    $type_length = strlen($data);
                    $type_data = "\"" . htmlentities($data) . "\"";
                    break;
                case "Double":
                case "Float":
                    $type = "Float";
                    $type_length = strlen($data);
                    $type_data = htmlentities($data);
                    break;
                case "Integer":
                    $type_length = strlen($data);
                    $type_data = htmlentities($data);
                    break;
                case "Boolean":
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

                            echo "<a href=\"javascript:void(0);\" class=\"debug-toggle\" data-target=\"container" . $id . "\">";
                            echo "<span class='fas " . ($collapse ? "fa-plus-square" : "fa-minus-square") . "'></span>";
                            echo "<span class='debug-type'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>";
                            echo "</a>";
                            echo "<div id=\"container" . $id . "\" class=\"nested\" style=\"display: " . ($collapse ? "none" : "block") . ";\">";
                        }

                        // Indentation for nested levels
                        for ($i = 0; $i <= $level; $i++) {
                            echo $isTerminal ? "|    " : "<span class='debug-type'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }

                        echo $isTerminal ? "\n" : "<br />";
                    }

                    // Indentation for nested levels
                    for ($i = 0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span class='debug-type'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    // Output key-value pairs
                    echo $isTerminal ? "[" . $key . "] => " : "<span class='debug-key'>[" . $key . "]&nbsp;=>&nbsp;</span>";
                    call_user_func($recursive, $value, $level + 1);
                }

                // If the type is an object, also process its properties
                if ($type === "Object") {
                    foreach ($reflection->getProperties() as $property) {
                        $property->setAccessible(true);
                        $key = $property->getName();
                        $value = $property->getValue($data);

                        for ($i = 0; $i <= $level; $i++) {
                            echo $isTerminal ? "|    " : "<span class='debug-type'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }

                        echo $isTerminal ? "[" . $key . "] => " : "<span class='debug-key'>[" . $key . "]&nbsp;=>&nbsp;</span>";
                        call_user_func($recursive, $value, $level + 1);
                    }
                }

                // Close divs and output if non-empty
                if ($notEmpty) {
                    for ($i = 0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span class='debug-type'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    if (!$isTerminal) {
                        echo "</div>";
                    }
                } else {
                    echo $isTerminal ?
                        $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                        "<span class='debug-type'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";
                }
            } else {
                // Output non-array and non-object types
                echo $isTerminal ?
                    $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                    "<span class='debug-type'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";

                if ($type_data != null) {
                    echo $isTerminal ? $type_data : "<span class='debug-" . $type_class . "'>" . $type_data . "</span>";
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
