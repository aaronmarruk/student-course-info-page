<?php

/* course-page.html */
class __TwigTemplate_613e678ba5913ed1ab01cede30669b5c271c51e3c2d3b4b7b94f630bfbba12f8 extends Twig_Template
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
        echo "<!-- LS Header ripped d'reckly from Learning Space -->
";
        // line 2
        $this->env->loadTemplate("learningspace-header.html")->display($context);
        echo " 

  <!-- Nav tabs -->
<ul class=\"nav nav-pills\" role=\"tablist\">
  <li class=\"active\"><a href=\"#my-modules\" role=\"tab\" data-toggle=\"tab\">My Modules</a></li>
  <li><a href=\"#course-information\" role=\"tab\" data-toggle=\"tab\">Course Information</a></li>
</ul>

<!-- Tab panes -->
<div class=\"tab-content\">
  <div class=\"tab-pane active\" id=\"my-modules\">
    <!-- My Modules -->
  <!-- <h1 id=\"section--my-modules\">My Modules</h1> -->
  <ul class=\"module-list\">
  ";
        // line 17
        echo "  ";
        // line 18
        echo "  ";
        // line 19
        echo " 
  ";
        // line 20
        $context["readableName"] = "";
        // line 21
        echo "
  ";
        // line 23
        echo "  ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 24
            echo "    ";
            if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName") != (isset($context["readableName"]) ? $context["readableName"] : null))) {
                // line 25
                echo "      
      ";
                // line 26
                $context["name"] = $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName");
                // line 27
                echo "
      <li class=\"module-list__module\">

        ";
                // line 30
                if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "idnumber") != "")) {
                    // line 31
                    echo "          <h5 class=\"module-list__code badge\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "idnumber"), "html", null, true);
                    echo "</h5>
        ";
                }
                // line 33
                echo "
        <h1 class=\"module-list__title\"><a href=\"";
                // line 34
                echo twig_escape_filter($this->env, (((isset($context["siteRoot"]) ? $context["siteRoot"] : null) . "/course/view.php?id=") . $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "id")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName"), "html", null, true);
                echo "</a></h2>
        
        ";
                // line 36
                if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "summary") != "")) {
                    // line 37
                    echo "        <p class=\"module-list__item-desc\">
          ";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "summary"), "html", null, true);
                    echo "
        </p>
        ";
                }
                // line 41
                echo "
        ";
                // line 43
                echo "        ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["readingLists"]) ? $context["readingLists"] : null), $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName"), array(), "array"), 0, array(), "array"), "name") != "")) {
                    // line 44
                    echo "          
          <a class=\"module-list__readings-link\" href=\"";
                    // line 45
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["readingLists"]) ? $context["readingLists"] : null), $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName"), array(), "array"), 0, array(), "array"), "url"), "html", null, true);
                    echo "\"><span><i class=\"fa fa-book\"></i> Reading list</span></a>

        ";
                }
                // line 48
                echo "           
      </li>
    
    ";
            } else {
                // line 52
                echo "      ";
                echo "    
    ";
            }
            // line 54
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "</ul>
<!-- END My Modules -->
  </div>



  <div class=\"tab-pane\" id=\"course-information\">
    <!-- Welcome -->
    ";
        // line 63
        if (((isset($context["courseWelcome"]) ? $context["courseWelcome"] : null) != "")) {
            // line 64
            echo "    <h1>";
            echo twig_escape_filter($this->env, (isset($context["courseName"]) ? $context["courseName"] : null), "html", null, true);
            echo "</h1>
    <p>";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["courseWelcome"]) ? $context["courseWelcome"] : null), "html", null, true);
            echo "</p>
    <img src=\"";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["courseWelcomePhoto"]) ? $context["courseWelcomePhoto"] : null), "html", null, true);
            echo "\">
    <p>";
            // line 67
            echo twig_escape_filter($this->env, (isset($context["courseWelcomeName"]) ? $context["courseWelcomeName"] : null), "html", null, true);
            echo "</p>
    <p>";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["courseWelcomeJobTitle"]) ? $context["courseWelcomeJobTitle"] : null), "html", null, true);
            echo "</p>
    ";
        }
        // line 70
        echo "    <!-- END Welcome -->
    
    <!-- Contacts -->
    ";
        // line 73
        if (($this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "name") != null)) {
            // line 74
            echo "    <h1 id=\"section--personal-tutor\">Personal Tutor</h1>
    <p>Your personal tutor is who you should contact if you need to speak to somebody regarding course matters.</p>
    <ul class=\"contact-cards\">
      <li class=\"contact-cards__card\">
        <ul class=\"contact-cards__details\">
          <li class=\"contact-cards__pic\"></li>
          <li class=\"contact-cards__text\"><h3>";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "name"), "html", null, true);
            echo "</h3></li>
          <li class=\"contact-cards__text\"><strong>";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "jobTitle"), "html", null, true);
            echo "</strong></li>
          <li class=\"contact-cards__text\">";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "email"), "html", null, true);
            echo "</li>
          <li class=\"contact-cards__text\">";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "telephone"), "html", null, true);
            echo "</li>
        </ul>
      </li>
    </ul>
    ";
        }
        // line 88
        echo "    <!-- END Contacts -->

    <!-- Files -->
    ";
        // line 91
        if (((isset($context["files"]) ? $context["files"] : null) != null)) {
            // line 92
            echo "    <h1 id=\"section--important-documents\">Important documents</h1>
    <p>Below you will find important documents relating to your course</p>
    <ul class=\"files-list\">
      ";
            // line 95
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 96
                echo "      <li class=\"files-list__file\">
        <a class=\"files-list__file-link\" href=\"";
                // line 97
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "link"), "html", null, true);
                echo "\">
        <p class=\"files-list__file-title\"><small>";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "title"), "html", null, true);
                echo "</small></p>
        <i class=\"files-list__icon fa fa-cloud-download\"></i>
      <!-- <ul class=\"files-list__file-meta\">
        <li>
        ";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "size"), "html", null, true);
                echo "
        </li>
        <li>
        ";
                // line 105
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "ext"), "html", null, true);
                echo "
        </li>
      </ul> -->
      </a>
      </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "    </ul>
    ";
        }
        // line 113
        echo "    <!-- END Files -->

    <!-- Reading Lists -->
    <!-- <h2>Reading Lists</h2>
    <ul>
      ";
        // line 118
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["readingLists"]) ? $context["readingLists"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["moduleReadingList"]) {
            // line 119
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["moduleReadingList"]) ? $context["moduleReadingList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 120
                echo "          <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name"), "html", null, true);
                echo "</a></li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['moduleReadingList'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "    </ul> -->
    <!-- END Reading Lists -->
  </div>
</div>
<!-- LS Footer – Ripped d'reckly from Learning Space -->
";
        // line 128
        $this->env->loadTemplate("learningspace-footer.html")->display($context);
    }

    public function getTemplateName()
    {
        return "course-page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  291 => 128,  284 => 123,  278 => 122,  267 => 120,  262 => 119,  258 => 118,  251 => 113,  247 => 111,  235 => 105,  229 => 102,  222 => 98,  218 => 97,  215 => 96,  211 => 95,  206 => 92,  204 => 91,  199 => 88,  191 => 83,  187 => 82,  183 => 81,  179 => 80,  171 => 74,  169 => 73,  164 => 70,  159 => 68,  155 => 67,  151 => 66,  147 => 65,  142 => 64,  140 => 63,  130 => 55,  124 => 54,  119 => 52,  113 => 48,  107 => 45,  104 => 44,  101 => 43,  98 => 41,  92 => 38,  89 => 37,  87 => 36,  80 => 34,  77 => 33,  71 => 31,  69 => 30,  64 => 27,  62 => 26,  59 => 25,  56 => 24,  51 => 23,  48 => 21,  46 => 20,  43 => 19,  41 => 18,  39 => 17,  22 => 2,  19 => 1,);
    }
}
