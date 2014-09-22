<?php

/* 403.html */
class __TwigTemplate_ba569c9cd15fcde49ccb8d186048e8397c0ae03e87df778c5b77c5f8ac9f2180 extends Twig_Template
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
    <title>403 Not Authorized</title>
</head>
<body>
    <h1>403</h1>
    <p>Hmmm, looks like you don't have permission to access this resource.</p>
    <p>You may need to <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["siteRoot"]) ? $context["siteRoot"] : null), "html", null, true);
        echo "\">log in.</a>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "403.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 10,  19 => 1,);
    }
}
