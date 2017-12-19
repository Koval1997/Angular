<?php

class indexController extends Controller {

	public function index()
    {
		$result = "<!DOCTYPE html>
        <html lang=\"en\" ng-app=\"game\">
        <head>
            <meta charset=\"UTF-8\">
            <link rel=\"stylesheet\" href=\"./css/styles.css\">
            <script src=\"js/lib/angular.js\"></script>
            <script src=\"js/lib/angular-route.js\"></script>
            <script src=\"js/lib/angular-resource.js\"></script>
            <script src=\"js/app.js\"></script>
            <title>Catch Pony</title>
        </head>
            <body>
                <header></header>
                <ng-view></ng-view>
            </body>
        </html>";

		$this->setResponse($result);
	}
		
}