<!DOCTYPE html>
<html ng-app="StudentCourseInformationPage">
<head>
  <title>Student Course Information Page</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <!-- Import JQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <!-- Import Angular JS -->
  <script id="angularScript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.17/angular.min.js"></script>
</head>
<body>
  <div ng-controller="InformationPageController">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Student Course Info Page</a>
        </div>
    </nav>
    <div class="container-fluid">
      <h1>Contacts</h1>
      <ul>
        <li ng-repeat="contact in response.contacts">
          {{contact.name}}
          <ul>
            <li>{{contact.email}}</li>
            <li>{{contact.telephone}}</li>
          </ul>
        </li>
      </ul>
      <h2>Academic Liaison Librarian</h2>
    
          <a href="{{librarians.subject_page_url}}">{{librarians.librarian}}</a>
    
      </ul>
      <hr />
      <h1>Files</h1>
      <ul>
        <li ng-repeat="file in response.files">
          <a href="{{file.link}}">{{file.title}}</a>
        </li>
      </ul>
    </div>
  </div>
  <!-- Angular JS app -->
  <script type="text/javascript">

  // Set up the app variable as an instance of AngularJS app
  var app = angular.module('StudentCourseInformationPage', []);

  // Set up the information page controller
  app.controller('InformationPageController', function($scope) {
    
    // Example response from SharePoint API
    <?php  echo 'var response = '.$this->data['json']; ?>;

    // Example response from SharePoint API
    <?php  echo 'var librarians = '.$this->data['liaisonUrl']; ?>;

    // Set scope response to API response.
    $scope.response = response;
    $scope.librarians = librarians[0];

  });

  </script>

  

</body>
</html>