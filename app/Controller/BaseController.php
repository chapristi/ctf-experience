<?php
namespace App\Controller;

class BaseController {
    protected function render(string $view, array $data = []) {
        $path = __DIR__ . "/../../views/$view.php";

        if (!file_exists($path)) {
            die("View '$view' not found at $path");
        }

        extract($data);

        ob_start();
        include $path;
        $content = ob_get_clean();

        echo $content;
    }
}
