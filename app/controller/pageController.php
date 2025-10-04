<?php
class PageController
{
    public function show($page)
    {
        $viewPath = __DIR__ . '/../view/' . $page . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            http_response_code(404);
            echo "<h1>404 Page Not Found</h1>";
        }
    }
}
