<?php

/* learningspace-header.html */
class __TwigTemplate_aeea64667ebc77c3538e67a37f01b6875772910979e9450afda9cd3f30f34e76 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\"
\"http://www.w3.org/TR/html4/strict.dtd\">
<html>
<head>
<title>Page title</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["scip"]) ? $context["scip"] : null), "html", null, true);
        echo "/public/css/style.css\">

<!-- Typekit -->
<script type=\"text/javascript\" src=\"//use.typekit.net/ull6bqj.js\"></script>
<script type=\"text/javascript\">try{Typekit.load();}catch(e){}</script>

<!-- FONT AWESOME -->
<link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css\" rel=\"stylesheet\">

<!-- SCIP PAGE CSS -->
<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["scip"]) ? $context["scip"] : null), "html", null, true);
        echo "/public/css/scip.css\">

</head>
<body id=\"page-site-index\" class=\"cbp-spmenu-push format-site course path-site safari dir-ltr lang-en yui-skin-sam yui3-skin-sam learningspace-falmouth-ac-uk pagelayout-frontpage course-1 context-2 side-pre-only\">
  <div id=\"wrapper\">
  <div class=\"skiplinks\"><a class=\"skip\" href=\"#maincontent\">Skip to main content</a></div>
  <script type=\"text/javascript\">
    //<![CDATA[
    document.body.className += ' jsenabled';
    //]]>
  </script>

<header role=\"banner\" class=\"navbar navbar-fixed-top\">
  <nav role=\"navigation\" class=\"navbar-inner navbar-inverse\">
    <div class=\"container-fluid\">
      <a class=\"brand\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["scip"]) ? $context["scip"] : null), "html", null, true);
        echo "\">Learning Space</a>
      <div id=\"mobile-header\">
        <a id=\"responsive-menu-button\" href=\"#sidr-main\"><i class=\"fa icon fa-bars\"></i></a>
      </div>
      <ul class=\"nav\">
        <li><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["scip"]) ? $context["scip"] : null), "html", null, true);
        echo "\">My Modules</a></li>

        <li class=\"dropdown\"><a class=\"menu-item-resources dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Resources</a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"http://ask.fxplus.ac.uk/\">ASK (Academic Skills)</a></li>
            <li><a href=\"http://www.falmouth.ac.uk/facilities/the-compass\">The Compass</a></li>
            <li><a href=\"http://careerhub.falmouth.ac.uk\">Creative Futures Hub</a></li>
            <li><a href=\"http://dyslexia.fxplus.ac.uk\">Dyslexia Skills</a></li>
            <li><a href=\"http://intranet.falmouth.ac.uk/html/finance/\">Finance Services</a></li>
            <li><a href=\"http://www.fxu.org.uk/\">FXU</a></li>
            <li><a href=\"https://sp.falmouth.ac.uk/public/itservices/Pages/IT%20Services.aspx\">IT Services</a></li>
            <li><a href=\"http://library.fxplus.ac.uk/\">Library and Information Services</a></li>
            <li><a href=\"http://intranet.falmouth.ac.uk/html/qualityoffice/\">Quality Office</a></li>
            <li><a href=\"/course/view.php?id=665\">Assessment Information</a></li>
            <li><a href=\"http://learningspace.falmouth.ac.uk/course/view.php?id=686\">Software Training</a></li>
            <li><a href=\"http://learningspace.falmouth.ac.uk/course/view.php?id=714&section=1&section=1\">Student Reps</a></li>
            <li><a href=\"http://www.fxplus.ac.uk/study/student-support-services\">Student Support</a></li>
            <li class=\"divider\"></li>
            <li class=\"disabled\">
              <a href=\"http://etsupport.freshdesk.com/support/tickets/new\" style=\"cursor:pointer\">Not listed? Please make contact here</a>
            </li>
          </ul>
        </li>
      </ul>
    <div class=\"\">
      <ul class=\"nav pull-right\">
        <li class=\"editbtn\"></li> 
        <li><a href=\"http://etsupport.freshdesk.com/support/solutions/158481\">Help</a></li> 
        <li></li>
        <li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["siteRoot"]) ? $context["siteRoot"] : null), "html", null, true);
        echo "/user/profile.php?id=";
        echo twig_escape_filter($this->env, (isset($context["userId"]) ? $context["userId"] : null), "html", null, true);
        echo "\" title=\"View profile\"><!-- <img src=\"";
        echo twig_escape_filter($this->env, (isset($context["siteRoot"]) ? $context["siteRoot"] : null), "html", null, true);
        echo "/pluginfile.php/626/user/icon/learningspace/f2\" /> -->";
        echo twig_escape_filter($this->env, (isset($context["userFullName"]) ? $context["userFullName"] : null), "html", null, true);
        echo " <b class=\"caret\"></b></a><ul class=\"dropdown-menu\" id=\"user-context-menu\" role=\"menu\"><li id=\"usermenuheader\"><h2>User Menu</h2></li><li class=\"menu-item-resources\"><a href=\"/\">My Modules</a></li><li ><a href=\"http://mytimetable.falmouth.ac.uk/\">My Timetable</a></li><li><a href=\"";
        echo twig_escape_filter($this->env, (isset($context["siteRoot"]) ? $context["siteRoot"] : null), "html", null, true);
        echo "/user/profile.php?id=";
        echo twig_escape_filter($this->env, (isset($context["userId"]) ? $context["userId"] : null), "html", null, true);
        echo "\" title=\"View profile\">My Profile</a></li><li id=\"student-email-link\"><a href=\"http://studentmail.falmouth.ac.uk/\">My Email</a></li><li id=\"staff-email-link\"><a href=\"http://mailspace.falmouth.ac.uk/\">My Email</a></li><li class=\"divider\"></li><li><a href=\"";
        echo twig_escape_filter($this->env, (isset($context["siteRoot"]) ? $context["siteRoot"] : null), "html", null, true);
        echo "/login/logout.php\">Logout</a></li></ul></li>
        <!--<li><a href=\"#\" id=\"trigger\" class=\"icon-list\"> MAIN MENU</a></li>-->
        <!--<button id=\"showLeft\">Show/Hide Left Slide Menu</button>-->
      </ul>
    </div>
    </div>
  </nav>
</header>

<div id=\"page-wrapper\">
  <div id=\"page\" class=\"container-fluid\">
    <div id=\"page-content\" class=\"row-fluid\">
      <section id=\"region-main\" class=\"span8 offset-2\">
        <div role=\"main\">";
    }

    public function getTemplateName()
    {
        return "learningspace-header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 36,  57 => 31,  39 => 16,  26 => 6,  296 => 130,  289 => 125,  283 => 124,  272 => 122,  267 => 121,  263 => 120,  256 => 115,  252 => 113,  240 => 107,  234 => 104,  227 => 100,  223 => 99,  220 => 98,  216 => 97,  211 => 94,  209 => 93,  204 => 90,  196 => 85,  192 => 84,  188 => 83,  184 => 82,  176 => 76,  174 => 75,  169 => 72,  164 => 70,  160 => 69,  156 => 68,  152 => 67,  147 => 66,  145 => 65,  135 => 57,  129 => 56,  124 => 54,  118 => 50,  112 => 47,  109 => 46,  106 => 45,  103 => 43,  97 => 65,  94 => 39,  92 => 38,  85 => 36,  82 => 35,  76 => 33,  74 => 32,  69 => 29,  67 => 28,  64 => 27,  61 => 26,  56 => 25,  53 => 23,  51 => 22,  48 => 21,  46 => 20,  44 => 19,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
